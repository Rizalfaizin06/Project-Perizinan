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
}