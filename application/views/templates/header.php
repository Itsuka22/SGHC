<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Healthy Challenges SG</title>
    <!-- StyleSheets -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/landing/css/bootstrap/bootstrap.min.css" />
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/landing/css/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/landing/css/style.css" />
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
    <a href="#Home">
        <div class="Gototop">
            <i class="fa fa-angle-double-up text-white" aria-hidden="true"></i>
        </div>
    </a>
    <!-- Header Section -->
    <div class="Header" id="Home">
        <nav class="navbar fixed-top">
            <div class="container">
                <div >
                    <img src="./assets/img/logoSG.png" alt="logo" width="50px">
                    <a class="navbar-brand" href="#">Healthy Challenges SG</a>
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
            </div>
        </nav>


