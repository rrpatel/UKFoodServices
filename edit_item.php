<?php
// Some useful functions.
include 'util.php';
check_logged_in();
//check_manager();

include 'header.php';
// Insert title after closing tag.
?>
	Add food items
<?php
include 'middle.php';

// Create header here.
make_header(array());

// Main content goes here.
?>

<div class="container">

	
   <form action="edit_item.php" method="post">

		
		  
		  <?php
		if(isset($_GET['itemid'])){
		?>
	
		
		<h1>Edit Food Item </h1>
		
		<?php

		$itemid = sanitize($_GET['itemid']);
		$login = $_SESSION['login'];
		$link = get_db_link();
		
		$result = mysql_query("SELECT * FROM food WHERE FoodID = '$itemid';",$link);
		$row = mysql_fetch_array($result);
		$itemname = $row[0];
       	  ?>

                Name:               <input class="input-large"  type="text" name ="Name" value = "<?php echo $row['Name']; ?>" ><br/>
		  Divide Factor:      <input class="input-large"  type="text" name ="DivideFactor" value = "<?php echo $row['DivideFactor']; ?>" ><br/>
                Serving Size:       <input class="input-large"  type="text" name ="ServingSize" value = "<?php echo $row['ServingSize']; ?>" ><br/>
                Calories:           <input class="input-large"  type="text" name ="Calories" value = "<?php echo $row[Calories]; ?>" ><br/>
                Calories From Fat:                  <input class="input-large"  type="text" name ="CaloriesFromFat" value = "<?php echo $row['CaloriesFromFat']; ?>" ><br/>
                Total Fat:                  <input class="input-large"  type="text" name ="TotalFat" value = "<?php echo $row['TotalFat']; ?>" ><br/>
                Saturated Fat:                  <input class="input-large"  type="text" name ="SaturatedFat" value = "<?php echo $row['SaturatedFat']; ?>" ><br/>
                Trans Fat:                  <input class="input-large"  type="text" name ="TransFat" value = "<?php echo $row['TransFat']; ?>" ><br/>
                Polyunsaturated Fat:                  <input class="input-large"  type="text" name ="PolyunsaturatedFat" value = "<?php echo $row['PolyunsaturatedFat']; ?>" ><br/>
                Monounsaturated Fat:                  <input class="input-large"  type="text" name ="MonounsaturatedFat" value = "<?php echo $row['MonounsaturatedFat']; ?>" ><br/>
                Cholesterol:                  <input class="input-large"  type="text" name ="Cholesterol" value = "<?php echo $row['Cholesterol']; ?>" ><br/>
                Sodium:                  <input class="input-large"  type="text" name ="Sodium" value = "<?php echo $row['Sodium']; ?>" ><br/>
                Potassium:                  <input class="input-large"  type="text" name ="Potassium" value = "<?php echo $row['Potassium']; ?>" ><br/>
                Total Carbohydrates:                  <input class="input-large"  type="text" name ="TotalCarbohydrate" value = "<?php echo $row['TotalCarbohydrate']; ?>" ><br/>
                Dietary Fiber:                  <input class="input-large"  type="text" name ="DietaryFiber" value = "<?php echo $row['DietaryFiber']; ?>" ><br/>
                Sugars:                  <input class="input-large"  type="text" name ="Sugars" value = "<?php echo $row['Sugars']; ?>" ><br/>
                Protein:                  <input class="input-large"  type="text" name ="Protein" value = "<?php echo $row['Protein']; ?>" ><br/>
                Vitamin A %:                  <input class="input-large"  type="text" name ="VitaminAP" value = "<?php echo $row['VitaminAP']; ?>" ><br/>
                Vitamin C %:                  <input class="input-large"  type="text" name ="VitaminCP" value = "<?php echo $row['VitaminCP']; ?>" ><br/>
                Calcium %:                  <input class="input-large"  type="text" name ="CalciumP" value = "<?php echo $row['CalciumP']; ?>" ><br/>
                Iron %:                  <input class="input-large"  type="text" name ="IronP" value = "<?php echo $row['IronP']; ?>" ><br/>
                Vitamin D:                  <input class="input-large"  type="text" name ="VitaminD" value = "<?php echo $row['VitaminD']; ?>" ><br/>
                Vitamin E:                  <input class="input-large"  type="text" name ="VitaminE" value = "<?php echo $row['VitaminE']; ?>" ><br/>
                Vitamin K:                  <input class="input-large"  type="text" name ="VitaminK" value = "<?php echo $row['VitaminK']; ?>" ><br/>
                Vitamin A(iu):                  <input class="input-large"  type="text" name ="VitaminAiu" value = "<?php echo $row['VitaminAiu']; ?>" ><br/>
                Vitamin A(re):                  <input class="input-large"  type="text" name ="VitaminAre" value = "<?php echo $row['VitaminAre']; ?>" ><br/>
                Thiamin:                  <input class="input-large"  type="text" name ="Thiamin" value = "<?php echo $row['Thiamin']; ?>" ><br/>
                Riboflavin:                  <input class="input-large"  type="text" name ="Riboflavin" value = "<?php echo $row['Riboflavin']; ?>" ><br/>
                Niacin:                  <input class="input-large"  type="text" name ="Niacin" value = "<?php echo $row['Niacin']; ?>" ><br/>
                Vitamin B-6:                  <input class="input-large"  type="text" name ="VitaminB6" value = "<?php echo $row['VitaminB6']; ?>" ><br/>
                Vitamin B-12:                  <input class="input-large"  type="text" name ="VitaminB12" value = "<?php echo $row['VitaminB12']; ?>" ><br/>
                Vitamin C:                  <input class="input-large"  type="text" name ="VitaminC" value = "<?php echo $row['VitaminC']; ?>" ><br/>
                Folic Acid:                  <input class="input-large"  type="text" name ="FolicAcid" value = "<?php echo $row['FolicAcid']; ?>" ><br/>
                Phosphorous:                  <input class="input-large"  type="text" name ="Phosphorous" value = "<?php echo $row['Phosphorous']; ?>" ><br/>
                Zinc:                  <input class="input-large"  type="text" name ="Zinc" value = "<?php echo $row['Zinc']; ?>" ><br/>
                Magnesium:                  <input class="input-large"  type="text" name ="Magnesium" value = "<?php echo $row['Magnesium']; ?>" ><br/>
                Copper:                  <input class="input-large"  type="text" name ="Copper" value = "<?php echo $row['Copper']; ?>" ><br/>
                Iron:                  <input class="input-large"  type="text" name ="Iron" value = "<?php echo $row['Iron']; ?>" ><br/>
                Calcium:                  <input class="input-large"  type="text" name ="Calcium" value = "<?php echo $row['Calcium']; ?>" ><br/>
                Child Nutrition Label(1=Yes/0=No):                  <input class="input-large"  type="text" name ="Child" value = "<?php echo $row['Child']; ?>" ><br/>
                Meat Quantity:                  <input class="input-large"  type="text" name ="MeatQuantity" value = "<?php echo $row['MeatQuantity']; ?>" ><br/>
                Bread Quantity:                  <input class="input-large"  type="text" name ="BreadQuantity" value = "<?php echo $row['BreadQuantity']; ?>" ><br/>
                Fruit/Veg Quantity:                  <input class="input-large"  type="text" name ="FruitVegQuantity" value = "<?php echo $row['FruitQuantity']; ?>" ><br/>
                Meat/Meat Alt:                  <input class="input-large"  type="text" name ="MeatMeatAlt" value = "<?php echo $row['MeatMeatAlt']; ?>" ><br/>
                Grain/Bread:                  <input class="input-large"  type="text" name ="GrainBread" value = "<?php echo $row['GrainBread']; ?>" ><br/>
                Fruit:                  <input class="input-large"  type="text" name ="Fruit" value = "<?php echo $row['Fruit']; ?>" ><br/>
                Red/Orange Vegetables:                  <input class="input-large"  type="text" name ="RedOrange" value = "<?php echo $row['RedOrange']; ?>" ><br/>
                Dark Green Vegetables:                  <input class="input-large"  type="text" name ="DarkGreen" value = "<?php echo $row['DarkGreen']; ?>" ><br/>
                Starchy Vegetables:                  <input class="input-large"  type="text" name ="Starchy" value = "<?php echo $row['Starchy']; ?>" ><br/>
                Beans/Peas:                  <input class="input-large"  type="text" name ="BeansPeas" value = "<?php echo $row['BeansPeas']; ?>" ><br/>
                Other:                  <input class="input-large"  type="text" name ="Other" value = "<?php echo $row['Other']; ?>" ><br/>
                Ingredients:                  <input class="input-large"  type="text" name ="Ingredients" value = "<?php echo $row['Ingredients']; ?>" ><br/>

		
	  
	  <button type="submit" class="btn btn-primary">Edit item</button>
		 </br>

    </form>




<?php

}

	else{
	if( $_POST['Name'] != '' ) {
		$link = get_db_link();
	
		

	//echo 'Have a fun' . "</br>";


        $Restaurant = $_POST['Restaurant'];
        $Name = $_POST["Name"];
        $FoodID = $_POST["FoodID"];
        $DivideFactor = $_POST["DivideFactor"];

        $ServingSize = $_POST["ServingSize"];
        $Calories = $_POST["Calories"];
        $CaloriesFromFat = $_POST["CaloriesFromFat"];
        $TotalFat = $_POST["TotalFat"];
        $SaturatedFat = $_POST["SaturatedFat"];
        $TransFat = $_POST["TransFat"];
        $PolyunsaturatedFat = $_POST["PolyunsaturatedFat"];
        $MonounsaturatedFat = $_POST["MonounsaturatedFat"];
        $Cholesterol = $_POST["Cholesterol"];
        $Sodium = $_POST["Sodium"];
        $Potassium = $_POST["Potassium"];
        $TotalCarbohydrate = $_POST["TotalCarbohydrate"];
        $DietaryFiber = $_POST["DietaryFiber"];
        $Sugars = $_POST["Sugars"];
        $Protein = $_POST["Protein"];
        $VitaminAP = $_POST["VitaminAP"];
        $VitaminCP = $_POST["VitaminCP"];
        $CalciumP = $_POST["CalciumP"];
        $IronP = $_POST["IronP"];
        $Ingredients = $_POST["Ingredients"];
        $VitaminD = $_POST["VitaminD"];
        $VitaminE = $_POST["VitaminE"];
        $VitaminK = $_POST["VitaminK"];
        $VitaminAiu = $_POST["VitaminAiu"];
        $VitaminAre = $_POST["VitaminAre"];
        $Thiamin = $_POST["Thiamin"];
        $Riboflavin = $_POST["Riboflavin"];
        $Niacin = $_POST["Niacin"];
        $VitaminB6 = $_POST["VitaminB6"];
        $VitaminB12 = $_POST["VitaminB12"];
        $VitaminC = $_POST["VitaminC"];
        $FolicAcid = $_POST["FolicAcid"];
        $Phosphorous = $_POST["Phosphorous"];
        $Zinc = $_POST["Zinc"];
        $Magnesium = $_POST["Magnesium"];
        $Copper = $_POST["Copper"];
        $Iron = $_POST["Iron"];
        $Calcium = $_POST["Calcium"];
        $Child = $_POST["Child"];
        $MeatQuantity = $_POST["MeatQuantity"];
        $BreadQuantity = $_POST["BreadQuantity"];
        $FruitVegQuantity = $_POST["FruitVegQuantity"];
        $MeatMeatAlt = $_POST["MeatMeatAlt"];
        $GrainBread = $_POST["GrainBread"];
        $Fruit = $_POST["Fruit"];
        $RedOrange = $_POST["RedOrange"];
        $DarkGreen = $_POST["DarkGreen"];
        $Starchdy = $_POST["Starchy"];
        $BeansPeas = $_POST["BeansPeas"];
        $Other = $_POST["Other"];
    
        $query = mysql_query("SELECT * FROM restaurants WHERE Name = '$Restaurant'", $link);
        $temp = mysql_fetch_array($query);
    
        $restID = $temp['ID'];
        echo $restID;
    
    $update_query = mysql_query("UPDATE food SET
                            RestaurantID = '$restID',
                            Name = '$Name', 
                            DivideFactor = '$DivideFactor',
                            ServingSize = '$ServingSize',
                            Calories = '$Calories',
                            CaloriesFromFat = '$CaloriesFromFat',
                            TotalFat = '$TotalFat',
                            SaturatedFat = '$SaturatedFat',
                            TransFat = '$TransFat',
                            PolyunsaturatedFat = '$PolyunsaturatedFat',
                            MonounsaturatedFat = '$MonounsaturatedFat',
                            Cholesterol = '$Cholesterol',
                            Sodium = '$Sodium',
                            Potassium = '$Potassium',
                            TotalCarbohydrate = '$TotalCarbohydrate',
                            DietaryFiber = '$DietaryFiber',
                            Sugars = '$Sugars',
                            Protein = '$Protein',
                            CalciumP = '$CalciumP',
                            VitaminAP = '$VitaminAP',
                            VitaminCP = '$VitaminCP',
                            IronP = '$IronP',
                            Ingredients = '$Ingredients',
                            VitaminD = '$VitaminD',
                            VitaminE = '$VitaminE',
                            VitaminK = '$VitaminK',
                            VitaminAiu = '$VitaminAiu',
                            VitaminAre = '$VitaminAre',
                            Thiamin = '$Thiamin',
                            Riboflavin = '$Riboflavin',
                            Niacin = '$Niacin',
                            VitaminB6 = '$VitaminB6',
                            VitaminB12 = '$VitaminB12',
                            VitaminC = '$VitaminC',
                            FolicAcid = '$FolicAcid',
                            Phosphorous = '$Phosphorous',
                            Zinc = '$Zinc',
                            Magnesium = '$Magnesium',
                            Copper = '$Copper',
                            Iron = '$Iron',
                            Calcium = '$Calcium',
                            Child = '$Child',
                            MeatQuantity = '$MeatQuantity',
                            BreadQuantity = '$BreadQuantity',
                            FruitVegQuantity = '$FruitVegQuantity',
                            MeatMeatAlt = '$MeatMeatAlt',
                            GrainBread = '$GrainBread',
                            Fruit = '$Fruit',
                            RedOrange = '$RedOrange',
                            DarkGreen = '$DarkGreen',
                            Starchy = '$Starchy',
                            BeansPeas = '$BeansPeas',
                            Other = '$Other'
                            WHERE FoodID = '$foodID' AND RestaurantID = '$restID'", $link);
    
    if($update_query > 0)
    {
	$_SESSION['updated'] = "updated";

	echo sprintf('<div class="alert alert-success"><h2><em>%s</em> successfully updated.</h2></div>', htmlspecialchars(stripcslashes($Name)));
		
    }
    
    else
    {
        Die('Failed to update ' .mysql_error());
    }












		//$query = sprintf("INSERT INTO inventory_item (name, quantity, price, category) VALUES ('%s', %d, %s, '%s');", $name, $quantity, $price, $category);

		
		
		//$query = mysql_query("SELECT * FROM food WHERE Name = '$Restaurant'", $link);
       	

		
	}
}

?>



</div>

<?php include 'footer.php'; ?>