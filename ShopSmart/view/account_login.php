<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>
<meta charset="utf-8">
<link rel = "stylesheet" href="../shopsmart.css">
<meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
        <?php $error_message = filter_input(INPUT_GET, 'error')?>
        <div id = wrapper>
            
        
        <main>
            
            <h2 style = "text-align:center">Log in to your account</h2>
            
            <h3><?php echo(htmlspecialchars($error_message)); ?></h3>

            <form method = "POST" action="../model/account.php">
                
                <input type="hidden" name="action" value="login">
                
                <label for "user_name">User Name:</label><br>
                
                <input type="text" name="user_name" value="">
                <br>
                
                <label for "user_name">Password:</label><br>
                <input type="password" name="password" value="">
                <br>
                
                <input type="submit" value="Login" />
            </form>
            
            
            <div>
                <p> Don't have an account? </p>
                <form method = "POST" action = "../index.php">
                    <input type="hidden" name="action" value="create_account">
                    <input type="submit" value="Create new account" />
            </form>
            </div>
            
    
        </main>
        </div>
        <footer>
            <p> 
                Copyright &copy; 2024 ShopSmart <br>
                <a href=“mailto:mason.paquette@student.ufv.ca”>mason.paquette@student.ufv.ca</a>
            </p>
        </footer>
    
</body>
</html>

