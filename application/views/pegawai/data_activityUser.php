<div class="container-fluid">
    <div id="tampil">
        <button type="button" class="tambah btn-sm btn-success mb-3" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i> Tambah Activity</button>
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
                            <!-- Data akan di tampilkan disini-->
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4">
                <input id="myInput" class="form-control" type="text" placeholder="Search..">
            </div>
        </div>
        <br>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Karyawan</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Kegiatan</th>
                                <th class="text-center">File</th>
                                <th class="text-center">Status</th>
                                <th colspan='2'>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = $this->uri->segment(3) + 1;
                            foreach ($data as $item) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $item->nama_pegawai; ?></td>
                                    <td><?php echo $item->tanggalAct; ?></td>
                                    <td><?php echo $item->nm_kegiatan; ?></td>
                                    <td><img src="<?php echo base_url().'photo/'.$item->photoAct; ?>" width="500px"/></td>
                                    <td>
                                        <?php if($item->statusAct == 0) {
                                            echo "<b>Data On Review</b>";
                                        } elseif($item->statusAct == 2) {
                                            echo "<b><font color='Red'>Data Rejected</font></b>";
                                        } else {
                                            echo "<b>Data Approved</b>";
                                        }?>
                                    </td>
                                    <?php if($item->statusAct == 1) { ?>
                                    <td><b>The data cannot be changed<b></td>
                                    <?php } else { ?>
                                    <td>
                                        <div style="display: flex; flex-direction: column; align-items: flex-start;">
                                            <?php if($item->statusAct == 0) { ?>
                                            <div class="action-buttons">
                                                <button type="button" activity="<?php echo $item->id_activity; ?>" class="edit btn btn-sm btn-info"><i class="fas fa-edit"></i></button>
                                                <button type="button" activity="<?php echo $item->id_activity; ?>" class="hapus btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                            </div>
                                            <?php } elseif($item->statusAct == 2) { ?>
                                            <button type="button" activity="<?php echo $item->id_activity; ?>" class="edit btn btn-sm btn-info"><i class="fas fa-edit"></i></button>
                                            <span><b><?php echo $item->reasonAct; ?></b></span>
                                            <?php } ?>
                                        </div>
                                    </td>
                                    <?php } ?>
                                </tr>
                            <?php
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="pagination-links">
                        <?php echo isset($pagination) ? $pagination : ''; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- <script type="text/javascript">
$(document).ready(function() {
    $.ajax({
        type: 'POST',
        url: "<?php echo base_url(); ?>pegawai/activityuser/TampilActivity",
        cache: false,
        success: function(data) {
            $("#tampil").html(data);
        }
    });

});


</script> -->



<script>

    // $(document).ready(function() {
    //     $('#dataTable').DataTable({
    //     "processing": true,
    //     "serverSide": true,
    //     "ajax": {
    //     "url": "<?php echo base_url(); ?>pegawai/activityuser/TampilActivity",
    //     "type": "POST"
    //     },
    //     "columns": [
    //     { "data":  "id_activity"},
    //     { "data": "nama_pegawai" },
    //     { "data": "tanggalAct" },
    //     { "data": "nm_kegiatan" },
    //     { 
    //         "data": "photoAct",
    //         "render": function(data, type, row) {
    //         return '<img src="<?php echo base_url(); ?>photo/' + data + '" width="100"/>';
    //         }
    //     },
    //     { 
    //         "data": "statusAct",
    //         "render": function(data, type, row) {
    //         if (data == 0) return "<b>Data On Review</b>";
    //         if (data == 2) return "<b><font color='Red'>Data Rejected</font></b>";
    //         return "<b>Data Approved</b>";
    //         }
    //     },
    //     {
    //         "data": null,
    //         "render": function(data, type, row) {
    //         if (row.statusAct == 1) {
    //             return '<b>The data cannot be changed</b>';
    //         } else {
    //             let buttons = '';
    //             if (row.statusAct == 0) {
    //             buttons += `<button type="button" activity="${row.id}" class="edit btn btn-sm btn-info"><i class="fas fa-edit"></i></button>`;
    //             buttons += `<button type="button" activity="${row.id}" class="hapus btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>`;
    //             } else if (row.statusAct == 2) {
    //             buttons += `<button type="button" activity="${row.id}" class="edit btn btn-sm btn-info"><i class="fas fa-edit"></i></button>`;
    //             buttons += `<span><b>${row.reasonAct}</b></span>`;
    //             }
    //             return `<div style="display: flex; flex-direction: column; align-items: flex-start;">${buttons}</div>`;
    //         }
    //         }
    //     }
    //     ]
    // });
    // });
    $(document).ready(function(){
        $('.tambah').click(function(){
        var aksi = 'Tambah Potongan Gaji';
        $.ajax({
            url: '<?php echo base_url(); ?>pegawai/activityuser/tambah_activity',
            method: 'post',
            data: {aksi:aksi},
            success:function(data){
                $('#myModal').modal("show");
                $('#tampil_modal').html(data);
                document.getElementById("judul").innerHTML='';

            }
        });
        });

        $('.edit').click(function(){

            var activity = $(this).attr("activity");
            $.ajax({
                url: '<?php echo base_url(); ?>pegawai/activityuser/edit_activity',
                method: 'post',
                data: {id_activity:activity},
                success:function(data){
                    $('#myModal').modal("show");
                    $('#tampil_modal').html(data);
                    document.getElementById("judul").innerHTML='Edit Activity';  
                }
            });
        });

        $('.hapus').click(function(){

            var activity = $(this).attr("activity");
            $.ajax({
                url: '<?php echo base_url(); ?>pegawai/activityuser/hapus_activity',
                method: 'post',
                data: {id_activity:activity},
                success:function(data){
                    location.reload();
                    // $('#sukses').show();
                    // $('#tampil_modal').html(data);
                    // document.getElementById("judul").innerHTML='Hapus Potongan';
                }
            });
            });
    });
</script>

<!-- <style>
    .table td div {
        display: flex;
        align-items: center;
    }
    .table td div span {
        margin-top: 5px;
        color: red;
    }

    .action-buttons {
        display: flex;
        gap: 5px;
        justify-content: center;
        align-items: center;
    }
    .action-buttons .btn {
        margin: 0 2px;
    }
</style> -->