<!DOCTYPE html>
<title>Shop Smart :: Contact</title>
<meta charset="utf-8">
<link rel = "stylesheet" href="../shopsmart.css">
</head>
<body>
    <?php 
        $accountID = filter_input(INPUT_COOKIE, "accountID");
        $message = filter_input(INPUT_GET, 'logout');
    ?>
    <header>  <h1><a href="main_page.php">Shop Smart</a></h1> </header>

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
        

        <main>

            <h2>Contact Us</h2>
            <p>
                For customer inquiries, please email us at <a href=“mailto:mason.paquette@student.ufv.ca”>mason.paquette@student.ufv.ca</a>
            </p>

            <p>
                We will return your email within three business days between the hours of 8AM to 5PM.
            </p>
            
            <h2>
                Mailing Address
            </h2>

            <div>
                <p>
                    33844 King Rd
                    Abbotsford, BC
                    V2S 7M7
                    H: 888-555-5555
                </p>
            </div>
        </main>
        <footer>
            <p> 
                Copyright &copy; 2024 Shop Smart <br>
                <a href=“mailto:mason.paquette@student.ufv.ca”>mason.paquette@student.ufv.ca</a>
            </p>
        </footer>
    </div>
</body>
</html>