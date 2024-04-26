
<?PHP
    session_start();
    $cart_list;
    if (!isset($_SESSION['cart_array']))
    {
       $cart_list = array();
    }
    else
    {
        $cart_list = $_SESSION['cart_array'];
        
        if (!(isset($cart_list)))
        {
            $cart_list = array();
        }

    } 
    
?>

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
    <header style = "display:flex;">  
        <h1><a href="main_page.php">Shop Smart</a></h1>
        
        <form action="../index.php" method="post">
            <input type="hidden" name="action" value="view_cart">
            <button type="submit" name="view_cart_button">
                <img class = "display:inline-block;" src="../images/cart.PNG" alt="Pizza" width="75" height="75">
            </button>
            <?php 
               $cart_quantity = count($cart_list);
        ?>
        <div style = "font-size:50px"> <?php echo $cart_quantity;?> Items in cart</div>
        </form>
        
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
                
            </ul>  
        </nav>
        <div id = wrapper>
            <div id = homehero>
                
            </div>

        <main>

            
            <?php 
            $product_list;
            
            if (isset($_SESSION['product_list']))
            {
                $product_list = $_SESSION['product_list'];
            }
            else
            {
            
            $query = 'SELECT * FROM products';
            $statement = $database->prepare($query);
            $statement->execute();
            $products = $statement->fetchAll();
            $statement->closeCursor();
            
            $_SESSION['product_list'] = $products;
            
            $product_list = $_SESSION['product_list'];
            }
            
            ?>
            <h2 style = "text-align:center">Products</h2>
            <div>
                    <form method = "POST" action = "../index.php">
                        <input type = "hidden" name="action" value="sort_items">
                    <label for="sort_type">Sort by</label><br>
                        <select name="sort_type" id="sort_type">
                            <option value="desc_value">Price: Highest to lowest</option>
                            <option value="asc_value">Price: Lowest to highest</option>
                            <option value="desc_key">Descending Alphabetically</option>
                            <option value="asc_key">Ascending Alphabetically</option>
                        </select> <br>
                        <input type="submit" value="Sort now" />
                    </form>
                <br>
                
            </div>
            <div>
                <?php foreach ($product_list as $product):?>
                    <div style = 
                         "text-align: center; padding-left: 10px;
                          padding-right: 10px;
                          padding-top: 5px;
                          flex-wrap: wrap;
                    "> 
                        <?php if ($product == null) {continue;}?>
                        
                        <a href="focus_product.php?product_id=<?php echo $product['ProductID']; ?>&product_name=<?php echo $product['ProductName'];?> ">
                            <img class = "display:inline-block;" src="<?php echo "../images/".$product['ProductImg']; ?>" alt="<?php echo $product['ProductName'];  ?>" width="100" height="100">
                        </a>
                        <br>
                        
                        <?php 
                            echo "<span class = 'product-table'>{$product['ProductName']}</span>"; 
                        ?>
                        
                        <br>
                        <?php echo "<span class = 'product-table'>\${$product['Price']}</span>"; ?>
                        <br>
                        
                        <form method = "POST" action = "../index.php">
                            <input type="hidden" name="action" value="add_to_cart">
                            <input type="hidden" name="product_id" value=<?php echo $product['ProductID']; ?>>
                            <input type="submit" value="Add to cart" />
                        </form>
                        
                        <?php if ($accountID == 12) {?>
                        <form style = "border: 2px; border-color: red;" method = "POST" action = "../index.php">
                        <input type="hidden" name="action" value="delete_product">
                        <input type="hidden" name="product_id" value=<?php echo $product['ProductID']; ?>>
                        <input style = "color:red; font-weight:bold;" type="submit" value="AD: Remove Item" />
                        </form>
            
                        
                        <?php } ?>
                
                    </div>
                
                
                <?php endforeach;?>
                <?php if ($accountID == 12) {?>
            </div>
            <div style = "border-style: solid; border-color: green; border-width: 10px;">
            <h3 style = "color: red; font-size:30px;">ADMIN: Add Products (Changes will effect database.)</h3>
            
            <form method = "POST" action = "../index.php">
                <label for "prod_name">Name:</label><br>
                <input type="text" name="prod_name" value="">
                <br>
                
                <label for "prod_desc">Product Description:</label><br>
                <input type="textarea" name="prod_desc" value="">
                <br>
                
                <label for "prod_price">Price:</label><br>
                <input type="text" name="prod_price" value="">
                <br>
                
                <label for "prod_img">Product Image (Ensure image is available within website):</label><br>
                <input type="text" name="prod_img" value="">
                <br>
                
                <input type="hidden" name="action" value="add_product">       
                <input style = "color:green; font-weight:bold;" type="submit" value="AD: Add Item" />
                </form>
            </div>
                <?php }?>
            <br>
            
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
