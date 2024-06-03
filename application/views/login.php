<div class="banner">
    
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
       <div class="row border rounded-5 p-3 bg-white shadow box-area">
       <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #ADD28C;">
           <div class="featured-image mb-3">
                <img src="./assets/img/login_bg.jpg" class="img-fluid" style="width: 250px;">
           </div>
           <p class="text-black fs-1 "><b></b>SG Healthy Challenges</p>
           <small class="text-black text-wrap text-center">"Energi Positif untuk Kehidupan Sehat"</small>
       </div> 
        
        <div class="col-md-6 right-box">
          <form class="user" method="POST" action="<?php echo base_url('login') ?>">
            <div class="row align-items-center">
                <div class="header-text mb-4">
                    <h2>Log In</h2>
                    <p>Masuk akun SGHC dengan username password</p>
                </div>
                <?php echo $this->session->flashdata('pesan')?>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                  </div>
                  <?php echo form_error('username', '<div class="text-small text-danger"> </div>')?>
                  <div class="input-group mb-5">
                  <input type="password" class="form-control" name="password" placeholder="Password">
                  </div>
                  <?php echo form_error('password', '<div class="text-small text-danger"> </div>')?>
                <div class="input-group mb-2">
                  <input type="submit" class="btn btn-success btn-block" value="Login">
                </div>
          </div>
       </div> 
      </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/main.js"></script>

<style>
.box-area{
    width: 930px;
}
.right-box{
    padding: 40px 30px 40px 40px;
}
::placeholder{
    font-size: 16px;
}
.rounded-4{
    border-radius: 20px;
}
.rounded-5{
    border-radius: 30px;
}
@media only screen and (max-width: 768px){
     .box-area{
        margin: 0 10px;
     }
     .left-box{
        height: 100px;
        overflow: hidden;
     }
     .right-box{
        padding: 20px;
     }
}
</style>

