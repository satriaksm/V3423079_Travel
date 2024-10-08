<?php
class Database
{
    private $host = "localhost";      // Nama host server database (misalnya: localhost)
    private $db_name = "buzjet"; // Nama database (ganti dengan nama database kamu)
    private $username = "root";       // Username database (biasanya root untuk lokal)
    private $password = "";           // Password database (biasanya kosong di localhost)
    public $conn;

    // Fungsi untuk membuat koneksi ke database menggunakan MySQLi
    public function getConnection()
    {
        // Membuat koneksi MySQLi
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);

        // Periksa apakah koneksi berhasil
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        return $this->conn;
    }

    public function getHotels() {
        $query = "SELECT id, nama_hotel FROM hotel";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getDestinations() {
        $query = "SELECT id, nama_destinasi FROM destination";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getTransports() {
        $query = "SELECT id, nama_transport FROM transport";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

}
