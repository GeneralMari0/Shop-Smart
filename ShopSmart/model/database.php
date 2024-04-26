<?php
    $dsn = 'mysql:host=localhost;dbname=shop_smart';
    $username = 'admin';
    $password = 'O_SDh/)XvFR[vg4u';

    try {
         $database = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error = $e->getMessage();
        include('../view/error.php');
        exit();
    }
