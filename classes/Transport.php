<?php
class Transport
{
    public $id;
    public $nama_transport;
    public $tipe_transport;
    public $biaya;
    public $destination_id;
    public $created_at;
    public $updated_at;

    public function __construct($id, $nama_transport, $tipe_transport, $biaya, $destination_id, $created_at, $updated_at)
    {
        $this->id = $id;
        $this->nama_transport = $nama_transport;
        $this->tipe_transport = $tipe_transport;
        $this->biaya = $biaya;
        $this->destination_id = $destination_id;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function getNamaTransport()
    {
        return $this->nama_transport;
    }

    public function getBiaya()
    {
        return $this->biaya;
    }
}