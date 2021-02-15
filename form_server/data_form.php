
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDFgB_ezGiDhyzfozienoYq-Qyu-nF6iWc&sensor=false">
</script>

<script>
	var map;
	var myCenter=new google.maps.LatLng(13.5,100.35);

	function initialize()
		{
			var mapProp = 
			{
				  center:myCenter,
				  zoom:5,
				  mapTypeId:google.maps.MapTypeId.ROADMAP
			};

			map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
	  
			var marker;

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
</head>

<body>

   <div id = "wrapper">
   
		<h1>Data Back Form Server</h1>
		
		<?php
			include("nav.php");
		?>
		
		<div id="googleMap" style="width:480px;height:380px;"></div>

	<form id="login" action = "../form_server/data_add.php" method = "post">
			<table >
				<caption>Add data to Operations Database</caption>				
				<tr>
					<td >Time</td>
					<td><input type = "text" name = "time" id = "time" value = ""  /></td>
				</tr>
				<tr>
					<td>Lattitude</td>
					<td><input type = "text" name = "latt" id = "latt" value = ""  /></td>
				</tr>
				<tr>
					<td >Longitude</td>
					<td><input type = "text" name = "long" id = "long" value = ""  /></td>
				</tr>
				<tr>
					<td>Speed</td>
					<td><input type = "text" name = "speed" id = "speed" value = ""  /></td>
				</tr>
				<tr>
					<td><input type ="reset" value = "Reset Form" /></td>
					<td><input type = "submit" name = "Submit" value = "submit_data" /></td>
				</tr> 
			</table>	
	</form>
		<hr />
			<div id = "footer">
				Webform designed by Philip Barnes &copy; 
			</div>
   </div>
</body>
</html>

