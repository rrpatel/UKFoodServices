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
make_header(array('Restaurants'));

// Main content goes here.
?>

<div class="container">
   
<?php
	if(isset($_GET['itemid']) && $_GET['itemid'] != '') {
		$itemid = sanitize($_GET['itemid']);
		$link = get_db_link();
		
		
		$query = "DELETE FROM personalinfo WHERE ID = '$itemid';";
		

		// Redirect to success page.
		if(!mysql_query($query, $link)) {
			echo 'Error';
		} 
		

		echo sprintf('<div class="alert alert-success"><h2><em>%s</em> removed from restaurants.</h2></div>', htmlspecialchars(stripcslashes("Entry is")));
		$_SESSION['updated'] = "updated";
		$temp = '<div class="alert alert-success"><h2><em>';
		$temp .= "item";
		$temp .= '</em> removed from personalinfo.</h2></div>' ;
		
		if($result) {
		
			if(mysql_numrows($result) == 0){
				echo sprintf('<div class="alert alert-success"><h2>Table of restaurants is empty.</h2></div>');
				$temp .= '<div class="alert alert-success"><h2>Table of restaurants is empty.</h2></div>';
				
							
			}
				
		}
		else{
			echo 'Error';
		}

		
		
	} else {
		echo 'Error in reading';
	}
	
	$_SESSION['echoStr'] = $temp;	

	header('Location: personalInfo.php');
			

?>
</div>

<?php include 'footer.php'; ?>