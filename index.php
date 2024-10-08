<?php
require_once 'classes/Destination.php';
require_once 'classes/Form.php';
require_once 'classes/Hotel.php';
require_once 'classes/Paket.php';
require_once 'classes/Transport.php';
require_once 'classes/User.php';
require_once 'config.php';


echo "<h2>Form Register</h2>";
$form = new Form('db_process.php');
echo $form->openForm();
echo $form->inputText('username', 'Username');
echo $form->inputText('email', 'Email');
echo $form->inputText('password', 'Password');
$optionsGender = ['male' => 'Male', 'female' => 'Female'];
echo $form->inputRadio('gender', 'Gender', $optionsGender);
echo $form->submitButton('Register');
echo $form->closeForm();

echo "<h2>Form Destinasi</h2>";
$form = new Form('db_process.php');
echo $form->openForm();
echo $form->inputText('username', 'Username');
echo $form->inputText('email', 'Email');
echo $form->inputText('password', 'Password');
echo $form->submitButton('Register');
echo $form->closeForm();

echo "<h2>Form Hotel</h2>";
$form = new Form('db_process.php');
echo $form->openForm();
echo $form->inputText('username', 'Username');
echo $form->inputText('email', 'Email');
echo $form->inputText('password', 'Password');
echo $form->submitButton('Register');
echo $form->closeForm();

echo "<h2>Form Transport</h2>";
$form = new Form('db_process.php');
echo $form->openForm();
echo $form->inputText('username', 'Username');
echo $form->inputText('email', 'Email');
echo $form->inputText('password', 'Password');
echo $form->submitButton('Register');
echo $form->closeForm();

$database = new Database();
$db = $database->getConnection();
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
echo $form->inputDropdown('id_destinasi', 'Pilih Destinasi', $optionsDestinasi);

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
