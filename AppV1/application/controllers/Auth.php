<?php
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');

        $this->load->model('Perizinan_model');
    }

    public function login_old()
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

    public function login()
    {
        if ($this->input->cookie('uuid', TRUE)) {
            $uuid = $this->input->cookie('uuid', TRUE);
            $hashName = $this->input->cookie('key', TRUE);


            $user = $this->user_model->get_user_uuid($uuid);

            if (hash('sha256', $user->nama) == $hashName) {
                $this->session->set_userdata('user_id', $user->id);
                $this->session->set_userdata('user_role', $user->role);
                $this->session->set_userdata('user_uuid', $user->uuid);


                $nama = $user->nama;
                $hashName = hash('sha256', $nama);

                if ($this->input->post('rememberMe')) {
                    $cookie_data = array(
                        'name' => 'uuid',
                        'value' => $user->uuid,
                        'expire' => 3600 * 24 * 2,
                    );
                    $this->input->set_cookie($cookie_data);
                    $cookie_data = array(
                        'name' => 'key',
                        'value' => $hashName,
                        'expire' => 3600 * 24 * 2,
                    );
                    $this->input->set_cookie($cookie_data);
                }


                redirect('Dashboard');
            }
        }

        $data['error'] = '';

        if ($this->session->userdata('user_id')) {
            redirect('Dashboard');
        } else {
            if ($this->input->post('login')) {
                $username = strtolower($this->input->post('username'));
                $password = $this->input->post('password');
                $user = $this->user_model->get_user($username, hash('sha256', $password));
                if ($user) {
                    $this->session->set_userdata('user_id', $user->id);
                    $this->session->set_userdata('user_role', $user->role);
                    $this->session->set_userdata('user_uuid', $user->uuid);
                    $this->session->set_userdata('user_nama', $user->nama);
                    $this->session->set_userdata('user_email', $user->email);
                    $this->session->set_userdata('user_avatar', $user->avatar);



                    $nama = $user->nama;
                    $hashName = hash('sha256', $nama);

                    if ($this->input->post('rememberMe')) {
                        $cookie_data = array(
                            'name' => 'uuid',
                            'value' => $user->uuid,
                            'expire' => 3600 * 24 * 2,
                        );
                        $this->input->set_cookie($cookie_data);
                        $cookie_data = array(
                            'name' => 'key',
                            'value' => $hashName,
                            'expire' => 3600 * 24 * 2,
                        );
                        $this->input->set_cookie($cookie_data);
                    }


                    redirect('Dashboard');
                } else {
                    $data['error'] = 'Username atau password salah';
                }
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


    public function registrasi()
    {
        $data['error'] = '';
        if ($this->input->post('btnChooseSiswa')) {
            $data['kelas'] = $this->Perizinan_model->get_kelas()->result();

            $this->load->view('registrasi_siswa', $data);
        } elseif ($this->input->post('btnChooseWakel')) {
            $data['kelas'] = $this->Perizinan_model->get_kelas()->result();
            $this->load->view('registrasi_wakel', $data);
        } elseif ($this->input->post('btnChooseBK')) {
            $data['kelas'] = $this->Perizinan_model->get_kelas()->result();
            $this->load->view('registrasi_BK', $data);
        } elseif ($this->input->post('btnChooseSatpam')) {
            $data['kelas'] = $this->Perizinan_model->get_kelas()->result();
            $this->load->view('registrasi_satpam', $data);
        } else {
            if ($this->input->post('registasi_siswa')) {

                $username = htmlspecialchars(strtolower($this->input->post('username')));
                $password = htmlspecialchars($this->input->post('password'));
                $konfirmasiPassword = htmlspecialchars($this->input->post('konfirmasiPassword'));
                $nama = htmlspecialchars($this->input->post('nama'));
                $email = htmlspecialchars($this->input->post('email'));
                $kelas = htmlspecialchars($this->input->post('kelas'));
                $uuid = $this->generate_uuid();

                // $this->session->set_userdata('r_username', $username);
                // $this->session->set_userdata('r_nama', $nama);
                // $this->session->set_userdata('r_email', $email);

                // $data['username'] = $this->session->userdata('r_username');
                // $data['password'] = $this->session->userdata('r_password');
                // $data['nama'] = $this->session->userdata('r_nama');
                // $data['email'] = $this->session->userdata('r_email');

                if ($password != $konfirmasiPassword) {
                    $data['error'] = 'Konfirmasi Password Berbeda';
                    $this->load->view('registrasi_siswa', $data);
                } else {
                    $registrasi = $this->user_model->is_username_exist($username);
                    if ($registrasi) {
                        $data['error'] = 'User Sudah adda';
                        $this->load->view('registrasi_siswa', $data);
                    } else {
                        $config['upload_path'] = FCPATH . 'dist/images/avatar';
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['max_size'] = 2048;
                        $config['encrypt_name'] = TRUE;
                        $this->load->library('upload', $config);

                        if (!$this->upload->do_upload('avatar')) {
                            $error = array('error' => $this->upload->display_errors());
                            $this->load->view('registrasi_siswa', $error);
                        } else {
                            $nama_avatar = htmlspecialchars($this->upload->data('file_name'));
                            $registrasi = $this->user_model->registrasi_siswa($uuid, $username, hash('sha256', $password), $nama, $email, $nama_avatar, $kelas);
                            if ($registrasi == true) {
                                $data['error'] = 'Registrasi Berhasil';
                                $this->load->view('login', $data);
                            } else {
                                $data['error'] = 'Registrasi Gagal';
                                $this->load->view('registrasi_siswa', $data);
                            }
                        }
                    }
                    // $data['error'] = "sdfgsdfgdfgdgsfsdg";
                    // $this->load->view('registrasi', $data);
                }

            } elseif ($this->input->post('registasi_wakel')) {

                $username = htmlspecialchars(strtolower($this->input->post('username')));
                $password = htmlspecialchars($this->input->post('password'));
                $konfirmasiPassword = htmlspecialchars($this->input->post('konfirmasiPassword'));
                $nama = htmlspecialchars($this->input->post('nama'));
                $email = htmlspecialchars($this->input->post('email'));
                $kelas = htmlspecialchars($this->input->post('kelas'));
                $uuid = $this->generate_uuid();

                // $this->session->set_userdata('r_username', $username);
                // $this->session->set_userdata('r_nama', $nama);
                // $this->session->set_userdata('r_email', $email);

                // $data['username'] = $this->session->userdata('r_username');
                // $data['password'] = $this->session->userdata('r_password');
                // $data['nama'] = $this->session->userdata('r_nama');
                // $data['email'] = $this->session->userdata('r_email');

                if ($password != $konfirmasiPassword) {
                    $data['error'] = 'Konfirmasi Password Berbeda';
                    $this->load->view('registrasi_wakel', $data);
                } else {
                    $registrasi = $this->user_model->is_username_exist($username);
                    if ($registrasi) {
                        $data['error'] = 'User Sudah adda';
                        $this->load->view('registrasi_wakel', $data);
                    } else {
                        $config['upload_path'] = FCPATH . 'dist/images/avatar';
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['max_size'] = 2048;
                        $config['encrypt_name'] = TRUE;
                        $this->load->library('upload', $config);

                        if (!$this->upload->do_upload('avatar')) {
                            $error = array('error' => $this->upload->display_errors());
                            $this->load->view('registrasi_siswa', $error);
                        } else {
                            $nama_avatar = htmlspecialchars($this->upload->data('file_name'));
                            $registrasi = $this->user_model->registrasi_wakel($uuid, $username, hash('sha256', $password), $nama, $email, $nama_avatar, $kelas);
                            if ($registrasi == true) {
                                $data['error'] = 'Registrasi Berhasil';
                                $this->load->view('login', $data);
                            } else {
                                $data['error'] = 'Registrasi Gagal';
                                $this->load->view('registrasi_wakel', $data);
                            }
                        }
                    }
                    // $data['error'] = "sdfgsdfgdfgdgsfsdg";
                    // $this->load->view('registrasi', $data);
                }

            } elseif ($this->input->post('registasi_BK')) {

                $username = htmlspecialchars(strtolower($this->input->post('username')));
                $password = htmlspecialchars($this->input->post('password'));
                $konfirmasiPassword = htmlspecialchars($this->input->post('konfirmasiPassword'));
                $nama = htmlspecialchars($this->input->post('nama'));
                $email = htmlspecialchars($this->input->post('email'));
                $uuid = $this->generate_uuid();

                // $this->session->set_userdata('r_username', $username);
                // $this->session->set_userdata('r_nama', $nama);
                // $this->session->set_userdata('r_email', $email);

                // $data['username'] = $this->session->userdata('r_username');
                // $data['password'] = $this->session->userdata('r_password');
                // $data['nama'] = $this->session->userdata('r_nama');
                // $data['email'] = $this->session->userdata('r_email');

                if ($password != $konfirmasiPassword) {
                    $data['error'] = 'Konfirmasi Password Berbeda';
                    $this->load->view('registrasi_BK', $data);
                } else {
                    $registrasi = $this->user_model->is_username_exist($username);
                    if ($registrasi) {
                        $data['error'] = 'User Sudah adda';
                        $this->load->view('registrasi_BK', $data);
                    } else {
                        $config['upload_path'] = FCPATH . 'dist/images/avatar';
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['max_size'] = 2048;
                        $config['encrypt_name'] = TRUE;
                        $this->load->library('upload', $config);

                        if (!$this->upload->do_upload('avatar')) {
                            $error = array('error' => $this->upload->display_errors());
                            $this->load->view('registrasi_siswa', $error);
                        } else {
                            $nama_avatar = htmlspecialchars($this->upload->data('file_name'));

                            $registrasi = $this->user_model->registrasi_BK($uuid, $username, hash('sha256', $password), $nama, $email, $nama_avatar);
                            if ($registrasi == true) {
                                $data['error'] = 'Registrasi Berhasil';
                                $this->load->view('login', $data);
                            } else {
                                $data['error'] = 'Registrasi Gagal';
                                $this->load->view('registrasi_BK', $data);
                            }
                        }
                    }
                    // $data['error'] = "sdfgsdfgdfgdgsfsdg";
                    // $this->load->view('registrasi', $data);
                }

            } elseif ($this->input->post('registasi_satpam')) {

                $username = htmlspecialchars(strtolower($this->input->post('username')));
                $password = htmlspecialchars($this->input->post('password'));
                $konfirmasiPassword = htmlspecialchars($this->input->post('konfirmasiPassword'));
                $nama = htmlspecialchars($this->input->post('nama'));
                $email = htmlspecialchars($this->input->post('email'));
                $uuid = $this->generate_uuid();

                // $this->session->set_userdata('r_username', $username);
                // $this->session->set_userdata('r_nama', $nama);
                // $this->session->set_userdata('r_email', $email);

                // $data['username'] = $this->session->userdata('r_username');
                // $data['password'] = $this->session->userdata('r_password');
                // $data['nama'] = $this->session->userdata('r_nama');
                // $data['email'] = $this->session->userdata('r_email');

                if ($password != $konfirmasiPassword) {
                    $data['error'] = 'Konfirmasi Password Berbeda';
                    $this->load->view('registrasi_satpam', $data);
                } else {
                    $registrasi = $this->user_model->is_username_exist($username);
                    if ($registrasi) {
                        $data['error'] = 'User Sudah adda';
                        $this->load->view('registrasi_satpam', $data);
                    } else {
                        $config['upload_path'] = FCPATH . 'dist/images/avatar';
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['max_size'] = 2048;
                        $config['encrypt_name'] = TRUE;
                        $this->load->library('upload', $config);

                        if (!$this->upload->do_upload('avatar')) {
                            $error = array('error' => $this->upload->display_errors());
                            $this->load->view('registrasi_siswa', $error);
                        } else {
                            $nama_avatar = htmlspecialchars($this->upload->data('file_name'));
                            $registrasi = $this->user_model->registrasi_satpam($uuid, $username, hash('sha256', $password), $nama, $email, $nama_avatar);
                            if ($registrasi == true) {
                                $data['error'] = 'Registrasi Berhasil';
                                $this->load->view('login', $data);
                            } else {
                                $data['error'] = 'Registrasi Gagal';
                                $this->load->view('registrasi_satpam', $data);
                            }
                        }
                        // $data['error'] = "sdfgsdfgdfgdgsfsdg";
                        // $this->load->view('registrasi', $data);
                    }
                }
            } else {
                $data['kelas'] = $this->Perizinan_model->get_kelas()->result();
                $this->load->view('registrasi', $data);
            }
        }


        // if ($this->session->userdata('user_id')) {
        //     redirect('Dashboard');
        // } else {
        //     if ($this->input->post('login')) {
        //         $username = $this->input->post('username');
        //         $password = $this->input->post('password');
        //         $user = $this->user_model->get_user($username, $password);
        //         if ($user) {
        //             $this->session->set_userdata('user_id', $user->id);
        //             $this->session->set_userdata('user_role', $user->role);
        //             $this->session->set_userdata('user_uuid', $user->uuid);
        //             redirect('Dashboard');
        //         } else {
        //             $data['error'] = 'Username atau password salah';
        //         }
        //     }
        // }

        // $this->load->view('login', $data);
    }
}