<!DOCTYPE html>
<html lang="en">
<head>
<title>ShopSmart :: About</title>
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
            
        <div id = trailhero>
            
        </div>
  
            <main>
                <h2 style = "text-align:center;">Our Team</h2>
                <div id = flow>
                <section>
                    <div>
                        <img src="../images/mike.jpg" alt="Mike Ross's Picture" width="250" height="300">
                    </div>

                    <h3> Operations Manager: <br> Mike Ross </h3>
                        <p>
                            Mike has been our Operations Manager for the past ten years. Outside of work, Mike enjoys long walks on the beach or an engaging bicycle ride through the forest.
                        </p>
                </section>
                <section>

                    <div>
                        <img src="../images/katelyn.jpg" alt="Katelyn Ocean's Picture" width="250" height="300">
                    </div>

                    <h3> Assistant Operations Manager:  <br> Katelyn Ocean </h3>
                        <p>
                            Katelyn is our newest member of the family! She has been working with us over the past year. She enjoys kicking back and enjoying a movie. Cooking is also one of her favorite hobbies.
                        </p>
                </section>
                <section>
                    <div>
                        <img src="../images/mason.jpg" alt="Mason Paquette's Picture" width="250" height="300">
                    </div>

                    <h3> Founder: <br>Mason Paquette</h3>
                        <p>
                            The founder of Shop Smart. Mason has been working in management roles for over 30 years and started up his own company. Mason is a huge fan of the Vancouver Canucks and to this day has been to every game hosted in Vancouver!
                        </p>
                </section>
                </div>
            </main>
        </div>
        <footer>
            <p> 
                Copyright &copy; 2024 ShopSmart <br>
                <a href=“mailto:mason@paquette.com”>mason@paquette.com</a>
            </p>
        </footer>
    
</body>
</html>