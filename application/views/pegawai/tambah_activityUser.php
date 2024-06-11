
<form method="post" id="form" name="form" enctype="multipart/form-data">
    <div class="form-group">
        <label>Jenis Kegiatan</label>
        <select id="jns_kegiatan" name="jns_kegiatan" class="form-control">
            <option value="">--Pilih Jenis Kegiatan--</option>
            <?php foreach($data as $result){
            ?>
                <option value="<?php echo $result['id_kegiatan'];?>"><?php echo $result['nm_kegiatan'];?></option>
            <?php
            }?>
        </select>
        <?php echo form_error('jns_kegiatan', '<div class="text-small text-danger"> </div>')?>
    </div>
    <div class="form-group">
        <label>Tanggal</label>
        <input type="date" class="form-control" id="dateAct" name="dateAct">
        <?php echo form_error('timeInput', '<div class="text-small text-danger"> </div>')?>
    </div>
    <div class="form-group">
        <label>Durasi /Menit</label>
        <input type="number" class="form-control" id="timeInput" name="timeInput">
        <?php echo form_error('timeInput', '<div class="text-small text-danger"> </div>')?>
    </div>
    <div class="form-group">
        <label>Photo</label>
        <input type="file" name="photo" id="photo" class="form-control">
    </div>
    <button id="btnsimpan"name="btnsimpan" type="button" class="btn btn btn-sm btn-success" data-dismiss="modal">Simpan</button>
     <button id="btnbatal"name="btnbatal" type="button" class="btn btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        $('#btnsimpan').on('click', function() {

            // alert($('#dateAct').val());
                var files = $('#photo').prop('files');

                if (files.length === 0) {
                    // $('#result').text('Pilih file terlebih dahulu.');
                    return;
                }

                var file = files[0];
                var formData = new FormData();
                formData.append('file', file);
                formData.append('jns_kegiatan',$('#jns_kegiatan').val());
                formData.append('timeInput',$('#timeInput').val());
                formData.append('dateAct',$('#dateAct').val());
                $.ajax({
                    url: "<?php echo base_url(); ?>pegawai/activityuser/simpanActivity", // Ganti dengan URL script PHP untuk menangani upload
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        alert(response.message);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        var response = jqXHR.responseJSON;
                        if (response && response.status === "Error") {
                            $('#errorMessage').text(response.message);
                        } else {
                            $('#errorMessage').text('Terjadi kesalahan yang tidak diketahui.');
                        }
                        console.error('Error:', response);
                    }
                });
            });
    });
</script> 