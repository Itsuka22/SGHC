<div class="container fluid">
  <h2 class="mb-4">Upload Kegiatan</h2>
  <div class="card" style="width: 60%">
    <div class="card-body">
      <form method="POST" action="<?= base_url('pegawai/kegiatan/upload_data')?>" enctype="multipart/form-data">
        <div class="form-group">
          <label>Nama Kegiatan</label>
          <input type="text" name="n_kegiatan" class="form-control">
          <?php echo form_error('n_kegiatan', '<div class="text-small text-danger"> </div>')?>
        </div>
        <div class="form-group">
          <label>Tanggal Masuk</label>
          <input type="datetime-local" name="tanggal" class="form-control">
          <?php echo form_error('tanggal', '<div class="text-small text-danger"> </div>')?>
        </div>
        <div class="form-group">
          <label>Foto Kegiatan</label>
          <input type="file" name="files" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
      </form>
    </div>
  </div>
</div>

