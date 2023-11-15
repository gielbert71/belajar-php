<?php
class RegistUser {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function registerUser($name, $no_hp, $email, $password) {
        $conn = $this->db->getConnection();

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $check_query = "SELECT * FROM users WHERE phone_number='$no_hp' OR email='$email'";
        $result = $conn->query($check_query);

        if ($result->num_rows > 0) {
            return "Nomor HP atau Email telah terdaftar sebelumnya.";
        } else {
            $insert_query = "INSERT INTO users (name, username, phone_number, email, password, group_id) VALUES ('$name', '$no_hp', '$no_hp', '$email', '$hashed_password', '3')";

            if ($conn->query($insert_query) === TRUE) {
                return "Registrasi berhasil";
            } else {
                return "Error: " . $insert_query . "<br>" . $conn->error;
            }
        }
    }
}
?>
