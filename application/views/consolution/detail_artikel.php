    <section class="ftco-section">
			<div class="container">
				<div class="row">
          <div class="col-lg-8 ftco-animate">
            <h2 class="mb-3"><?php echo $artikel['judul'];?></h2>
            <p>
              <img src="<?php echo img_artikel_url($artikel['foto']); ?>" alt="<?php echo $artikel['judul'];?>" class="img-fluid">
            </p>
            <p><?php echo set_tag(reversequote($artikel['isi'],'all')); ?></p>
            
            <div class="tag-widget post-tag-container mb-5 mt-5">
              <div class="tagcloud">
              <?php foreach (ambil_tag($artikel['tags']) as  $tag) { ?>
                <a href="<?php echo tag_url($tag['id_tag'],$tag['slug_tag']);?>" class="tag-cloud-link"><?php echo $tag['nama_tag'];?></a>
              <?php } ?>
              </div>
            </div>
            
            <div class="about-author d-flex p-4 bg-light">
              <div class="bio mr-5">
                <img src="<?php echo assets_url('images/').$artikel['foto_user'];?>" alt="Image placeholder" class="img-fluid mb-4">
              </div>
              <div class="desc">
                <h3><?php echo $artikel['nama_admin'];?></h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
              </div>
            </div>


            <div class="pt-5 mt-5">
              <h3 class="mb-5 h4 font-weight-bold"><?php echo $komentar->num_rows();?> Comments</h3>
              
              <ul class="comment-list">
              <?php foreach ($komentar->result_array() AS $kom) { ?>
                <li class="comment">
                  <div class="vcard bio">
                    <img src="<?php echo base_url('an-component/media/upload-user-avatar/').$kom['avatar_user'];?>" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3><?php echo ucfirst($kom['nama']);?></h3>
                    <div class="meta mb-2"><?php echo format_tanggal($kom['datetime']).' | '.cuma_jam($kom['datetime']);?></div>
                    <p><?php echo $kom['isi'];?></p>
                    <p>
                        <form action="<?php echo base_URL('semua_artikel/komentar');?>" method="post">
                          <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('nij');?>">
                          <input type="hidden" name="id_artikel" value="<?php echo $artikel['id'];?>">
                          <input type="hidden" name="parent" value="<?php echo $kom['komentar_id'];?>">
                          <textarea name="isi_komentar" cols="10" rows="2" class="form-control"></textarea>
                          <button type="submit" class="tag-cloud-link">Reply</button>
                        </form>
                        </p>
                  </div>
                  <ul class="children">
                    <?php 
                      $komentar_child = $this->artikel->komentar_child($kom['artikel_id'],$kom['komentar_id']); 
                      foreach ($komentar_child->result_array() AS $kom_c) {
                    ?>
                    <li class="comment">
                      <div class="vcard bio">
                        <img src="<?php echo base_url('an-component/media/upload-user-avatar/').$kom['avatar_user'];?>" alt="Image placeholder">
                      </div>
                      <div class="comment-body">
                        <h3><?php echo ucfirst($kom_c['nama']);?></h3>
                        <div class="meta mb-2"><?php echo format_tanggal($kom_c['datetime']).' | '.cuma_jam($kom_c['datetime']);?></div>
                        <p><?php echo $kom_c['isi'];?></p>
                        
                      </div>
                    </li>
                      <?php } ?>
                  </ul>
                  
                      
                    
                </li>
              <?php } ?>
              </ul>
              <!-- END comment-list -->
              
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5 h4 font-weight-bold">Leave a comment</h3>
                <form action="<?php echo base_URL('semua_artikel/komentar');?>" class="p-5 bg-light" method="POST">
                <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('nij');?>">
                <input type="hidden" name="id_artikel" value="<?php echo $artikel['id'];?>">
                <input type="hidden" name="parent" value="0">
                  
                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="isi_komentar" id="message" cols="30" rows="3" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                  </div>

                </form>
              </div>
            </div>
          </div> <!-- .col-md-8 -->

          <div class="col-lg-4 sidebar ftco-animate">
           
            <div class="sidebar-box ftco-animate">
            	<h3>Category</h3>
              <ul class="categories">
              <?php foreach ($kategori_artikel as $kategori) { ?>
                <li><a href="<?php echo kategori_url($kategori['id'],$kategori['slug']);?>"><i class="fa fa-angle-right" aria-hidden="true"></i><?php echo $kategori['nama'];?> <span>(<?php echo $this->artikel->hitung_semua_artikel_per_kategori($kategori['id']);?>)</span></a></li>
              <?php } ?>
              </ul>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3>Popular Articles</h3>
              <?php foreach ($artikel_populer  as $artikel) { ?>
              <div class="block-21 mb-4 d-flex">
                <a href="<?php echo artikel_url($artikel['id'],$artikel['slug']);?>" class="blog-img mr-4" style="background-image: url(<?php echo img_artikel_url($artikel['foto']);?>);"></a>
                <div class="text">
                  <h3 class="heading"><a href="<?php echo artikel_url($artikel['id'],$artikel['slug']);?>"><?php echo $artikel['judul'];?></a></h3>
                  <div class="meta">
                    <div><span class="icon-calendar"></span> <?php echo format_tanggal($artikel['tanggal']);?></div>
                    <div><span class="icon-person"></span> <?php echo $artikel['nama_admin'];?></div>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3>Tag Cloud</h3>
              <ul class="tagcloud m-0 p-0">
              <?php foreach ($tag_random  as $artikel) {
                      foreach(ambil_tag($artikel['tags']) as $tag){
              ?>
                <a href="<?php echo tag_url($tag['id_tag'],$tag['slug_tag']);?>" class="tag-cloud-link"><?php echo $tag['nama_tag'];?></a>
              <?php } } ?>
              </ul>
            </div>

            <div class="sidebar-box ftco-animate">
            	<h3>Archives</h3>
              <ul class="categories">
              <?php foreach ($arsip_artikel  as $artikel) { ?>
              	<li><a href="<?php echo baseURL('arsip/').$artikel['tahun'].'/'.$artikel['bulan'];?>"><?php echo $artikel['arsip'];?> <span><?php echo $artikel['jumlah'];?></span></a></li>
              <?php } ?>
              </ul>
            </div>


         
          </div><!-- END COL -->
        </div>
			</div>
		</section>