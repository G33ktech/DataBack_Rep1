<?php


		$time=$_POST["time"];
		$latt=$_POST["latt"];
		$long=$_POST["long"];
		$speed=100;
		//$speed=$_POST["speed"];
		include("../../restricted/php_db_info.php");
		// connect to MySQL server (host,user,password)
		$db_connect =  mysql_connect("localhost", "$username", "$password") or die ("<h1>Error - No connection to MySQL</h1>\n".mysql_error());	   
		
		//$db_connect =  mysql_connect("localhost", "databack_geoloc1", "$U$3r1!") or die ("<h1>Error - No connection to MySQL</h1>\n");	
		
		// select the correct database
		$er = mysql_select_db("$database")or die ("<h1>Error - No connection to Database</h1>\nProbably don't have Privileges\n".mysql_error());

			$sql_insert = "INSERT INTO up_data (time, latitude, longitude, speed) VALUES (\"$time\",$latt,\"$long\",\"$speed\")";
			$result = @mysql_query($sql_insert) or die("<h1>Error - Insert Item failed!</h1>\n".mysql_error());  
		
		mysql_close($db_connect);
		
		if($result){
				include("header.inc");
				print ("<h3>Data successfully added</h3>");
				print ("Time; $time <br />");
				print ("Lattitude; ; $latt <br />");
				print ("Longitude; $long <br />");
				print ("Speed; $speed <br />");
				}
	?>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDFgB_ezGiDhyzfozienoYq-Qyu-nF6iWc&sensor=false">
</script>

<script>
	var map;
	var lat = <?php echo ( $_POST['latt'] ); ?>;
	var lng = <?php echo ( $_POST['long'] ); ?>;
	var myCenter=new google.maps.LatLng(lat, lng);
	var marker;
	
	function initialize()
		{
			var mapProp = 
			{
				  center:myCenter,
				  zoom:5,
				  mapTypeId:google.maps.MapTypeId.ROADMAP
				  marker = marker.setPosition(myCenter);
			};

			map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

			function placeMarker(location) 
				{
					if ( marker ) 
					{
						marker.setPosition(location);
					} else 
					{
						marker = new google.maps.Marker(
						{
							position: location,
							map: map
						});
					}
					var infowindow = new google.maps.InfoWindow(
					{
						content: 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng()
					});
					infowindow.open(map,marker);
				}
			google.maps.event.addListener(map, 'click', function(event) 
				{
					placeMarker(event.latLng);
					writeData(event.latLng);
					var d = new Date();
					var x = d.getTime();
					writeTime(x);
				});
		}

	function writeData(location)
		{
			document.getElementById("latt").value = location.lat();
			document.getElementById("long").value = location.lng();
		}

	function writeTime(time)
		{
			document.getElementById("time").value = time;
		}

	google.maps.event.addDomListener(window, 'load', initialize);
</script>
	</body>
</html>
