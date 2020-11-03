<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hgb extends CI_Controller
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
		$this->load->view('permohonan/hgb', $data);
		$this->load->view('template/footer');
	}

	public function kirim()
	{
		$kode_berkas = random_string('numeric', 8);

		$formulir_pemohon	= $this->input->post('formulir_pemohon');
		$formulir_pemohon	= $_FILES['formulir_pemohon'];
		if ($formulir_pemohon) {
			$config['upload_path']   = './uploads/permohonan/hgb';
			$config['allowed_types'] = 'jpg|png|jpeg|pdf';
			$config['file_name']     = "formulir-" . $kode_berkas;
			$config['overwrite']	 = true;

			$this->load->library('upload');
			$this->upload->initialize($config);


			if ($this->upload->do_upload('formulir_pemohon')) {
				$formulir_pemohon = $this->upload->data('file_name');
				$this->db->set('formulir_pemohon', $formulir_pemohon);
			} else {
				echo "Upload Foto Gagal!";
			}
		}

		$ktp	= $this->input->post('ktp');
		$ktp	= $_FILES['ktp'];
		if ($ktp) {
			$config['upload_path']   = './uploads/permohonan/hgb';
			$config['allowed_types'] = 'jpg|png|jpeg|pdf';
			$config['file_name']     = "ktp-" . $kode_berkas;
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
			$config['upload_path']   = './uploads/permohonan/hgb';
			$config['allowed_types'] = 'jpg|png|jpeg|pdf';
			$config['file_name']     = "kk-" . $kode_berkas;
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

		$daftar_perusahaan	= $this->input->post('daftar_perusahaan');
		$daftar_perusahaan	= $_FILES['daftar_perusahaan'];
		if ($daftar_perusahaan) {
			$config['upload_path']   = './uploads/permohonan/hgb';
			$config['allowed_types'] = 'jpg|png|jpeg|pdf';
			$config['file_name']     = "daftar_perusahaan-" . $kode_berkas;
			$config['overwrite']	 = true;

			$this->load->library('upload');
			$this->upload->initialize($config);


			if ($this->upload->do_upload('daftar_perusahaan')) {
				$daftar_perusahaan = $this->upload->data('file_name');
				$this->db->set('daftar_perusahaan', $daftar_perusahaan);
			} else {
				echo "Upload Foto Gagal!";
			}
		}

		$surat_izin_penggunaan	= $this->input->post('surat_izin_penggunaan');
		$surat_izin_penggunaan	= $_FILES['surat_izin_penggunaan'];
		if ($surat_izin_penggunaan) {
			$config['upload_path']   = './uploads/permohonan/hgb';
			$config['allowed_types'] = 'jpg|png|jpeg|pdf';
			$config['file_name']     = "surat_izin_penggunaan-" . $kode_berkas;
			$config['overwrite']	 = true;

			$this->load->library('upload');
			$this->upload->initialize($config);


			if ($this->upload->do_upload('surat_izin_penggunaan')) {
				$surat_izin_penggunaan = $this->upload->data('file_name');
				$this->db->set('surat_izin_penggunaan', $surat_izin_penggunaan);
			} else {
				echo "Upload Foto Gagal!";
			}
		}

		$bukti_pemasukan	= $this->input->post('bukti_pemasukan');
		$bukti_pemasukan	= $_FILES['bukti_pemasukan'];
		if ($bukti_pemasukan) {
			$config['upload_path']   = './uploads/permohonan/hgb';
			$config['allowed_types'] = 'jpg|png|jpeg|pdf';
			$config['file_name']     = "bukti_pemasukan-" . $kode_berkas;
			$config['overwrite']	 = true;

			$this->load->library('upload');
			$this->upload->initialize($config);


			if ($this->upload->do_upload('bukti_pemasukan')) {
				$bukti_pemasukan = $this->upload->data('file_name');
				$this->db->set('bukti_pemasukan', $bukti_pemasukan);
			} else {
				echo "Upload Foto Gagal!";
			}
		}

		$surat_bebas_sengketa	= $this->input->post('surat_bebas_sengketa');
		$surat_bebas_sengketa	= $_FILES['surat_bebas_sengketa'];
		if ($surat_bebas_sengketa) {
			$config['upload_path']   = './uploads/permohonan/hgb';
			$config['allowed_types'] = 'jpg|png|jpeg|pdf';
			$config['file_name']     = "surat_bebas_sengketa-" . $kode_berkas;
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

		$surat_tanah_dikuasai	= $this->input->post('surat_tanah_dikuasai');
		$surat_tanah_dikuasai	= $_FILES['surat_tanah_dikuasai'];
		if ($surat_tanah_dikuasai) {
			$config['upload_path']   = './uploads/permohonan/hgb ';
			$config['allowed_types'] = 'jpg|png|jpeg|pdf';
			$config['file_name']     = "surat_tanah_dikuasai-" . $kode_berkas;
			$config['overwrite']	 = true;

			$this->load->library('upload');
			$this->upload->initialize($config);


			if ($this->upload->do_upload('surat_tanah_dikuasai')) {
				$surat_tanah_dikuasai = $this->upload->data('file_name');
				$this->db->set('surat_tanah_dikuasai', $surat_tanah_dikuasai);
			} else {
				echo "Upload Foto Gagal!";
			}
		}

		$data = array(
			'no_permohonan'		=> $this->input->post('no_permohonan'),
			'jns_permohonan'	=> 'hgb',
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

		$this->m_bpn->insert($data, 'permohonan_hgb');
		$this->session->set_flashdata(
			'hgb_berhasil',
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
				 Pengajuan Permohonan HGB (Hak Guna Bangunan) Berhasil Dikirim! Silahkan Cek Halaman <b>"Riwayat Pengajuan Permohonan HGB (Hak Guna Bangunan)"</b>. 
				 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				 <span aria-hidden="true">&times;</span>
				 </button></div>'
		);
		redirect('permohonan/riwayat_permohonan');
	}
}
