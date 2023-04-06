<?php
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function login()
    {
        $data['error'] = '';
        if ($this->session->userdata('user_id')) {
            redirect('Dashboard');
        }
        if ($this->input->post('login')) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->user_model->get_user($username, $password);
            if ($user) {
                $this->session->set_userdata('user_id', $user->id);
                $this->session->set_userdata('user_role', $user->role);
                $this->session->set_userdata('user_uuid', $user->uuid);
                redirect('Dashboard');
            } else {
                $data['error'] = 'Username atau password salah';
            }
        }

        $this->load->view('login', $data);
    }

    public function logout()
    {
        $this->session->unset_userdata('user_id');
        redirect('auth/login');
    }

    function generate_uuid($data = null)
    {
        // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
        $data = $data ?? random_bytes(16);
        assert(strlen($data) == 16);

        // Set version to 0100
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        // Set bits 6-7 to 10
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

        // Output the 36 character UUID.
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

}