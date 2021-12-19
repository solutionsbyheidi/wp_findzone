


let map;
let marker;
let geocoder;
let responseDiv;
let response;



function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    zoom: Number(mapsettings.Zoom),
    center: {
      lat: Number(mapsettings.Lat),
      lng: Number(mapsettings.Long),
    },
    mapTypeControl: false,
  });
  geocoder = new google.maps.Geocoder();

  const inputText = document.createElement("input");

  inputText.type = "text";
  inputText.placeholder = mapsettings.SearchPlaceholder; 

  const submitButton = document.createElement("input");

  submitButton.type = "button";
  submitButton.value = mapsettings.SearchButton; 
  submitButton.classList.add("button", "button-primary");

  const clearButton = document.createElement("input");

  clearButton.type = "button";
  clearButton.value = mapsettings.ClearButton; 
  clearButton.classList.add("button", "button-secondary");
  
  response = document.createElement("pre");
  response.id = "response";
  response.innerHTML = "";
  responseDiv = document.createElement("div");
  responseDiv.id = "response-container";
  responseDiv.appendChild(response);

  const instructionsElement = document.createElement("p");

  instructionsElement.id = "instructions";
  instructionsElement.innerHTML = mapsettings.Instructions;
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(inputText);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(submitButton);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(clearButton);
  map.controls[google.maps.ControlPosition.LEFT_TOP].push(instructionsElement);
  map.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(responseDiv);
  marker = new google.maps.Marker({
    map: map,
    icon: {
      path: google.maps.SymbolPath.CIRCLE,
      scale: 0
    }
  });

  map.addListener("click", (e) => {
    geocode({
      location: e.latLng
    });
  });
  submitButton.addEventListener("click", () =>
    geocode({
      address: inputText.value
    })
  );
  clearButton.addEventListener("click", () => {
    clear();
  });
  clear();
}

function clear() {
  marker.setMap(null);
  responseDiv.style.display = "none";
  map.data.forEach(function(feature) {
    map.data.remove(feature);
  });

}


function geocode(request) {
  clear();
  const Areas = setupAreas();
  geocoder
    .geocode(request)
    .then((result) => {
      const {
        results
      } = result;

      map.setCenter(results[0].geometry.location);
      marker.setPosition(results[0].geometry.location);
      marker.setMap(map);
      responseDiv.style.display = "block";

      const index = Areas.findIndex((area) => google.maps.geometry.poly.containsLocation(
        results[0].geometry.location,
        area.poly
      ) ? true : false);

      if (index === -1)
        inArea = mapsettings.InvalidArea; 
      else {
        inArea = mapsettings.ValidAreaPrefix + 
        	Areas[index].zone + 
          "<br><br>" + mapsettings.ValidAreaPostfix + ":"
          + Areas[index].rep;
        map.data.add({
          geometry: new google.maps.Data.Polygon([Areas[index].area])
        });
      }

      const Address = mapsettings.AddressLabel + ': ' +  results[0].formatted_address + '<br><br>';
      response.innerHTML = Address + inArea;
      return results;
    })
    .catch((e) => {
      alert(mapsettings.MapError + ": " + e);
    });
}
