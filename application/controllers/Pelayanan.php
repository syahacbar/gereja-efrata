<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelayanan extends AN_Apricot

{
	function __construct(){
		parent::__construct();
	}

	
	function index(){

		$data=$this->public_data;
		
		$data["informasi"]["title"]=$this->title->about_us("Pelayanan");
		$data["informasi"]["current_page"]="pelayanan";
		$data["informasi"]["uniqueid"]="pelayanan";

		$data["informasi"]["og-url"]=current_url();
		$data["informasi"]["og-title"]=$data["informasi"]["title"];
		$this->load->view($this->tema."/header",$data);
		$this->load->view($this->tema."/pelayanan",$data);
		$this->load->view($this->tema."/footer",$data);
	}
}