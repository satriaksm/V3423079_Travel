<?php
require_once 'Destination.php';
require_once 'Hotel.php';
require_once 'Transport.php';

class Paket extends Destination
{
    public $nama_paket;
    public $deskripsi;
    public $harga_total;
    public $hotel_id;
    public $transport_id;
    public $rating;
    public $ulasan;
    public $total_pembelian;

    public function __construct(
        $id,
        $nama_destinasi,
        $deskripsi_destinasi,
        $lokasi,
        $htm,
        $image,
        $created_at,
        $updated_at,
        $nama_paket,
        $deskripsi,
        $harga_total,
        $hotel_id,
        $transport_id,
        $rating = 0,
        $ulasan = 0,
        $total_pembelian = 0
    ) {
        parent::__construct($id, $nama_destinasi, $deskripsi_destinasi, $lokasi, $htm, $image, $created_at, $updated_at);
        $this->nama_paket = $nama_paket;
        $this->deskripsi = $deskripsi;
        $this->harga_total = $harga_total;
        $this->hotel_id = $hotel_id;
        $this->transport_id = $transport_id;
        $this->rating = $rating;
        $this->ulasan = $ulasan;
        $this->total_pembelian = $total_pembelian;
    }

    public function hitungHargaTotal($hargaTransport, $hargaHotel)
    {
        $this->harga_total = $this->getHTM() + $hargaTransport + $hargaHotel;
        return $this->harga_total;
    }

    public function getNamaPaket()
    {
        return $this->nama_paket;
    }

    // Method lainnya bisa ditambahkan sesuai kebutuhan
}
