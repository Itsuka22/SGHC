<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title?></h1>
  </div>

</div>
<!-- /.container-fluid -->

<div class="card" style="width: 60% ; margin-bottom: 100px">
	<div class="card-body">
		<form method="POST" action="<?php echo base_url('admin/data_pegawai/tambah_data_aksi')?>" enctype="multipart/form-data">
			
			<div class="form-group">
				<label>NIK</label>
				<input type="number" name="nik" class="form-control">
				<?php echo form_error('nik', '<div class="text-small text-danger"> </div>')?>
			</div>

			<div class="form-group">
				<label>Nama Pegawai</label>
				<input type="text" name="nama_pegawai" class="form-control">
				<?php echo form_error('nama_pegawai', '<div class="text-small text-danger"> </div>')?>
			</div>

			<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" class="form-control">
				<?php echo form_error('username', '<div class="text-small text-danger"> </div>')?>
			</div>

			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control">
				<?php echo form_error('password', '<div class="text-small text-danger"> </div>')?>
			</div>

			<div class="form-group">
				<label>Jenis Kelamin</label>
				<select name="jenis_kelamin" class="form-control">
					<option value="">--Pilih Jenis Kelamin--</option>
					<option value="Laki-Laki">Laki-Laki</option>
					<option value="Perempuan">Perempuan</option>
				</select>
				<?php echo form_error('jenis_kelamin', '<div class="text-small text-danger"> </div>')?>
			</div>

			<div class="form-group">
				<label>Status</label>
				<select name="status" class="form-control">
					<option value="">--Pilih Status--</option>
					<option value="Karyawan Tetap">Karyawan Tetap</option>
					<option value="Karyawan Tidak Tetap">Karyawan Tidak Tetap</option>
				</select>
				<?php echo form_error('status', '<div class="text-small text-danger"> </div>')?>
			</div>

			<div class="form-group">
				<label>Hak Akses</label>
				<select name="hak_akses" class="form-control">
					<option value="">--Pilih Hak Akses--</option>
					<option value="1">Admin</option>
					<option value="2">Pegawai</option>
				</select>
			</div>

			<div class="form-group">
				<label>Photo</label>
				<input type="file" name="photo" class="form-control">
			</div>


			<button type="submit" name="btSimpan" id="btSimpan" class="btn btn-success" >Simpan</button>
			<button type="reset" class="btn btn-danger" >Reset</button>
			<a href="<?php echo base_url('admin/data_pegawai')?>" class="btn btn-warning">Kembali</a>

		</form>
	</div>
</div>

<!-- <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
	$('#btSimpan').click(function() {
        alert('This is a simple alert!');
    });
	});
</script> -->