<?php

ob_start();
// Some useful functions.
include 'util.php';
check_logged_in();

include 'header.php';
// Insert title after closing tag.
?>
	Remove Restaurant
<?php
include 'middle.php';

// Create header here.
make_header(array('Search'));

// Main content goes here.
?>

<div class="container">
   
<?php
	
	if(isset($_GET['itemid']) && $_GET['itemid'] != '') {
		$itemid = sanitize($_GET['itemid']);
		$login = $_SESSION['login'];
		$link = get_db_link();
		$result = mysql_query("SELECT Name FROM food WHERE FoodID = '$itemid';",$link);
		$row = mysql_fetch_row($result);
		$itemname = $row[0];

		
		$query = "DELETE FROM food WHERE FoodID = '$itemid';";
		


		// Redirect to success page.
		if(!mysql_query($query, $link)) {
			echo 'Error';
		} 
		
		else{

		echo sprintf('<div class="alert alert-success"><h2><em>%s</em> removed from food.</h2></div>', htmlspecialchars(stripcslashes($itemname)));
		$temp = '<div class="alert alert-success"><h2><em>';
		$temp .= $itemname;
		$temp .= '</em> removed from restaurants.</h2></div>' ;
		
		if($result) {
		
			if(mysql_numrows($result) == 0){
				echo sprintf('<div class="alert alert-success"><h2>Table of restaurants is empty.</h2></div>');
				$temp .= '<div class="alert alert-success"><h2>Table of restaurants is empty.</h2></div>';
				
			$_SESSION['updated'] = "updated";							
			}
				
		}
		else{
			echo 'Error';
		}

		
		
	} //else {
		//echo 'Error in reading';
	}
	
	$_SESSION['echoStr'] = $temp;	

	//header('Location: search.php');
			

?>
</div>

<?php include 'footer.php'; ?>