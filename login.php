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
make_header(array('Login'));

echo sprintf('<div class="alert alert-success"><h1>Welcome</h1></div>');

echo sprintf('<div class="alert alert-success"><h2>UK Food Services</h2></div>');


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