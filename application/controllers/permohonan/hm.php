<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hm extends CI_Controller
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
		$data['data_diri'] = $this->m_bpn->get_where($where, 'data_diri')->row_array();
		$this->load->view('template/header');
		$this->load->view('permohonan/hm', $data);
		$this->load->view('template/footer');
	}

	public function kirim()
	{
		$kode_berkas = random_string('numeric', 8);
		$akta_jb = $this->input->post('akta_jb');
		$akta_jb = $_FILES['akta_jb'];
		if ($akta_jb) {
			$config['upload_path']   = './uploads/permohonan/hm/';
			$config['allowed_types'] = 'jpg|png|jpeg|pdf';
			$config['file_name']     = "AktaJB-" . $kode_berkas;
			$config['overwrite']	 = true;

			$this->load->library('upload');
			$this->upload->initialize($config);


			if ($this->upload->do_upload('akta_jb')) {
				$akta_jb = $this->upload->data('file_name');
				$this->db->set('akta_jb', $akta_jb);
			} else {
				echo "Upload Foto Gagal!";
			}
		}

		$ktp = $this->input->post('ktp');
		$ktp = $_FILES['ktp'];
		if ($ktp) {
			$config['upload_path']   = './uploads/permohonan/hm/';
			$config['allowed_types'] = 'jpg|png|jpeg|pdf';
			$config['file_name']     = "KTP-" . $kode_berkas;
			$config['overwrite']	 = true;

			$this->load->library('upload');
			$this->upload->initialize($config);


			if ($this->upload->do_upload('ktp')) {
				$ktp = $this->upload->data('file_name');
				$this->db->set('ktp', $ktp);
			} else {
				echo "Upload Foto Gagal!";
			}
		}

		$kk	= $this->input->post('kk');
		$kk	= $_FILES['kk'];
		if ($kk) {
			$config['upload_path']   = './uploads/permohonan/hm/';
			$config['allowed_types'] = 'jpg|png|jpeg|pdf';
			$config['file_name']     = "KK-" . $kode_berkas;
			$config['overwrite']	 = true;

			$this->load->library('upload');
			$this->upload->initialize($config);


			if ($this->upload->do_upload('kk')) {
				$kk = $this->upload->data('file_name');
				$this->db->set('kk', $kk);
			} else {
				echo "Upload Foto Gagal!";
			}
		}

		$girik	= $this->input->post('girik');
		$girik	= $_FILES['girik'];
		if ($girik) {
			$config['upload_path']   = './uploads/permohonan/hm/';
			$config['allowed_types'] = 'jpg|png|jpeg|pdf';
			$config['file_name']     = "girik-" . $kode_berkas;
			$config['overwrite']	 = true;

			$this->load->library('upload');
			$this->upload->initialize($config);


			if ($this->upload->do_upload('girik')) {
				$girik = $this->upload->data('file_name');
				$this->db->set('girik', $girik);
			} else {
				echo "Upload Foto Gagal!";
			}
		}

		$surat_bebas_sengketa	= $this->input->post('surat_bebas_sengketa');
		$surat_bebas_sengketa	= $_FILES['surat_bebas_sengketa'];
		if ($surat_bebas_sengketa) {
			$config['upload_path']   = './uploads/permohonan/hm/';
			$config['allowed_types'] = 'jpg|png|jpeg|pdf';
			$config['file_name']     = "sbs-" . $kode_berkas;
			$config['overwrite']	 = true;

			$this->load->library('upload');
			$this->upload->initialize($config);


			if ($this->upload->do_upload('surat_bebas_sengketa')) {
				$surat_bebas_sengketa = $this->upload->data('file_name');
				$this->db->set('surat_bebas_sengketa', $surat_bebas_sengketa);
			} else {
				echo "Upload Foto Gagal!";
			}
		}

		$surat_riwayat_tanah	= $this->input->post('surat_riwayat_tanah');
		$surat_riwayat_tanah	= $_FILES['surat_riwayat_tanah'];
		if ($surat_riwayat_tanah) {
			$config['upload_path']   = './uploads/permohonan/hm/';
			$config['allowed_types'] = 'jpg|png|jpeg|pdf';
			$config['file_name']     = "srt-" . $kode_berkas;
			$config['overwrite']	 = true;

			$this->load->library('upload');
			$this->upload->initialize($config);


			if ($this->upload->do_upload('surat_riwayat_tanah')) {
				$surat_riwayat_tanah = $this->upload->data('file_name');
				$this->db->set('surat_riwayat_tanah', $surat_riwayat_tanah);
			} else {
				echo "Upload Foto Gagal!";
			}
		}

		$data = array(
			'no_permohonan'		=> $this->input->post('no_permohonan'),
			'jns_permohonan'	=> 'hm',
			'id_user'  			=> $this->session->userdata('id_user'),
			'nama' 				=> $this->input->post('nama'),
			'no_ktp' 			=> $this->input->post('no_ktp'),
			'tgl_lahir'			=> $this->input->post('tgl_lahir'),
			'alamat'  			=> $this->input->post('alamat'),
			'jenis_kelamin' 	=> $this->input->post('jenis_kelamin'),
			'no_hp' 			=> $this->input->post('no_hp'),
			'alamat_tanah' 		=> $this->input->post('alamat_tanah'),
			'desa_kel' 			=> $this->input->post('desa_kel'),
			'kecamatan' 		=> $this->input->post('kecamatan'),
			'luas_tanah' 		=> $this->input->post('luas_tanah'),
			'status'			=> 'Menunggu'
		);

		$this->m_bpn->insert($data, 'permohonan_hm');
		$this->session->set_flashdata(
			'hm_berhasil',
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
				 Pengajuan Permohonan HM (Hak Milik) Berhasil Dikirim! 
				 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				 <span aria-hidden="true">&times;</span>
				 </button></div>'
		);
		redirect('permohonan/riwayat_permohonan');
	}
}
