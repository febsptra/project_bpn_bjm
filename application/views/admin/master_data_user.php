<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
	<div class="d-block mb-4 mb-md-0">
		<nav aria-label="breadcrumb" class="d-none d-md-inline-block">
			<ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
				<li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>
				<li class="breadcrumb-item"><a href="#">BPN Banjarmasin</a></li>
				<li class="breadcrumb-item active" aria-current="page">Admin</li>
			</ol>
		</nav>
		<h2 class="h4">Data User</h2>
		<p class="mb-0">Berikut adalah data semua user yang terdaftar.</p>
	</div>
</div>
<div class="card card-body border-light shadow-sm table-wrapper table-responsive pt-0">
	<?php echo $this->session->flashdata('edit_sukses') ?>
	<br>
	<table id="example" class="table table-hovered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Username</th>
				<th>Nama</th>
				<th>Level</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			foreach ($data as $row) : ?>
				<tr>
					<td><?php echo $row->id_user ?></td>
					<td><?php echo $row->username ?></td>
					<td>
						<div href="#" class="d-flex align-items-center">
							<img src="<?php echo base_url() ?>uploads/avatar/<?php echo $row->foto ?>" class="user-avatar rounded-circle mr-3" alt="Avatar">
							<div class="d-block"><span class="font-weight-bold"><?php echo $row->nama ?></span>
								<div class="small text-gray"><span>Email : <?php echo $row->email ?></span></div>
							</div>
						</div>
					</td>
					<td>
						<form action="<?php echo base_url() ?>admin/data_user/edit" method="POST">
							<input type="hidden" value="<?php echo $row->id_user ?>" name="id_user" ">
							<div class=" form-group">
							<select class="custom-select" id="level" name="level">
								<option value="<?php echo $row->level ?>" selected><?php echo $row->level ?></option>
								<option value="admin">admin</option>
								<option value="petugas">petugas</option>
								<option value="pemohon">pemohon</option>
							</select>
</div>
</td>
<td><button type="submit" class="btn btn-primary btn-sm">Simpan</button></td>
</form>
</tr>
<?php endforeach; ?>
</table>
</div>