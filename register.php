<?php
// Menghubungkan ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users_signup";

$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mobile_or_email = $_POST['mobile_or_email'];
    $full_name = $_POST['full_name'];
    $ussername = $_POST['ussername'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hashing dengan bcrypt

    $sql = "INSERT INTO users (mobile_or_email, full_name, ussername, password)
    VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $mobile_or_email, $full_name, $ussername, $password);

    if ($stmt->execute() === TRUE) {
        echo "Pendaftaran berhasil!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Personal Website</title>
</head>
<body>
    <?php include "page/header.html"?>
    <?php include "page/register.html";?>
    <?php include "page/footer.html";?>

</body>
</html>