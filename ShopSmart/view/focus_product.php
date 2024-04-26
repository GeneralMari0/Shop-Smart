<?php require("../model/database.php");?>
﻿<!DOCTYPE html>
<html lang="en">
<head>
<title>SHOP SMART :: View Products</title>
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
            <div id = homehero>
                
            </div>

        <main>
            
            <?php 
                $product_id = filter_input(INPUT_GET, 'product_id');
                $product_name = filter_input(INPUT_GET, 'product_name');
            ?>
            
            <?php 
            
            $query = 'SELECT * FROM products WHERE ProductID = :product_id';
            $statement = $database->prepare($query);
            $statement -> bindValue(':product_id', $product_id);
            $statement->execute();
            $item = $statement->fetch();
            $statement->closeCursor();
            
            
            ?>
            <h2 style = "text-align:center; font-size: 40px; font-weight: bold;">
                <?php echo $product_name; 
                ?>
            </h2>
            
            <div class = "center">
                    <div style = 
                         "
                          text-align: center; 
                          padding-left: 10px;
                          padding-right: 10px;
                          padding-top: 5px;
                         "
                    >
                        <img class = "display:inline-block;" src="<?php echo "../images/".$item['ProductImg']; ?>" alt="<?php echo $item['ProductName'];  ?>" width="200" height="200">
                        </a>
                        
                         <p style = "font-size: 40px; color:red; font-weight: bold;"><?php echo "\${$item['Price']}"; ?></p>
                        
                         <p style = "font-size: 20px; color:greenyellow; font-weight: bold;"><?php echo "{$item['ProductDescription']}"; ?></p>
                         
                         <form method = "POST" action = "../index.php">
                            <input type="hidden" name="action" value="add_to_cart">
                            <input type="hidden" name="product_id" value=<?php echo $product_id; ?>>
                            <input type="submit" value="Add to cart" />
                        </form>
                    </div>
            </div>
   

            <div>
                <p>
                    Shop Smart <br>
                   
                    <a id = "mobile" href ="tel:888-555-5555">888-555-5555</a> <br>
                    <span id = "desktop">888-555-5555</span> <br>
                </p>
            </div>
        </main>
        <footer>
            <p> 
                Copyright &copy; 2024 ShopSmart <br>
                <a href=“mailto:mason.paquette@student.ufv.ca”>mason.paquette@student.ufv.ca</a>
            </p>
        </footer>
    </div>
</body>
</html>
