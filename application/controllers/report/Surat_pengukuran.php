<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_pengukuran extends CI_Controller
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

	public function index($no)
	{
		$where = array('no' => $no);
		$data['data'] = $this->m_bpn->get_where($where, 'pengukuran')->row_array();
		$this->load->view('report/surat_pengukuran', $data);
	}
}
