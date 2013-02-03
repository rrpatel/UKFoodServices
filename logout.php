<?php
	session_start();
	if($_SESSION['updated'] == "updated"){
	
			$host = 'mysql.cs.uky.edu';
			$user = 'kdmoye2';
			$password = 'u0630714';
			$db = 'kdmoye2';

			$link = mysql_connect($host, $user, $password);
			if(!$link) {
				echo 'Couldn\'t connect.';
			}

		mysql_select_db($db, $link);

		$query = mysql_query("SELECT * FROM lastupdated",$link);
		$row = mysql_fetch_array($query);
		
		$id = $_SESSION['userid'];
		$version = $row[0]+1;		
		$update = mysql_query("UPDATE lastupdated SET TimeStamp = '$version', UserID = '$id'",$link);
	}

	session_start();
	session_destroy();
	header('Location: index.php');
?>