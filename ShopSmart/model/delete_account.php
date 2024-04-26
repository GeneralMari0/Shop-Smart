<?php
require('database.php');
        
$test = 'DELETE FROM accounts WHERE AccountID = :account_id'; 
$state = $database->prepare($test);
$state ->bindValue(':account_id', $account_id);
$state ->execute();
$state ->closeCursor();