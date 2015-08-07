
<?php


$dbname            ='api'; //Name of the database 


$dbuser            ='root'; //Username for the db 


$dbpass            =''; //Password for the db 


$dbserver          ='localhost'; //Name of the mysql server 


  


$dbcnx = mysql_connect ("$dbserver", "$dbuser", "$dbpass"); 


mysql_select_db("$dbname") or die(mysql_error()); 



?> 



 <?php


 $query = mysql_query("SELECT * FROM poi_example"); 


 while ($row = mysql_fetch_array($query)){ 


 $name=$row['name']; 


 $lat=$row['lat']; 


 $lon=$row['lon']; 


 $esc=$row['esc']; 


 echo ("addMarker($lat, $lon,'<b>$name</b><br/>$esc');\n"); 


 } 


 ?> 