<div class="banner">
            <div class="layer">
                <div class="row Section">
                    <div class="col">
                        <div class="box">
                            <div>
                                <h2><b><i></i></b></h2>
                            </div>
                            <p>Healthy Challenges merupakan bentuk komitmen menjaga kesehatan pekerja, yang merupakan salah satu aset terpenting bagi perusahaan </p>
                        </div>
                    </div>
                    <div class="col headerImg" style="background-image: url('<?php echo base_url()?>assets/img/uangg.svg');"></div>
                    <div class="col-12 Dicover_Parent">
                        <a href="#AboutMe">
                            <div class="Discover">
                                <i class="fa fa-angle-double-down text-white" aria-hidden="true"></i>
                            </div>
                        </a>
                    </div>
                    <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Leaderboard Table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="20px">No</th>
                                            <th>Username</th>
                                            <th width="100px">Point</th>
                                            <th width="100px">Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; foreach ($leaderboard as $row): ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row['username']; ?></td>
                                            <td><?php echo $row['activity_count']; ?></td>
                                            <!-- <td><?php echo $row->point; ?></td> -->
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>

<style>
    .banner {
    background-color: #f8f9fa;
    padding: 20px 0;
}

.headerImg {
    background-size: cover;
    background-position: center;
    height: 250px;
}

.card {
    border-radius: 10px;
}

.btn-primary {
    background-color: #007bff;
    border: none;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.table-responsive {
    margin-top: 20px;
}

@media (max-width: 768px) {
    .headerImg {
        height: 200px;
    }

    .text-center {
        text-align: center !important;
    }

    .btn {
        width: 100%;
        margin-top: 10px;
    }
}

@media (max-width: 576px) {
    .headerImg {
        height: 150px;
    }

    .btn {
        width: 100%;
        margin-top: 10px;
    }
}
</style>
