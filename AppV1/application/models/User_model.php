<?php
class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_user($username, $password)
    {
        $query = $this->db->get_where('tbl_users', array('username' => $username, 'password' => $password));
        return $query->row();

    }

    public function get_user_uuid($uuid)
    {
        $query = $this->db->get_where('tbl_users', array('uuid' => $uuid));
        return $query->row();
    }

    public function registrasi_siswa($uuid, $username, $password, $nama, $email, $avatar, $kelas)
    {
        // Mulai transaksi
        $this->db->trans_start();
        // Query kedua
        $data = array(
            'id' => 'NULL',
            'uuid' => $uuid,
            'username' => $username,
            'password' => $password,
            'nama' => $nama,
            'email' => $email,
            'avatar' => $avatar,
            'role' => 'siswa',
            'status' => '0'
        );
        $this->db->insert('tbl_users', $data);

        // Query pertama
        $this->db->set('uuid', $uuid);
        $this->db->set('kelas', $kelas);
        $this->db->insert('tbl_siswa');


        // Cek apakah ada kesalahan saat menjalankan query
        if ($this->db->trans_status() === FALSE) {
            // Jika terjadi kesalahan, maka rollback transaksi
            $this->db->trans_rollback();
            return FALSE;
        } else {
            // Jika tidak terjadi kesalahan, maka commit transaksi
            $this->db->trans_commit();
            return TRUE;
        }



    }
    public function registrasi_wakel($uuid, $username, $password, $nama, $email, $avatar, $kelas)
    {
        // Mulai transaksi
        $this->db->trans_start();
        // Query kedua
        $data = array(
            'id' => 'NULL',
            'uuid' => $uuid,
            'username' => $username,
            'password' => $password,
            'nama' => $nama,
            'email' => $email,
            'avatar' => $avatar,
            'role' => 'wali_kelas',
            'status' => '0'
        );
        $this->db->insert('tbl_users', $data);

        // Query pertama
        $this->db->set('uuid', $uuid);
        $this->db->set('kelas', $kelas);
        $this->db->insert('tbl_wali_kelas');


        // Cek apakah ada kesalahan saat menjalankan query
        if ($this->db->trans_status() === FALSE) {
            // Jika terjadi kesalahan, maka rollback transaksi
            $this->db->trans_rollback();
            return FALSE;
        } else {
            // Jika tidak terjadi kesalahan, maka commit transaksi
            $this->db->trans_commit();
            return TRUE;
        }



    }
    public function registrasi_BK($uuid, $username, $password, $nama, $email, $avatar)
    {
        // Mulai transaksi
        $this->db->trans_start();
        // Query kedua
        $data = array(
            'id' => 'NULL',
            'uuid' => $uuid,
            'username' => $username,
            'password' => $password,
            'nama' => $nama,
            'email' => $email,
            'avatar' => $avatar,
            'role' => 'bk',
            'status' => '0'
        );
        $this->db->insert('tbl_users', $data);

        // Cek apakah ada kesalahan saat menjalankan query
        if ($this->db->trans_status() === FALSE) {
            // Jika terjadi kesalahan, maka rollback transaksi
            $this->db->trans_rollback();
            return FALSE;
        } else {
            // Jika tidak terjadi kesalahan, maka commit transaksi
            $this->db->trans_commit();
            return TRUE;
        }
    }
    public function registrasi_satpam($uuid, $username, $password, $nama, $email, $avatar)
    {
        // Mulai transaksi
        $this->db->trans_start();
        // Query kedua
        $data = array(
            'id' => 'NULL',
            'uuid' => $uuid,
            'username' => $username,
            'password' => $password,
            'nama' => $nama,
            'email' => $email,
            'avatar' => $avatar,
            'role' => 'satpam',
            'status' => '0'
        );
        $this->db->insert('tbl_users', $data);

        // Cek apakah ada kesalahan saat menjalankan query
        if ($this->db->trans_status() === FALSE) {
            // Jika terjadi kesalahan, maka rollback transaksi
            $this->db->trans_rollback();
            return FALSE;
        } else {
            // Jika tidak terjadi kesalahan, maka commit transaksi
            $this->db->trans_commit();
            return TRUE;
        }
    }

    public function is_username_exist($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('tbl_users');
        return $query->num_rows() > 0;
    }
}