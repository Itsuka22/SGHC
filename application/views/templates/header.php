<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Healthy Challenges SG</title>
    <!-- StyleSheets -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/landing/css/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/landing/css/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/page/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Pre Loader -->
    <div class="Loader" id="Loader">
        <div class="LoaderWrapper">
            <div class="circleBall"></div>
            <div class="circleBall"></div>
            <div class="circleBall"></div>
        </div>
    </div>
    <!-- Go to top Button -->
    <!-- <a href="#Home">
        <div class="Gototop">
            <i class="fa fa-angle-double-up text-white" aria-hidden="true"></i>
        </div>
    </a> -->
    <!-- Header Section -->
      <div class="Header" id="Home">
        <nav class="navbar fixed-top">
          <div class="navbar-logo-title">
            <img src="./assets/img/logoSG.png" alt="logo" width="40em">
            <a class="navbar-brand" href="<?= base_url("landing_page") ?>">Healthy Challenges</a>
          </div>
                <div class="collapse_menu deactive">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                    <i class="fa fa-times" aria-hidden="true"></i>
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url("landing_page") ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url("leaderboard") ?>">Leaderboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('login');?>">Login</a>
                        </li>
                    </ul>
                </div>
        </nav>
      </div>

<script>
  const navEl = document.querySelector('.navbar');

  window.addEventListener('scroll', () => {
    if (window.scrollY >= 56) {
      navEl.classList.add('navbar-scrolled');
    } else {
      navEl.classList.remove('navbar-scrolled');
    }
  });
</script>




