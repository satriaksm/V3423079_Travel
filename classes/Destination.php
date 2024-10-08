<?php 
class Destination
{
    public $id;
    public $nama_destinasi;
    public $deskripsi;
    public $lokasi;
    public $htm;
    public $image;
    public $created_at;
    public $updated_at;

    public function __construct($id, $nama_destinasi, $deskripsi, $lokasi, $htm, $image, $created_at, $updated_at)
    {
        $this->id = $id;
        $this->nama_destinasi = $nama_destinasi;
        $this->deskripsi = $deskripsi;
        $this->lokasi = $lokasi;
        $this->htm = $htm;
        $this->image = $image;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function getNamaDestinasi()
    {
        return $this->nama_destinasi;
    }

    public function getHTM()
    {
        return $this->htm;
    }

    // Method lainnya bisa ditambahkan sesuai kebutuhan
}
