<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Semua_artikel extends AN_Apricot{
	//didalam route menggunakan nama "artikel"


	function __construct(){
		parent::__construct();

	}


	function index(){
		redirect("artikel/semua");
	}

	function semua($page=0){


		$this->load->library("pagination");

		$config['full_tag_open']   = '<ul>';
        $config['full_tag_close']  = '</ul>';
        
        $config['first_link']      = ' &lt;&lt; '; 
        $config['first_tag_open']  = '<li>';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']       = ' &gt;&gt; '; 
        $config['last_tag_open']   = '<li>';
        $config['last_tag_close']  = '</li>';
        
        $config['next_link']       = ' &gt; '; 
        $config['next_tag_open']   = '<li>';
        $config['next_tag_close']  = '</li>';
        
        $config['prev_link']       = ' &lt; '; 
        $config['prev_tag_open']   = '<li>';
        $config['prev_tag_close']  = '</li>';
        
        $config['cur_tag_open']    = '<li class="active"><a href="#">';
        $config['cur_tag_close']   = '</a></li>';
         
        $config['num_tag_open']    = '<li>';
        $config['num_tag_close']   = '</li>';




		$config['uri_segment'] = 2;

		$config['base_url']=baseURL($this->uri->segment(1));
		$config['total_rows']=$this->artikel->hitung_semua_artikel();
		$config['per_page']=$this->system_info['max_tampil_artikel'];
		$this->pagination->initialize($config);
 
		$data=$this->public_data;
		$data["informasi"]["title"]=$this->title->semua_artikel();
		$data["informasi"]["current_page"]="semua-artikel";	
		$data["informasi"]["uniqueid"]="semua-artikel-page";

		$data["informasi"]["og-url"]=current_url();
		$data["informasi"]["og-title"]=$data["informasi"]["title"];


		$data["heading"]="Semua Artikel";		
		$data["semua_artikel"]=$this->artikel->artikel_semua($config['per_page'],$page);
		$data["pagination"]=$this->pagination->create_links();
 
		$data["artikel_related_per_kategori"]=$this->artikel->artikel_headline();
		$data["tag_random"]=$this->artikel->tag_random(5);

		$this->load->view($this->tema."/header",$data);
		$this->load->view($this->tema."/semua_artikel",$data);
		$this->load->view($this->tema."/footer",$data);


	} 

	function detail($id=0){
		if($id>0 AND ($artikel=$this->artikel->detail_artikel($id))!=false){
		$this->artikel->dibaca($id);

  
		$data=$this->public_data;
		$data["informasi"]["title"]=$this->title->artikel($artikel['judul']);
		$data["informasi"]["current_page"]="detail-artikel";
		$data["informasi"]["uniqueid"]="artikel_".$id;

		$data["informasi"]["meta_deskripsi"]=$artikel["meta_description"]==""?$data["informasi"]["meta_deskripsi"]:$artikel["meta_description"];

		$data["informasi"]["meta_keyword"]=$artikel["meta_keyword"]==""?$data["informasi"]["meta_keyword"]:$artikel["meta_keyword"];
		//$data["informasi"]["author"]=$artikel["nama_admin"];

		$data["informasi"]["og-type"]="article";
		$data["informasi"]["og-url"]=current_url();
		$data["informasi"]["og-title"]=$artikel["og_title"]==""?$data["informasi"]["title"]:$artikel["og_title"];
		$data["informasi"]["og-description"]=$artikel["og_description"]==""?$data["informasi"]["meta_deskripsi"]:$artikel["og_description"];
		$data["informasi"]["og-image"]=$artikel["og_image"]==""?img_artikel_url($artikel["foto"]):$artikel["og_image"];
		$data["informasi"]["article-published_time"]=cuma_tanggal($artikel["tanggal"]);
		
		$data["artikel_populer"]=$this->artikel->artikel_populer();
		$data["artikel_related_per_kategori"]=$this->artikel->related_artikel_per_kategori($id,$artikel['id_kategori']);
		$data["tag_random"]=$this->artikel->tag_random(5);
		$data["artikel"]=$artikel;
		$data["arsip_artikel"]=$this->artikel->arsip_artikel(5);
		$data['komentar']= $this->artikel->komentar($id); 
		

		$this->load->view($this->tema."/header",$data);
		$this->load->view($this->tema."/detail_artikel",$data);
		$this->load->view($this->tema."/footer",$data);
		
		} else {
			show_404(); 
		}

	}

	function komentar()
	{
		$id_user = $this->input->post('id_user');
		$id_artikel = $this->input->post('id_artikel');
		$artikel=$this->artikel->detail_artikel($id_artikel);
		
		$isi_komentar = $this->input->post('isi_komentar');
		$parent = $this->input->post('parent');
		$this->db->query("INSERT INTO komentar (parent,isi,user_id,artikel_id) VALUES('$parent','$isi_komentar','$id_user','$id_artikel')");
		redirect(artikel_url($id_artikel,$artikel['slug']));
	}

}