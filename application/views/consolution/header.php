<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $informasi["title"] ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
    <link rel='shortcut icon' href='<?php echo $informasi['favicon'] ?>' />	
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo assets_url('css/open-iconic-bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo assets_url('css/animate.css');?>">
    
    <link rel="stylesheet" href="<?php echo assets_url('css/owl.carousel.min.css');?>">
    <link rel="stylesheet" href="<?php echo assets_url('css/owl.theme.default.min.css');?>">
    <link rel="stylesheet" href="<?php echo assets_url('css/magnific-popup.css');?>">

    <link rel="stylesheet" href="<?php echo assets_url('css/aos.css');?>">

    <link rel="stylesheet" href="<?php echo assets_url('css/ionicons.min.css');?>">
    
    <link rel="stylesheet" href="<?php echo assets_url('css/flaticon.css');?>">
    <link rel="stylesheet" href="<?php echo assets_url('css/icomoon.css');?>">
    <link rel="stylesheet" href="<?php echo assets_url('css/style.css');?>">

    
	
	
  </head>
  <body>
	  <div class="bg-top navbar-light">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-center align-items-stretch">
    			<div class="col-md-4 d-flex align-items-center py-4">
    				<a class="navbar-brand" href="#"><img src="<?php echo $informasi["logo"]; ?>" height="50"></a>
    			</div>
	    		<div class="col-lg-8 d-block">
		    		<div class="row d-flex">
					    <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
					    	<div class="icon d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
					    	<div class="text">
					    		<span>Email</span>
						    	<span>youremail@email.com</span>
						    </div>
					    </div>
					    <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
					    	<div class="icon d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <div class="text">
						    	<span>Call</span>
						    	<span>Call Us: + 1235 2355 98</span>
						    </div>
					    </div>
					    <div class="col-md topper d-flex align-items-center justify-content-end">
					    	<?php if ($this->session->userdata('session')==TRUE) { ?>
							<p class="mb-0">
					    		<a href="<?php echo base_URL('login/signout');?>" class="btn py-2 px-3 btn-primary d-flex align-items-center justify-content-center">
								<span> <?php echo ucfirst($this->session->userdata('nij'));?> <i class="icon-exit_to_app"></i></span>
					    		</a>
					    	</p>
							
							<?php } else { ?>
							<p class="mb-0">
					    		<a href="<?php echo base_URL('login');?>" class="btn py-2 px-3 btn-primary d-flex align-items-center justify-content-center">
								<span> Login</span>
					    		</a>
					    	</p>
							<?php } ?>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
   
	  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container d-flex align-items-center px-4">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <form action="#" class="searchform order-lg-last">
          <div class="form-group d-flex">
            <input type="text" class="form-control pl-3" placeholder="Search">
            <button type="submit" placeholder="" class="form-control search"><span class="ion-ios-search"></span></button>
          </div>
        </form>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav mr-auto">
                    <?php 

                       foreach ($menu_horizontal  AS $menu) {
                       echo "<li class='nav-item' itemprop='name'>";
                       echo "<a class='nav-link' itemprop='url' href='$menu[url]' target='$menu[target]' >$menu[nama]</a>";
                       echo "</li>";
                       }

                       ?>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    