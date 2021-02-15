

         <h1>Data Back Form Server</h1>

	<form id="login" action = "../form_server/login.php" method = "post">
			<table >
				<caption>Login to Operations Database</caption>				
				<tr>
					<td >Operations Base</td>
					<td><input type = "text" name = "base" id = "base" value = ""  /></td>
				</tr>
				<tr>
					<td>Login Name</td>
					<td><input type = "text" name = "name" id = "name" value = ""  /></td>
				</tr>
				<tr>
					<td>Password</td>
					<td ><input type = "password" name = "password" id = "password" value = ""  /></td>
				</tr>
				<tr>
					<td><input type ="reset" value = "Reset Form" /></td>
					<td><input type = "submit" name = "login" value = "Login to Database" /></td>
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

