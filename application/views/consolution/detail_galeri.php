    <section class="ftco-section">
		<div class="container">
			<div class="row">
				<?php foreach (ambil_foto_galeri($galeri['id']) as $foto) { ?>
                
    			<div class="col-md-4">
    				<div class="project mb-4 img ftco-animate d-flex justify-content-center align-items-center" style="background-image: url(<?php echo img_galeri_url($foto['nama_foto'],true);?>);">
    					
    				</div>
  				</div>
				<?php } ?>
    		</div>
            <div class="row">
                <div class="col text-center">
                    <div class="block-27">
                        <p><a href="<?php echo base_URL('galeri');?>" class="btn btn-primary py-3 px-4">Kembali</a></p>
                    </div>
                </div>
            </div>
		</div>
	</section>