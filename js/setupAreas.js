
function setupAreas() {
  var area = [];
  
  // For each area/zone, set up the lat/log points of poly and push to area array.
  area.push([
	{
      lat: 33.943330,
      lng: -118.249098
    },
    {
      lat: 33.953256,
      lng: -118.248800
    },
	{
      lat: 33.953414,
      lng: -118.247557
    },
    {
      lat: 33.955238,
      lng: -118.247366
    },
	{
      lat: 33.955190,
      lng: -118.244192
    },
    {
      lat: 33.953351,
      lng: -118.244173
    },
	{
      lat: 33.953196,
      lng: -118.234028
    },
    {
      lat: 33.948292,
      lng: -118.234057
    },
	{
      lat: 33.948280,
      lng: -118.230873
    },
    {
      lat: 33.947228,
      lng: -118.230947
    },
	{
      lat: 33.947133,
      lng: -118.235039
    },
    {
      lat: 33.945850,
      lng: -118.234990
    },
	{
      lat: 33.945726,
      lng: -118.232894
    },
    {
      lat: 33.944577,
      lng: -118.232861
    },
	{
      lat: 33.944634,
      lng: -118.231840
    },
    {
      lat: 33.943179,
      lng: -118.231805
    },
  ]);
  
  area.push([
    {
      lat: 33.929528,
      lng: -118.254240
    },
    {
      lat: 33.943234,
      lng: -118.254085
    },
    {
      lat: 33.943167,
      lng: -118.246323
    },
    {
      lat: 33.929561,
      lng: -118.246335
    },
  ]);

  area.push([
    {  
      lat: 33.929561,
      lng: -118.246180
    },
    {
      lat: 33.943173,
      lng: -118.246209
    },
    {
      lat: 33.943106,
      lng: -118.239182
    },
    {
      lat: 33.929654,
      lng: -118.239279
    },
  ]);

  area.push([
    {  
	  lat: 33.938271,
      lng: -118.238984
    },
	{
	  lat: 33.943096,
      lng: -118.239029
    },
	{
	  lat: 33.943068,
      lng: -118.229711
    },
	{
	  lat: 33.938885,
      lng: -118.228814
    },
	{
	  lat: 33.934481,
      lng: -118.230178
    },
  ]);

  area.push([
    {  
	  lat: 33.929627,
      lng: -118.238945
    },
	{
	  lat: 33.938163,
      lng: -118.238970
    },
	{
	  lat: 33.934357,
      lng: -118.230219
    },
	{
	  lat: 33.931710,
      lng: -118.230949
    },
	{
	  lat: 33.929141,
      lng: -118.230414
    },
  ]);
  
  var Areas = [];
  for (let i = 1; i <= mapsettings.NumZones; i++) {
    Areas.push(setupEachArea(i, area[i-1]));
  }

  return Areas;
}  

function setupEachArea(num, areapoly) {
	return {
		area: areapoly,
		poly: new google.maps.Polygon({
			paths: areapoly
		}),
		zone: num,
		rep: '<p class="reps">' + mapsettings.Zones[num-1] + '</p>', 
  };
}