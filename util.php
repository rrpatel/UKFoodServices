<?php
session_start();

// Global header.
if($_SESSION['type'] == 'super'){
$header_array = array('Home' => 't.php',
			 'Add Food Item' => 'addFood.php', 
                      'Restaurants' => 'addRest.php',
                      'Search' => 'search.php',
			 'Notification' => 'message.php',
			 'App Users' => 'personalInfo.php',
			 'Add account'=>'register.php',
              	  'Logout' => 'logout.php',
			  'Login' => 'login.php');
}

else{
$header_array = array('Home' => 't.php',
			 'Add Food Item' => 'addFood.php', 
                      'Restaurants' => 'addRest.php',
                      'Search' => 'search.php',
			 'Notification' => 'message.php',
			 'App Users' => 'personalInfo.php',
	          	  'Logout' => 'logout.php',
			  'Login' => 'login.php');
}

function is_logged_in() {
	return isset($_SESSION['login']) && $_SESSION['login'] != '';
}

function make_header($active_items) {
	global $header_array;

	$stripes = '';
	$links = '';

	foreach($header_array as $name => $link) {
		if(!(is_logged_in() && $name == 'Login') && !(!is_logged_in() && $name == 'Logout')) {
	 		$stripes = $stripes . "<span class=\"icon-bar\"></span>\n";
		
	 		if(in_array($name, $active_items))
				$links = $links . '<li class="active">';
			else
				$links = $links . '<li>';
			if($name == 'Home') {
				$name = "<i class=\"icon-home icon-white\"></i> $name";
			} else if($name == 'Search') {
				$name = "<i class=\"icon-search icon-white\"></i> $name";
			} else if($name == 'Login' || $name == 'Logout' ) {
			  	$name = "<i class=\"icon-user icon-white\"></i> $name";
			}
			else if($name == 'Add Food Item'){
			  	$name = "<i class=\"icon-plus icon-white\"></i> $name";
			}
			else if($name == 'Restaurants'){
			  	$name = "<i class=\"icon-glass icon-white\"></i> $name";
			}
			else if($name == 'Add account'){
			  	$name = "<i class=\"icon-tag icon-white\"></i> $name";
			}
			else if($name == 'Notification'){
			  	$name = "<i class=\"icon-comment icon-white\"></i> $name";
			}
			else if($name == 'App Users'){
			  	$name = "<i class=\"icon-th-list icon-white\"></i> $name";
			}

			$links = $links . "<a href=\"$link\">$name</a></li>\n";
		}
	}

	$format = <<<EOT
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
	    $stripes
      </a>
      <a class="brand" href="index.php">UK Dining Services</a>
      <div class="nav-collapse">
        <ul class="nav">
          $links
        </ul>
      </div>
	</div>
  </div>
</div>
EOT;

	echo $format;
}

function get_db_link() {
	/*$host = 'mysql.cs.uky.edu';
	$user = 'rrpa224';
	$password = '';
	$db = 'rrpa224';*/

	$host = 'mysql.cs.uky.edu';
	$user = 'kdmoye2';
	$password = 'u0630714';
	$db = 'kdmoye2';

	$link = mysql_connect($host, $user, $password);
	if(!$link) {
		echo 'Couldn\'t connect.';
	}

	mysql_select_db($db, $link);

	return $link;
}

function sanitize($str) {
	return mysql_real_escape_string(stripslashes($str));
}

function get_categories() {
	$link = get_db_link();
	$result = mysql_query("SELECT category from inventory_item GROUP BY category ORDER BY category ASC;", $link);
	
	$categories = array();
	while($row = mysql_fetch_row($result)) {
		$categories[] = $row[0];
	}

	return $categories;
}


function get_restaurants() {
	$link = get_db_link();
	$result = mysql_query("SELECT * from restaurants ORDER BY Name ASC;", $link);
	
	$categories = array();
	while($row = mysql_fetch_row($result)) {
		$categories[] = $row[1];
	}

	return $categories;
}


function check_logged_in() {
	if( !(isset($_SESSION['login']) && $_SESSION['login'] != '') ) { //!is_logged_in()) {
		header("Location: login.php");
	}
	
}

function check_manager() {
	if(!(is_logged_in() && $_SESSION['type'] == 'manager')) {
		header("Location: login.php");
	}
}



function getTable(){        
	 $link = get_db_link();
	 /*mysql_query("DELETE FROM restaurants ", $link);
	 mysql_query("INSERT INTO restaurants (ID, Name) VALUES ('1', 'Blazer') ", $link);
	 mysql_query("INSERT INTO restaurants (ID, Name) VALUES ('2', 'Commons')", $link);
	 mysql_query("INSERT INTO restaurants (ID, Name) VALUES ('3', 'K-Lair') ", $link);
	 mysql_query("INSERT INTO restaurants (ID, Name) VALUES ('4', 'Ovids')", $link);*/
        $result = mysql_query("SELECT * FROM restaurants", $link);


	if(!$result) {
			echo 'Error';
	} 
	else if(mysql_num_rows($result) == 0) {
		  	echo '<div class="alert alert-error"><h2>No results found.</h2></div>';
	}
	 else {
		  	$table = '<table class="table table-striped table-bordered"><thead><tr>';
		  	foreach(array('Index', 'Name', 'Delete') as $k) {
				$table .= "<th>$k</th>";
			}
			$table .= '</tr></thead><tbody>';
			$count = 0;
			while($row = mysql_fetch_row($result)) {
				$count += 1;
				$table .= '<tr>';
				$table .= "<td>$count</td><td>$row[1]</td>";
				$table .= "<td><a href=\"removeRest.php?itemid=$row[0]\"><i class=\"icon-remove\"></i></a></td>";
				$table .= '</tr>';
				
			}

			$table .= '</tbody></table>';

			echo $table;
	}

/*        $counter = mysql_num_rows($restaurant);
        echo "Inside Table Creater" . "</br>";
        $i = 0;// variable to ensure no comma is added to the last restaurant
	//echo $counter . "</br>";
	while(($rest = mysql_fetch_array($restaurant)) && $counter > 0)
	{
		if( count($rest) >= 2 ){
              $name = $rest[0];
		echo "$name" . ":             ";
		// need to echo location in the future
                $restID = $rest[1];
		echo $restID . "</br>";
		}
		
	}*/
}

function check_super() {
	echo "Are you getting called?";
	
	$_SESSION['type'] = 'super';
	if((/*is_logged_in() &&*/ $_SESSION['type'] == 'super')) {
		//$header_array[9] = ('Add User'=>'register.php');
	}

}


?>