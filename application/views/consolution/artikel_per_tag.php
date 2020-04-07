<section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo assets_url('images/bg_1.jpg');?>');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Berita</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span><?php echo $heading; ?> <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row">
        <?php foreach ($semua_artikel as $key => $artikel) { ?>
          <div class="col-md-6 col-lg-4 ftco-animate">
            <div class="blog-entry">
              <a href="<?php echo artikel_url($artikel['id'],$artikel['slug']);?>" class="block-20 d-flex align-items-end" style="background-image: url('<?php echo img_artikel_url($artikel['foto']);?>');">
								<div class="meta-date text-center p-2">
                  <span class="day"><?php echo tanggal($artikel['tanggal']);?></span>
                  <span class="mos"><?php echo bulan($artikel['tanggal']);?></span>
                  <span class="yr"><?php echo tahun($artikel['tanggal']);?></span>
                </div>
              </a> 
              <div class="text bg-white p-4">
                <h3 class="heading"><a href="<?php echo artikel_url($artikel['id'],$artikel['slug']);?>"><?php echo $artikel['judul'];?></a></h3>
                <p><?php echo strip_tags(word_limiter(reversequote($artikel['isi'],'all'),20));?></p>
                <div class="d-flex align-items-center mt-4">
	                <p class="mb-0"><a href="<?php echo artikel_url($artikel['id'],$artikel['slug']);?>" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
	                <p class="ml-auto mb-0">
	                	<a href="#" class="mr-2"><?php echo $artikel['nama_admin'];?></a>
	                	<a href="#" class="meta-chat"><span class="icon-eye"></span> <?php echo $artikel['dibaca'];?></a>
	                </p>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        </div>
        <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
            <?php echo $pagination;?>
            </div>
          </div>
        </div>
	</div>
</section>