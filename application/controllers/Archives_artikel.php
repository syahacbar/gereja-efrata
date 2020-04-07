<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archives_artikel extends AN_Apricot
{

	function __construct(){
		parent::__construct();
	}

    function detail($tahun,$bulan){

		$data=$this->public_data;
		$data["informasi"]["title"]="Arsip Bulan ";
		$data["informasi"]["current_page"]="artikel-per-bulan";	
		$data["informasi"]["uniqueid"]="artikel-per-bulan";

		$data["informasi"]["og-url"]=current_url();
		$data["informasi"]["og-title"]=$data["informasi"]["title"];

		$data["heading"]="Arsip ".$tahun."/".$bulan;
		$data["semua_artikel"]=$this->artikel->artikel_per_bulan($tahun,$bulan);


		$this->load->view($this->tema."/header",$data);
		$this->load->view($this->tema."/artikel_per_bulan",$data);
        $this->load->view($this->tema."/footer",$data);	
        


    }

}