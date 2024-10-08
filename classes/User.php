<?php
class User
{
    private $id;
    private $username;
    private $password;
    private $email;
    private $gender;
    private $created_at;
    private $updated_at;

    public function __construct($username, $password, $email, $gender)
    {
        $this->username = $username;
        $this->password = password_hash($password, PASSWORD_DEFAULT); // Hash password
        $this->email = $email;
        $this->gender = $gender;
        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = date('Y-m-d H:i:s');
    }

    public function register($db)
    {
        $query = "INSERT INTO user (username, password, email, gender, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param('ssssss', $this->username, $this->password, $this->email, $this->gender, $this->created_at, $this->updated_at);
        return $stmt->execute();
    }

    public function login($db, $username, $password)
    {
        $query = "SELECT * FROM user WHERE username = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                // Login sukses, lakukan sesi atau pengaturan lainnya
                return true;
            }
        }
        return false;
    }
}
