<!DOCTYPE html>
<html lang="en">
<head>
<title>Shop Smart :: Account Home</title>
<meta charset="utf-8">
<link rel = "stylesheet" href="../shopsmart.css">
<meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
    
    <header>  
    
    </header>

        
        <div id = wrapper>
            
        
        <main>

            <h2 style = "text-align:center">Welcome!</h2>

            <p style = "text-align:center">
                Enter your credit card information below
            </p>
            
            <form method = "POST" action = "../index.php">
                <input type="hidden" name="action" value="process_payment">
                    
                <label for "card_number">Credit Card Number:</label><br>
                <input type ="text" maxlength = "16"  name = "card_number" value = "">
                <br>
                    
                <label for "expiry_date">ExpiryDate:</label><br>
                <input type ="text" maxlength = "5" name = "expiry_date" value = "">
                <br>
                    
                <label for "security_code">CVV</label><br>
                <input type ="text" maxlength = "3" name = "security_code" value = "">
                <br>
                
                <input type="submit" value="Complete Checkout"/>
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