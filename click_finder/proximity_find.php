<?php


		$time=$_POST["time"];
		$latt=round($_POST["latt"],6);
		$long=round($_POST["long"],3);
		
		 //original values
		/*$latt_d=round(($_POST["latt"]-0.003),3);
		$latt_u=round(($_POST["latt"]+0.003),3);
		$long_d=round(($_POST["long"]-0.003),3);
		$long_u=round(($_POST["long"]+0.003),3);*/
		
		
		$latt_d=round(($_POST["latt"]-0.01),3);
		$latt_u=round(($_POST["latt"]+0.01),3);/**/
		$long_d=round(($_POST["long"]-0.01),3);
		$long_u=round(($_POST["long"]+0.01),3);
		
		$table = "`databack_geoloc_01`.`bomb_data`";
		include("../../restricted/php_db_info.php");
		
		echo $latt."<br />".$long."<br />";
		echo "Bombing radius; ".distance($latt_d, $long_d, $latt_u, $long_u, "K")/2 . " Meters<br>";
		// connect to MySQL server (host,user,password)
		$db_connect =  mysql_connect("localhost", "$username", "$password") or die ("<h1>Error - No connection to MySQL</h1>\n".mysql_error());	   

		// select the correct database
		$er = mysql_select_db("$database")or die ("<h1>Error - No connection to Database</h1>\nProbably don't have Privileges\n".mysql_error());

			//$sql_query = "SELECT * FROM $table WHERE `lat`BETWEEN $latt_d AND $latt_u UNION SELECT * FROM `databack_geoloc_01`.`bomb_data` WHERE 'long' BETWEEN $long_d AND $long_u ORDER BY 'date' ";
			//$sql_query = "SELECT * FROM $table WHERE (`lat` BETWEEN $latt_d AND $latt_u) AND ('long' BETWEEN $long_d AND $long_u) ORDER BY 'date' ";
			//$sql_query = "SELECT * FROM $table WHERE (`lat` BETWEEN $latt_d AND $latt_u)  ORDER BY 'date' ";
			$sql_query = "SELECT * FROM $table WHERE  (`lat` BETWEEN $latt_d AND $latt_u) AND (`long` BETWEEN $long_d AND $long_u) ORDER BY 'date' ";

			$result = @mysql_query($sql_query) or die("<h1>Error - Insert Item failed!</h1>\n".mysql_error());  
		
		echo "Lattitude range; ".$latt_d."   ".$latt_u."<br />";
		echo "Longitude range; ".$long_d."   ".$long_u."<br />";
		echo "Number of Bombing Raids; ".mysql_num_rows($result);
		
		
		if($result){
				echo 		"<table ><caption>Data Table</caption>
								<tr>
								<th>Sortie ID</th>
								<th>Bombing Date</th>
								<th>Bomb Type General</th>
								
								<th>Lattitude</th>
								<th>Longitude</th>
								<th>Bomb Target Description</th>
								<th>Bomb Damage Assessment</th>
								</tr>";
				while ($row = mysql_fetch_array($result)) {
					//print_r($row);
							echo	 "<tr><td>".$row['id']."</td><td>".$row['date']."</td><td>".$row['ordnance']."</td><td>".$row['lat']."</td><td>".$row['long']."</td><td>".$row['target']."</td><td>".$row['bda']."</td></tr>";	
							}
						echo "</table>";
				}

mysql_close($db_connect);

function distance($lat1, $lon1, $lat2, $lon2, $unit) {
/*::  Official Web site: http://www.geodatasource.com */
  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);
  if ($unit == "K") {
    return round(($miles * 1.609344),3)*1000;
  } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
        return $miles;
      }
}

/*::  echo distance(32.9697, -96.80322, 29.46786, -98.53506, "M") . " Miles<br>";*/
/*::  echo distance(32.9697, -96.80322, 29.46786, -98.53506, "K") . " Kilometers<br>";*/
/*::  echo distance(32.9697, -96.80322, 29.46786, -98.53506, "N") . " Nautical Miles<br>";*/
	?>

