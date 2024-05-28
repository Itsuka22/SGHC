<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title?></h1>
  </div>

</div>
<div class="container-fluid">
  <div class="card" style="width: 60%">
    <div class="card-body">

    <?php foreach ($kegiatan as $k) : ?>  
      <?php echo $this->session->flashdata('message');?>
      <form method="POST" action="<?= base_url('pegawai/kegiatan/update')?>" enctype="multipart/form-data">
        <div class="form-group">
          <label>Nama Kegiatan</label>
				  <input type="hidden" name="id_pegawai" class="form-control" value="<?php echo $k->id?>">
          <input type="text" name="n_kegiatan" class="form-control" value="<?php echo $k->n_kegiatan?>">
          <?php echo form_error('n_kegiatan', '<div class="text-small text-danger"> </div>')?>
        </div>
        <button type="submit" class="btn btn-success" >Simpan</button>
      <?php endforeach; ?>
    </div>
  </div>
</div>
