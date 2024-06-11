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
		<?php foreach ($jns_kegiatan as $j): ?>
		<form method="POST" action="<?php echo base_url('admin/data_jabatan/update_data_aksi')?>">
			
			<div class="form-group">
				<label>Jenis Kegiatan</label>
				<input type="hidden" name="id_kegiatan" class="form-control" value="<?php echo $j->id_kegiatan?>">
				<input type="text" name="jns_kegiatan" class="form-control" value="<?php echo $j->nm_kegiatan?>">
				<?php echo form_error('nama_jabatan', '<div class="text-small text-danger"> </div>')?>
			</div>

			<div class="form-group">
				<label>Gaji Pokok</label>
				<select name="status" class="form-control">
					<option value="<?php echo $j->status?>"><?php if($j->status=1){echo "Aktif";}else{echo "Non Aktif";} ?></option>
					<option value="1">Aktif</option>
					<option value="0">Non Aktif</option>
				</select>
				<?php echo form_error('status', '<div class="text-small text-danger"> </div>')?>
			</div>
			<button type="submit" class="btn btn-success" >Simpan</button>
			<a href="<?php echo base_url('admin/data_jabatan')?>" class="btn btn-warning">Kembali</a>

		</form>
	<?php endforeach; ?>
	</div>
</div>