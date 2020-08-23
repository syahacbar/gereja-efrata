<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Myuser_jemaat extends CI_Model {

 public $nij;
 public $nama;
 public $password;
 public $level;
 public $avatar;

 function __construct (){
 	parent::__construct();
	$this->load->library('session');
 } 

 function set($nij,$nama,$password){


 	$query=$this->db->query("SELECT * from jemaat where nij='$nij'and nama='$nama' and password='$password' and aktif='1'");
 	if($query->num_rows()>0){
 	$row=$query->row();
 	$this->nij=$row->nij;
 	$this->nama=$row->nama;
 	$this->password=$row->password;
 	$this->avatar=$row->avatar_user;
 	$data_sessi=array('login'=>true,
	 				  'nij'=>$row->nij,
	 				  'nama'=>$row->nama,
	 				  'password'=>$this->password);
	 $this->session->set_userdata($data_sessi);


	 // mulai generate access security key
	 if(!$this->session->userdata("random_filemanager_key")){
	 	$karakter = 'abcdefghijklmnopqrstuvwxyz0123456789';
	 	$hasil = '';
		 for ($i = 0; $i < 10; $i++) {
		      $hasil .= $karakter[rand(0, strlen($karakter) - 1)];
		 }
		 $this->session->set_userdata(array("random_filemanager_key"=>$hasil));
	 };
	 
 	 return true;
 	}
 	else {
 		$data_sessi=array('login'=>false,
	 						'nij'=>"",
	 						'nama'=>"",
	 						'password'=>"");
	 	$this->session->set_userdata($data_sessi);
 		return false;
 	}
 }



}


?>