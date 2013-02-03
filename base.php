<?php
// Some useful functions.
include 'util.php';

include 'header.php';
// Insert title after closing tag.
?>
	Registration
<?php
include 'middle.php';

// Create header here.
make_header(array('Register'));

// Main content goes here.
?>

<div class="container">
  <h1>Register here</h1>
    <form action="register.php" method="post">
	  <label>Name</label>
	  <input type="text"><br/>
	  <label>Login</label>
	  <input type="text"><br/>
	  <label>Password</label>
	  <input type="password"><br/>
	  <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>

<?php include 'footer.php'; ?>