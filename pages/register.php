<?php
include('Database.php');
include('RegistUser.php');

$db = new Database();
$userRegistration = new RegistUser($db);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["nama"];
    $no_hp = $_POST["no_hp"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $pesanerror = $userRegistration->registerUser($name, $no_hp, $email, $password);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <div class="login-container">
        <div class="login-box">
            <video controls autoplay="true" loop>
                <source src="../assets/videos/video1.mp4" type="video/mp4" /><br>
                Browsermu tidak mendukung tag ini, aowkoawkoawk.
            </video>
            <h2 style="color: white;">Register</h2>
            <form action="register.php" method="post">
                <div class="input-container">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" required>
                </div>
                <div class="input-container">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" required>
                </div>
                <div class="input-container">
                    <label for="no_hp">Nomor HP</label>
                    <input type="text" id="no_hp" name="no_hp" required>
                </div>
                <div class="input-container">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="login-button">Register</button>
            </form><br>
            <?php
            if (isset($pesanerror)){
                echo '<p>'.$pesanerror.'</p>';
            }
            ?>
            <img src="../assets/images/image1.png" alt="gambar">
        </div>
    </div>
</body>

</html>