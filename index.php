<?php
require_once 'classes/Destination.php';
require_once 'classes/Hotel.php';
require_once 'classes/Transport.php';
require_once 'classes/Paket.php';
require_once 'classes/Form.php';
require_once 'config.php';

// Buat instance dari class Database dan dapatkan koneksi
$database = new Database();
$db = $database->getConnection();

// Periksa apakah koneksi berhasil
if ($db) {
    
} else {
    echo "Koneksi ke database gagal!";
}

// // Contoh penggunaan class
// $destination = new Destination(1, "Pantai Kuta", "Pantai indah di Bali", "Bali", 50000, "image.jpg", "2024-01-01", "2024-01-02");
// $hotel = new Hotel(1, "Hotel Bali Indah", "Jl. Sunset Road", 300000, 1, "2024-01-01", "2024-01-02");
// $transport = new Transport(1, "Bus Bali", "bis", 100000, 1, "2024-01-01", "2024-01-02");

// $paket = new Paket(
//     1,
//     $destination->getNamaDestinasi(),
//     $destination->deskripsi,
//     $destination->lokasi,
//     $destination->getHTM(),
//     $destination->image,
//     $destination->created_at,
//     $destination->updated_at,
//     "Paket Liburan Bali",
//     "Liburan lengkap ke Bali",
//     0,
//     $hotel->id,
//     $transport->id
// );

// $harga_total = $paket->hitungHargaTotal($transport->getBiaya(), $hotel->getHargaPerMalam());
// echo "Nama Paket: " . $paket->getNamaPaket() . "<br>";
// echo "Harga Total: Rp" . $harga_total;

// Form Register
echo "<h2>Form Register Akun</h2>";
$form = new Form('db_process.php');
echo $form->openForm();
echo $form->inputText('username', 'Username');
echo $form->inputText('email', 'Email');
echo $form->inputPassword('password', 'Password');
$optionsGender = ['male' => 'Male', 'female' => 'Female'];
echo $form->inputRadio('gender', 'Gender', $optionsGender);
echo $form->submitButton('Register');
echo $form->closeForm();


echo "<h2>FORM Destinasi!</h2>";
$form = new Form('db_process.php');

echo $form->openForm();
echo $form->inputText('nama_destinasi', 'Nama Destinasi');
echo $form->inputTextarea('deskripsi', 'Deskripsi');
echo $form->inputFile('img', 'Gambar');
echo $form->submitButton('Submit');
echo $form->closeForm();

echo "<h2>FORM Hotel!</h2>";
$form = new Form('db_process.php');

echo $form->openForm();
echo $form->inputText('nama_hotel', 'Nama Hotel');
echo $form->inputTextarea('alamat', 'Alamat');
echo $form->submitButton('Submit');
echo $form->closeForm();

echo "<h2>FORM Transport!</h2>";
$form = new Form('db_process.php');

echo $form->openForm();
echo $form->inputText('nama_transport', 'Nama Transport');
echo $form->submitButton('Submit');
echo $form->closeForm();


echo "<h2>FORM Paket!</h2>";
// Ambil data untuk dropdown
$hotels = $database->getHotels();
$destinations = $database->getDestinations();
$transports = $database->getTransports();

// Membuat objek form
$form = new Form('db_process.php');

echo $form->openForm();
echo $form->inputText('nama_paket', 'Nama Paket');
// Dropdown untuk hotel
$optionsHotel = [];
foreach ($hotels as $hotel) {
    $optionsHotel[$hotel['id']] = $hotel['nama_hotel'];
}
echo $form->inputDropdown('id_hotel', 'Pilih Hotel', $optionsHotel);

// Dropdown untuk destinasi
$optionsDestinasi = [];
foreach ($destinations as $destination) {
    $optionsDestinasi[$destination['id']] = $destination['nama_destinasi'];
}
echo $form->inputDropdown('id_destination', 'Pilih Destinasi', $optionsDestinasi);

// Dropdown untuk transport
$optionsTransport = [];
foreach ($transports as $transport) {
    $optionsTransport[$transport['id']] = $transport['nama_transport'];
}
echo $form->inputDropdown('id_transport', 'Pilih Transport', $optionsTransport);

// Input untuk harga dan deskripsi
echo $form->inputText('harga', 'Harga');
echo $form->inputTextarea('deskripsi', 'Deskripsi');

echo $form->submitButton('Submit');
echo $form->closeForm();



