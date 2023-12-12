
<?php
// Database connection
include("../../../database/db_connection.php");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// CRUD Operations Start

// Create
if (isset($_POST['add_category'])) {
    $category_name = $_POST['category_name'];
    $sql = "INSERT INTO categories (name) VALUES ('$category_name')";
    $conn->query($sql);
}

// Read
$result = $conn->query("SELECT * FROM categories");

$count =   $conn->query("SELECT COUNT(*) FROM categories");
// Update not used
if (isset($_POST['update_category'])) {
    $category_id = $_POST['category_id'];
    $new_name = $_POST['new_name'];
    $sql = "UPDATE categories SET name='$new_name' WHERE id=$category_id";
    $conn->query($sql);
}

// Delete
if (isset($_GET['delete_category'])) {
    $delete_id = $_GET['delete_category'];
    $sql = "DELETE FROM categories WHERE id=$delete_id";
    $conn->query($sql);
    if ($conn->query($sql) === TRUE) {
        header("Location: /pages"); 
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
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

    <h2>Categories</h2>

<!-- Add Category Form -->
<form method="POST" action="">
    <label for="category_name">Category Name:</label>
    <input type="text" name="category_name" required>
    <button type="submit" name="add_category">Add Category</button>
</form>

<!-- Display Categories -->
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    <?php
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] .  "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>
                <a href='index.php?delete_category=" . $row['id'] . "'>Delete</a>
            </td>";
        echo "</tr>";
    }
    ?>
</table>

</div>
</body>
</html>