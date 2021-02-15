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
	<link href="../css/databack.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
<div id = "container">
   <div id = "wrapper" >

         <h1>Data Back Form Server</h1>

	<form id="login" action = "form_server/login.php" method = "post">
			<table >
				<caption>Login to Operations Database</caption>				
				
				<tr><td >Operations Base</td>
				<td><select form = "login" id = "base">
					<option value=""></option>
					<option value="DataBack" name="DataBack">DataBack FormServer</option>
					<option value="Cope" name="Cope">Cope</option>
					<option value="Deakin" name="Deakin">Deakin</option>
					<option value="KioKit" name="KioKit">KioKit</option>
				  </select></td></tr>
				
				<!--<tr><td>Guest</td>
					<td ><input type="submit" form="login" value="Visitor"></td></tr>-->	
					
				<tr><td>Login Name</td>
				<td><input type = "text" name = "name" id = "name" value = ""  /></td></tr>
							
				<tr><td>Password</td>
					<td ><input type = "text" name = "name" id = "password" value = ""  /></td></tr>
				<tr><td>Action</td>
					<td ><input type="submit" id = "login_button" value="Submit"></td></tr>
			<table >
				
	</form>
		
			<hr />
			<a href="index1.php"> Databack </a>&nbsp &nbsp
			<a href="../deakin"> Deakin </a>&nbsp &nbsp
			<a href="../cope"> Cope </a>&nbsp &nbsp
			<a href="../kiokit"> KioKit </a>&nbsp &nbsp
			<div id = "footer">
				Webform designed by Philip Barnes &copy; 
			</div>
   </div>
   </div>
</body>
</html>

