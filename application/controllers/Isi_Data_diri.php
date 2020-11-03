<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Isi_Data_diri extends CI_Controller
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
		$where = array('id_user' => $this->session->userdata('id_user'));
		$data['data_diri'] = $this->m_bpn->get_where($where, 'data_diri')->result();
		$this->load->view('template/header');
		$this->load->view('isi_data_diri', $data);
		$this->load->view('template/footer');
	}

	public function simpan()
	{
		$data = array(
			'id_user'  		=> $this->session->userdata('id_user'),
			'nama' 			=> $this->input->post('nama'),
			'no_ktp' 		=> $this->input->post('no_ktp'),
			'tgl_lahir'		=> $this->input->post('tgl_lahir'),
			'alamat'  		=> $this->input->post('alamat'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'no_hp' 		=> $this->input->post('no_hp'),
			'level' 		=> $this->session->userdata('level')
		);

		$this->m_bpn->insert($data, 'data_diri');
		redirect('isi_data_diri');
	}

	public function edit()
	{
		$data = array(
			'nama' 			=> $this->input->post('nama'),
			'no_ktp' 		=> $this->input->post('no_ktp'),
			'tgl_lahir'		=> $this->input->post('tgl_lahir'),
			'alamat'  		=> $this->input->post('alamat'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'no_hp' 		=> $this->input->post('no_hp'),
			'level' 		=> $this->session->userdata('level')
		);

		$where = array(
			'id_user' => $this->session->userdata('id_user')
		);

		$this->m_bpn->update($where, $data, 'data_diri');

		$this->session->set_flashdata(
			'berhasil',
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
				 Data Berhasil Diperbarui!
				 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				 <span aria-hidden="true">&times;</span>
				 </button></div>'
		);
		redirect('isi_data_diri');
	}
}
