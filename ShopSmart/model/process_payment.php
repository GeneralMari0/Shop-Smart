<?php
require('database.php');

$query = "INSERT INTO payments (CardNumber, AccountID, ExpiryDate, SecurityCode) 
VALUES (:card_number, :account_id, :expiry_date, :security_code)";

$state = $database->prepare($query);
$state ->bindValue(':card_number', $card_number);
$state ->bindValue(':account_id', $accountID);
$state ->bindValue(':expiry_date', $expiry_date);
$state ->bindValue(':security_code', $security_code);
$state ->execute();
           
$state->closeCursor();
