<?php
class Perizinan_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_kbm()
    {
        $result = $this->db->get('tbl_kbm');
        return $result;
    }

    public function get_status_konfirmasi()
    {
        $this->db->select('konfirmasiBK, konfirmasiWakel');
        $this->db->from('tbl_perizinan');
        $result = $this->db->get();
        return $result;
    }

    public function get_izin()
    {
        $result = $this->db->get('tbl_perizinan');
        return $result->row();
    }

}