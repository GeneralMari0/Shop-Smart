<?php
session_start();
require('database.php');


$query = 'SELECT * from ORDERS WHERE AccountID = :account_id';     
$state = $database->prepare($query);
$state ->bindValue(':account_id', $accountID);
$state ->execute();
$order_info = $state->fetchAll();
$state->closeCursor();

$serial = serialize($order_info);
setcookie("order_info", $serial, time()+(600), "/"); // 86400 = 1 day

print $accountID;
