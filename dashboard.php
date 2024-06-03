<?php
session_start();

if (!isset($_SESSION['ussername'])) {
    header("Location: login.php");
    exit();
}

$full_name = $_SESSION['full_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="layout/dashboard.css">
    <title>Dashboard</title>
</head>
<body>
    <h1>Selamat datang, <?php echo htmlspecialchars($full_name); ?>!</h1>
    <p>Anda berhasil masuk ke dashboard.</p>
    <a href="logout.php">Logout</a>
</body>
</html>