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

  <h1>Add a food item </h1>
   <form action="shopping_cart.php" method="post">

		  Restaurant:     
                <select name="restaurant" class="input-large" id="restaurant">
		  <?php
	   		foreach(get_restaurants() as $c) {
	 			echo "<option>$c</option>";
			}
	         ?>
	         </select><br/>
		 

                Name:               <input class="input-large"  type="text" name ="Name"><br/>
		  Divide Factor:      <input class="input-large"  type="text" name ="DivideFactor"><br/>
                Serving Size:       <input class="input-large"  type="text" name ="ServingSize"><br/>
                Calories:           <input class="input-large"  type="text" name ="Calories"><br/>
                Calories From Fat:                  <input class="input-large"  type="text" name ="CaloriesFromFat"><br/>
                Total Fat:                  <input class="input-large"  type="text" name ="TotalFat"><br/>
                Saturated Fat:                  <input class="input-large"  type="text" name ="SaturatedFat"><br/>
                Trans Fat:                  <input class="input-large"  type="text" name ="TransFat"><br/>
                Polyunsaturated Fat:                  <input class="input-large"  type="text" name ="PolyunsaturatedFat"><br/>
                Monounsaturated Fat:                  <input class="input-large"  type="text" name ="MonounsaturatedFat"><br/>
                Cholesterol:                  <input class="input-large"  type="text" name ="Cholesterol"><br/>
                Sodium:                  <input class="input-large"  type="text" name ="Sodium"><br/>
                Potassium:                  <input class="input-large"  type="text" name ="Potassium"><br/>
                Total Carbohydrates:                  <input class="input-large"  type="text" name ="TotalCarbohydrate"><br/>
                Dietary Fiber:                  <input class="input-large"  type="text" name ="DietaryFiber"><br/>
                Sugars:                  <input class="input-large"  type="text" name ="Sugars"><br/>
                Protein:                  <input class="input-large"  type="text" name ="Protein"><br/>
                Vitamin A %:                  <input class="input-large"  type="text" name ="VitaminAP"><br/>
                Vitamin C %:                  <input class="input-large"  type="text" name ="VitaminCP"><br/>
                Calcium %:                  <input class="input-large"  type="text" name ="CalciumP"><br/>
                Iron %:                  <input class="input-large"  type="text" name ="IronP"><br/>
                Vitamin D:                  <input class="input-large"  type="text" name ="VitaminD"><br/>
                Vitamin E:                  <input class="input-large"  type="text" name ="VitaminE"><br/>
                Vitamin K:                  <input class="input-large"  type="text" name ="VitaminK"><br/>
                Vitamin A(iu):                  <input class="input-large"  type="text" name ="VitaminAiu"><br/>
                Vitamin A(re):                  <input class="input-large"  type="text" name ="VitaminAre"><br/>
                Thiamin:                  <input class="input-large"  type="text" name ="Thiamin"><br/>
                Riboflavin:                  <input class="input-large"  type="text" name ="Riboflavin"><br/>
                Niacin:                  <input class="input-large"  type="text" name ="Niacin"><br/>
                Vitamin B-6:                  <input class="input-large"  type="text" name ="VitaminB6"><br/>
                Vitamin B-12:                  <input class="input-large"  type="text" name ="VitaminB12"><br/>
                Vitamin C:                  <input class="input-large"  type="text" name ="VitaminC"><br/>
                Folic Acid:                  <input class="input-large"  type="text" name ="FolicAcid"><br/>
                Phosphorous:                  <input class="input-large"  type="text" name ="Phosphorous"><br/>
                Zinc:                  <input class="input-large"  type="text" name ="Zinc"><br/>
                Magnesium:                  <input class="input-large"  type="text" name ="Magnesium"><br/>
                Copper:                  <input class="input-large"  type="text" name ="Copper"><br/>
                Iron:                  <input class="input-large"  type="text" name ="Iron"><br/>
                Calcium:                  <input class="input-large"  type="text" name ="Calcium"><br/>
                Child Nutrition Label(1=Yes/0=No):                  <input class="input-large"  type="text" name ="Child"><br/>
                Meat Quantity:                  <input class="input-large"  type="text" name ="MeatQuantity"><br/>
                Bread Quantity:                  <input class="input-large"  type="text" name ="BreadQuantity"><br/>
                Fruit/Veg Quantity:                  <input class="input-large"  type="text" name ="FruitVegQuantity"><br/>
                Meat/Meat Alt:                  <input class="input-large"  type="text" name ="MeatMeatAlt"><br/>
                Grain/Bread:                  <input class="input-large"  type="text" name ="GrainBread"><br/>
                Fruit:                  <input class="input-large"  type="text" name ="Fruit"><br/>
                Red/Orange Vegetables:                  <input class="input-large"  type="text" name ="RedOrange"><br/>
                Dark Green Vegetables:                  <input class="input-large"  type="text" name ="DarkGreen"><br/>
                Starchy Vegetables:                  <input class="input-large"  type="text" name ="Starchy"><br/>
                Beans/Peas:                  <input class="input-large"  type="text" name ="BeansPeas"><br/>
                Other:                  <input class="input-large"  type="text" name ="Other"><br/>
                Ingredients:                  <input class="input-large"  type="text" name ="Ingredients"><br/>


	  
	  <button type="submit" class="btn btn-primary">Add item</button>
		        </br>

    </form>



</div>

<?php include 'footer.php'; ?>