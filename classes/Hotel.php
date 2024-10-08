<?php
class Hotel
{
    public $id;
    public $nama_hotel;
    public $alamat;
    public $harga_per_malam;
    public $destination_id;
    public $created_at;
    public $updated_at;

    public function __construct($id, $nama_hotel, $alamat, $harga_per_malam, $destination_id, $created_at, $updated_at)
    {
        $this->id = $id;
        $this->nama_hotel = $nama_hotel;
        $this->alamat = $alamat;
        $this->harga_per_malam = $harga_per_malam;
        $this->destination_id = $destination_id;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function getNamaHotel()
    {
        return $this->nama_hotel;
    }

    public function getHargaPerMalam()
    {
        return $this->harga_per_malam;
    }
}