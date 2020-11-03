<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
	<div class="d-block mb-4 mb-md-0">
		<nav aria-label="breadcrumb" class="d-none d-md-inline-block">
			<ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
				<li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>
				<li class="breadcrumb-item"><a href="#">BPN Banjarmasin</a></li>
				<li class="breadcrumb-item active" aria-current="page">Admin</li>
			</ol>
		</nav>
		<h2 class="h4">Hasil Permohonan</h2>
		<p class="mb-0">Berikut adalah Seluruh Data Hasil Permohonan.</p>
	</div>
</div>
<?php echo $this->session->flashdata('berhasil') ?>
<?php echo $this->session->flashdata('sms_sukses') ?>
<?php echo $this->session->flashdata('sms_gagal') ?>
<div class="card card-header bg-primary text-light">
	<h2 class="h3"><i class="fas fa-envelope-open-text"></i> Data Hasil Permohonan</h3>
</div>
<div class="card card-body border-light shadow-sm table-wrapper table-responsive pt-0">
	<br>
	<br>
	<table id="example" class="table table-hovered" style="width:100%">
		<thead>
			<tr>
				<th>Nomor permohonan</th>
				<th>Nomor pengukuran</th>
				<th>Nama Pemohon</th>
				<th>Tgl Surat Dibuat</th>
				<th>Hasil</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($hasil_permohonan as $row) : ?>
				<tr>
					<td>
						<?php echo $row->no_permohonan ?>
					</td>
					<td>
						<?php echo $row->no_pengukuran ?>
					</td>
					<td>
						<div href="#" class="d-flex align-items-center">
							<div class="d-block"><span class="font-weight-bold"><?php echo $row->nama_pemohon ?></span>
								<div class="small text-gray"><span>No HP : <?php echo $row->no_hp_pemohon ?></span></div>
							</div>
						</div>
					</td>
					<td><?php echo date_indo($row->tgl_hasil) ?></td>
					<td>
						<?php echo $row->hasil ?>
					</td>
					<td>
						<div class="text-center">
							<form action="<?php echo base_url() ?>report/surat_hasil_permohonan" method="get">
								<button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#modal-peng-<?php echo $row->no_surat ?>"><i class="fas fa-info"></i> Detail Hasil</button>
								<input type="hidden" name="no_permohonan" value="<?php echo $row->no_permohonan ?>">
								<input type="hidden" name="jns_permohonan" value="<?php echo $row->jns_permohonan ?>">
								<button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-print"></i> Cetak</button>
							</form>
						</div>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>

<div class="modal fade" id="cetak" tabindex="-1" role="dialog" aria-labelledby="cetak" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title">Cetak Data Hasil Permohonan</h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<a class="btn btn-primary mb-3" href="<?php echo base_url() . 'report/arsip_hasil_permohonan'; ?>" target="_blank" rel="nofollow">
					<i class="fas fa-print"></i> Print Seluruh Data Hasil Permohonan</a>
				<br>
				<p>
					-- Atau --
				</p>
				<!-- CARI Data -->
				<form class="form-validate" method="get" action="<?php echo base_url() . 'admin/data_penjualan/print_cari'; ?>" target="_blank" rel="nofollow">
					<div class="form-row">
						<div class="col-4">
							<input type="date" name="tgl_awal" id="tgl_awal" class="form-control" required data-msg="Mohon Masukan Tanggal Awal." required>
						</div>
						<label for="colFormLabel" class="col-form-label">Sampai</label>
						<div class="col-4">
							<input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control" required data-msg="Mohon Masukan Tanggal Akhir." required>
						</div>
						<button type="submit" class="btn btn-primary ml-3"><i class="fas fa-print"></i> Print</button>
					</div>
				</form>
				<!-- END CARI Data -->
				<br>
			</div>
		</div>
	</div>
</div>