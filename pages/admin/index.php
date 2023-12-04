<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../../css/adminDashboardStyle.css">
</head>
<body>
    <?php  $pageTitle = "Welcome to Admin Panel!";
    include './header.php';?>
    <!-- sidebar include -->
    <?php include './sidebar.php';?>
    <div class="content">
    <div class="info-card">
            <h3>Total Users</h3>
            <p>15</p>
        </div>

    <div class="info-card">
            <h3>Total Courses</h3>
            <p>120</p>
        </div>

        <div class="info-card">
            <h3>Total Categories</h3>
            <p>15</p>
        </div>
        <!-- Your main content goes here -->
        <h2>Welcome to the Admin Dashboard</h2>
        <p>This is where you can manage courses, categories, and more.</p>
    </div>
    </body>
</html>