<?php
session_start();
$usernamevalid = "gielbert";
$passwordvalid = "password2324";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    if ($username === $usernamevalid && $password === $passwordvalid) {
        $_SESSION["user_authenticated"] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        $pesanerror = "Username atau password anda salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <div class="login-container">
        <div class="login-box">
            <video controls autoplay="true" loop>
                <source src="../assets/videos/video1.mp4" type="video/mp4" /><br>
                Browsermu tidak mendukung tag ini, aowkoawkoawk.
            </video>
            <h2 style="color: white;">Login</h2>
            <form action="login.php" method="post">
                <div class="input-container">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="input-container">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="login-button">Login</button>
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

</html>