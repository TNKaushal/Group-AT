<?php
// Database connection settings
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password is empty
$dbname = "vogue_ventures2"; // Replace with your actual database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch orders data from the database
$sqlOrders = "SELECT * FROM orders";
$resultOrders = $conn->query($sqlOrders);

// Close the connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders - Admin Panel</title>
    <link rel="stylesheet" href="admin.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            border: 2px solid #ccc;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 12px;
            text-align: left;
            color: #000;    
        }
        th {
            background-color: #f4f4f4;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            text-align: center;
            font-size: 16px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .logo img {
    height: 40px;
}
    </style>
</head>
<body>
    <div class="admin-container">
    <aside class="sidebar">
            <div class="sidebar-header">
            <span class="logo navLogo"><img id="logo" src="img/logotp2.png" alt="Logo"></span>
            </div>
            <ul class="menu">
    <li><a href="admin.php">Dashboard</a></li>
<li><a href="add_product.php">Add Product</a></li>
<li><a href="list_products.php">List Products</a></li>
<li><a href="orders.php">Orders</a></li>
<li><a href="customers.php">Customers</a></li>
<li><a href="logout.php">Logout</a></li>

</ul>

        </aside>

        <main class="main-content">
            <header>
                <h1>Orders</h1>
            </header>
            <section class="content">
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer ID</th>
                            <th>Order Date</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($resultOrders->num_rows > 0): ?>
                            <?php while ($row = $resultOrders->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $row['order_id']; ?></td>
                                    <td><?php echo $row['customer_id']; ?></td>
                                    <td><?php echo $row['order_date']; ?></td>
                                    <td><?php echo $row['total_amount']; ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td>
                                        <a href="edit_order.php?id=<?php echo $row['order_id']; ?>" class="btn">Edit</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6">No orders found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>
</html>