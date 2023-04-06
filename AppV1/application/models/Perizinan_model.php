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

    public function get_verifikasi_izin($uuid)
    {
        $this->db->select('konfirmasiBK, konfirmasiWakel');
        $this->db->from('tbl_perizinan');
        $this->db->where('uuid', $uuid);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $result = $this->db->get()->row();
        return $result;
    }

    public function get_status_konfirmasi()
    {
        $uuid = $this->session->userdata('user_uuid');
        $this->db->select('konfirmasiBK, konfirmasiWakel');
        $this->db->from('tbl_perizinan');
        $this->db->where('uuid', $uuid);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $result = $this->db->get()->row();
        return $result;
    }

    public function get_all_izin()
    {
        $this->db->select('*');
        $this->db->from('tbl_perizinan');
        $this->db->order_by('id', 'DESC');
        $result = $this->db->get()->result();
        // $result = $this->db->get('tbl_perizinan');
        return $result;
    }

    public function get_all_izin_bk()
    {
        $this->db->select('*');
        $this->db->from('tbl_perizinan');
        $this->db->where('konfirmasiBK', 0);
        $this->db->order_by('id', 'DESC');
        $result = $this->db->get()->result();
        // $result = $this->db->get('tbl_perizinan');
        return $result;
    }

    public function get_all_izin_wakel()
    {
        $this->db->select('*');
        $this->db->from('tbl_perizinan');
        $this->db->where('konfirmasiWakel', 0);
        $this->db->order_by('id', 'DESC');
        $result = $this->db->get()->result();
        // $result = $this->db->get('tbl_perizinan');
        return $result;
    }

    public function get_izin($uuid)
    {
        $this->db->select('*');
        $this->db->from('tbl_perizinan');
        $this->db->where('uuid', $uuid);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $result = $this->db->get()->row();
        // $result = $this->db->get('tbl_perizinan');
        return $result;
    }

    public function update_confirmation($id)
    {
        if ($this->session->userdata('user_role') == "bk") {
            $this->db->set('konfirmasiBK', '1');
        } elseif ($this->session->userdata('user_role') == "wali_kelas") {
            $this->db->set('konfirmasiWakel', '1');
        }
        $this->db->where('id', $id);
        $this->db->update('tbl_perizinan');
    }

    public function reject_confirmation($id)
    {
        $this->db->set('reject', '1');
        $this->db->where('id', $id);
        $this->db->update('tbl_perizinan');
    }
}