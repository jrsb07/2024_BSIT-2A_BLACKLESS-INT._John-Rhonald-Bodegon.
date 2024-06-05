<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "blackless(2)";
$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

session_start();
    if(isset($_GET['delete_from_cart'])){
        $order_id = $_GET['delete_from_cart'];
        $delete_cart = "DELETE FROM orders WHERE order_id = '$order_id'";
        $sql_execute = mysqli_query($conn, $delete_cart);
    if($sql_execute){
        header("location: order.php?msg=cart_item_removed");
    }
    }
    if($_SESSION['user_type'] != 'C'){
        header("location: login.php");
    }

    $s_user_id = $_SESSION['user_id'];

?>

<html>
    <head>
        <title> Order </title>
        <link rel="stylesheet" href="Style/order.css">
    </head>
    <body>

    <div class="header">
        <h2 id="place_order">Place Your Order</h2>
        <nav>
            <ul>
                <li><a href="user.php">Home</a></li>
            </ul>
        </nav>
    </div>

        <div class="container">
   <?php       
        $get_items = "SELECT * FROM `menu`";
        $get_result = mysqli_query($conn, $get_items); ?>
            <?php
            while ( $row = mysqli_fetch_assoc($get_result) ){ ?>
            <div class = "products">
            <td><?php echo '<img src="' . $row["image_path"] . '" alt="' . $row["item_name"] . '">'?></td>
            <br>
            <td id="item"><?php echo $row['item_name'];?></td>
            <td><?php echo "Php " . number_format($row['price'],2);?></td>
            <td> 
                               
            <form action="cart.php" method="get">
            <div class="input-group">
                <input type="text" hidden class="form-control" name="item_id" value="<?php echo $row['item_id'];?>">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" min="1" name="cart_qty">
                <br>
                <label for="comment">Add-on:</label>
<!--                <textarea id="comment" name="add-on" rows="4"></textarea>-->
                       <select name="add-on" id="">
                              <option value="">--</option>
                           <?php 
                                    $get_addons = "SELECT * FROM `ingredients`";
                                    $addon_result = mysqli_query($conn, $get_addons);
                                   while($m = mysqli_fetch_assoc($addon_result)){ ?>
                
                                <option value="<?php echo $m['ing_id'];?>"><?php echo "(Php ". $m['ing_pricing'] .") " . $m['ing_name'];?></option>
                            <?php } ?>
                           
                       </select>
                <input type="submit" value="Order" class="btn btn-primary">
            </div>
            </form>
            </td>
            </tr>
            </div>
        <?php }
                ?>
</div>
        <div class="status">
               <?php
            
                $sql_get_orders = "SELECT o.order_id, m.item_name, o.item_qty, o.add_ons_desc, o.order_status, o.price
                                    FROM orders AS o
                                    JOIN menu AS m ON o.item_id = m.item_id
                                    WHERE o.user_id = '$s_user_id'";
                $order_results = mysqli_query($conn, $sql_get_orders);
            
               if (mysqli_num_rows($order_results) > 0) { ?>
               
        <h2>My Order Status</h2>

        <table border="1" class="order">
            <tr>
                <th>Order ID</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Add-ons</th>
                <th>Status</th>
                <th>Price</th>
            </tr>
    <?php while($order = mysqli_fetch_assoc($order_results)) { ?>
        <tr>
            <td><?php echo $order['order_id']; ?></td>
            <td><?php echo $order['item_name']; ?></td>
            <td><?php echo $order['item_qty']; ?></td>
            
            <td><?php $name_ing = "SELECT i.ing_name FROM ingredients AS i JOIN orders AS o ON FIND_IN_SET(i.ing_id, o.add_ons_desc) > 0
                                    WHERE o.order_id = " . $order['order_id'];

            $ingredient_result = mysqli_query($conn, $name_ing);
    
            if ($ingredient_result && mysqli_num_rows($ingredient_result) > 0) {
                while ($ingredient = mysqli_fetch_assoc($ingredient_result)) {
            echo $ingredient['ing_name'];
            }
            } else {
            echo "No add-ons";
            } ?></td>
            
            <td><?php echo $order['order_status']; ?></td>
            <td><?php echo $order['price']; ?></td> 
            <td>
                <?php if($order['order_status'] == 'Order Placed') { ?>
                    <a href="?delete_from_cart=<?php echo $order['order_id']; ?>" class="cancel">Cancel</a>
                <?php } ?>    
            </td>
        </tr>
        <?php } }else { ?>
            <p>Your cart is currently empty.</p>
        <?php }?>
    </table>
            <div class="warn">
                <p>User will not be able to cancel their order if the seller receive it already
                    (Order status will change to "Order Receive" and so on)
                </p>
            </div>
        </div>
    
    </body>
</html>