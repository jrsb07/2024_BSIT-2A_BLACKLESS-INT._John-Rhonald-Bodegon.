<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <link rel="stylesheet" href="Style/products.css">
</head>
<body>

    <?php

        $db_server = "localhost";
        $db_user = "root";
        $db_pass = "";
        $db_name = "blackless(2)";
        $db_conn = "";

        $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
    ?>

    <header>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h2>Frank's Cafe</h2>
        <div class="products">
            <div class="product">
                <img src="coffee/product1.jpg" alt="Product 1">
                <?php
                    $sql = "SELECT * FROM menu WHERE item_id = 1";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<h3>" . $row["item_name"] . "</h3>";
                            echo "<p>" . $row["price"] . " Pesos</p>";
                        }
                    } else {
                        echo "0 results";
                    }
                    
                ?>
            </div>
            <div class="product">
                <img src="coffee/product2.jpg" alt="Product 2">
                <?php
                    $sql = "SELECT * FROM menu WHERE item_id = 2";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<h3>" . $row["item_name"] . "</h3>";
                            echo "<p>" . $row["price"] . " Pesos</p>";
                        }
                    } else {
                        echo "0 results";
                    }    
                ?>
            </div>
            <div class="product">
                <img src="coffee/product3.jpg" alt="Product 3">
                <?php
                    $sql = "SELECT * FROM menu WHERE item_id = 4";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<h3>" . $row["item_name"] . "</h3>";
                            echo "<p>" . $row["price"] . " Pesos</p>";
                        }
                    } else {
                        echo "0 results";
                    }    
                ?>
            </div>
            <div class="product">
                <img src="coffee/product4.jpg" alt="Product 4">
                <?php
                    $sql = "SELECT * FROM menu WHERE item_id = 5";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<h3>" . $row["item_name"] . "</h3>";
                            echo "<p>" . $row["price"] . " Pesos</p>";
                        }
                    } else {
                        echo "0 results";
                    }    
                ?>
            </div>
            <div class="product">
            <img src="coffee/Product5.jpg" alt="Product 5">
            <?php
                    $sql = "SELECT * FROM menu WHERE item_id = 6";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<h3>" . $row["item_name"] . "</h3>";
                            echo "<p>" . $row["price"] . " Pesos</p>";
                        }
                    } else {
                        echo "0 results";
                    }    
                ?>
            </div>
            <div class="product">
            <img src="coffee/Product6.jpg" alt="Product 6">
            <?php
                    $sql = "SELECT * FROM menu WHERE item_id = 7";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<h3>" . $row["item_name"] . "</h3>";
                            echo "<p>" . $row["price"] . " Pesos</p>";
                        }
                    } else {
                        echo "0 results";
                    }    
                ?>
            </div>
            <div class="product">
                <img src="coffee/Product7.jpg" alt="Product 7">
                <?php
                    $sql = "SELECT * FROM menu WHERE item_id = 8";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<h3>" . $row["item_name"] . "</h3>";
                            echo "<p>" . $row["price"] . " Pesos</p>";
                        }
                    } else {
                        echo "0 results";
                    }    
                ?>
            </div>
            <div class="product">
                <img src="coffee/Product8.jpg" alt="Product 8">
                <?php
                    $sql = "SELECT * FROM menu WHERE item_id = 17";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<h3>" . $row["item_name"] . "</h3>";
                            echo "<p>" . $row["price"] . " Pesos</p>";
                        }
                    } else {
                        echo "0 results";
                    }    
                ?>
            </div>
            <div class="product">
                <img src="coffee/Product9.jpg" alt="Product 9">
                <?php
                    $sql = "SELECT * FROM menu WHERE item_id = 18";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<h3>" . $row["item_name"] . "</h3>";
                            echo "<p>" . $row["price"] . " Pesos</p>";
                        }
                    } else {
                        echo "0 results";
                    }    
                ?>
            </div>
            <!-- Insert new product -->
        </div>
    </div>
    
</body>
</html>