<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Edit_profile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('id_user'))) {
			$this->session->set_flashdata(
				'pesan',
				'<div class="alert alert-danger alert-dismissible fade show" role="alert">
					 Silahkan Login terlebihdahulu!
					 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					 <span aria-hidden="true">&times;</span>
					 </button></div>'
			);
			redirect('auth/login/');
		}
	}

	public function index()
	{
		$data['data'] = $this->m_bpn->table('user')->result();
		$this->load->view('template/header');
		$this->load->view('edit_profile', $data);
		$this->load->view('template/footer');
	}

	public function simpan()
	{
		$auth = $this->m_bpn->cek_password();
		if ($auth == FALSE) {
			$this->session->set_flashdata(
				'gagal',
				'<div class="alert alert-danger alert-dismissible fade show" role="alert">
					 Konfiramsi Password Salah!
					 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					 <span aria-hidden="true">&times;</span>
					 </button></div>'
			);
			redirect('edit_profile');
		} else {
			$foto	= $this->input->post('foto');
			$foto	= $_FILES['foto'];
			if ($foto) {
				$config['upload_path']   = './uploads/avatar';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['file_name']     = $this->input->post('username');
				$config['overwrite']	 = true;

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
				'username' 	=> $this->input->post('username'),
				'nama' 		=> $this->input->post('nama'),
				'email'		=> $this->input->post('email'),
				'password'  => $this->input->post('password')
			);

			$where = array(
				'id_user' => $this->session->userdata('id_user')
			);
			$this->m_bpn->update($where, $data, 'user');

			$this->session->set_userdata('username', $this->input->post('username'));
			$this->session->set_userdata('password', $this->input->post('password'));
			$this->session->set_userdata('nama', $this->input->post('nama'));
			$this->session->set_userdata('email', $this->input->post('email'));

			$this->session->set_flashdata(
				'berhasil',
				'<div class="alert alert-success alert-dismissible fade show" role="alert">
					 Profile Berhasil Diperbarui!
					 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					 <span aria-hidden="true">&times;</span>
					 </button></div>'
			);
			redirect('edit_profile');
		}
	}
}
