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
        } elseif ($this->session->userdata('user_role') == "satpam") {
            $this->load->view('dashboard_satpam');
        } elseif ($this->session->userdata('user_role') == "bk") {
            $this->load->view('dashboard_bk');
        } elseif ($this->session->userdata('user_role') == "wali_kelas") {
            $this->load->view('dashboard_wakel');
        }
    }

    public function perizinan()
    {
        $data['error'] = '';

        $data['kbm'] = $this->Perizinan_model->get_kbm()->result();
        $this->load->view('izin_page_siswa', $data);


    }

    public function verifikasi()
    {

        if ($this->session->userdata('user_role') == "bk") {
            $data['izin'] = $this->Perizinan_model->get_all_izin_bk();
            $this->load->view('verifikasi_perizinan_bk', $data);
        } elseif ($this->session->userdata('user_role') == "wali_kelas") {
            $data['izin'] = $this->Perizinan_model->get_all_izin_wakel();
            $this->load->view('verifikasi_perizinan_wakel', $data);
        } elseif ($this->session->userdata('user_role') == "satpam") {
            $this->load->view('verifikasi_perizinan_satpam');
        }
    }



    public function confirmation_waiting()
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

            // $data['status'] = $this->Perizinan_model->get_status_konfirmasi()->result();
        }

        $data['uuid'] = $this->session->userdata('user_uuid');
        $data['info'] = $this->Perizinan_model->get_izin($this->session->userdata('user_uuid'));
        $this->load->view('waiting_confirmation_siswa', $data);

    }

    public function test()
    {
        echo "cisa";

    }

    public function update_confirmation()
    {
        if ($this->input->post('confirm')) {
            $id = $this->input->post('id');
            $this->Perizinan_model->update_confirmation($id);
            redirect('dashboard/verifikasi');
        } elseif ($this->input->post('reject')) {
            $id = $this->input->post('id');
            $this->Perizinan_model->reject_confirmation($id);
            redirect('dashboard/verifikasi');
        }

    }

}