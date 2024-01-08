
<?php
// Database connection
include("../../../database/db_connection.php");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// CRUD Operations Start

$name = null;
$btnTitle = 'Insert';

// Create
if (isset($_POST['add_category'])) {
    $category_name = $_POST['category_name'];
    $sql = "INSERT INTO categories (name) VALUES ('$category_name')";
    $conn->query($sql);
}





// Delete
if (isset($_GET['delete_category'])) {
    $delete_id = $_GET['delete_category'];
    $sql = "DELETE FROM categories WHERE id=$delete_id";
    $conn->query($sql);
    if ($conn->query($sql) === TRUE) {
        header("Location: /elearning/pages/admin/categories/index.php"); 
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}



if (isset($_GET["edit_category"])) {
    $eid = $_GET['edit_category'];
    $sql = $conn->query("SELECT * FROM `categories` WHERE `id` = '$eid'");
    if ($sql->num_rows > 0) {
        while ($result = mysqli_fetch_assoc($sql)) {
            $id = $result['id'];
            $name = $result['name'];
            $btnTitle = "Update";
        }
    }
}

if (isset($_POST["Update"])) {
    $errors = array();
    echo $id = $_POST['id'];
    echo $name = $_POST['category_name'];

    if (empty($name)) {
        $errors['name'] = "Name is required";
    }
    $sql = $conn->query("UPDATE `categories` SET `name` = '$name' WHERE `id` = '$id'");
    if ($sql === TRUE) {
        header("Location: /elearning/pages/admin/categories/index.php"); 
    } else {
        echo "Error updating record: " . $conn->error;
    }
}


// Read
if(isset($_GET['src'])){
    $src = $_GET['src'];
    $result = $conn->query("SELECT * FROM categories WHERE `name` LIKE '%$src%'");
}
else{
    $result = $conn->query("SELECT * FROM categories");
}

$count =   $conn->query("SELECT COUNT(*) FROM categories");


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
<input type="text" name="id" value="<?php  echo $id ?>" hidden>
    <label for="category_name">Category Name:</label>
    <input type="text" name="category_name" required  value="<?php  echo $name ?>" >
    <button type="submit" name="<?php echo $btnTitle ?>"> <?php echo $btnTitle ?></button>
</form>

<!-- search section -->
<form action="" method="get">
    <input type="text" name="src" placeholder="Search....">
    <button type="submit">Search</button>
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
            <span>
            <a href='index.php?delete_category=" . $row['id'] . "' 
            style='color: red; text-decoration: none; margin-right: 10px;'>
            Delete</a>

            <a href='index.php?edit_category=" . $row['id'] . "' 
            style='color: red; text-decoration: none; margin-right: 10px;'>
            Edit</a>
            </td>";
        echo "</tr>";
    }
    ?>
</table>

</div>
</body>
</html>