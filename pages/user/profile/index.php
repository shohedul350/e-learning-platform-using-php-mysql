
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../../../css/adminDashboardStyle.css">

    <style>
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        textarea {
            width: 100%;
            height: 100px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <?php  $pageTitle = "Welcome to User Panel!";
    include '../header.php';?>
    <!-- sidebar include -->
    <?php include '../sidebar.php';?>
  

    <div class="container">
       <?php
        // Database connection
        include("../../../database/db_connection.php");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Update bio if form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateBio'])) {
            $newBio = $_POST['newBio'];
            $userId = $userData['id'];

            $sql = "UPDATE users SET bio='$newBio' WHERE id=$userId";

            if ($conn->query($sql) === TRUE) {
                // Refresh user data after update
                $userData = getUserData($userId);
            } else {
                echo "Error updating bio: " . $conn->error;
            }
        }

        // Fetch user data
        $userId = 2; 
        $userData = getUserData($userId);

        // Function to fetch user data
        function getUserData($userId) {
            global $conn;
            $sql = "SELECT * FROM users WHERE id=$userId";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $userData = $result->fetch_assoc();
                return $userData;
            } else {
                return false;
            }
        }

        ?>

      <h1>Welcome, <?php echo $name['name']; ?>!</h1>
        <p>Email: <?php echo $email['email']; ?></p>

        <h2>Update Bio</h2>
        <form method="post" action="">
        <input type="text" name="name" >
        <input type="email" name="email" >
            <input type="submit" name="updateBio" value="Update Profile">
        </form> 
    </div>

    </body>
</html>