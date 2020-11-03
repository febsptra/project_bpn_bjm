<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function login()
    {
        if ($this->session->userdata('id_user')) // Jika user sudah login (Session authenticated ditemukan)
            redirect('dashboard'); // Redirect ke page dashboard
        $this->load->view('login');
    }

    public function masuk()
    {

        $auth = $this->m_bpn->cek_login();
        if ($auth == FALSE) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					 Username atau Password yang anda masukan salah!
					 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					 <span aria-hidden="true">&times;</span>
					 </button></div>'
            );
            redirect('auth/login');
        } else {
            $this->session->set_userdata('id_user', $auth->id_user);
            $this->session->set_userdata('username', $auth->username);
            $this->session->set_userdata('password', $auth->password);
            $this->session->set_userdata('nama', $auth->nama);
            $this->session->set_userdata('email', $auth->email);
            $this->session->set_userdata('foto', $auth->foto);
            $this->session->set_userdata('level', $auth->level);
            redirect('dashboard');
        }
    }

    public function daftar()
    {
        if ($this->session->userdata('id_user')) // Jika user sudah login (Session authenticated ditemukan)
            redirect('dashboard'); // Redirect ke page dashboard
        $this->load->view('register');
    }

    public function kirim_daftar()
    {
        $foto    = $this->input->post('foto');
        $foto    = $_FILES['foto'];
        if ($foto) {
            $config['upload_path']   = './uploads/avatar';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['file_name']     = $this->input->post('username');
            $config['overwrite']     = true;

            $this->load->library('upload');
            $this->upload->initialize($config);


            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data('file_name');
                $this->db->set('foto', $foto);
            } else {
                echo "Upload Foto Gagal!";
            }
        }

        $data = array(
            'username'  => $this->input->post('username'),
            'nama'      => $this->input->post('nama'),
            'email'     => $this->input->post('email'),
            'password'  => $this->input->post('password'),
            'level'     => 'pemohon'
        );

        $this->m_bpn->insert($data, 'user');

        $this->session->set_flashdata(
            'sukses_regis',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                 Berhasil Membuat Akun, Silahkan Login!
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                 </button></div>'
        );
        redirect('auth/login');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
