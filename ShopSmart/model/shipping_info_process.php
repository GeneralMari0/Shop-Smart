 
<?php
require('database.php');
$accountID = filter_input(INPUT_COOKIE, "accountID");

$query = "INSERT INTO shipping (AccountID, Street, City, Province, PostalCode) 
VALUES (:accountID, :street, :city, :province, :postalcode)";

$state = $database->prepare($query);
$state ->bindValue(':accountID', $accountID);
$state ->bindValue(':street', $street);
$state ->bindValue(':city', $city);
$state ->bindValue(':province', $province);
$state ->bindValue(':postalcode', $post_code);
$state ->execute();
           
$state->closeCursor();


include('../view/checkout_payment.php');



