<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_hgb extends CI_Controller
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
		$data['permohonan_hgb'] = $this->m_bpn->get_where(array('status' => 'Menunggu'), 'permohonan_hgb')->result();
		$data['permohonan_hgb_diverifikasi'] = $this->m_bpn->get_where(array('status' => 'Pengukuran'), 'permohonan_hgb')->result();
		$data['permohonan_hgb_selesai'] = $this->m_bpn->get_where(array('status' => 'Selesai'), 'permohonan_hgb')->result();
		$this->load->view('template/header');
		$this->load->view('admin/permohonan/data_hgb', $data);
		$this->load->view('template/footer');
	}

	public function verifikasi($no)
	{
		$data = array(
			'status'  => 'Pengukuran'
		);

		$where = array(
			'no' => $no
		);

		$this->m_bpn->update($where, $data, 'permohonan_hgb');

		$this->session->set_flashdata(
			'berhasil',
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
				 Permohonan Berhasil Diverifikasi!
				 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				 <span aria-hidden="true">&times;</span>
				 </button></div>'
		);
		redirect('admin/permohonan/data_hgb');
	}
}
