<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel
{

	protected $CI;

	public function __construct(){

		$this->CI=& get_instance();

	}

	public function artikel_populer($max=7){

		$cache_artikel_populer=$this->CI->cache->file->get('artikel_populer');
		if($cache_artikel_populer === FALSE){
			$max=intval($max);
			$data=$this->CI->db->query("SELECT artikel.artikel_id AS id,
			 artikel.artikel_judul AS judul, 
			 artikel.artikel_isi AS isi,
			 artikel.artikel_tags as tags,
			 artikel.artikel_tgl_posting AS tanggal,
			 artikel.artikel_dibaca AS dibaca,
			 artikel.artikel_seo_url AS slug,
			 kategori.id_kategori,
			 kategori.nama_kategori,
			 user.nama_lengkap AS nama_admin,
			 user.id_user AS id_admin,
			 foto_artikel.nama_foto AS foto
			 FROM artikel,kategori,user ,foto_artikel
			 WHERE artikel.artikel_status='publish' AND kategori.aktif='Y' AND kategori.terhapus='N' AND user.status_user='Y' AND user.terhapus='N' AND artikel.artikel_id_user=user.id_user AND artikel.artikel_kategori=kategori.id_kategori AND   foto_artikel.id_foto=(SELECT CASE  foto_artikel.featured WHEN 'Y' THEN id_foto WHEN 'N' THEN id_foto END AS 'id_foto'  FROM foto_artikel WHERE foto_artikel.id_artikel=artikel.artikel_id ORDER BY featured ASC LIMIT 1)  ORDER BY artikel.artikel_dibaca DESC LIMIT $max	
			 ");	
			$data= $data->result_array();
			$this->CI->cache->file->save('artikel_populer',$data,43200);
			return $data;

		} else {
			return $cache_artikel_populer;
		}


	}

	public function artikel_headline($max=5){
		$cache_artikel_headline=$this->CI->cache->file->get('artikel_headline');
		if($cache_artikel_headline  === FALSE){
			$max=intval($max);
			$data=$this->CI->db->query("SELECT artikel.artikel_id AS id,
			 artikel.artikel_judul AS judul, 
			 artikel.artikel_isi AS isi,
			 artikel.artikel_tgl_posting AS tanggal,
			 artikel.artikel_tags as tags,
			 artikel.artikel_dibaca AS dibaca,
			 artikel.artikel_seo_url AS slug,		 
			 kategori.nama_kategori,
			 kategori.id_kategori,
			 user.nama_lengkap AS nama_admin,
			 user.id_user AS id_admin,
			 foto_artikel.nama_foto AS foto
			 FROM artikel,kategori,user,foto_artikel
			 WHERE artikel.artikel_sbg_headline='Y' AND artikel.artikel_status='publish' AND kategori.aktif='Y' AND kategori.terhapus='N' AND user.status_user='Y' AND user.terhapus='N' AND artikel.artikel_id_user=user.id_user AND artikel.artikel_kategori=kategori.id_kategori AND foto_artikel.id_foto=(SELECT CASE  foto_artikel.featured WHEN 'Y' THEN id_foto WHEN 'N' THEN id_foto END AS 'id_foto'  FROM foto_artikel WHERE foto_artikel.id_artikel=artikel.artikel_id ORDER BY featured ASC LIMIT 1) ORDER BY artikel.artikel_id DESC LIMIT $max
			 ");
	
			$data=$data->result_array();
			$this->CI->cache->file->save('artikel_headline',$data,6000000);
			return $data;
		} else {
			return $cache_artikel_headline;
		}		

	}


	function related_artikel_per_kategori($artikel_aktif,$id_kategori,$limit=5){

		
		$artikel_aktif=intval($artikel_aktif);
		$id_kategori=intval($id_kategori);
		$limit=intval($limit);



		$data=$this->CI->db->query("SELECT artikel.artikel_id AS id,
		 artikel.artikel_judul AS judul, 
		 artikel.artikel_isi AS isi,
		 artikel.artikel_tgl_posting AS tanggal,
		 artikel.artikel_dibaca AS dibaca,
		 artikel.artikel_seo_url AS slug,		 
		 artikel.artikel_tags as tags,
		 kategori.id_kategori,
		 kategori.nama_kategori,
		 user.nama_lengkap AS nama_admin,
		 user.id_user AS id_admin,
		 foto_artikel.nama_foto AS foto
		 FROM artikel,kategori,user,foto_artikel
		 WHERE artikel.artikel_id!='$artikel_aktif' AND artikel.artikel_kategori='$id_kategori' AND  artikel.artikel_status='publish' AND kategori.aktif='Y' AND kategori.terhapus='N' AND user.status_user='Y' AND user.terhapus='N' AND artikel.artikel_id_user=user.id_user AND artikel.artikel_kategori=kategori.id_kategori AND foto_artikel.id_foto=(SELECT CASE  foto_artikel.featured WHEN 'Y' THEN id_foto WHEN 'N' THEN id_foto END AS 'id_foto'  FROM foto_artikel WHERE foto_artikel.id_artikel=artikel.artikel_id ORDER BY featured ASC LIMIT 1) ORDER BY rand() LIMIT $limit

		 ");

		return $data->result_array();		

	}



	function artikel_per_kategori($id_kategori,$limit,$offset){

		$id_kategori=intval($id_kategori);
		$limit=intval($limit);
		$offset=intval($offset);

		$data=$this->CI->db->query("SELECT artikel.artikel_id AS id,
		 artikel.artikel_judul AS judul, 
		 artikel.artikel_isi AS isi,
		 artikel.artikel_tgl_posting AS tanggal,
		 artikel.artikel_dibaca AS dibaca,
		 artikel.artikel_seo_url AS slug,		 
		 artikel.artikel_tags as tags,
		 kategori.id_kategori,
		 kategori.nama_kategori,
		 user.nama_lengkap AS nama_admin,
		 user.id_user AS id_admin,
		 foto_artikel.nama_foto AS foto
		 FROM artikel,kategori,user,foto_artikel
		 WHERE artikel.artikel_kategori='$id_kategori' AND  artikel.artikel_status='publish' AND kategori.aktif='Y' AND kategori.terhapus='N' AND user.status_user='Y' AND user.terhapus='N' AND artikel.artikel_id_user=user.id_user AND artikel.artikel_kategori=kategori.id_kategori AND foto_artikel.id_foto=(SELECT CASE  foto_artikel.featured WHEN 'Y' THEN id_foto WHEN 'N' THEN id_foto END AS 'id_foto'  FROM foto_artikel WHERE foto_artikel.id_artikel=artikel.artikel_id ORDER BY featured ASC LIMIT 1) ORDER BY artikel.artikel_id DESC LIMIT $offset,$limit

		 ");

		return $data->result_array();		

	}

	function artikel_per_bulan($tahun,$bulan){

		$tahun=intval($tahun);
		$bulan=intval($bulan);

		$data=$this->CI->db->query("SELECT artikel.artikel_id AS id,
		 artikel.artikel_judul AS judul, 
		 artikel.artikel_isi AS isi,
		 artikel.artikel_tgl_posting AS tanggal,
		 artikel.artikel_dibaca AS dibaca,
		 artikel.artikel_seo_url AS slug,		 
		 artikel.artikel_tags as tags,
		 kategori.id_kategori,
		 kategori.nama_kategori,
		 user.nama_lengkap AS nama_admin,
		 user.id_user AS id_admin,
		 foto_artikel.nama_foto AS foto
		 FROM artikel,kategori,user,foto_artikel
		 WHERE MONTH(artikel.artikel_tgl_posting)='$bulan' AND YEAR(artikel.artikel_tgl_posting)='$tahun' AND  artikel.artikel_status='publish' AND kategori.aktif='Y' AND kategori.terhapus='N' AND user.status_user='Y' AND user.terhapus='N' AND artikel.artikel_id_user=user.id_user AND artikel.artikel_kategori=kategori.id_kategori AND foto_artikel.id_foto=(SELECT CASE  foto_artikel.featured WHEN 'Y' THEN id_foto WHEN 'N' THEN id_foto END AS 'id_foto'  FROM foto_artikel WHERE foto_artikel.id_artikel=artikel.artikel_id ORDER BY featured ASC LIMIT 1) ORDER BY artikel.artikel_id DESC
		 ");

		return $data->result_array();		

	}

	function arsip_artikel($limit){
		$limit=intval($limit);

		$data=$this->CI->db->query("SELECT DISTINCT DATE_FORMAT(a.artikel_tgl_posting,'%M %Y') AS arsip,
		YEAR(a.artikel_tgl_posting) AS tahun,
		MONTH(a.artikel_tgl_posting) AS bulan,
		(SELECT COUNT(artikel_id) FROM artikel WHERE artikel_aktif='Y' AND YEAR(artikel_tgl_posting)=YEAR(a.artikel_tgl_posting) AND MONTH(artikel_tgl_posting)=MONTH(a.artikel_tgl_posting)) AS jumlah
		FROM artikel a WHERE a.artikel_aktif='Y' LIMIT $limit");
		
		return $data->result_array();	
	}

	function artikel_per_user($id_user,$limit,$offset){

		$id_user=intval($id_user);
		$limit=intval($limit);
		$offset=intval($offset);

		$data=$this->CI->db->query("SELECT artikel.artikel_id AS id,
		 artikel.artikel_judul AS judul, 
		 artikel.artikel_isi AS isi,
		 artikel.artikel_tgl_posting AS tanggal,
		 artikel.artikel_dibaca AS dibaca,
		 artikel.artikel_seo_url AS slug,		 
		 artikel.artikel_tags as tags,
		 kategori.id_kategori,
		 kategori.nama_kategori,
		 user.nama_lengkap AS nama_admin,
		 user.id_user AS id_admin,
		 foto_artikel.nama_foto AS foto
		 FROM artikel,kategori,user,foto_artikel
		 WHERE artikel.id_user='$id_user' AND  artikel.artikel_status='publish' AND kategori.aktif='Y' AND kategori.terhapus='N' AND user.status_user='Y' AND user.terhapus='N' AND artikel.artikel_id_user=user.id_user AND artikel.artikel_kategori=kategori.id_kategori AND foto_artikel.id_foto=(SELECT CASE  foto_artikel.featured WHEN 'Y' THEN id_foto WHEN 'N' THEN id_foto END AS 'id_foto'  FROM foto_artikel WHERE foto_artikel.id_artikel=artikel.artikel_id ORDER BY featured ASC LIMIT 1) ORDER BY artikel.artikel_id DESC LIMIT $offset,$limit

		 ");

		return $data->result_array();		

	}

	function hitung_semua_artikel_per_kategori($id_kategori){

		$id_kategori=intval($id_kategori);


		$data=$this->CI->db->query("SELECT artikel.artikel_id AS id,
		 artikel.artikel_judul AS judul, 
		 artikel.artikel_isi AS isi,
		 artikel.artikel_tgl_posting AS tanggal,
		 artikel.artikel_dibaca AS dibaca,
		 artikel.artikel_seo_url AS slug,		 
		 artikel.artikel_tags as tags,
		 kategori.id_kategori,
		 kategori.nama_kategori,
		 user.nama_lengkap AS nama_admin,
		 user.id_user AS id_admin,
		 foto_artikel.nama_foto AS foto
		 FROM artikel,kategori,user,foto_artikel
		 WHERE artikel.artikel_kategori='$id_kategori' AND  artikel.artikel_status='publish' AND kategori.aktif='Y' AND kategori.terhapus='N' AND user.status_user='Y' AND user.terhapus='N' AND artikel.artikel_id_user=user.id_user AND artikel.artikel_kategori=kategori.id_kategori AND foto_artikel.id_foto=(SELECT CASE  foto_artikel.featured WHEN 'Y' THEN id_foto WHEN 'N' THEN id_foto END AS 'id_foto'  FROM foto_artikel WHERE foto_artikel.id_artikel=artikel.artikel_id ORDER BY featured ASC LIMIT 1) ORDER BY artikel.artikel_id DESC

		 ");

		return $data->num_rows();

	}

	function artikel_per_tag($id_slug,$limit,$offset){

		$id_slug=intval($id_slug);
		$limit=intval($limit);
		$offset=intval($offset);



		$data=$this->CI->db->query("SELECT artikel.artikel_id AS id,
		 artikel.artikel_judul AS judul, 
		 artikel.artikel_isi AS isi,
		 artikel.artikel_tgl_posting AS tanggal,
		 artikel.artikel_dibaca AS dibaca,
		 artikel.artikel_seo_url AS slug,		 
		 artikel.artikel_tags as tags,
		 kategori.id_kategori,
		 kategori.nama_kategori,
		 user.nama_lengkap AS nama_admin,
		 user.id_user AS id_admin,
		 foto_artikel.nama_foto AS foto
		 FROM artikel,kategori,user,foto_artikel
		 WHERE FIND_IN_SET('$id_slug',artikel.artikel_tags) AND  artikel.artikel_status='publish' AND kategori.aktif='Y' AND kategori.terhapus='N' AND user.status_user='Y' AND user.terhapus='N' AND artikel.artikel_id_user=user.id_user AND artikel.artikel_kategori=kategori.id_kategori AND foto_artikel.id_foto=(SELECT CASE  foto_artikel.featured WHEN 'Y' THEN id_foto WHEN 'N' THEN id_foto END AS 'id_foto'  FROM foto_artikel WHERE foto_artikel.id_artikel=artikel.artikel_id ORDER BY featured ASC LIMIT 1) ORDER BY artikel.artikel_id DESC LIMIT $offset,$limit

		 ");

		return $data->result_array();		

	}

	function hitung_semua_artikel_per_tag($id_slug){

		$id_slug=intval($id_slug);


		$data=$this->CI->db->query("SELECT artikel.artikel_id AS id,
		 artikel.artikel_judul AS judul, 
		 artikel.artikel_isi AS isi,
		 artikel.artikel_tgl_posting AS tanggal,
		 artikel.artikel_dibaca AS dibaca,
		 artikel.artikel_seo_url AS slug,		 
		 artikel.artikel_tags as tags,
		 kategori.id_kategori,
		 kategori.nama_kategori,
		 user.nama_lengkap AS nama_admin,
		 user.id_user AS id_admin,
		 foto_artikel.nama_foto AS foto
		 FROM artikel,kategori,user,foto_artikel
		 WHERE FIND_IN_SET('$id_slug',artikel.artikel_tags) AND  artikel.artikel_status='publish' AND kategori.aktif='Y' AND kategori.terhapus='N' AND user.status_user='Y' AND user.terhapus='N' AND artikel.artikel_id_user=user.id_user AND artikel.artikel_kategori=kategori.id_kategori AND foto_artikel.id_foto=(SELECT CASE  foto_artikel.featured WHEN 'Y' THEN id_foto WHEN 'N' THEN id_foto END AS 'id_foto'  FROM foto_artikel WHERE foto_artikel.id_artikel=artikel.artikel_id ORDER BY featured ASC LIMIT 1) ORDER BY artikel.artikel_id DESC

		 ");

		return $data->num_rows();

	}


	function search_article($keyword,$limit,$offset){


		$limit=intval($limit);
		$offset=intval($offset);


		$data=$this->CI->db->query("SELECT artikel.artikel_id AS id,
		 artikel.artikel_judul AS judul, 
		 artikel.artikel_isi AS isi,
		 artikel.artikel_tgl_posting AS tanggal,
		 artikel.artikel_dibaca AS dibaca,
		 artikel.artikel_seo_url AS slug,		 
		 artikel.artikel_tags as tags,
		 kategori.id_kategori,
		 kategori.nama_kategori,
		 user.nama_lengkap AS nama_admin,
		 user.id_user AS id_admin,
		 foto_artikel.nama_foto AS foto
		 FROM artikel,kategori,user,foto_artikel
		 WHERE artikel.artikel_isi LIKE '%$keyword%' AND  artikel.artikel_status='publish' AND kategori.aktif='Y' AND kategori.terhapus='N' AND user.status_user='Y' AND user.terhapus='N' AND artikel.artikel_id_user=user.id_user AND artikel.artikel_kategori=kategori.id_kategori AND foto_artikel.id_foto=(SELECT CASE  foto_artikel.featured WHEN 'Y' THEN id_foto WHEN 'N' THEN id_foto END AS 'id_foto'  FROM foto_artikel WHERE foto_artikel.id_artikel=artikel.artikel_id ORDER BY featured ASC LIMIT 1) ORDER BY artikel.artikel_id DESC LIMIT $offset,$limit

		 ");

		return $data->result_array();		

	}

	function hitung_search_article($keyword){

		$data=$this->CI->db->query("SELECT artikel.artikel_id AS id,
		 artikel.artikel_judul AS judul, 
		 artikel.artikel_isi AS isi,
		 artikel.artikel_tgl_posting AS tanggal,
		 artikel.artikel_dibaca AS dibaca,
		 artikel.artikel_seo_url AS slug,		 
		 artikel.artikel_tags as tags,
		 kategori.id_kategori,
		 kategori.nama_kategori,
		 user.nama_lengkap AS nama_admin,
		 user.id_user AS id_admin,
		 foto_artikel.nama_foto AS foto
		 FROM artikel,kategori,user,foto_artikel
		 WHERE artikel.artikel_isi LIKE '%$keyword%'  AND  artikel.artikel_status='publish' AND kategori.aktif='Y' AND kategori.terhapus='N' AND user.status_user='Y' AND user.terhapus='N' AND artikel.artikel_id_user=user.id_user AND artikel.artikel_kategori=kategori.id_kategori AND foto_artikel.id_foto=(SELECT CASE  foto_artikel.featured WHEN 'Y' THEN id_foto WHEN 'N' THEN id_foto END AS 'id_foto'  FROM foto_artikel WHERE foto_artikel.id_artikel=artikel.artikel_id ORDER BY featured ASC LIMIT 1) ORDER BY artikel.artikel_id DESC

		 ");

		return $data->num_rows();

	}


	function artikel_semua($limit,$offset){

		$limit=intval($limit);
		$offset=intval($offset);


		$data=$this->CI->db->query("SELECT artikel.artikel_id AS id,
		 artikel.artikel_judul AS judul, 
		 artikel.artikel_isi AS isi,
		 artikel.artikel_tgl_posting AS tanggal,
		 artikel.artikel_dibaca AS dibaca,
		 artikel.artikel_seo_url AS slug,		 
		 artikel.artikel_tags as tags,
		 kategori.id_kategori,
		 kategori.nama_kategori,
		 user.nama_lengkap AS nama_admin,
		 user.id_user AS id_admin,
		 foto_artikel.nama_foto AS foto
		 FROM artikel,kategori,user,foto_artikel
		 WHERE  artikel.artikel_status='publish' AND kategori.aktif='Y' AND kategori.terhapus='N' AND user.status_user='Y' AND user.terhapus='N' AND artikel.artikel_id_user=user.id_user AND artikel.artikel_kategori=kategori.id_kategori AND foto_artikel.id_foto=(SELECT CASE  foto_artikel.featured WHEN 'Y' THEN id_foto WHEN 'N' THEN id_foto END AS 'id_foto'  FROM foto_artikel WHERE foto_artikel.id_artikel=artikel.artikel_id ORDER BY featured ASC LIMIT 1) ORDER BY artikel.artikel_id DESC LIMIT $offset,$limit

		 ");

		return $data->result_array();		

	}

	function tag_random($limit){

		$data=$this->CI->db->query("SELECT id_tag AS tags FROM tags ORDER BY RAND() LIMIT $limit");

		return $data->result_array();		

	}

	function hitung_semua_artikel(){

		$data=$this->CI->db->query("SELECT artikel.artikel_id AS id,
		 artikel.artikel_judul AS judul, 
		 artikel.artikel_isi AS isi,
		 artikel.artikel_tgl_posting AS tanggal,
		 artikel.artikel_dibaca AS dibaca,
		 artikel.artikel_seo_url AS slug,		 
		 kategori.nama_kategori,
		 user.nama_lengkap AS nama_admin,
		 user.id_user AS id_admin,
		 foto_artikel.nama_foto AS foto
		 FROM artikel,kategori,user,foto_artikel
		 WHERE  artikel.artikel_status='publish' AND kategori.aktif='Y' AND kategori.terhapus='N' AND user.status_user='Y' AND user.terhapus='N' AND artikel.artikel_id_user=user.id_user AND artikel.artikel_kategori=kategori.id_kategori AND foto_artikel.id_foto=(SELECT CASE  foto_artikel.featured WHEN 'Y' THEN id_foto WHEN 'N' THEN id_foto END AS 'id_foto'  FROM foto_artikel WHERE foto_artikel.id_artikel=artikel.artikel_id ORDER BY featured ASC LIMIT 1)

		 ");

		return $data->num_rows();		
	}


	function detail_artikel($id){

		$id=intval($id);

		$data=$this->CI->db->query("SELECT artikel.artikel_id AS id,
		 artikel.artikel_judul AS judul, 
		 artikel.artikel_isi AS isi,
		 artikel.artikel_tgl_posting AS tanggal,
		 artikel.artikel_tgl_last_edit AS tanggal_edit,
		 artikel.artikel_dibaca AS dibaca,
		 artikel.artikel_seo_url AS slug,		 
		 artikel.artikel_tags as tags,

		 artikel.artikel_meta_description AS meta_description,
		 artikel.artikel_meta_author AS meta_author,
		 artikel.artikel_meta_keyword AS meta_keyword,

		 artikel.artikel_og_image AS og_image,
		 artikel.artikel_og_title AS og_title,
		 artikel.artikel_og_description AS og_description,

		 kategori.id_kategori,
		 kategori.nama_kategori,
		 user.nama_lengkap AS nama_admin,
		 user.id_user AS id_admin,
		 foto_artikel.nama_foto AS foto,
		 user.avatar_user AS foto_user
		 FROM artikel,kategori,user,foto_artikel
		 WHERE artikel.artikel_id='$id' AND artikel.artikel_status='publish' AND kategori.aktif='Y' AND kategori.terhapus='N' AND user.status_user='Y' AND user.terhapus='N' AND artikel.artikel_id_user=user.id_user AND artikel.artikel_kategori=kategori.id_kategori AND foto_artikel.id_foto=(SELECT CASE  foto_artikel.featured WHEN 'Y' THEN id_foto WHEN 'N' THEN id_foto END AS 'id_foto'  FROM foto_artikel WHERE foto_artikel.id_artikel=artikel.artikel_id ORDER BY featured ASC LIMIT 1) ");

		if($data->num_rows()>0){

		$data=$data->row_array();

		$cache_foto_artikel=$this->CI->cache->file->get('foto_artikel_'.$id);
		if($cache_foto_artikel  === FALSE){

			$foto=$this->CI->db->query("SELECT id_foto AS id, nama_foto AS nama FROM foto_artikel WHERE id_artikel='$id' ORDER BY id_foto DESC ")->result_array();

			$this->CI->cache->file->save('foto_artikel_'.$id,$foto,6000000);
		} else {
			$foto=$cache_foto_artikel;
		}
			 

		$data["galeri"]=$foto;
		$data["isi"]=($data["isi"]);
		$data["og_title"]=trim($data["og_title"]);
		$data["og_image"]=trim($data["og_image"]);
		$data["og_description"]=trim($data["og_description"]);
		$data["meta_keyword"]=trim($data["meta_keyword"]);
		$data["meta_description"]=trim($data["meta_description"]);

		return $data;

		} else {
			return false;
		}

	}

	public function komentar($artikel_id){
		$data=$this->CI->db->query("SELECT * FROM komentar k 
		JOIN jemaat j ON j.nij=k.user_id 
		JOIN artikel a ON a.artikel_id=k.artikel_id 
		WHERE k.artikel_id='$artikel_id' AND parent='0'");
		return $data;
	}

	public function komentar_child($artikel_id, $parent_id){
		$data=$this->CI->db->query("SELECT * FROM komentar k 
		JOIN jemaat j ON j.nij=k.user_id  
		JOIN artikel a ON a.artikel_id=k.artikel_id 
		WHERE k.artikel_id='$artikel_id' AND parent<>'0' AND parent='$parent_id'");
		return $data;
	}

	function dibaca($id){
		$id=intval($id);		
		$this->CI->db->query("UPDATE artikel SET artikel_dibaca= artikel_dibaca+1 WHERE artikel_id='$id' ");
	}


}