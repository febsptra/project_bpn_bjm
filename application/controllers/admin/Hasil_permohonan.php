<?php

class Hasil_permohonan extends CI_Controller
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
		$data['hasil_permohonan'] = $this->m_bpn->table('hasil_permohonan')->result();
		$this->load->view('template/header');
		$this->load->view('admin/hasil_permohonan/data_hasil_permohonan', $data);
		$this->load->view('template/footer');
	}

	public function buat_surat()
	{
		$jenis_permohonan = $this->input->get('jns_permohonan');
		$where = array('no_permohonan' => $this->input->get('no_permohonan'));
		$data['pengukuran'] = $this->m_bpn->get_where($where, 'hasil_pengukuran')->row_array();
		if ($jenis_permohonan == "hm") {
			$data['permohonan'] = $this->m_bpn->get_where($where, 'permohonan_hm')->row_array();
			$this->load->view('template/header');
			$this->load->view('admin/hasil_permohonan/buat_hasil_permohonan_hm', $data);
			$this->load->view('template/footer');
		} else if ($jenis_permohonan == "hgb") {
			$data['permohonan'] = $this->m_bpn->get_where($where, 'permohonan_hgb')->row_array();
			$this->load->view('template/header');
			$this->load->view('admin/hasil_permohonan/buat_hasil_permohonan_hgb', $data);
			$this->load->view('template/footer');
		}
	}

	public function kirim()
	{
		$data = array(
			'no_permohonan'  	=> $this->input->post('no_permohonan'),
			'jns_permohonan'  	=> $this->input->post('jns_permohonan'),
			'no_pengukuran'  	=> $this->input->post('no_pengukuran'),
			'nama_pemohon' 		=> $this->input->post('nama'),
			'no_ktp_pemohon' 	=> $this->input->post('no_ktp'),
			'no_hp_pemohon' 	=> $this->input->post('no_hp'),
			'hasil' 			=> "Disetujui"
		);

		$this->m_bpn->insert($data, 'hasil_permohonan');

		$data = array(
			'status'  => 'Sudah Dibuat'
		);

		$where = array(
			'no_permohonan' => $this->input->post('no_permohonan')
		);
		$this->m_bpn->update($where, $data, 'hasil_pengukuran');

		$jenis_permohonan = $this->input->post('jns_permohonan');
		if ($jenis_permohonan == "hm") {
			$data = array(
				'status'  => 'Selesai'
			);

			$where = array(
				'no_permohonan' => $this->input->post('no_permohonan')
			);
			$this->m_bpn->update($where, $data, 'permohonan_hm');
		} else if ($jenis_permohonan == "hgb") {
			$data = array(
				'status'  => 'Selesai'
			);

			$where = array(
				'no_permohonan' => $this->input->post('no_permohonan')
			);
			$this->m_bpn->update($where, $data, 'permohonan_hgb');
		}

		$this->session->set_flashdata(
			'berhasil',
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
				 <b>Surat Hasil Permohonan untuk Nomor Permohonan : <b>' . $this->input->post('no_permohonan') . '</b> Berhasil Dibuat! </b>
				 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				 <span aria-hidden="true">&times;</span>
				 </button></div>'
		);

		// SMS GATEWAY SMS GATEWAY SMS GATEWAY SMS GATEWAY SMS GATEWAY SMS GATEWAY SMS GATEWAY SMS GATEWAY SMS GATEWAY SMS GATEWAY //
		$nama = $this->input->post('nama');
		$no_permohonan = $this->input->post('no_permohonan');
		$message =
			"Hallo Bpk/Ibu " . $nama . " , Kami dari BPN Kota Banjarmasin ingin memberitahu bahwa Surat Hasil keputusan Permohonan anda dengan Nomor " . $no_permohonan . " sudah dapat dilihat diWebsite BPN Banjarmasin";

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


		redirect('admin/hasil_permohonan');
	}
}
