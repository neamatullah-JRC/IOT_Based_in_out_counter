<?php
require 'dbconfig.php';

// Handle add device form submission
if (isset($_POST["add_device"])) {
    $did = $_POST["did"];
    $user_name = $_POST["user_name"];
    $password = $_POST["password"];

    $sql1 = "INSERT INTO counter (did, username, password) VALUES ('$did', '$user_name', '$password')";
    if ($conn->query($sql1) === TRUE) {
        echo "user added successfully";
       

    } else {
        echo "Error adding user: " . $conn->error;
    }
    }

// Handle remove device form submission
if (isset($_POST["remove_device"])) {
    $did = $_POST["did"];
    $sql = "DELETE FROM users WHERE id=$device_id";
    if ($conn->query($sql) === TRUE) {
        echo "Device removed successfully";
    } else {
        echo "Error removing device: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Device Manager</title>
</head>
<body>
    <h1>Device Manager</h1>

    <h2>Add Device</h2>
    <form method="post">
        <label for="did">DID:</label>
        <input type="text" name="did" required>
        <br>
        <label for="user_name">USER NAME:</label>
        <input type="text" name="user_name" required>
        <br>
        <label for="password">PASSWORD:</label>
        <input type="text" name="password" required>
        <br>
        <input type="submit" name="add_device" value="Add Device">
    </form>

    <h2>Remove Device</h2>
    <form method="post">
        <label for="did">DID:</label>
        <input type="number" name="did" required>
        <br>
        <input type="submit" name="remove_device" value="Remove Device">
          <?php include_once('usersdata.php'); ?>

    </form>
</body>
</html>
