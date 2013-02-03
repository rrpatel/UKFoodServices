<?php

include 'util.php';

// TODO: make code here more robust.

$login = sanitize($_POST['login']);
$password = sanitize($_POST['password']);

$link = get_db_link();

// TODO: Customer is hardcoded right now.
$query = <<<EOT

INSERT INTO accounts (Username, Password, superuser) VALUES
('$login', sha1('$password'), '0');
EOT;

// Redirect to success page.
if(!mysql_query($query, $link)) {
	echo 'Error';
} else {
	$_SESSION['updated'] = "updated";
  	header("Location: account_created.php");
	exit;
}

?>