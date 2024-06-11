<?php foreach($hasil as $result){
?>
<form method="post" id="form" name="form" enctype="multipart/form-data">
    <div class="form-group">
        <label>Karyawan</label>
        <input type="hidden" id="idActivity" name="idActivity" value="<?php echo $result->id_activity;?>">
        <select id="karyawan" name="karyawan" class="form-control">
            <option value="<?php echo $result->id_pegawai;?>"><?php echo $result->nik." - ".$result->nama_pegawai;?></option>
            <?php foreach($listKaryawan as $resultlist){
            ?>
                <option value="<?php echo $resultlist['id_pegawai'];?>"><?php echo $resultlist['nik']." - ";?><?php echo $resultlist['nama_pegawai'];?></option>
            <?php
            }?>
        </select>
        <?php echo form_error('jns_kegiatan', '<div class="text-small text-danger"> </div>')?>
    </div>

    <div class="form-group">
        <label>Jenis Kegiatan</label>
        <select id="jns_kegiatan" name="jns_kegiatan" class="form-control">
            <option value="<?php echo $result->id_kegiatan;?>"><?php echo $result->nm_kegiatan;?></option>
            <?php foreach($data as $resultdata){
            ?>
                <option value="<?php echo $resultdata['id_kegiatan'];?>"><?php echo $resultdata['nm_kegiatan'];?></option>
            <?php
            }?>
        </select>
        <?php echo form_error('jns_kegiatan', '<div class="text-small text-danger"> </div>')?>
    </div>

    <div class="form-group">
        <label>Tanggal</label>
        <input type="date" class="form-control" id="dateAct" name="dateAct" value="<?php echo $result->tanggalAct;?>">
        <?php echo form_error('timeInput', '<div class="text-small text-danger"> </div>')?>
    </div>

    <div class="form-group">
        <label>Durasi</label>
        <input type="number" class="form-control" id="timeInput" name="timeInput" value="<?php echo $result->durasiAct;?>">
        <?php echo form_error('timeInput', '<div class="text-small text-danger"> </div>')?>
    </div>
    <div class="form-group">
        <label>Photo</label>
        <input type="file" name="photo" id="photo" class="form-control">
    </div>
    <button id="btnsimpan"name="btnsimpan" type="button" class="btn btn btn-sm btn-success" >Simpan</button>
     <button id="btnbatal"name="btnbatal" type="button" class="btn btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
</form>
<?php    
}?>

<script type="text/javascript">
        $(document).ready(function(){
            $("#btnsimpan").click(function(){
                var files = $('#photo').prop('files');
            //    alert($('#jns_kegiatan').val());
                if (files.length === 0) {
                    var formData = new FormData();
                    formData.append('jns_kegiatan',$('#jns_kegiatan').val());
                    formData.append('timeInput',$('#timeInput').val());
                    formData.append('karyawan',$('#karyawan').val());
                    formData.append('idActivity',$('#idActivity').val());
                    formData.append('dateAct',$('#dateAct').val());
                }else{
                    var file = files[0];
                    var formData = new FormData();
                    formData.append('file', file);
                    formData.append('jns_kegiatan',$('#jns_kegiatan').val());
                    formData.append('timeInput',$('#timeInput').val());
                    formData.append('karyawan',$('#karyawan').val());
                    formData.append('idActivity',$('#idActivity').val());
                    formData.append('dateAct',$('#dateAct').val());
                }
                // alert("asdf");
                console.log(formData);
                $.ajax({
                    url: "<?php echo base_url(); ?>admin/activity/do_edit_activity", // Ganti dengan URL script PHP untuk menangani upload
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        alert("Data berhasil di update");
                        location.reload();
                        // console.log(response);
                    },
                    error: function(xhr, status, error) {
                        alert("Data gagal di update");
                    }
                });
            });
        });
</script> 