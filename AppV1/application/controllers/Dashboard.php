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


    public function perizinan($row_no = 0)
    {
        $uuidUser = $this->session->userdata('user_uuid');
        $data['error'] = '';
        $search = '';

        //--pagination--
        $row_per_page = 20;

        if ($row_no != 0) {
            $row_no = ($row_no - 1) * $row_per_page;
        }
        // Pagination Configuration
        // All record count
        $config['total_rows'] = $this->Perizinan_model->get_izin_count($search);
        $config['base_url'] = base_url() . 'dashboard/verifikasi';
        $config['use_page_numbers'] = true;
        $config['per_page'] = $row_per_page;

        //initialize
        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        // Get record
        $data['users'] = $this->Perizinan_model->get_izin($uuidUser, $row_no, $row_per_page, $search);

        $data['row'] = $row_no;

        $data['totalRow'] = $config['total_rows'];

        $data['dataIzin'] = $this->Perizinan_model->get_all_izin($uuidUser);
        $this->load->view('daftar_perizinan_siswa', $data);
    }

    public function add_perizinan()
    {
        $data['error'] = '';

        $data['kbm'] = $this->Perizinan_model->get_kbm()->result();
        $this->load->view('izin_page_siswa', $data);


    }

    public function verifikasi($row_no = 0)
    {

        $uuid = $this->session->userdata('user_uuid');
        if ($this->session->userdata('user_role') == "bk") {
            $data['error'] = '';
            $search = '';

            //--pagination--
            $row_per_page = 20;

            if ($row_no != 0) {
                $row_no = ($row_no - 1) * $row_per_page;
            }
            // Pagination Configuration
            // All record count
            $config['total_rows'] = $this->Perizinan_model->get_izin_count($search);
            $config['base_url'] = base_url() . 'dashboard/verifikasi';
            $config['use_page_numbers'] = true;
            $config['per_page'] = $row_per_page;

            //initialize
            $this->pagination->initialize($config);

            $data['pagination'] = $this->pagination->create_links();

            // Get record
            $data['dataIzin'] = $this->Perizinan_model->get_all_izin_bk($row_no, $row_per_page, $search);

            $data['row'] = $row_no;

            $data['totalRow'] = $config['total_rows'];

            // $data['dataIzin'] = $this->Perizinan_model->get_all_izin($uuidUser);
            // $data['izin'] = $this->Perizinan_model->get_all_izin_bk();
            $this->load->view('verifikasi_perizinan_bk', $data);
        } elseif ($this->session->userdata('user_role') == "wali_kelas") {

            $data['error'] = '';
            $search = '';

            //--pagination--
            $row_per_page = 20;

            if ($row_no != 0) {
                $row_no = ($row_no - 1) * $row_per_page;
            }
            // Pagination Configuration

            // All record count
            $config['total_rows'] = $this->Perizinan_model->get_izin_count($search);
            $config['base_url'] = base_url() . 'dashboard/verifikasi';
            $config['use_page_numbers'] = true;
            $config['per_page'] = $row_per_page;

            //initialize
            $this->pagination->initialize($config);

            $data['pagination'] = $this->pagination->create_links();

            // Get record
            $data['dataIzin'] = $this->Perizinan_model->get_all_izin_wakel($uuid, $row_no, $row_per_page, $search);

            $data['row'] = $row_no;

            $data['totalRow'] = $config['total_rows'];

            // $data['dataIzin'] = $this->Perizinan_model->get_all_izin($uuidUser);
            // $data['izin'] = $this->Perizinan_model->get_all_izin_bk();

            $this->load->view('verifikasi_perizinan_wakel', $data);
        } elseif ($this->session->userdata('user_role') == "satpam") {
            $this->load->view('verifikasi_perizinan_satpam');
        }
    }



    public function confirmation_waiting()
    {
        $uuid = $this->session->userdata('user_uuid');
        $data['error'] = '';
        if ($this->input->post('izin')) {
            $alasan = $this->input->post('alasan');
            $waktuMulai = $this->input->post('waktuMulai');
            $waktuSelesai = $this->input->post('waktuSelesai');
            $user = $this->Perizinan_model->add_izin($uuid, $waktuMulai, $waktuSelesai, $alasan);
            if ($user) {
                redirect('Dashboard/perizinan');
            } else {
                $data['error'] = 'waktuMulai atau waktuSelesai salah';
            }
        }

    }

    public function detail_izin()
    {
        $id = $this->input->post('id');
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
        $data['info'] = $this->Perizinan_model->get_izin_byId($id);
        $this->load->view('waiting_confirmation_siswa', $data);

    }

    public function test()
    {
        echo "cisa";

    }

    public function update_confirmation()
    {
        if ($this->input->post('Konfirmasi')) {
            $id = $this->input->post('id');
            $this->Perizinan_model->update_confirmation($id);
            redirect('dashboard/verifikasi');
        } elseif ($this->input->post('Tolak')) {
            $id = $this->input->post('id');
            $this->Perizinan_model->reject_confirmation($id);
            redirect('dashboard/verifikasi');
        }

    }



}