<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?> 

    <section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo assets_url('images/bg_1.jpg');?>');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Pelayanan</h1>
            
          </div>
        </div>
      </div>
    </section>
    <section class="ftco-section ftco-counter">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-2 d-flex">
    			<div class="col-md-6 align-items-stretch d-flex">
    				<div class="img img-video d-flex align-items-center" style="background-image: url(<?php echo $page['foto'];?>);">
    					
    				</div>
    			</div>
          <div class="col-md-6 heading-section ftco-animate pl-lg-5 pt-md-0 pt-5">
            <h2 class="mb-4"><?php echo $heading; ?></h2>
            <p><?php echo reversequote($page['isi'],'all'); ?></p>
          </div>
        </div>	
			</div>
		</section>