<?php

require('database.php');

$test = 'INSERT INTO products (ProductCategory, ProductName, ProductDescription, Price, ProductImg)
        VALUES (1,:name,:desc,:price,:icon)'; 

$state = $database->prepare($test);
$state ->bindValue(':name', $name);
$state ->bindValue(':desc', $desc);
$state ->bindValue(':price', $price);
$state ->bindValue(':icon', $icon);
$state ->execute();
$state->closeCursor();

$product_list = $_SESSION['product_list'];


$query2 = 'SELECT * from products WHERE ProductName = :name AND ProductDescription = :desc AND Price = :price AND ProductImg = :icon'; 

$state2 = $database->prepare($query2);
$state2 ->bindValue(':name', $name);
$state2 ->bindValue(':desc', $desc);
$state2 ->bindValue(':price', $price);
$state2 ->bindValue(':icon', $icon);
$state2 ->execute();
$new_product = $state2->fetch();
$state2->closeCursor();

array_push($product_list, $new_product);

$_SESSION['product_list'] = $product_list;
