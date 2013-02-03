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
make_header(array('Notification'));

// Main content goes here.
?>

</div>

<div class="container">
	<?php
	if(!isset($_GET['Notifications']) ){
	?>
    <form class="well form-search" action="message.php?message=textarea" method="get">
      <h2>Daily Notification</h2>
        </p>
        <textarea class="field span11" name = "Notifications" id="textarea" rows="6" placeholder="Enter a daily notification"></textarea>
        <button class="btn">Upload</button>
	</form>
	
 </div>
<?php
	}
 else{
	
	//echo "Insert now";
	$notifications = $_GET['Notifications'];
	$link = get_db_link();
	//echo $notifications;


	$query = mysql_query("SELECT * FROM message",  $link);

	$row = mysql_fetch_array($query);

	$revNum = $row['revisionnumber'];
	$revNum += 1;

	$query = mysql_query("UPDATE message SET  message= '$notifications', revisionnumber = '$revNum'", $link);
	
	if(!$query) {
		echo 'Error';
	}
	else{
		echo sprintf('<div class="alert alert-success"><h2>Notifications Posted.</h2></div>');
		$_SESSION['updated'] = "updated";
	}
}	
?>

<?php include 'footer.php'; ?>

