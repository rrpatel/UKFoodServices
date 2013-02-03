<?php

session_start();



$host = 'mysql.cs.uky.edu';
$user = 'kdmoye2';
$password = 'u0630714';
$db = 'kdmoye2';

$link = mysql_connect($host, $user, $password);
if(!$link) {
	echo 'Couldn\'t connect.';
}

mysql_select_db($db, $link);

$login = $_POST['login'];
$password = $_POST['password'];
//$query = "SELECT name, type from person WHERE login = '$login' AND password = '$password';";
$query = "SELECT * FROM accounts WHERE Username = '$login' AND Password = sha1('$password');";


$result = mysql_query($query, $link);


if(!$result) {
	echo 'Error';
} else {
    $row = mysql_fetch_array($result);
	if($row) {
		$name = $row[0];
		$_SESSION['login'] = $login;
		$_SESSION['userid'] = $row['ID'];
		//echo $row['superuser'];
		if($row['superuser']==1){
			$_SESSION['type'] = 'super';
		}

		header('Location: t.php');

	}
	else{
	$_SESSION['echstr'] = "Login failed";
	//header('Location: index.php');
	}
}


?>

