
<?php
// Database connection
include("../../../database/db_connection.php");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// CRUD Operations Start
// Read
$result = $conn->query("SELECT * FROM users");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../../../css/adminDashboardStyle.css">
    <link rel="stylesheet" type="text/css" href="../../../css/category.css">
</head>
<body>
    <!-- header include -->
    <?php  $pageTitle = "";
    include '../header.php';?>
    <!-- sidebar include -->
    <?php include '../sidebar.php';?>
    <div class="content">

    <h2>Users</h2>


<!-- Display Categories -->
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Action</th>
    </tr>
    <?php
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['role'] . "</td>";
        if ($row['role'] !== 'admin') {
          echo "<td>
                  <a href='index.php?block=" . $row['id'] . "'>Block</a>
              </td>";
      } else {
          // If the role is 'admin', you can display something else or leave it empty
          echo "<td>No Action</td>";
      }
    }
    ?>
</table>

</div>
</body>
</html>