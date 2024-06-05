<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "blackless(2)";
$db_conn = "";

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
session_start();

if(isset($_GET['item_id'])){
    $user_id = $_SESSION['user_id'];
    $item_id = $_GET['item_id'];
    $item_qty = $_GET['cart_qty'];
    $add = $_GET['add-on'];
    
    $get_item_price_query = "SELECT price FROM menu WHERE item_id = '$item_id'";
    $item_price_result = mysqli_query($conn, $get_item_price_query);
    $item_row = mysqli_fetch_assoc($item_price_result);
    $item_price = $item_row['price'] * $item_qty;
    
    $get_add_on_price_query = "SELECT ing_pricing FROM ingredients WHERE ing_id = '$add'";
    $add_on_price_result = mysqli_query($conn, $get_add_on_price_query);
    $add_on_row = mysqli_fetch_assoc($add_on_price_result);
    $add_on_price = $add_on_row['ing_pricing'];
    
    $final_price = $item_price + $add_on_price;
    
    $sql_add_to_cart = "INSERT INTO `orders`
           (`user_id`, `item_id`, `item_qty`, `add_ons_desc`,`price`)
           VALUES
           ('$user_id','$item_id','$item_qty', '$add', '$final_price')";
    $execute_cart = mysqli_query($conn, $sql_add_to_cart);
    
    if($execute_cart){
        header("location: order.php?msg=item_{$item_id}_added_to_cart");
    }
}