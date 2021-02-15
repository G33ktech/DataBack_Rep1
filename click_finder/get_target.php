<?php

		$table = "`databack_geoloc_01`.`bomb_data`";
		include("../../restricted/php_db_info.php");
		
		// connect to MySQL server (host,user,password)
		$db_connect =  mysql_connect("localhost", "$username", "$password") or die ("<h1>Error - No connection to MySQL</h1>\n".mysql_error());	   

		// select the correct database
		$er = mysql_select_db("$database")or die ("<h1>Error - No connection to Database</h1>\nProbably don't have Privileges\n".mysql_error());

			$sql_query = "SELECT DISTINCT `target` FROM `bomb_data` ORDER BY `target`";
			$result = @mysql_query($sql_query) or die("<h1>Error - Select Distinct failed!</h1>\n".mysql_error());  

		echo "Number of Target Types; ".mysql_num_rows($result);
		
		
		if($result){
				echo 		"Target Definitions <br />";
				while ($row = mysql_fetch_array($result)) {
							echo	 $row['0']."<br />";	
							}
				}

mysql_close($db_connect);

	?>

