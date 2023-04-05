<?php
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Perizinan_model');
    }

    public function index()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
        if ($this->session->userdata('user_role') == "admin") {
            $this->load->view('dashboard_admin');
        } elseif ($this->session->userdata('user_role') == "siswa") {
            $this->load->view('dashboard_siswa');
        }
    }

    public function perizinan()
    {
        $data['error'] = '';
        if ($this->input->post('izin')) {
            // $username = $this->input->post('username');
            // $password = $this->input->post('password');
            // $user = $this->user_model->get_user($username, $password);
            // if ($user) {
            //     $this->session->set_userdata('user_id', $user->id);
            //     $this->session->set_userdata('user_role', $user->role);
            //     redirect('Dashboard');
            // } else {
            //     $data['error'] = 'Username atau password salah';
            // }

            $data['status'] = $this->Perizinan_model->get_status_konfirmasi()->result();
            $data['info'] = $this->Perizinan_model->get_izin();
            $this->load->view('waiting_confirmation_siswa', $data);
        }
        $data['kbm'] = $this->Perizinan_model->get_kbm()->result();
        $this->load->view('izin_page_siswa', $data);

    }
}