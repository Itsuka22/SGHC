<div class="container fluid">
  <h2 class="mb-4">Upload Kegiatan</h2>
  <div class="card" style="width: 60%">
    <div class="card-body">
    <form action="upload_kegiatan.php" action="<?= base_url('pegawai/kegiatan/upload')?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="activityName">Nama Kegiatan</label>
                <input type="text" class="form-control" id="activityName" name="activityName" required>
            </div>
            <div class="form-group">
            <label>Tanggal Masuk</label>
            <input type="date" name="tanggal" class="form-control">
            <?php echo form_error('tanggal', '<div class="text-small text-danger"> </div>')?>
			</div>
            <div class="form-group">
                <label for="activityImage">Upload Gambar</label>
                <input type="file" class="form-control-file" id="activityImage" name="activityImage" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
  </div>
</div>

