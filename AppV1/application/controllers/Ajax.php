<?php
class Ajax extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Perizinan_model');
    }

    public function check_status_perizinan()
    {
        if ($this->input->post('uuidSiswa')) {
            $uuidSiswa = $this->input->post('uuidSiswa');

            $status = $this->Perizinan_model->get_verifikasi_izin($uuidSiswa);
            $data['konfirmasiBK'] = $status->konfirmasiBK;
            $data['konfirmasiWakel'] = $status->konfirmasiWakel;
            $this->load->view('ajax/status_perizinan', $data);

        } else {
            $data['error'] = 'Username atau password salah';
            $this->load->view('ajax/status_perizinan', $data);
        }

    }

    public function get_status_konfirmasi()
    {
        $status = $this->Perizinan_model->get_status_konfirmasi();
        $data['konfirmasiBK'] = $status->konfirmasiBK;
        $data['konfirmasiWakel'] = $status->konfirmasiWakel;
        $this->load->view('ajax/status_perizinan', $data);

    }
}