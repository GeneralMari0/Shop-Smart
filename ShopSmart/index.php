<?php

session_start();

require('model/database.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'home_page';
        
    }
}  

if ($action == 'create_account') {
    header('Location: view/create_account.php');
}
else if ($action == 'delete_account')
{
    $account_id = filter_input(INPUT_COOKIE, 'accountID');
    include('model/delete_account.php');
     header('Location: view/main_page.php?message='.urlencode("Your account is deleted."));
}
else if ($action == 'user_home') {
    $accountID = filter_input(INPUT_COOKIE, 'accountID');
    
    include('model/user_home_data.php');
    
    header('Location: view/user_home.php');
} 
else if ($action == 'home_page')
{
    header('Location: view/main_page.php');
}
else if ($action == 'logout')
{
    setcookie("accountID", '', time()-3600, "/");
    setcookie("username", '', time()-3600, "/");

    header('Location: view/main_page.php?message='.urlencode("Logout Success!"));
}
else if ($action == 'add_to_cart')
{
    $product_id_cart = filter_input(INPUT_POST, 'product_id');
    header('Location: model/cart.php?product_id='.urlencode($product_id_cart));
}
else if ($action == 'remove_item')
{
    $cart_list = $_SESSION['cart_array'];
    $removal_item = filter_input(INPUT_POST, 'product');
   
    unset($cart_list[$removal_item]);
    
    sort($cart_list);
    
    $_SESSION['cart_array'] = $cart_list;
    
    header('Location: view/view_cart.php');
}
else if ($action == 'add_product')
{
    $name = filter_input(INPUT_POST, 'prod_name');
    $desc = filter_input(INPUT_POST, 'prod_desc');
    $price = filter_input(INPUT_POST, 'prod_price');
    $icon = filter_input(INPUT_POST, 'prod_img');
   
    include('model/product_mod.php');
    header('Location: view/products.php');
}
else if ($action == 'delete_product')
{
    $product = filter_input(INPUT_POST, 'product_id');
    include('model/product_delete.php');
    header('Location: view/products.php');
}
else if ($action == 'sort_items')
{
    $sort_type = filter_input(INPUT_POST, 'sort_type');
    $product_list = $_SESSION['product_list'];
    
    if ($sort_type == 'desc_value')
    {
        asort($product_list);
    }
    else if ($sort_type == 'asc_value')
    {
        arsort($product_list);
    }
    else if ($sort_type == 'desc_key')
    {
        krsort($product_list);
    }
    else if ($sort_type == 'asc_key')
    {
        ksort($product_list);
    }
    else
    {
        sort($product_list);
    }
    
 
    $_SESSION['product_list'] = $product_list;
    
    header('Location: view/products.php');
}
else if ($action == 'view_cart')
{
    header('Location: view/view_cart.php');
}
else if ($action == 'checkout_account')
{

    $username = filter_input(INPUT_COOKIE, "username");
    if (!isset($username))
    {
        $username = 'Guest';
        header('Location: view/checkout_account.php');
    }
    else
    {
        header('Location: view/checkout_shipping.php');
    }
    
}
else if ($action == 'process_shipping')
{
    $street = filter_input(INPUT_POST, 'street');
    $city = filter_input(INPUT_POST, 'city');
    $province = filter_input(INPUT_POST, 'province');
    $post_code = filter_input(INPUT_POST, 'post_code');
    
    include('model/shipping_info_process.php');
    header('Location: view/checkout_payment.php');
}
else if ($action == 'process_payment')
{
    $card_number = filter_input(INPUT_POST, "card_number");
    $expiry_date = filter_input(INPUT_POST, "expiry_date");
    $security_code = filter_input(INPUT_POST, "security_code");
    
    $accountID = filter_input(INPUT_COOKIE, "accountID");
    $order_total = filter_input(INPUT_COOKIE, "cart_total");
    
    $order_id = rand(1, 100000000);
    include('model/process_payment.php');
    include('model/order_info.php');
    
    header('Location: view/checkout_final.php?order=' . urlencode($order_id));
}
