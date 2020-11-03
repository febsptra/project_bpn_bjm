<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengukuran extends CI_Controller
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
		$data['pengukuran'] = $this->m_bpn->get_where(array('status' => 'Menunggu'), 'pengukuran')->result();
		$data['pengukuran_selesai'] = $this->m_bpn->get_where(array('status' => 'Selesai'), 'pengukuran')->result();
		$this->load->view('template/header');
		$this->load->view('petugas/data_pengukuran', $data);
		$this->load->view('template/footer');
	}

	public function input_hasil_pengukuran($no)
	{
		$where = array('id_user' => $this->session->userdata('id_user'));
		$data['data_diri'] = $this->m_bpn->get_where($where, 'data_diri')->row_array();
		$where = array('no' => $no);
		$data['pengukuran'] = $this->m_bpn->get_where($where, 'pengukuran')->row_array();
		$this->load->view('template/header');
		$this->load->view('petugas/input_hasil_pengukuran', $data);
		$this->load->view('template/footer');
	}

	public function pengukuran_hgb($no_permohonan)
	{
		$where = array('no_permohonan' => $no_permohonan);
		$data['permohonan'] = $this->m_bpn->get_where($where, 'permohonan_hgb')->row_array();
		$this->load->view('template/header');
		$this->load->view('admin/pengukuran/tambah_pengukuran', $data);
		$this->load->view('template/footer');
	}

	public function kirim_hasil_pengukuran()
	{
		$surat_pernyataan	= $this->input->post('surat_pernyataan');
		$surat_pernyataan	= $_FILES['surat_pernyataan'];
		if ($surat_pernyataan) {
			$config['upload_path']   = './uploads/pengukuran/hasil';
			$config['allowed_types'] = 'jpg|png|jpeg|pdf';
			$config['file_name']     = "Hasil-" . $this->input->post('no_pengukuran');
			$config['overwrite']	 = true;

			$this->load->library('upload');
			$this->upload->initialize($config);


			if ($this->upload->do_upload('surat_pernyataan')) {
				$surat_pernyataan = $this->upload->data('file_name');
				$this->db->set('surat_pernyataan', $surat_pernyataan);
			} else {
				echo "Upload Foto Gagal!";
			}
		}

		$data = array(
			'no_pengukuran'  	=> $this->input->post('no_pengukuran'),
			'tgl_pengukuran'  	=> $this->input->post('tgl_pengukuran'),
			'no_permohonan'  	=> $this->input->post('no_permohonan'),
			'jns_permohonan'  	=> $this->input->post('jns_permohonan'),
			'nama_petugas' 		=> $this->input->post('nama_petugas'),
			'no_ktp_petugas' 	=> $this->input->post('no_ktp_petugas'),
			'no_hp_petugas' 	=> $this->input->post('no_hp_petugas'),
			'b_utara' 			=> $this->input->post('b_utara'),
			'b_timur' 			=> $this->input->post('b_timur'),
			'b_barat' 			=> $this->input->post('b_barat'),
			'b_selatan' 		=> $this->input->post('b_selatan'),
			'status' 			=> 'Belum Dibuat'
		);

		$this->m_bpn->insert($data, 'hasil_pengukuran');

		$data = array(
			'status'  => 'Selesai'
		);

		$where = array(
			'no_pengukuran' => $this->input->post('no_pengukuran')
		);

		$this->m_bpn->update($where, $data, 'pengukuran');

		$this->session->set_flashdata(
			'berhasil',
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
				 Hasil Pengukuran <b>' . $this->input->post('no_pengukuran') . '</b> Berhasil Dikirim! 
				 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				 <span aria-hidden="true">&times;</span>
				 </button></div>'
		);
		redirect('petugas/hasil_pengukuran');
	}
}
