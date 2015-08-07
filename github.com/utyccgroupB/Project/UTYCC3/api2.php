
<?php


$dbname            ='api'; //Name of the database 


$dbuser            ='root'; //Username for the db 


$dbpass            =''; //Password for the db 


$dbserver          ='localhost'; //Name of the mysql server 


  


$dbcnx = mysql_connect ("$dbserver", "$dbuser", "$dbpass"); 


mysql_select_db("$dbname") or die(mysql_error()); 



?> 


<html> 


 <head> 


 <meta http-equiv="content-type" content="text/html; charset=utf-8"/> 


 <title>Google Map API V3 with markers</title> 


 <style type="text/css"> 


 body { font: normal 10pt Helvetica, Arial; } 


 #map { width: 750px; height: 700px; border: 0px; padding: 0px; } 


 </style> 


 <script src="http://maps.google.com/maps/api/js?v=3&sensor=false" type="text/javascript"></script> 


 <script type="text/javascript"> 


 //Sample code written by August Li 


 var icon = new google.maps.MarkerImage("http://maps.google.com/mapfiles/ms/micons/blue.png", 


 new google.maps.Size(330, 300), new google.maps.Point(0, 0), 


 new google.maps.Point(16, 32)); 


 var center = null; 


 var map = null; 


 var currentPopup; 


 var bounds = new google.maps.LatLngBounds(); 


 function addMarker(lat, lng, info) { 


 var pt = new google.maps.LatLng(lat, lng); 


 bounds.extend(pt); 


 var marker = new google.maps.Marker({ 


 position: pt, 


 icon: icon, 


 map: map 


 }); 


 var popup = new google.maps.InfoWindow({ 


 content: info, 


 maxWidth: 300 


 }); 


 google.maps.event.addListener(marker, "click", function() { 


 if (currentPopup != null) { 


 currentPopup.close(); 


 currentPopup = null; 


 } 


 popup.open(map, marker); 


 currentPopup = popup; 


 }); 


 google.maps.event.addListener(popup, "closeclick", function() { 


 map.panTo(center); 


 currentPopup = null; 


 }); 


 } 


 function initMap() { 


 map = new google.maps.Map(document.getElementById("map"), { 


 center: new google.maps.LatLng(0, 0), 


 zoom: 14, 


 mapTypeId: google.maps.MapTypeId.ROADMAP, 


 mapTypeControl: false, 


 mapTypeControlOptions: { 


 style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR 


 }, 


 navigationControl: true, 


 navigationControlOptions: { 


 style: google.maps.NavigationControlStyle.SMALL 


 } 


 }); 


 <?php


		 $query = mysql_query("SELECT * FROM poi_example2"); 


		 while ($row = mysql_fetch_array($query)){ 


		 $name=$row['name']; 


		 $lat=$row['lat']; 


		 $lon=$row['lon']; 


		 $esc=$row['esc']; 


		 echo ("addMarker($lat, $lon,'<b>$name</b><br/>$esc');\n"); 


		 } 


?> 


 center = bounds.getCenter(); 


 map.fitBounds(bounds); 


  


 } 


 </script> 


 </head> 


 <body onload="initMap()" style="margin:0px; border:0px; padding:0px;"> 


 <div id="map"></div> 


 </html> 
