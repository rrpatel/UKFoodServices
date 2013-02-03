<?php
// Some useful functions.
include 'util.php';
check_logged_in();

include 'header.php';
// Insert title after closing tag.
?>
	Add new account
<?php
include 'middle.php';

// Create header here.
make_header(array('Register'));

// Main content goes here.
?>

<div class="container">
  <h1>Add new account</h1>
    <form action="create_account.php" method="post">
	  <label>Login</label>
	  <input name="login" type="text"><br/>
	  <label>Password</label>
	  <input name="password" type="password"><br/>
	  <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>

<?php include 'footer.php'; ?>