<section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo assets_url('images/bg_1.jpg');?>');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Galeri</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Galeri <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

    	<section class="ftco-section">
			<div class="container">
				<div class="row">
				<?php foreach ($semua_galeri as $galeri) { ?>
    			<div class="col-md-4">
    				<div class="project mb-4 img ftco-animate d-flex justify-content-center align-items-center" style="background-image: url(<?php echo img_galeri_url($galeri['foto']);?>);">
    					<div class="overlay"></div>
    					<a href="<?php echo galeri_url($galeri['id'],$galeri['slug']);?>" class="btn-site d-flex align-items-center justify-content-center"><span class="icon-subdirectory_arrow_right"></span></a>
	    				<div class="text text-center p-4">
	    					<h3><a href="<?php echo galeri_url($galeri['id'],$galeri['slug']);?>"><?php echo $galeri['nama'];?></a></h3>
	    					
	    				</div>
    				</div>
  				</div>
				<?php } ?>
    		</div>
    		<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
			<?php echo $pagination; ?>
            </div>
          </div>
        </div>
			</div>
		</section>