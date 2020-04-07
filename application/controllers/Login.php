<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Login extends AN_Apricot {
    protected $login=false;

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(array(''));
        $this->login=$this->session->userdata('login');	
        //panggil helper	
		$this->load->helper(array('filter','url','text'));
		$this->load->model("admin/myuser","user");
        $this->load->model("admin/otorisasi");
        
        $this->login= $this->user->set($this->session->userdata('id_user'),$this->session->userdata('name_user'),$this->session->userdata('password_user'));
		
			$this->id_user=$this->user->id;
			$this->name_user=$this->user->name;
			$this->password_user=$this->user->password;
			$this->level_user=$this->user->level;
			$this->avatar_user=$this->user->avatar;
    } 

    function index($x='')
    {
        if($this->login){
            redirect('admin');
        }
        
        $data['status']=$x;
		$this->load->view($this->tema."/login",$data);
    }

    function signin() 
    {
        if($this->input->post()){
            $user=$this->input->post('username');
            $pass=sha1(md5($this->input->post('password')));

            //$cari=$this->db->get_where("user",array("name_user"=>$user,"status_user"=>"Y","terhapus"=>"N"));
            $cari=$this->db->get_where("jemaat",array("nij"=>$user,"aktif"=>"1"));
            if(!($cari->num_rows()>0)){
                redirect("login/1");
            } else {
                $row=$cari->row();
                
                if(password_verify($pass,$row->password)){

                   $data_sessi=array('login'=>true,
                   'nij'=>$row->nij,
                   'nama'=>$row->nama,
                   'password'=>$row->password,
                   'session' => TRUE);
                   $this->session->set_userdata($data_sessi);
                   redirect("/");

                } else {
                   redirect("login/1");
                }
            }
        } 
        else 
        {
            show_404();
        }
    }

    function signout(){
		$data= array("login","id_user","name_user","password_user","level_user","random_filemanager_key","session");
		$this->session->unset_userdata($data);
		redirect("/");
	}
}