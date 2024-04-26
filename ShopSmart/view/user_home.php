<!DOCTYPE html>
<html lang="en">
<head>
<title>Shop Smart :: Account Home</title>
<meta charset="utf-8">
<link rel = "stylesheet" href="../shopsmart.css">
<meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
    <?php 
        $username = filter_input(INPUT_COOKIE, "username");
        $order_info = unserialize(filter_input(INPUT_COOKIE,'order_info'));
    ?>
    
    <header>  
    
    </header>

        
        <div id = wrapper>
            
        
        <main>

            <h2 style = "text-align:center">Welcome <?php echo $username; ?>!</h2>

            <p style = "text-align:center; font-size: 35px; font-weight: bold">
                Your Orders:
            </p>
            
            <?php foreach ($order_info as $order): ?>
                
            <div style = "text-align:center; font-size: 30px; font-weight: bold">
                Order #<?php echo $order['OrderID']; ?>
                <br><br>
                
                Date of Order: <?php echo $order['OrderDate']; ?>
                <br><br>
                
                Order Total: $<?php echo $order['OrderTotal']; ?>
                <br><br><br>
            </div>
            
            <?php endforeach; ?>

            <form method = "POST" action = "../index.php">
                <input type="hidden" name="action" value="home_page">
                <input type="submit" value="Home Page" />
            </form>
            <br>
            
            <form method = "POST" action = "../index.php">
                <input type="hidden" name="action" value="logout">
                <input type="submit" value="Logout" />
            </form>
            
            <form method = "POST" action = "../index.php">
                <input type="hidden" name="action" value="delete_account">
                <input type="submit" value="Delete Account" />
            </form>
            
            <div>
                <p>
                    
                    <a id = "mobile" href ="tel:888-555-5555">888-555-5555</a> <br>
                    <span id = "desktop">888-555-5555</span> <br>
                </p>
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