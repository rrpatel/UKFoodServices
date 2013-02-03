<?php
include 'util.php';
check_logged_in();

// Some useful functions.
//include 'util.php';

include 'header.php';
// Insert title after closing tag.
?>
	Search
<?php
include 'middle.php';

// Create header here.
make_header(array('Users'));

// Main content goes here.
?>

<div class="container">
<?php

		echo $activity[0];

		$link = get_db_link();

		$query = "SELECT * FROM personalinfo ";
		
		$result = mysql_query($query, $link);

		if(!$result) {
			echo 'Error';
		} else if(mysql_num_rows($result) == 0) {
		  	echo '<div class="alert alert-error"><h2>No results found.</h2></div>';
		} else {
		  	$table = '<table class="table table-striped table-bordered"><thead><tr>';
		  	foreach(array('Age', 'Height', 'Weight', 'Sex', 'ActivityFactor', 'BMI', 'Delete' ) as $k) {
				$table .= "<th>$k</th>";
			}
			$table .= '</tr></thead><tbody>';


		$activity = array ( 0 => 'Sedentary', 
 					1 => 'Low',
					2 => 'Moderate',
					3 => 'High');

		
			while($row = mysql_fetch_row($result)) {
				$gender = ($row[3]==1?"Female":"Male");
				$temp = $row[4];
				$bmi = round(($row[2]*703)/($row[1]*$row[1]),2) ;
				$table .= '<tr>';
				$count = 0;
				$table .= "<td>$row[0]</td><td>$row[1]</td><td>$row[2] </td>";
				$table .= "<td>$gender</td><td>$activity[$temp]</td><td> $bmi </td>";
				$table .= "<td><a href=\"test.php?itemid=$row[5]\"><i class=\"icon-remove\"></i></a></td>";
				$table .= '</tr>';
			}

			$table .= '</tbody></table>';

			echo $table;
		}
	
?>


<?php
	echo $_POST['itemid'];
	if( isset($_POST['itemid']) ){
		$link = get_db_link();
		$id = intval(sanitize($_POST['restId']));
		
		echo 'Delete Personal Info.';		
		// Check to see if restaurnt Name or Id already exist
		$checkRestID = mysql_query("SELECT * FROM restaurants WHERE ID = '$id'",$link);
	
		
		
			$query = "DELETE FROM personalinfo WHERE ID='$id'";

			if(!mysql_query($query, $link) ) {
				echo 'Error.';
			}
			else{
				echo sprintf('<div class="alert alert-success"><h2><em>%s</em> successfully added to database.</h2></div>', htmlspecialchars(stripcslashes($name)) );
				$_SESSION['updated'] = "updated";
			}
				
		
		}
		
?>



</div>

<?php include 'footer.php'; ?>