<?php

require('database.php');

$query = "INSERT INTO orders (OrderID, AccountID, CardNumber, OrderDate, OrderTotal) 
VALUES (:order_id, :accountID, :card_number, NOW() , :order_total)";

$state = $database->prepare($query);
$state ->bindValue(':order_id', $order_id);
$state ->bindValue(':accountID', $accountID);
$state ->bindValue(':card_number', $card_number);
$state ->bindValue(':order_total', $order_total);
$state ->execute();
$state->closeCursor();
