<!DOCTYPE html>
<html lang="en">
<head>
<title>Shop Smart</title>
<meta charset="utf-8">
<link rel = "stylesheet" href="../shopsmart.css">
<meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
    <?php 
        $accountID = filter_input(INPUT_COOKIE, "accountID");
        $message = filter_input(INPUT_GET, 'logout');
    ?>
    
    <header>
        <?php if ($message !== null) { ?>
            <h2> <?php echo $message; ?> </h2>
        <?php } ?>
            
        <h1><a href="main_page.php">Shop Smart</a> </h1>
    </header>

        <nav>
            <ul> 
                <li><a href="main_page.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="about.php">About</a></li>
                
                <?php if ($accountID !== null) {  ?>
                <li>
                    <form method = "POST" action = "../index.php">
                    <input type="hidden" name="action" value="user_home">
                    <input type="submit" value="User Home" />
                </li>
               <?php } else {?>
                <li>
                    <form method = "POST" action = "account_login.php">
                    <input type="hidden" name="action" value="account">
                    <input type="submit" value="Login to Account" />
                </li>
                <?php } ?>
            </form>
            </ul>
            
        </nav>
        <div id = wrapper>
            
        
        <main>

            <h2 style = "text-align:center">Welcome to ShopSmart!</h2>

            <p style = "text-align:center">
                Head over to the products page to learn more about the products we offer!
            </p>

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