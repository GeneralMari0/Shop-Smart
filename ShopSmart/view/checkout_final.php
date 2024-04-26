<!DOCTYPE html>
<html lang="en">
<head>
<title>Shop Smart :: Account Home</title>
<meta charset="utf-8">
<link rel = "stylesheet" href="../shopsmart.css">
<meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
    <?php $order_id = filter_input(INPUT_GET, 'order'); ?>
        
        <div id = wrapper>
            
        
        <main>

            <h2 style = "text-align:center">Thanks for your order!</h2>

            <p style = "text-align:center">
                Order Confirmation #<?php echo $order_id;?>
            </p>
            <div style = "text-align: center">
                Order made on <?php echo date('F j, Y');?>
                <p>
                    Thanks for your order! You will receive your product in 2 business days.
                </p>
                    
            </div>  
            
            <br>
            <form method = "POST" action = "../index.php">
                <input type="hidden" name="action" value="home_page">
                <input type="submit" value="Return to Home" />
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