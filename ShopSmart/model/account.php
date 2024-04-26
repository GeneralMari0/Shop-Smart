<?php

require('../model/database.php');
$user_name= filter_input(INPUT_POST, 'user_name');
$user_password = filter_input(INPUT_POST, 'password');
$conf_password = filter_input(INPUT_POST, 'conf_password');
$email = filter_input(INPUT_POST, 'email');

$account_action = filter_input(INPUT_POST, 'action');

switch($account_action) {
    case 'login':
        
        // Confirm user entered a name and passowrd
        if (empty($user_name) || empty($user_password)) {
            $error_message = 'Please enter both a user name and password.';
            header('Location: ../view/account_login.php?error=' . urlencode($error_message));
            break;
        }

        else
        {
            $test = 'SELECT AccountID, Name, Password FROM accounts WHERE Name = :name AND Password = :password'; 
            $state = $database->prepare($test);
            $state ->bindValue(':name', $user_name);
            $state ->bindValue(':password', $user_password);
            $state ->execute();
            
            $product_list = $state->fetch();
            $state->closeCursor();
           
            // Continue sign-in process if user/password combo is in db, else make them try it again.
            if ($product_list)
            {
                $accountID = $product_list['AccountID'];
                header("Location: ../view/user_home.php");
                setcookie("username", $user_name, time()+1800, "/");
                setcookie("accountID", $accountID, time()+1800, "/");
                break;
            }
            else
            {
                $error_message = 'You have entered an invalid username or password. Please try again.';
                header('Location: ../view/account_login.php?error=' . urlencode($error_message));
                break;
            }
        }
        
    case 'create':
        
        if (empty($user_name) || empty($user_password) || empty($conf_password) || empty($email))
        {
            $error_message = 'All fields must be filled out.';
            header('Location: ../view/create_account.php?error=' . urlencode($error_message));
            break;
        }
        else if ($conf_password != $user_password) {
            $error_message = 'Passwords do not match. Try again.';
            header('Location: ../view/create_account.php?error=' . urlencode($error_message));
            break;
        }
        else
        {
            
            $test = 'INSERT INTO `accounts` (`Name`, `Password`, `Email`) VALUES (:name, :password, :email)';
            $state = $database->prepare($test);
            $state ->bindValue(':name', $user_name);
            $state ->bindValue(':password', $user_password);
            $state ->bindValue(':email', $email);
            $state ->execute();
            $state->closeCursor();
            $error_message = 'Account creation successful!';
            header('Location: ../view/account_login.php?error=' . urlencode($error_message));
            break;
        }

        
        
    
}





// Validate input value


/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

