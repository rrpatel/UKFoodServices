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
make_header(array('Search'));

// Main content goes here.
?>

<div class="container">
    <form class="well form-search" action="search.php" method="get">
	  <select name="category" class="span2">
	    <option>All</option>
	    <?php
			foreach(get_restaurants() as $c) {
				echo "<option>$c</option>";
			}
		?>
	  </select>
	  <input name="search" type="text" class="span8">
	  
	  <button type="submit" class="btn btn-primary"><i class="icon-search icon-white"></i> Search</button>
    </form>
<?php
	if(isset($_GET['search']) && isset($_GET['category'])) {
		$link = get_db_link();
		$search = sanitize($_GET['search']);
		$category = sanitize($_GET['category']);
		$_GET['category'] = '';
		
		$query = "SELECT RestaurantID, Name, FoodID, DivideFactor FROM food ";
		if($search != ''){
			$tempQuery = " WHERE Name LIKE '%$search%'";
		}
		else{
			if($category != 'All')
			$tempQuery = " WHERE ";
			else
			$tempQuery = "";
		}
		
		$query .= $tempQuery;

		if($category == 'All') {
			//echo 'Show me query' . "</br>";
			$idQuery = ";";//$inner_query = "AND category LIKE '$category'";
		}
		else{
		$temp = mysql_query("SELECT ID FROM restaurants WHERE Name LIKE '%$category%'",$link);		
		$restId = mysql_fetch_row($temp);
		//echo $restId[0] . "</br>";
		$inner_query = "";
		if($search != '')
		$idQuery = " AND RestaurantID = $restId[0];";
		else
		$idQuery = " RestaurantID = $restId[0];";

		}
		
		$query .= $idQuery;
		//echo $query . "</br>";
		$result = mysql_query($query, $link);

		if(!$result) {
			echo 'Error';
		} else if(mysql_num_rows($result) == 0) {
		  	echo '<div class="alert alert-error"><h2>No results found.</h2></div>';
		} else {
		  	$table = '<table class="table table-striped table-bordered"><thead><tr>';
		  	foreach(array('Restaurant', 'Food Item', 'Edit', 'Delete') as $k) {
				$table .= "<th>$k</th>";
			}
			$table .= '</tr></thead><tbody>';

			while($row = mysql_fetch_row($result)) {
				$table .= '<tr>';
				$count = 0;
				$temp = mysql_query("SELECT Name FROM restaurants WHERE ID = $row[0]",$link);		
				$restName = mysql_fetch_row($temp);
				
				if($restName[0]!=""){
				
				//list($id, $name, $category, $price) = $row;
				$table .= "<td>$restName[0]</td><td>$row[1]</td>";   //<td>$row[2] </td><td>$row[3] </td>";
				$table .= "<td><a href=\"edit_item.php?itemid=$row[2]\"><i class=\"icon-edit\"></i></a></td>";
				$table .= "<td><a href=\"removeFood.php?itemid=$row[2]\"><i class=\"icon-remove\"></i></a></td>";
				$table .= '</tr>';
				}
			}

			$table .= '</tbody></table>';

			echo $table;
		}
	}
?>
</div>

<?php include 'footer.php'; ?>