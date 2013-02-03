<?php
session_start();
// Some useful functions.
include 'util.php';
check_logged_in();

include 'header.php';
// Insert title after closing tag.
?>
	Login
<?php
include 'middle.php';

//header("Location: home.php");

// Create header here.
make_header(array('Home'));

// Main content goes here.
?>

<div class="container">
  <p>
    <?php
		if(is_logged_in()) {
			$name = $_SESSION['login'];
			echo "<div class=\"container\" color=\"black\"> <div class=\"alert hero-unit\"><h1> Welcome, $name.</h1></div></div>";	
		} else {
  		  	echo "<div class=\"alert alert-error\"><h1>Login failed.</h1></div>";		  	
		}
	?>
  </p>
</div>

<?php include 'footer.php'; ?>