<?php

	if ( isset($_COOKIE[ 'loginName' ] ) )$login_name = $_COOKIE['loginName'];
		else $loginName="";
	if ( isset($_COOKIE[ 'password' ] ) ) $password = $_COOKIE['password'];
		else $password="";
//	echo "login_name $loginName <br />";
//	echo "password $password ";
?>
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
    <style type="text/css">
    <!--

    -->
    </style>
	<link href="css/databack.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>

      <div id = "wrapper">

         <h1>DataBackFormServer</h1>

			 <a href="index.php"><img src="../images/dataform02.gif" width="400" height="250" alt="a cluster of three triangles on a base representing the four elements of Data Back Form Server" style="margin-left:40px" 
			align="center" /></a>
		
		<hr /><br />
		<h1>Laos</h1>
		<h2>Possible UXB Locations</h2><h2>Khammouane Province</h2><br /><br /><br />
					<div id="button" align="center">
						<a href = "click_finder/proximity_form.html">View Map</a>
					</div>
		<br /><br /><br />
		<hr />
		<form id="login" action = "form_server/login.php" method = "post">
				<table >
					<caption>Login to Operations Database</caption>				
					<tr>
						<td >Operations Base</td>
						<td><input type = "text" name = "base" id = "base" value = "geolocation"  /></td>
					</tr>
					<tr>
						<td>Login Name</td>
						<td><input type = "text" name = "login_name" id = "login_name" value = ""  /></td>
					</tr>
					<tr>
						<td>Password</td>
						<td ><input type = "password" name = "password" id = "password" value = ""  /></td>
					</tr>
					<tr>
						<td><input type ="reset" value = "Reset Form" /></td>
						<td><input type = "submit" name = "login_button" value = "Login to Database" /></td>
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

