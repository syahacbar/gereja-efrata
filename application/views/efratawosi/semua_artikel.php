<!-- ##### Blog Area Start ##### -->
<div class="blog-area section-padding-100">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Blog Post Area -->
                <div class="col-12 col-lg-8">
                    <div class="row">
                    <?php foreach ($semua_artikel as $key => $artikel) { ?>
                        <!-- Single Blog Post Area -->
                        <div class="col-12 col-md-6">
                            <div class="single-blog-post mb-50">
                                <div class="post-thumbnail">
                                    <a href="<?php echo artikel_url($artikel['id'],$artikel['slug']);?>"><img src="<?php echo img_artikel_url($artikel['foto']);?>" alt="<?php echo $artikel['judul'];?>"></a>
                                </div>
                                <div class="post-content">
                                    <a href="<?php echo artikel_url($artikel['id'],$artikel['slug']);?>" class="post-title">
                                        <h4><?php echo $artikel['judul'];?></h4>
                                    </a>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $artikel['nama_admin'];?></a>
                                        <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo format_tanggal($artikel['tanggal']);?></a>
                                    </div>
                                    <p class="post-excerpt"><?php echo strip_tags(word_limiter(reversequote($artikel['isi'],'all'),20));?></p>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                    </div>

                    <div class="pagination-area">
                        <?php echo $pagination;?>
                        
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Sidebar Area -->
                <div class="col-12 col-lg-3">
                    <div class="post-sidebar-area">

                        <!-- ##### Single Widget Area ##### -->
                        <div class="single-widget-area">
                            <div class="search-form">
                                <form action="#" method="get">
                                    <input type="search" name="search" placeholder="Search Here">
                                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>
                        </div>

                        <!-- ##### Single Widget Area ##### -->
                        <div class="single-widget-area">
                            <!-- Title -->
                            <div class="widget-title">
                                <h6>Kategori Berita</h6>
                            </div>
                            <ol class="crose-catagories">
                            <?php foreach ($kategori_artikel as $kategori) { ?>
                                <li><a href="<?php echo kategori_url($kategori['id'],$kategori['slug']);?>"><i class="fa fa-angle-right" aria-hidden="true"></i><?php echo $kategori['nama'];?></a></li>
                            <?php } ?>
                            </ol>
                        </div>

                        <!-- ##### Single Widget Area ##### -->
                        <div class="single-widget-area">
                            <!-- Title -->
                            <div class="widget-title">
                                <h6>Berita Terbaru</h6>
                            </div>
                            <?php foreach ($artikel_related_per_kategori as $related) { ?>
                            <!-- Single Latest Posts -->
                            <div class="single-latest-post">
                                <a href="<?php echo artikel_url($related['id'],$related['slug']);?>" class="post-title">
                                    <h6><?php echo $related['judul'];?></h6>
                                </a>
                                <p class="post-date"><?php echo format_tanggal($related['tanggal']);?></p>
                            </div>
                                <?php } ?>
                        </div>

                        <!-- ##### Single Widget Area ##### -->
                        <div class="single-widget-area">
                            <!-- Title -->
                            <div class="widget-title">
                                <h6>Tag Populer</h6>
                            </div>
                            <!-- Tags -->
                            <ol class="popular-tags d-flex flex-wrap">
                            <?php 
                            foreach ($tag_random  as $artikel) {
                                foreach(ambil_tag($artikel['tags']) as $tag){
                            ?>
                                <li><a href="<?php echo tag_url($tag['id_tag'],$tag['slug_tag']);?>"><?php echo $tag['nama_tag'];?></a></li>
                            <?php } } ?>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->

    <!-- ##### Subscribe Area Start ##### -->
    <section class="subscribe-area">
        <div class="container">
            <div class="row align-items-center">
                <!-- Subscribe Text -->
                <div class="col-12 col-lg-6">
                    <div class="subscribe-text">
                        <h3>Subscribe To Our Newsletter</h3>
                        <h6>Subcribe Us And Tell Us About Your Story</h6>
                    </div>
                </div>
                <!-- Subscribe Form -->
                <div class="col-12 col-lg-6">
                    <div class="subscribe-form text-right">
                        <form action="#">
                            <input type="email" name="subscribe-email" id="subscribeEmail" placeholder="Your Email">
                            <button type="submit" class="btn crose-btn">subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Subscribe Area End ##### -->