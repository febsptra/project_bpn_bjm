<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('tgl_indo');
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
		$data['hasil_pengukuran'] = $this->m_bpn->table('hasil_pengukuran')->result();
		$this->load->view('template/header');
		$this->load->view('admin/pengukuran/hasil_pengukuran', $data);
		$this->load->view('template/footer');
	}

	public function kirim()
	{
		$data = array(
			'no_pengukuran'  	=> $this->input->post('no_pengukuran'),
			'tgl_pengukuran'  	=> $this->input->post('tgl_pengukuran'),
			'no_permohonan'  	=> $this->input->post('no_permohonan'),
			'nama' 				=> $this->input->post('nama'),
			'no_ktp' 			=> $this->input->post('no_ktp'),
			'no_hp' 			=> $this->input->post('no_hp'),
			'alamat_tanah' 		=> $this->input->post('alamat_tanah'),
			'desa_kel' 			=> $this->input->post('desa_kel'),
			'kecamatan' 		=> $this->input->post('kecamatan'),
			'luas_tanah' 		=> $this->input->post('luas_tanah'),
			'status' 			=> 'Menunggu'
		);

		$this->m_bpn->insert($data, 'pengukuran');


		$this->session->set_flashdata(
			'hm_berhasil',
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
				 Pengajuan Permohonan HM (Hak Milik) Berhasil Dikirim! 
				 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				 <span aria-hidden="true">&times;</span>
				 </button></div>'
		);
		redirect('admin/pengukuran/pengukuran');
	}
}
