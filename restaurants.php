<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-
8859-1" />

<title>Student Search Engine</title>

<link href="default.css" rel="stylesheet" type="text/css" media="screen" />

<style type="text/css">body{

background: #ccc;

margin: 0;

padding: 0;

}

h1{

width: 375px;

padding: 10px;

margin-left: auto;

margin-right: auto;

background: #339;

font: normal 18px Arial, Helvetica, sans-serif;

color: #fff;

border: 1px solid #000;

text-align: center;

}

h2{

font: bold 18px Arial, Helvetica, sans-serif;

color: #339;

}

p{

text-indent:500px;

font: normal 18pt Arial, Helvetica, sans-serif;

color: #000;

}

a:link,a:visited{

font: normal 10pt Arial, Helvetica, sans-serif;

color: #00f;

text-decoration: none;

}

a:hover{

color: #f00;

text-decoration: underline;

}

.maincontainer{

width: 1200px;

padding: 10px;

margin-left: auto;

margin-right: auto;

background: #f0f0f0;

border: 1px solid #000;

}

.rowcontainer{

padding: 10px;

margin-bottom: 10px;

background: #ccf;

}

.searchbox{

width: 200px;

font: normal 12px Arial, Helvetica, sans-serif;

color: #000;

}

.searchbutton{

width: 80px;

font: bold 12px Arial, Helvetica, sans-serif;

color: #000;

}
</style>
</head>

<?php
    session_start();
    include 'OpenDB.php';
    
    $query = mysql_query("SELECT * FROM restaurants",$con);
    $numrows = mysql_num_rows($query);
    
    echo "<table border='1'><tr><th>ID</th><th>Name</th></tr>";
    
    if(isset($_SESSION['checkRestID']))
    {?>
       <h6 style ="color:red">Restaurant ID already exists. Please try again with a different ID.</h6> 
    <?php
    }
    
    if(isset($_SESSION['checkRestName']))
    {?>
       <h6 style ="color:red">Restaurant Name already exists. Please try again with a different Name.</h6> 
    <?php
    }
    
    if(isset($_SESSION['checkRestName']) && isset($_SESSION['checkRestID']))
    {?>
       <h6 style ="color:red">Restaurant Name and ID already exists. Please try again with a different Name and ID.</h6> 
    <?php
    }
    
    if($numrows > 0)
    {
        while($rests = mysql_fetch_array($query))
        {
          echo "<tr><td>".  $rests['ID'] . "</td><td>" . $rests['Name'] . "</td><td>"?>
          <a href=" deleteRest.php? id=<?php echo $rests['ID']; ?> " > Delete Restaurant </a>  <?php "</td></tr>";
        }
        echo "</table>";
    }?>

    
          <br/>
          <br/>
     
    <form method="post" action="addRest.php" id ="addRest">
          <dl><dd>Restaurant Name:<input type ="text" name ="Restaurant"></dd></dl>
          <dl><dd>Restaurant ID:<input type="text" name ="ID"></dd></dl>
          <input type ="submit" value ="Add a Restaurant">
    </form>
          

          
</html>


