<?php
class Perizinan_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add_izin($uuid, $waktuMulai, $waktuSelesai, $alasan)
    {
        $data = array(
            'uuid' => $uuid,
            'waktuMulai' => $waktuMulai,
            'waktuSelesai' => $waktuSelesai,
            'alasan' => $alasan,
            'konfirmasiBK' => '0',
            'konfirmasiWakel' => '0',
            'waktuKeluar' => '2023-04-30 11:52:20.000000',
            'waktuMasuk' => '2023-04-30 11:52:20.000000',
            'reject' => '0',
            'createdAt' => date('Y-m-d H:i:s')
        );

        if ($this->db->insert('tbl_perizinan', $data)) {
            // Registrasi berhasil
            return true;
        } else {
            // Registrasi gagal
            return false;
        }


    }

    public function get_kbm()
    {
        $result = $this->db->get('tbl_kbm');
        return $result;
    }


    public function get_kelas()
    {
        $result = $this->db->get('tbl_kelas');
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

    public function get_status_konfirmasi($id)
    {

        $this->db->select('*, P.id AS "perizinan_id"');
        $this->db->from('tbl_perizinan P');
        $this->db->join('tbl_users U', 'P.uuid = U.uuid');
        $this->db->where('P.id', $id);

        // $this->db->select('*');
        // $this->db->from('tbl_perizinan');
        // $this->db->where('id', $id);
        // $this->db->order_by('id', 'DESC');
        // $this->db->limit(1);
        $result = $this->db->get()->row();
        return $result;
    }

    public function get_all_izin($uuid)
    {
        $this->db->select('*');
        $this->db->from('tbl_perizinan');
        $this->db->where('uuid', $uuid);
        $this->db->order_by('id', 'DESC');
        $result = $this->db->get()
        ;
        // $result = $this->db->get('tbl_perizinan');
        return $result;
    }

    public function get_all_izin_bk($rowno, $rowperpage, $search = "")
    {
        $this->db->select('*');
        $this->db->from('tbl_perizinan');

        // $this->db->like('nama', $search);
        $this->db->order_by('id', 'DESC');
        $result = $this->db->limit($rowperpage, $rowno)->get();
        // $result = $this->db->get('tbl_perizinan');


        return $result;
    }
    public function get_all_izin_bk_unread($rowno, $rowperpage, $search = "")
    {
        $this->db->select('*');
        $this->db->from('tbl_perizinan');

        $this->db->where('konfirmasiBK', 0);
        // $this->db->like('nama', $search);
        $this->db->order_by('id', 'DESC');
        $result = $this->db->limit($rowperpage, $rowno)->get();
        // $result = $this->db->get('tbl_perizinan');


        return $result;
    }

    public function get_all_izin_wakel($uuid, $rowno, $rowperpage, $search = "")
    {
        // $this->db->select('*');
        // $this->db->from('tbl_perizinan as P');
        // $this->db->join('tbl_siswa as S', 'P.uuid = S.uuid');
        // $this->db->join('tbl_wali_kelas as W', 'W.kelas = S.kelas');
        // $this->db->where('W.uuid', $uuid);

        // $result = $this->db->get();

        // $this->db->select('*');
        // $this->db->from('tbl_perizinan');
        // $this->db->where('konfirmasiWakel', 0);
        // $this->db->order_by('id', 'DESC');
        // $result = $this->db->get()->result();
        // $result = $this->db->get('tbl_perizinan');


        $result = $this->db->query('SELECT * FROM tbl_perizinan P, tbl_wali_kelas W, tbl_siswa S WHERE W.kelas = S.kelas AND P.uuid = S.uuid AND W.uuid = "' . $uuid . '"ORDER BY id DESC LIMIT ' . $rowno . ' , ' . $rowperpage . ';');

        return $result;
    }
    public function get_all_izin_wakel_unread($uuid, $rowno, $rowperpage, $search = "")
    {
        // $this->db->select('*');
        // $this->db->from('tbl_perizinan as P');
        // $this->db->join('tbl_siswa as S', 'P.uuid = S.uuid');
        // $this->db->join('tbl_wali_kelas as W', 'W.kelas = S.kelas');
        // $this->db->where('W.uuid', $uuid);

        // $result = $this->db->get();

        // $this->db->select('*');
        // $this->db->from('tbl_perizinan');
        // $this->db->where('konfirmasiWakel', 0);
        // $this->db->order_by('id', 'DESC');
        // $result = $this->db->get()->result();
        // $result = $this->db->get('tbl_perizinan');


        $result = $this->db->query('SELECT * FROM tbl_perizinan P, tbl_wali_kelas W, tbl_siswa S WHERE W.kelas = S.kelas AND P.uuid = S.uuid AND P.konfirmasiWakel = 0 AND W.uuid = "' . $uuid . '"ORDER BY id DESC LIMIT ' . $rowno . ' , ' . $rowperpage . ';');

        return $result;
    }

    public function get_izin($uuid, $rowno, $rowperpage, $search = "")
    {
        $this->db->select('*');
        $this->db->from('tbl_perizinan');
        $this->db->where('uuid', $uuid);
        $this->db->like('id', $search);
        $this->db->order_by('id', 'DESC');
        $result = $this->db->limit($rowperpage, $rowno)->get();
        // $result = $this->db->get('tbl_perizinan');

        return $result;
    }

    public function get_izin_byId($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_perizinan');
        $this->db->where('id', $id);

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

    public function get_izin_count($search = "")
    {
        $this->db->select('*');
        $this->db->from('tbl_perizinan');

        $this->db->like('uuid', $search);
        $result = $this->db->count_all_results();

        return $result;
    }
    public function get_izin_count_bk_unread($search = "")
    {
        $this->db->select('*');
        $this->db->from('tbl_perizinan');

        $this->db->where('konfirmasiBK', 0);
        $this->db->like('uuid', $search);
        $result = $this->db->count_all_results();

        return $result;
    }

    public function get_izin_count_siswa($uuid, $search = "")
    {
        $this->db->select('*');
        $this->db->from('tbl_perizinan');

        $this->db->where('uuid', $uuid);
        $this->db->like('uuid', $search);

        $result = $this->db->count_all_results();

        return $result;
    }

    public function get_izin_count_wakel($uuid, $search = "")
    {
        $result = $this->db->query('SELECT COUNT(*) total FROM tbl_perizinan P, tbl_wali_kelas W, tbl_siswa S WHERE W.kelas = S.kelas AND P.uuid = S.uuid AND W.uuid = "' . $uuid . '";');


        $result = $result->row();

        return $result;
    }
    public function get_izin_count_wakel_unread($uuid, $search = "")
    {
        $result = $this->db->query('SELECT COUNT(*) total FROM tbl_perizinan P, tbl_wali_kelas W, tbl_siswa S WHERE W.kelas = S.kelas AND P.uuid = S.uuid AND P.konfirmasiWakel = 0 AND W.uuid = "' . $uuid . '";');


        $result = $result->row();

        return $result;
    }








}