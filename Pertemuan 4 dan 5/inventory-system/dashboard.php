<?php
include 'includes/connection.php';

// Fetch users
$stmt = $pdo->query("SELECT * FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch stock
$stmt = $pdo->query("SELECT * FROM stock");
$stock = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch purchases
$stmt = $pdo->query("SELECT * FROM purchases");
$purchases = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Calculate stats
$total_users = count($users);
$active_users = count(array_filter($users, fn($user) => $user['status'] == 'ACTIVE'));
$inactive_users = $total_users - $active_users;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KANDI Inventory - Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="header">
        <h1>KANDI Inventory</h1>
        <div class="user-info">
            <img src="assets/images/user-icon.png" alt="User Icon">
            <span>SUPERADMIN</span>
        </div>
    </div>

    <div class="sidebar">
        <ul>
            <li>Dashboard</li>
            <li>User Management</li>
            <li>General Settings</li>
            <li>People</li>
            <li>Product</li>
            <li>Purchase</li>
            <li>Sales</li>
            <li>Stock</li>
            <li>Reports</li>
        </ul>
    </div>

    <div class="main-content">
        <div class="stats">
            <div class="stat-box blue">
                <h3><?php echo $total_users; ?></h3>
                <p>TOTAL USERS</p>
                <small>MORE INFO</small>
            </div>
            <div class="stat-box green">
                <h3><?php echo $active_users; ?></h3>
                <p>ACTIVE USERS</p>
                <small>MORE INFO</small>
            </div>
            <div class="stat-box orange">
                <h3><?php echo $inactive_users; ?></h3>
                <p>INACTIVE USERS</p>
                <small>MORE INFO</small>
            </div>
            <div class="stat-box red">
                <h3>1</h3>
                <p>TOTAL EMPLOYEES</p>
                <small>MORE INFO</small>
            </div>
        </div>

        <div class="invoice-sales">
            <div class="box blue">
                <h3>TODAY INVOICES</h3>
                <p>0 INVOICE</p>
            </div>
            <div class="box red">
                <h3>THIS MONTH INVOICES</h3>
                <p>0</p>
            </div>
            <div class="box green">
                <h3>TODAY SALES</h3>
                <p>0</p>
            </div>
            <div class="box orange">
                <h3>THIS MONTH SALES</h3>
                <p>0</p>
            </div>
        </div>

        <div class="tables">
            <div class="table-container">
                <h3>Users List</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Group</th>
                            <th>Status</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($user['username']); ?></td>
                                <td><?php echo htmlspecialchars($user['user_group']); ?></td>
                                <td><span class="status-active"><?php echo htmlspecialchars($user['status']); ?></span></td>
                                <td><?php echo htmlspecialchars($user['created_date']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="table-container">
                <h3>Employee Searching</h3>
                <input type="text" id="employeeSearch" class="search-bar" placeholder="Search Employee Details" onkeyup="searchEmployees()">
                <table id="employeeTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data will be filtered by JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tables">
            <div class="table-container">
                <h3>Stock Report</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Name</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($stock as $item): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($item['item']); ?></td>
                                <td><?php echo htmlspecialchars($item['name']); ?></td>
                                <td><?php echo number_format($item['price'], 2); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="table-container">
                <h3>Latest Purchases</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Purchase ID</th>
                            <th>Vendor</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Purchase Total</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($purchases as $purchase): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($purchase['id']); ?></td>
                                <td><?php echo htmlspecialchars($purchase['vendor']); ?></td>
                                <td><?php echo htmlspecialchars($purchase['purchase_date']); ?></td>
                                <td><span class="status-pending"><?php echo htmlspecialchars($purchase['status']); ?></span></td>
                                <td>Rs. <?php echo number_format($purchase['total'], 2); ?></td>
                                <td><button class="view-btn">View Purchase</button></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="assets/js/script.js"></script>
</body>
</html>
