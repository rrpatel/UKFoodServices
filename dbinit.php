<?php

include 'util.php';

$link = get_db_link();

$sql_code = array(
"CREATE TABLE person(id int PRIMARY KEY AUTO_INCREMENT, name varchar(255), login varchar(255), password varchar(255), type varchar(255));",
"CREATE TABLE inventory_item(id int PRIMARY KEY AUTO_INCREMENT, name varchar(255), quantity int, category varchar(255), price decimal(6,2) unsigned);",
"CREATE TABLE order_detail(id int PRIMARY KEY AUTO_INCREMENT, order_time datetime, status varchar(255));",
"CREATE TABLE orders(person_id int REFERENCES person(id), item_id int REFERENCES inventory_item(id));",
"CREATE TABLE shopping_basket(person_id int REFERENCES person(id), item_id int REFERENCES inventory_item(id));",
"CREATE TABLE orders_from(person_id int REFERENCES person(id), order_id int REFERENCES order_detail(id));",
);

foreach($sql_code as $query) {
	if(!mysql_query($query, $link)) {
		echo "Error executing query: <pre>$query</pre>";
	}
}

mysql_close($link);

?>