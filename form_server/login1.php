<?php
session_start();
print_r($_POST);	
	if (isset($_POST["login_button"])){
		$opBase=$_POST["base"];
		$upassword=$_POST["password"];
		$login_name=$_POST["login_name"];
		//$path = $_SERVER['DOCUMENT_ROOT'];
	}else if(isset($_POST["login_button"])){	
	}else{	invalid_login();	}

	if($opBase =="Deakin"){
		//print("opBase == $opBase");
		//print("login_name == $login_name");
		$path1 = "/home/databack/restricted/php_db_info.php";
		$path2 = "/home/databack/restricted/con_databack.php";
		include_once($path1);	
		//include_once($path2);
		$sql = "SELECT password FROM login WHERE username = '$login_name' AND opBase = '$opBase'";	
		//print($sql);
		$db_connect =  mysql_connect("localhost", "$username", "$password") or die ("<h1>Error - No connection to MySQL</h1>\n".mysql_error());	   

		// select the correct database
		$er = mysql_select_db("$database")or die ("<h1>Error - No connection to Database</h1>\nProbably don't have Privileges\n".mysql_error());
	
		$login = @mysql_query($sql) or die("<h1>Error - SQL Query failed!</h1>\n".mysql_error());  
		mysql_close($db_connect);
		//print_r($login);
		if($login){	
			$row = mysql_fetch_array($login);
			
			if($upassword == $row['password']){	
				//print($row['password']);
				//header_remove(); 
				//header('Location: ../deakin/deakin_admin.php');
				//setcookie("valid_login", "true");
				$_SESSION['valid_login']=1;
				$_SESSION['user_name']=$login_name;
				$_SESSION['message']='Logged in';
				include_once('../deakin/deakin_admin.php');
			
			}else{
				invalid_login();
			}
		}
		}else{
			invalid_login();
			print("NOT logged in ");
					/*header('Location: ../admin_deakin.php');
					setcookie("valid_login", "true");
					$_SESSION['valid_login']=1;
					$_SESSION['user_name']=$name;
					$_SESSION['message']='Logged in';*/
		}		
	
function invalid_login() {
    //setcookie("valid_login", "false");
	$_SESSION['valid_login']=0;
	$_SESSION['message']='Invalid Login';
	include_once('/home/databack/public_html/index.php');
	}
	
	?>


