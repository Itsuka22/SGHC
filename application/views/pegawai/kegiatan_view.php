<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
  </div>
  <a class="btn btn-sm btn-success mb-3" href="<?php echo base_url('pegawai/kegiatan/tambah_kegiatan') ?>"><i class="fas fa-plus"></i> Tambah Pegawai</a>
  <?php echo $this->session->flashdata('pesan') ?>
</div>

<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-body">
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
                  <?php $image_path = base_url('photo/' . $p['files']); ?>
                  <img src="<?php echo $image_path; ?>" width="50px">
                </td> 
                <td class="text-center">
                  <a class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a> 
                  <a onclick="return confirm('Yakin Hapus?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>