<?php
$myfile = fopen("C:\Users\satya\Desktop\AI\path.txt", "r") or die("Unable to open file!");
//echo fread($myfile,filesize("C:\Users\satya\Desktop\AI\path.txt"));
$cities = array();
$i=0;
while(!feof($myfile)) {
  $cities[$i]= fgets($myfile);
  $i=$i+1;
}
#var_dump($cities);
fclose($myfile);
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Map</title>
	<style type="text/css">
		#mapid { height: 800px; }
	</style>
	 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
   integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
   crossorigin=""/>
   <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
   integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   crossorigin=""></script>
</head>
<body>
<div id="mapid"></div>
<script type="text/javascript">
	var mymap = L.map('mapid').setView([20.5937,78.9629], 5);
L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1Ijoic2F0eWFiaGFtYSIsImEiOiJjam84OTc4ZjUwN3RvM3FuMXQ1bWtnYjVlIn0.17LOnUnDZCvIqYzW5S7SWw'
}).addTo(mymap);
	var city=<?php echo json_encode($cities);?>;
	var ci=new Array();
	for (var i = 0; i <= city.length - 1; i++) {
		var one=city[i].split(',');
		ci[i]=one;
		var lat=parseFloat(ci[i][1]);
		var lon=parseFloat(ci[i][2]);
		var marker = L.marker([lat, lon]).addTo(mymap);
		marker.bindPopup("<b>"+ci[i][0]+"</b>").openPopup();
	}


</script>
</body>
</html>