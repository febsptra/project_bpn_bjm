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
		$this->load->view('admin/pengukuran/data_pengukuran', $data);
		$this->load->view('template/footer');
	}

	public function pengukuran_hm($no)
	{
		$where = array('no' => $no);
		$data['permohonan'] = $this->m_bpn->get_where($where, 'permohonan_hm')->row_array();
		$this->load->view('template/header');
		$this->load->view('admin/pengukuran/tambah_pengukuran', $data);
		$this->load->view('template/footer');
	}

	public function pengukuran_hgb($no)
	{
		$where = array('no' => $no);
		$data['permohonan'] = $this->m_bpn->get_where($where, 'permohonan_hgb')->row_array();
		$this->load->view('template/header');
		$this->load->view('admin/pengukuran/tambah_pengukuran', $data);
		$this->load->view('template/footer');
	}

	public function kirim()
	{
		$this->form_validation->set_rules('no_permohonan', 'no_permohonan', 'is_unique[pengukuran.no_permohonan]', ['is_unique' => 'Surat Pengukuran Untuk Nomor Surat ini Sudah Dibuat! Silahkan Cek Data Surat Pengukuran']);
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata(
				'gagal',
				'<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<b> Surat Pengukuran dengan Nomor Permohonan : ' . $this->input->post('no_permohonan') . ' sudah ada! Silahkan Cek Data Surat Pengukuran Kembali </b>
				 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				 <span aria-hidden="true">&times;</span>
				 </button></div>'
			);
			redirect('admin/pengukuran/pengukuran');
		} else {
			$data = array(
				'no_pengukuran'  	=> $this->input->post('no_pengukuran'),
				'tgl_pengukuran'  	=> $this->input->post('tgl_pengukuran'),
				'no_permohonan'  	=> $this->input->post('no_permohonan'),
				'jns_permohonan'  	=> $this->input->post('jns_permohonan'),
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
				'berhasil',
				'<div class="alert alert-success alert-dismissible fade show" role="alert">
				 <b>Surat Pengukuran untuk Nomor Permohonan : ' . $this->input->post('no_permohonan') . ' Berhasil Dibuat! </b>
				 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				 <span aria-hidden="true">&times;</span>
				 </button></div>'
			);

			// SMS GATEWAY SMS GATEWAY SMS GATEWAY SMS GATEWAY SMS GATEWAY SMS GATEWAY SMS GATEWAY SMS GATEWAY SMS GATEWAY SMS GATEWAY //
			$nama = $this->input->post('nama');
			$tgl = $this->input->post('tgl_pengukuran');
			$message =
				"Hallo Bpk/Ibu " . $nama . " , Kami dari BPN Kota Banjarmasin Menanggapi atas Permohonan anda, Kami akan melakukan pengukuran Tanah yang anda ajukan dan dijadwalkan pada tanggal " . date_indo($tgl) . ". Petugas kami akan menguhubungi anda untuk informasi lebih lanjut, Trimakasih atas perhatianya.";

			$phoneNumber = $this->input->post('no_hp');

			$url = "http://192.168.1.6:8090/SendSMS?username=admin&password=1234&phone=" . $phoneNumber . "&message=" . urlencode($message);
			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			$curl_response = curl_exec($curl);

			if ($curl_response === false) {
				$this->session->set_flashdata(
					'sms_gagal',
					'<div class="alert alert-danger alert-dismissible fade show" role="alert">
					 Gagal Mengirim SMS ke nomor ' . $phoneNumber . '
					 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					 <span aria-hidden="true">&times;</span>
					 </button></div>'
				);
				redirect('admin/pengukuran/pengukuran');
			}

			curl_close($curl);

			$response  = json_decode($curl_response);
			if ($response->status == 200) {
				$this->session->set_flashdata(
					'sms_sukses',
					'<div class="alert alert-success alert-dismissible fade show" role="alert">
					Berhasil Mengirim SMS ke nomor ' . $phoneNumber . '
					 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					 <span aria-hidden="true">&times;</span>
					 </button></div>'
				);
			} else {
				$this->session->set_flashdata(
					'sms_gagal',
					'<div class="alert alert-danger alert-dismissible fade show" role="alert">
					Gagal Mengirim SMS ke nomor ' . $phoneNumber . '
					 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					 <span aria-hidden="true">&times;</span>
					 </button></div>'
				);
			}
			// END SMS GATEWAY SMS GATEWAY SMS GATEWAY SMS GATEWAY SMS GATEWAY SMS GATEWAY SMS GATEWAY SMS GATEWAY SMS GATEWAY SMS GATEWAY //

			redirect('admin/pengukuran/pengukuran');
		}
	}
}
