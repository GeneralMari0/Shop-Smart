<?php
session_start();
require("database.php");

if (!isset($_SESSION['cart_array']))
{
    $_SESSION['cart_array'] = array();
}

$product_id_cart = filter_input(INPUT_GET, 'product_id');

echo $product_id_cart;


$query = 'SELECT ProductID, ProductName, Price, ProductImg FROM `products` WHERE ProductID = :product_id';

$cart_query = $database->prepare($query);
$cart_query ->bindValue(':product_id', $product_id_cart);
$cart_query ->execute();
$product_entry = $cart_query->fetch();
$cart_query->closeCursor();

array_push($_SESSION['cart_array'], $product_entry);

header("Location: ../view/products.php");



