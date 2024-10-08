<?php
require_once 'config.php';
require_once 'classes/User.php';

// Koneksi ke database
$database = new Database();
$db = $database->getConnection();

// Proses form destinasi
if (isset($_POST['nama_destinasi'])) {
    $nama_destinasi = $_POST['nama_destinasi'];
    $deskripsi = $_POST['deskripsi'];
    $img = $_FILES['img']['name'];

    // Upload gambar
    move_uploaded_file($_FILES['img']['tmp_name'], 'uploads/' . $img);

    // Query insert data destinasi
    $query = "INSERT INTO destination (nama_destinasi, deskripsi, img, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())";
    $stmt = $db->prepare($query);
    $stmt->bind_param('sss', $nama_destinasi, $deskripsi, $img);

    // Eksekusi query
    if ($stmt->execute()) {
        echo "Data destinasi berhasil disimpan!";
    } else {
        echo "Error: " . $stmt->error;
    }
}

// Proses form hotel
if (isset($_POST['nama_hotel'])) {
    $nama_hotel = $_POST['nama_hotel'];
    $alamat = $_POST['alamat'];

    // Query insert data hotel
    $query = "INSERT INTO hotel (nama_hotel, alamat, created_at, updated_at) VALUES (?, ?, NOW(), NOW())";
    $stmt = $db->prepare($query);
    $stmt->bind_param('ss', $nama_hotel, $alamat);

    // Eksekusi query
    if ($stmt->execute()) {
        echo "Data hotel berhasil disimpan!";
    } else {
        echo "Error: " . $stmt->error;
    }
}

// Proses form transport
if (isset($_POST['nama_transport'])) {
    $nama_transport = $_POST['nama_transport'];

    // Query insert data transport
    $query = "INSERT INTO transport (nama_transport, created_at, updated_at) VALUES (?, NOW(), NOW())";
    $stmt = $db->prepare($query);
    $stmt->bind_param('s', $nama_transport);

    // Eksekusi query
    if ($stmt->execute()) {
        echo "Data transport berhasil disimpan!";
    } else {
        echo "Error: " . $stmt->error;
    }
}

if (isset($_POST['nama_paket'], $_POST['id_hotel'], $_POST['id_destination'], $_POST['id_transport'], $_POST['harga'], $_POST['deskripsi'])) {
    // Ambil data dari form
    $nama_paket = $_POST['nama_paket'];
    $id_hotel = $_POST['id_hotel'];
    $id_destinasi = $_POST['id_destination'];
    $id_transport = $_POST['id_transport'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    // Koneksi ke database
    $database = new Database();
    $db = $database->getConnection();

    // Query untuk insert data ke tabel paket
    $query = "INSERT INTO paket (nama_paket, deskripsi, harga, id_hotel, id_transport, id_destination, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, NOW(), NOW())";
    $stmt = $db->prepare($query);

    // Bind parameter
    $stmt->bind_param('ssiiis', $nama_paket, $deskripsi, $harga, $id_hotel, $id_destinasi, $id_transport, );

    // Eksekusi query
    if ($stmt->execute()) {
        echo "Data paket berhasil disimpan!";
    } else {
        echo "Error: " . $stmt->error;
    }
}
if (isset($_POST['username'], $_POST['password'], $_POST['email'], $_POST['gender'])) {
    // Proses register
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $user = new User($username, $password, $email, $gender);
    if ($user->register($db)) {
        echo "Pendaftaran berhasil!";
    } else {
        echo "Error: Pendaftaran gagal!";
    }
} elseif (isset($_POST['username'], $_POST['password'])) {
    // Proses login
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User($username, $password, null, null);
    if ($user->login($db, $username, $password)) {
        echo "Login berhasil!";
    } else {
        echo "Error: Login gagal!";
    }
}

