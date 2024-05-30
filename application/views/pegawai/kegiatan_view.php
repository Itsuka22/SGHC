<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
  </div>
  <a class="btn btn-sm btn-success mb-3" href="<?php echo base_url('pegawai/kegiatan/tambah_kegiatan') ?>"><i class="fas fa-plus"></i> Tambah Pegawai</a>
  <?php echo $this->session->flashdata('pesan') ?>
</div>

<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-body mr-1">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-dark">
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Nama Kegiatan</th>
              <th class="text-center">Tanggal</th>
              <th class="text-center">Foto Kegiatan</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; foreach ($kegiatan as $p) : ?>
              <tr>
                <td class="text-center"><?php echo $no++ ?></td>
                <td class="text-center"><?php echo $p['n_kegiatan'] ?></td>
                <td class="text-center"><?php echo $p['tanggal'] ?></td>
                <td class="text-center">
                  <?php $image_path = base_url('assets/files/' . $p['files']); ?>
                  <a href="<?php echo $image_path; ?>" data-lightbox="kegiatan-images">
                    <img src="<?php echo $image_path; ?>" width="50px">
                  </a>
                </td>
                <td class="text-center">
                  <a class="btn btn-sm btn-info" href="<?php echo base_url('pegawai/kegiatan/edit/'.$p['id']) ?>"><i class="fas fa-edit"></i></a>
                  <a onclick="return confirm('Yakin Hapus?')" class="btn btn-sm btn-danger" href="<?php echo base_url('pegawai/kegiatan/delete/'.$p['id']) ?>"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script src="path/to/lightbox.js"></script>
<script>
  lightbox.option({
    // Optional lightbox configuration options here
  });
</script>

<style>
  /* General table styles */
table.table {
  width: 100%; /* Make table span the full width of its container */
  border-collapse: collapse; /* Collapse cell borders for a seamless appearance */
}

table.table th,
table.table td {
  padding: 10px; /* Add padding to table cells for spacing */
  border: 1px solid #ddd; /* Add borders to table cells */
}

/* Responsive styles for small screens (e.g., mobile devices) */
@media (max-width: 768px) {
  table.table th,
  table.table td {
    font-size: 12px; /* Reduce font size for better readability on smaller screens */
  }
}

/* Responsive styles for extra small screens (e.g., very small mobile devices) */
@media (max-width: 576px) {
  table.table th,
  table.table td {
    font-size: 10px; /* Reduce font size even further for extra small screens */
  }
}
</style>
