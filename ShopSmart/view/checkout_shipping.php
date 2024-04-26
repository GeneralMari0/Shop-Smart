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
                Please fill out the shipping information.
            </p>
            
            <form method = "POST" action = "../index.php">
                <input type="hidden" name="action" value="process_shipping">
                    
                <label for "street">Street:</label><br>
                <input type ="text"  name = "street" value = "">
                <br>
                    
                <label for "city">City:</label><br>
                <input type ="text"  name = "city" value = "">
                <br>
                    
                <label for="province">Select a province.</label><br>
                <select name="province" id="province">
                    <option value="bc">British Columbia</option>
                    <option value="ab">Alberta</option>
                    <option value="on">Ontario</option>
                    <option value="qc">Quebec</option>
                    <option value="ns">Nova Scotia</option>
                    <option value="nb">New Brunswick</option>
                    <option value="mb">Manitoba</option>
                    <option value="pe">Prince Edward Island</option>
                    <option value="sk">Saskatchewan</option>
                    <option value="nl">Newfoundland/Labrador</option>
                </select> <br>
                <label for "post_code">Postal Code:</label><br>
                <input type ="text" maxlength="6" name = "post_code" value = "">
                <br>
                <input type="submit" value="Continue to payment information"/>
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