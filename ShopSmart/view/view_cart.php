

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
                if (!isset($username))
                {
                    $username = 'Guest';
                }
                
                $cart_total = 0;
    ?>
    
    <header>  
    
    </header>

        
        <div id = wrapper>
            
        
        <main>

            <h2 style = "text-align:center">Welcome <?php echo $username; ?>!</h2>

            <p style = "text-align:center">
                Your Cart
            </p>

            <table>
                <?php 
                    $element = 0;
                    
                    $cart_products = array();
                    $intersection = array();
                    
                ?>
                <?php foreach ($cart_list as $cart_item): ?>
            

                <tr>
                    <td><img class = "display:inline-block;" src="<?php echo "../images/".$cart_item['ProductImg']; ?>" alt="<?php echo $product['ProductName'];  ?>" width="100" height="100"></td>
                    <td><?php echo $cart_item['ProductName'];?> </td>
                    <td>
                        <?php 
                            echo '$'.$cart_item['Price']; 
                            $cart_total += $cart_item['Price'];
                        ?>
                    </td>
                    <td>
                        <form method = "POST" action = "../index.php">
                            <input type="hidden" name="action" value="remove_item">
                            <input type="hidden" name="product" value=<?php echo $element; ?>>
                            <input type="submit" value="Remove" />
                        </form>
                        
                    </td>
                    
                    
                    
                <?php 
                    $element+=1;
                    array_push($cart_products, $cart_item);
                ?>
                </tr>
                <?php  endforeach ?>
            </table>
                <?php echo 'Total: $'.$cart_total;
                         setcookie("cart_total", $cart_total, time()+1800, "/"); 
                      
                        ?>
            <form method = "POST" action = "../index.php">
                <input type="hidden" name="action" value="checkout_account">
                <input style = "padding: 16px 64px;" type="submit" value="Checkout" />
            </form>
            
            
            <div>
                <p>
                   
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
