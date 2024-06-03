<?php
session_start();

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
    $ussername = $_POST['ussername'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE ussername = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $ussername);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Memverifikasi password
        if (password_verify($password, $user['password'])) {
            $_SESSION['ussername'] = $user['ussername'];
            $_SESSION['full_name'] = $user['full_name'];
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Password salah.";
        }
    } else {
        echo "Nama pengguna tidak ditemukan.";
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
    <title>Login - Personal Website</title>
</head>
<body>
<?php include "page/header.html";?>
<?php include "page/login.html";?>
<?php include "page/footer.html";?>
</body>
</html>