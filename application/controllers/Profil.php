<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends AN_Apricot

{


	function __construct(){
		parent::__construct();
	}

	
	function index(){

		$data=$this->public_data;

		$data["informasi"]["title"]=$this->title->about_us("Tentang Kami");
		$data["informasi"]["current_page"]="about-us";
		$data["informasi"]["uniqueid"]="about-us";

		$data["informasi"]["og-url"]=current_url();
		$data["informasi"]["og-title"]=$data["informasi"]["title"];

		$this->load->view($this->tema."/header",$data);
		$this->load->view($this->tema."/profil",$data);
		$this->load->view($this->tema."/footer",$data);


	}



}