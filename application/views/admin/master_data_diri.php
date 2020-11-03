<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
	<div class="d-block mb-4 mb-md-0">
		<nav aria-label="breadcrumb" class="d-none d-md-inline-block">
			<ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
				<li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>
				<li class="breadcrumb-item"><a href="#">BPN Banjarmasin</a></li>
				<li class="breadcrumb-item active" aria-current="page">Admin</li>
			</ol>
		</nav>
		<h2 class="h4">Data Diri Lengkap</h2>
		<p class="mb-0">Berisi seluruh Data diri pemohon dan Petugas.</p>
	</div>
	<!-- <div class="btn-toolbar mb-2 mb-md-0">
		<div class="btn-group"><button type="button" class="btn btn-sm btn-outline-secondary">Share</button> <button type="button" class="btn btn-sm btn-outline-secondary">Export</button></div>
	</div> -->
</div>
<div class="card card-body border-light shadow-sm table-wrapper table-responsive pt-0">
	<br>
	<table id="example" class="table table-hovered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Level</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			foreach ($data as $row) : ?>
				<tr>
					<td><?php echo $no++ ?></td>
					<td>
						<div href="#" class="d-flex align-items-center">
							<div class="d-block"><span class="font-weight-bold"><?php echo $row->nama ?></span>
								<div class="small text-gray"><span>No KTP : <?php echo $row->no_ktp ?></span></div>
							</div>
						</div>
					</td>
					<td><?php echo $row->alamat ?></td>
					<td><?php echo $row->level ?></td>
					<td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detail<?php echo $row->id_user ?>">Detail</button></td>
				</tr>
			<?php endforeach; ?>
	</table>
</div>

<?php foreach ($data as $row) : ?>
	<div class="modal fade" id="detail<?php echo $row->id_user ?>" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title">Detail Data Pemohon : <?php echo $row->nama ?></h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<!-- <div class="lg-avatar text-center">
						<img src="<?php echo base_url() ?>uploads/avatar/<?php echo $row->foto ?>" class="card-img-top rounded-circle border-white" alt="Bonnie Green" style="width:200px; height:200px;">
					</div>
					<hr> -->
					<form>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Nama Lengkap</label>
								<input type="text" class="form-control" value="<?php echo $row->nama ?>" readonly>
							</div>
							<div class="form-group col-md-6">
								<label>No KTP</label>
								<input type="text" class="form-control" value="<?php echo $row->no_ktp ?>" readonly>
							</div>
							<div class="form-group col-md-6">
								<label>Tgl Lahir</label>
								<input type="text" class="form-control" value="<?php echo $row->tgl_lahir ?>" readonly>
							</div>
							<div class="form-group col-md-6">
								<label>Jenis Kelamin</label>
								<input type="text" class="form-control" value="<?php echo $row->jenis_kelamin ?>" readonly>
							</div>
							<div class="form-group col-md-12">
								<label>No HP</label>
								<input type="text" class="form-control" value="<?php echo $row->no_hp ?>" readonly>
							</div>
							<div class="form-group col-md-12">
								<label>Alamat</label>
								<input type="text" class="form-control" value="<?php echo $row->alamat ?>" readonly>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-link text-danger ml-auto" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>