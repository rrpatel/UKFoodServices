<?php
// Some useful functions.
include 'util.php';

include 'header.php';
// Insert title after closing tag.
?>


	Login



<?php
include 'middle.php';

// Create header here.
//make_header(array('Login'));

echo sprintf('<div class="alert alert-success" id="small1"><h2>Welcome to UK Food Services</h2></div>');

if( isset($_SESSION['echstr'])){
echo sprintf('<div class="alert alert-fail" id="small1"><h8>Login failed!</h8></div>');
}


// Main content goes here.
?>

<div class="container">
  <form action="handle_login.php" method="post">
	<label>Login</label>
	<input name="login" type="text"><br/>
	<label>Password</label>
	<input name="password" type="password"><br/>
	<button type="submit" class="btn btn-primary">Login</button>
  </form>
</div>

<?php include 'footer.php'; ?>