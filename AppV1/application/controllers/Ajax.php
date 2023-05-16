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
        $key = "idEncrypt";
        // Seharusnya ID izinnyasss
        if ($this->input->post('idIzin') && strlen($this->input->post('idIzin') < 10)) {


            $decryptedID = $this->decrypt($this->input->post('idIzin'), $key);
            $status = $this->Perizinan_model->get_verifikasi_izin($decryptedID);
            // $data['konfirmasiBK'] = $status->konfirmasiBK;
            // $data['konfirmasiWakel'] = $status->konfirmasiWakel;
            if ($status) {

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

                $data['error'] = "QR Code Salah";

                $this->load->view('ajax/status_satpam', $data);
            }

        } else {
            $data['error'] = "QR Code Salah";

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
        $key = "idEncrypt";
        $idDetail = $data['status']->perizinan_id;
        // var_dump($this->encrypt($data, $key));

        $data['encryptId'] = $this->encrypt($idDetail, $key);

        // var_dump($this->Perizinan_model->get_status_konfirmasi($id));
        $this->load->view('ajax/status_perizinan', $data);

    }


    function encrypt($data, $key)
    {
        $iv_size = openssl_cipher_iv_length('aes-256-cbc');
        $iv = openssl_random_pseudo_bytes($iv_size);
        $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
        return base64_encode($iv . $encrypted);
    }

    function decrypt($data, $key)
    {
        $data = base64_decode($data);
        $iv_size = openssl_cipher_iv_length('aes-256-cbc');
        $iv = substr($data, 0, $iv_size);
        $encrypted = substr($data, $iv_size);
        return openssl_decrypt($encrypted, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
    }

}