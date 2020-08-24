<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $informasi["title"] ?></title>
    <meta name="description" content="<?php echo $informasi['meta_deskripsi']; ?>" />
	<meta name="keywords" content="<?php echo $informasi['meta_keyword']; ?>" />
	<meta name="author" content="<?php echo $informasi['author']; ?>" />

	<meta property="og:url" content="<?php echo $informasi['og-url'];  ?>" />
	<meta property="og:title" content="<?php echo $informasi['og-title']; ?>" />
	<meta property="og:description" content="<?php echo $informasi["og-description"]; ?>" />
	<meta property="og:site_name" content="<?php echo $informasi['og-site_name']; ?>" />
	<meta property="og:image" content="<?php echo $informasi['og-image']; ?>" />
	<meta property="og:image:type" content="image/jpeg" />
	<meta property="og:type" content="<?php echo $informasi['og-type']; ?>" />
	<?php if($informasi["current_page"]=="detail-artikel"){ ?>
	<meta property="article:author" content="<?php echo $informasi['article-author']; ?>" />
	<meta property="article:publisher" content="<?php echo $informasi['article-publisher']; ?>" />
	<meta property="article:published_time" content="<?php echo $informasi['article-published_time']; ?>" />
    <?php } ?>
  <!-- Favicons -->
  <link href="<?php echo assets_url('assets/img/favicon.png');?>" rel="icon">
  <link href="<?php echo assets_url('assets/img/apple-touch-icon.png');?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo assets_url('assets/vendor/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
  <link href="<?php echo assets_url('assets/vendor/icofont/icofont.min.css');?>" rel="stylesheet">
  <link href="<?php echo assets_url('assets/vendor/boxicons/css/boxicons.min.css');?>" rel="stylesheet">
  <link href="<?php echo assets_url('assets/vendor/venobox/venobox.css');?>" rel="stylesheet">
  <link href="<?php echo assets_url('assets/vendor/animate.css/animate.min.css');?>" rel="stylesheet">
  <link href="<?php echo assets_url('assets/vendor/remixicon/remixicon.css');?>" rel="stylesheet">
  <link href="<?php echo assets_url('assets/vendor/owl.carousel/assets/owl.carousel.min.css');?>" rel="stylesheet">
  <link href="<?php echo assets_url('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css');?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo assets_url('assets/css/style.css');?>" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medilab - v2.0.0
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-envelope"></i> <a href="mailto:contact@example.com">majelis@gkijefsi.or.id</a>
        <i class="icofont-phone"></i> (0986) 215608
        <i class="icofont-google-map"></i> JL Pertanian Wosi, Manokwari Barat, Kabupaten Manokwari, Papua Barat. 98312
      </div>
      <div class="social-links">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="skype"><i class="icofont-skype"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.html"><img src="<?php echo $informasi["logo"]; ?>" height="50"></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
      <ul>
          <li class="active"><a href="<?php echo baseURL(); ?>">Beranda</a></li>
          <?php 

                       foreach ($menu_horizontal  AS $menu) {
                       echo "<li class='nav-item' itemprop='name'>";
                       echo "<a class='nav-link' itemprop='url' href='$menu[url]' target='$menu[target]' >$menu[nama]</a>";
                       echo "</li>";
                       }

                       ?>
            

        </ul>
      </nav><!-- .nav-menu -->


    </div>
  </header><!-- End Header -->
