<?php 
class User
{
    private $username;
    private $password;
    private $email;
    private $gender;

    public function __construct($username, $password, $email, $gender)
    {
        $this->username = $username;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->email = $email;
        $this->gender = $gender;
    }

    public function register($db)
    {
        $query = "INSERT INTO user (username, password, email, gender) VALUES (?, ?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param('ssss', $this->username, $this->password, $this->email, $this->gender);
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


?>