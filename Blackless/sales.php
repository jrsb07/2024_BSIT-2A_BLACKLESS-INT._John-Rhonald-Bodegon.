<?php

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "blackless(2)";
$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

session_start();

if ($_SESSION['user_type'] != 'A') {
    header("location: login.php");
}

// Fetch data for reports
$today = date('Y-m-d');
$yesterday = date('Y-m-d', strtotime('-1 day'));
$this_year = date('Y');
$last_year = date('Y', strtotime('-1 year'));

// Total sales today
$sql_sales_today = "SELECT SUM(price) AS total_sales_today FROM orders WHERE time_ordered= '$today'";
$result_sales_today = mysqli_query($conn, $sql_sales_today);
$total_sales_today = mysqli_fetch_assoc($result_sales_today)['total_sales_today'] ?? 0;

// Total sales yesterday
$sql_sales_yesterday = "SELECT SUM(price) AS total_sales_yesterday FROM orders WHERE time_ordered = '$yesterday'";
$result_sales_yesterday = mysqli_query($conn, $sql_sales_yesterday);
$total_sales_yesterday = mysqli_fetch_assoc($result_sales_yesterday)['total_sales_yesterday'] ?? 0;

// Sales this year
$sql_sales_this_year = "SELECT SUM(price) AS total_sales_this_year FROM orders WHERE YEAR(time_ordered) = '$this_year'";
$result_sales_this_year = mysqli_query($conn, $sql_sales_this_year);
$total_sales_this_year = mysqli_fetch_assoc($result_sales_this_year)['total_sales_this_year'] ?? 0;

// Sales last year
$sql_sales_last_year = "SELECT SUM(price) AS total_sales_last_year FROM orders WHERE YEAR(time_ordered) = '$last_year'";
$result_sales_last_year = mysqli_query($conn, $sql_sales_last_year);
$total_sales_last_year = mysqli_fetch_assoc($result_sales_last_year)['total_sales_last_year'] ?? 0;

// Top 10 items
$sql_top_items = "SELECT m.item_name, SUM(item_qty) AS total_quantity 
                  FROM orders AS oi
                  JOIN menu AS m ON oi.item_id = m.item_id
                  GROUP BY oi.item_id
                  ORDER BY total_quantity DESC
                  LIMIT 10";
$result_top_items = mysqli_query($conn, $sql_top_items);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - Business Summary</title>
    <link rel="stylesheet" href="Style/sales.css">
</head>
<body>

    <a href="admin.php">Go Back</a>
    <div class="report-section">
        <h2>Sales Report</h2>
        <table id="table_one">
            <tr>
                <th>Metric</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>Total Sales Today</td>
                <td><?php echo "Php " . number_format($total_sales_today, 2); ?></td>
            </tr>
            <tr>
                <td>Total Sales Yesterday</td>
                <td><?php echo "Php " . number_format($total_sales_yesterday, 2); ?></td>
            </tr>
            <tr>
                <td>Total Sales This Year</td>
                <td><?php echo "Php " . number_format($total_sales_this_year, 2); ?></td>
            </tr>
            <tr>
                <td>Total Sales Last Year</td>
                <td><?php echo "Php " . number_format($total_sales_last_year, 2); ?></td>
            </tr>
        </table>
    </div>

    <div class="report-section">
        <h3>Top 10 Items</h3>
        <table id="table_two">
            <tr>
                <th>Item Name</th>
                <th>Quantity Sold</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result_top_items)) { ?>
            <tr>
                <td><?php echo $row['item_name']; ?></td>
                <td><?php echo $row['total_quantity']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>


</body>
</html>