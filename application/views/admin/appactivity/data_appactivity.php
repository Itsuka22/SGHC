<div class="container-fluid">
  <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
            <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="judul"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div id="tampil_modal">
                        <div class="form-group">
                            <label>Reason</label>
                            <input type="hidden" name="idActivity" id="idActivity">
                            <input type="text" class="form-control" id="reasonAct" name="reasonAct">
                            <?php echo form_error('timeInput', '<div class="text-small text-danger"> </div>')?>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                <button id="btnsimpan"name="btnsimpan" type="button" class="btn btn btn-sm btn-success" >Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <input id="myInput" class="form-control" type="text"placeholder="Search..">
        </div>
    </div>
    <br>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th style="width: 13%;">Karyawan</th>
                            <th>Tanggal</th>
                            <th>Durasi</th>
                            <th>Kegiatan</th>
                            <th>File</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no=1;
                            foreach ($data as $item)
                            {
                        ?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $item->nama_pegawai;?></td>
                            <td><?php echo $item->tanggalAct;?></td>
                            <td><?php echo $item->durasiAct;?></td>
                            <!-- <td><?php echo $item->durasiAct;?></td> -->
                            <td><?php echo $item->nm_kegiatan;?></td>
                            <td><img src="<?php echo base_url().'photo/'.$item->photoAct;?>" width="400px"/></td>
                            <td>
                                <?php if($item->statusAct==0)
                                {
                                    echo "<b>Data On Review</b>";
                                }elseif($item->statusAct==2)
                                {
                                    echo "<b><font color='Red'>Data Rejected</font></b>";
                                }else{
                                    echo "<b>Data Approved</b>";
                                }?>
                            </td>
                            <td>
                                <?php if($item->statusAct==0)
                                {
                                  ?>
                                  <button type="button" activity="<?php echo $item->id_activity; ?>" class="app btn btn-sm btn-success"><i class="fas fa-edit"></i><br>Setujui</br></button>
                                  <button type="button" activity="<?php echo $item->id_activity; ?>" data-target="#myModal" class="reject btn btn-sm btn-danger"><i class="fas fa-times"></i><br>Tolak</br></button>
                                  <?php
                                }elseif($item->statusAct==2)
                                {
                                    ?>
                                    <button type="button" activity="<?php echo $item->id_activity; ?>" class="app btn btn-sm btn-success"><i class="fas fa-edit"></i>Setujui</button>
                                    <?php
                                    echo "<br><b>".$item->reasonAct."</b>";
                                }?>
                            
                            </td>
                        </tr>
                        <?php
                            $no++;
                            }
                        ?>
                    </tbody>
                </table>
                <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <?php echo $pagination; ?>
                        </ul>
                  </nav>
            </div>
        </div>
    </div>
</div>

</script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<script>
    $(document).ready(function(){

        $('.app').click(function(){
            var activity = $(this).attr("activity");
            $.ajax({
                url: '<?php echo base_url(); ?>admin/appactivity/app_activity',
                method: 'post',
                data: {id_activity:activity},
                success:function(data){
                    location.reload();
                    // $('#myModal').modal("show");
                    // $('#tampil_modal').html(data);
                    // document.getElementById("judul").innerHTML='Edit Activity';  
                }
            });
        });
        $('.reject').click(function(){
            var activity = $(this).attr("activity");
            // alert(activity);
            $('#myModal').modal("show");
            document.getElementById("judul").innerHTML='Reason Activity';  
            $('#idActivity').val(activity);
        });
        $("#btnsimpan").click(function(){
            var id_activity=$('#idActivity').val();
            var reasonAct=$('#reasonAct').val();
            $.ajax({
                url: '<?php echo base_url(); ?>admin/appactivity/hapus_activity',
                method: 'post',
                data: {id_activity:id_activity,reasonAct:reasonAct},
                success:function(data){
                    location.reload();
                    // $('#myModal').modal("show");
                    // $('#tampil_modal').html(data);
                    // document.getElementById("judul").innerHTML='Edit Activity';  
                }
            });
        });
        // $('.reject').click(function(){
        //     var activity = $(this).attr("activity");
        //     $.ajax({
        //         url: '<?php echo base_url(); ?>admin/appactivity/hapus_activity',
        //         method: 'post',
        //         data: {id_activity:activity},
        //         success:function(data){
        //             $('#myModal').modal("show");
        //             $('#tampil_modal').html(data);
        //             document.getElementById("judul").innerHTML='Reason Activity';  
        //         }
        //     });
        // });
    });
</script>
