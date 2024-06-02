<div class="banner">

        <div class="container">
            <div class="row Section">
                <div class="col-md-6 offset-md-3">
                    <div class="card shadow-lg mt-5">
                        <div class="card-body">
                            <div class="login-content text-center">
                                <form class="user" method="POST" action="<?php echo base_url('login') ?>">
                                    <h2 class="title mb-4"><font size="5">Login SGHC </font></h2>
                                    <?php echo $this->session->flashdata('pesan')?>
                                    <div class="form-group input-div one">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="username" placeholder="Username">
                                        </div>
                                        <?php echo form_error('username', '<div class="text-small text-danger"> </div>')?>
                                    </div>
                                    <div class="form-group input-div pass">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                            </div>
                                            <input type="password" class="form-control" name="password" placeholder="Password">
                                        </div>
                                        <?php echo form_error('password', '<div class="text-small text-danger"> </div>')?>
                                    </div>
                                    <input type="submit" class="btn btn-primary btn-block" value="Login">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <p>Healthy Challenges merupakan bentuk komitmen menjaga kesehatan pekerja, yang merupakan salah satu aset terpenting bagi perusahaan.</p>
                    </div>
                </div>
            </div>
        </div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/main.js"></script>

<style>

.card {
    border-radius: 10px;
}

.input-group-text {
    background-color: #007bff;
    color: #fff;
}

.btn-primary {
    background-color: #007bff;
    border: none;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.title {
    font-size: 1.5rem; /* Adjust font size for mobile */
}

.form-group {
    margin-bottom: 1.5rem; /* Increase space between form groups for better readability */
}

.text-small {
    font-size: 0.875rem; /* Adjust error message size for mobile */
}

@media (max-width: 450px) {
    .card {
        margin: 20px; /* Add margin for better spacing on small screens */
    }

    .title {
        font-size: 1.25rem; /* Further adjust font size for very small screens */
    }
}
</style>

