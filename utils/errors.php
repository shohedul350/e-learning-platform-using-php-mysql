<?php
session_start();
if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']); // Clear the errors from the session
    // Now you can display the errors as needed
    foreach ($errors as $error) {
        echo $error . '<br>';
    }
}
?>