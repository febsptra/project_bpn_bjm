<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_hasil_permohonan extends CI_Controller
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
		$jenis_permohonan = $this->input->get('jns_permohonan');
		$where = array('no_permohonan' => $this->input->get('no_permohonan'));
		$data['pengukuran'] = $this->m_bpn->get_where($where, 'hasil_pengukuran')->row_array();
		$data['hasil_pengukuran'] = $this->m_bpn->get_where($where, 'hasil_pengukuran')->row_array();
		if ($jenis_permohonan == "hm") {
			$data['permohonan'] = $this->m_bpn->get_where($where, 'permohonan_hm')->row_array();
			$this->load->view('report/surat_hasil_permohonan', $data);
		} else if ($jenis_permohonan == "hgb") {
			$data['permohonan'] = $this->m_bpn->get_where($where, 'permohonan_hgb')->row_array();
			$this->load->view('report/surat_hasil_permohonan', $data);
		}
	}
}
