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

        // Seharusnya ID izinnyasss
        if ($this->input->post('idIzin')) {

            $status = $this->Perizinan_model->get_verifikasi_izin($this->input->post('idIzin'));
            // $data['konfirmasiBK'] = $status->konfirmasiBK;
            // $data['konfirmasiWakel'] = $status->konfirmasiWakel;

            if ($status->reject == 0) {
                if ($status->konfirmasiBK == 1 && $status->konfirmasiWakel == 1) {
                    $statValue = 100;
                } elseif ($status->konfirmasiBK == 0 && $status->konfirmasiWakel == 1) {
                    $statValue = 50;
                } elseif ($status->konfirmasiWakel == 0 && $status->konfirmasiBK == 1) {
                    $statValue = 50;
                } else {
                    $statValue = 50;
                }
            } else {
                $statValue = 0;
            }
            $data['statValue'] = $statValue;
            $this->load->view('ajax/status_satpam', $data);

        } else {
            $data['error'] = 'Username atau password salah';
            $this->load->view('ajax/status_satpam', $data);
        }


    }
    public function check_status_pembayaran()
    {
        if ($this->input->post('uuidSiswa')) {
            $uuidSiswa = $this->input->post('uuidSiswa');

            $data['status'] = $this->Payment_model->get_status_pembayaran($uuidSiswa)->statusBayar;

            if ($data['status'] == 1 || $data['status'] == 0) {
                $this->Payment_model->update_kehadiran($uuidSiswa);
            }

            $this->load->view('ajax/status_pembayaran', $data);

        } else {
            $data['error'] = 'Username atau password salah';
            $this->load->view('ajax/status_pembayaran', $data);
        }

    }

    public function get_status_konfirmasi()
    {
        $id = $this->input->post('id');
        if ($this->session->userdata('user_role') == "siswa") {
            $data['role'] = "siswa";
        } else {
            $data['role'] = "";

        }
        $data['status'] = $this->Perizinan_model->get_status_konfirmasi($id);
        $this->load->view('ajax/status_perizinan', $data);

    }
}