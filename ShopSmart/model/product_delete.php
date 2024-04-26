<?php

require('database.php');

$test = 'DELETE FROM products WHERE ProductID = :product_id'; 

$state = $database->prepare($test);
$state ->bindValue(':product_id', $product);
$state ->execute();
$state->closeCursor();

$numberquery = 'SET  @num := 0;
UPDATE products SET ProductID = @num := (@num+1);
ALTER TABLE `products` AUTO_INCREMENT = 1;'; 
$state2 = $database->prepare($numberquery);
$state2 ->execute();
$state2->closeCursor();

$product_list = $_SESSION['product_list'];

unset($product_list[$product-1]);

$_SESSION['product_list'] = $product_list;