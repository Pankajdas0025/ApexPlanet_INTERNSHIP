<?php
include 'src/db.php';
include 'src/config.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the reset username from GET safely
$reset_username = isset($_GET['username']) ? trim($_GET['username']) : '';

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['update'])) {

    // Get POST values safely
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $newPassword = isset($_POST['new_password']) ? $_POST['new_password'] : '';

    // Basic validation
    if (trim($username) !== trim($reset_username)) {
    echo '<script>
            alert("❌ Invalid username. Please try again.");
            window.history.back();
          </script>';
    exit();
}


   if (strlen($newPassword) < 6) { // Minimum password length
    echo "<script>
            alert('❌ Password must be at least 6 characters long.');
            window.history.back(); // go back to the same form
          </script>";
    exit();
}

    // Hash the password securely
    $hash = password_hash($newPassword, PASSWORD_BCRYPT);

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("UPDATE users SET password=? WHERE email=?");
    $stmt->bind_param("ss", $hash, $username);

    if ($stmt->execute()) {
        echo "<script>alert('✅ Password updated successfully!'); window.location.href='register#';</script>";
    } else {
        echo "<script>alert('❌ Failed to update password. Please try again later.');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>
   <!--favicon ------------------------------------------------------------------------------>
<link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
<link rel="manifest" href="favicon_io/site.webmanifest">

<!-- CSs link -->
<link rel="stylesheet" href="Style/Authentication.css" type="text/css">

<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

<!-- cdn JQUARY -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
    <div class="box">
        <h2 class="sh">Update Password🔐</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Enter Username" value="<?= $reset_username ?>" required readonly>
            <input type="password" name="new_password" placeholder="Enter New Password" required>
            <input type="submit" name="update"  value="Update Password" style="background-color: rgb(156, 231, 156);">
        </form>
   <div class='msg'></div>
    </div>
</body>
</html>
