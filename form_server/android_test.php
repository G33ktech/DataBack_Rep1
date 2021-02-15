<?php



		$latt=round($_GET["latt"],6);

		$long=round($_GET["long"],3);
		
		$messsage=$_GET["message"];
		
		if (empty($_GET))
                {
                    echo "$_POST is empty";
                }
		
		echo "Success  ".$message;
		echo "		latt = ".$latt;
		echo "		long = ".$long;
		echo "		".json_encode($_GET);

	?>

