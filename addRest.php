<?php
// Some useful functions.
include 'util.php';
check_logged_in();
//check_manager();

include 'header.php';
// Insert title after closing tag.
?>
	Restaurants
<?php
include 'middle.php';

// Create header here.
//make_header(array());

make_header(array('Restaurants'));

// Main content goes here.
?>

<div class="container">






  <h1>Add new restaurant</h1>
   <form action="addRest.php" method="post">
	  <label>Restaurant Name</label>
	  <input name="restName" class="input-xlarge" type="text"><br/>
	  <label>Restaurant ID</label>
	  <input name="restId" class="input-xlarge" type="text"><br/>
  	  
	  <button type="submit" class="btn btn-primary" name = "submitted">Add restaurant</button>
	  
    </form>




<?php

	


	if( isset($_POST['restName']) && isset($_POST['restId']) && $_POST['restId'] != '' && $_POST['restName'] != '' ){ // && isset($_POST['submitted']) &&  ) {
		$link = get_db_link();
		$name = sanitize($_POST['restName']);
		$id = intval(sanitize($_POST['restId']));
		unset($_POST['restName']);
		unset($_POST['restId']);

		
		// Check to see if restaurnt Name or Id already exist
		$checkRestID = mysql_query("SELECT * FROM restaurants WHERE ID = '$id'",$link);
	
		$checkRestName = mysql_query("SELECT * FROM restaurants WHERE Name = '$name'",$link);
	
		//echo mysql_num_rows($checkRestID) . "<br/>" . mysql_num_rows($checkRestName)	. "<br/>";

		$validInput = True;
		if( mysql_num_rows($checkRestID) > 0 && mysql_num_rows($checkRestName) > 0 ){
		echo sprintf('<div class="alert alert-success"><h2>Restaurant Name and ID already exists.</h2></div>');
		$validInput = False;
		}
		else if( mysql_num_rows($checkRestID) == 1 && $name != '0' && !empty($id)){
		echo sprintf('<div class="alert alert-success"><h2>Restaurant ID already exists.</h2></div>');
		$validInput = False;
		}
 		else if( mysql_num_rows($checkRestName) > 0 && !empty($name)){
		echo sprintf('<div class="alert alert-success"><h2>Restaurant Name already exists.</h2></div>');	
		$validInput = False;
		}
		
		if($validInput && !empty($id) && !empty($name)){
			$query = "INSERT INTO restaurants (ID, Name) VALUES ('$id', '$name')";

			if(!mysql_query($query, $link) ) {
				echo 'Error.';
			}
			else{
				echo sprintf('<div class="alert alert-success"><h2><em>%s</em> successfully added to database.</h2></div>', htmlspecialchars(stripcslashes($name)) );
				$_SESSION['updated'] = "updated";
			}
				
		}
		}
		//$temp = ob_end_clean();
		if( $_SESSION['echoStr'] != '' ) {
			echo $_SESSION['echoStr'];
			$_SESSION['echoStr'] = '';	
		}
		getTable();
?>









</div>

<?php include 'footer.php'; ?>