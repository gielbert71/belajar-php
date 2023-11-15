<?php
class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function login($username, $password) {
        $conn = $this->db->getConnection();
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($query);

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            $hashed_password = $user['password'];

            if (password_verify($password, $hashed_password)) {
                session_start();
                $_SESSION["user_authenticated"] = true;
                $_SESSION["username"] = $username;
                header("Location: dashboard.php");
                exit();
            } else {
                $pesanerror = "Username atau password anda salah.";
            }
        } else {
            $pesanerror = "User tidak ditemukan.";
        }
        return $pesanerror;
    }
}
?>
