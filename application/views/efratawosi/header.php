<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title><?php echo $informasi["title"] ?></title>

    <!-- Favicon -->
    <link rel="icon" href="<?php echo assets_url('img/core-img/favicon.ico') ?>">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="<?php echo assets_url('style.css') ?>">

</head>

<body>

    
    <!-- ##### Preloader ##### -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <!-- Line -->
        <div class="line-preloader"></div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- ***** Top Header Area ***** -->
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="top-header-content d-flex flex-wrap align-items-center justify-content-between">
                            <!-- Top Header Meta -->
                            <div class="top-header-meta d-flex flex-wrap">
                                <a href="#" class="open" data-toggle="tooltip" data-placement="bottom" title="10 Am to 6 PM"><i class="fa fa-clock-o" aria-hidden="true"></i> <span>Opening Hours - 10 Am to 6 PM</span></a>
                                <!-- Social Info -->
                                <div class="top-social-info">
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <!-- Top Header Meta -->
                            <div class="top-header-meta">
                                <a href="mailto:gki_efratawosi@gmail.com" class="email-address"><i class="fa fa-envelope" aria-hidden="true"></i> <span>gki_efratawosi@gmail.com</span></a>
                                <a href="#" class="phone"><i class="fa fa-phone" aria-hidden="true"></i> <span>(0986) 215608</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Top Header Area ***** -->

        <!-- ***** Navbar Area ***** -->
        <div class="crose-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="croseNav">

                        <!-- Nav brand -->
                        <a href="index.html" class="nav-brand"><img src="<?php echo $informasi["logo"]; ?>" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

<?php

class menu_apricot {

	public $CI;

	public $menu;

	function __construct(){
		$this->CI =& get_instance();
	}


	// fungsi untuk mengambil menu
	function ambil_menu($type_menu,$parent=0){

		$kondisi=array(

			"menu_id"=>$type_menu,
			"menu_child_parent" => $parent,
			"aktif" => "Y"

			);
		//query ke database
		$this->CI->db->order_by("posisi","ASC");
		$query= $this->CI->db->get_where("menu_child",$kondisi);

		//cek apakah memiliki hasil
		if($query->num_rows()>0){
			$class=$parent==0?"":"dropdown";
			$this->menu.="<ul>";
			
			foreach ($query->result_array() as $menu) {
				//cek apakah menu sekarang mempunyai submenu atau tidak
				$cek=$this->CI->db->get_where('menu_child',array('menu_child_parent'=>$menu['menu_child_id'],'aktif'=>'Y','menu_id'=>$type_menu));

				//jika terdapat sub menu
				if($cek->num_rows()>0){

					$this->menu.= "<li><a href='$menu[menu_child_url]' target='$menu[menu_child_target]'>$menu[menu_child_nama]</a>";
                    //panggil ambil_menu() secara reqursive untuk mengambil sub-menu nya
                    $this->menu.= "<ul class='dropdown'>";
					$this->ambil_menu($type_menu,$menu['menu_child_id']);
					$this->menu.= "</ul></li>";

				}
				//jika tidak memiliki sub menu
				 else {
					$this->menu.= "<li><a href='$menu[menu_child_url]' target='$menu[menu_child_target]'>$menu[menu_child_nama]</a>";
					$this->menu.= "</li>";
				}

			}

			$this->menu.="</ul>";

		} else {
			//jika tidak ada hasil.
			return;

		}

	}
}

$menuPertama = new menu_apricot;
$menuPertama->ambil_menu(1); //angka 1 adalah ID menu horizontal 
?>
                            <!-- Nav Start -->
                            <div class="classynav">
                                <?php
                                echo $menuPertama->menu;
                                ?>

                                <!-- Search Button -->
                                <div id="header-search"><i class="fa fa-search" aria-hidden="true"></i></div>

                               

                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>

            <!-- ***** Search Form Area ***** -->
            <div class="search-form-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="searchForm">
                                <form action="#" method="post">
                                    <input type="search" name="search" id="search" placeholder="Enter keywords &amp; hit enter...">
                                    <button type="submit" class="d-none"></button>
                                </form>
                                <div class="close-icon" id="searchCloseIcon"><i class="fa fa-close" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Navbar Area ***** -->
    </header>
    <!-- ##### Header Area End ##### -->
