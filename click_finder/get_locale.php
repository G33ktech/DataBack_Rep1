<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
   <!--
		Designed by Philip Barnes
		clarencevalleyit.com.au
		05/11/2012
    -->
    <title>DataBackFormServer</title>  

	<link href="../css/databack_left.css" rel="stylesheet" type="text/css" media="screen" />
    <style type="text/css">
	#wrapper{ width: 600px; padding-left: 10px;}
    <!--

    -->
    </style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFgB_ezGiDhyzfozienoYq-Qyu-nF6iWc&sensor=false">
</script>

<script>
	var map;
	
	var getLat = "<?php  echo $_POST["getLatt"];  ?>";
    var getLong = "<?php  echo $_POST["getLong"];  ?>";
	var myCenter=new google.maps.LatLng(getLat,getLong);
    document.write("getLat = " + getLat + "<br />");
	document.write("getLong = " + getLong);
	
	
	function initialize()
		{
			var mapProp = 
			{
				  center:myCenter,
				  zoom:16,
				  mapTypeId:google.maps.MapTypeId.HYBRID
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
		<h2>Currently Under Development</h2>

		   <!--<img src = "../images/LaoBomb.gif" width="441px"height="331px">-->
		<div id="googleMap" style="width:580px;height:380px;"></div>

		<hr />
			<div id = "footer">
				Webform designed by Philip Barnes &copy; 
			</div>
   </div>
</body>
</html>

