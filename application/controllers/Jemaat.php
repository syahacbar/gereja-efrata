<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jemaat extends AN_Apricot

{
	function __construct(){
		parent::__construct();
		$this->load->model('Jemaat_model');
	}

	
	function index(){

		$data=$this->public_data;
		
		$data["informasi"]["title"]=$this->title->about_us("Data Jemaat");
		$data["informasi"]["current_page"]="jemaat";
		$data["informasi"]["uniqueid"]="jemaat";

		$data["informasi"]["og-url"]=current_url();
		$data["informasi"]["og-title"]=$data["informasi"]["title"];
		$this->load->view($this->tema."/header",$data);
		$this->load->view($this->tema."/jemaat",$data);
		$this->load->view($this->tema."/footer",$data);
	}

	function getLists(){
        $data = $row = array();
        
        // Fetch member's records
        $jemaatData = $this->Jemaat_model->getRows($_POST);
        
        $i = $_POST['start'];
        foreach($jemaatData as $j){
            $i++;
            // Tanggal Lahir
			$birthday = $j->tgl_lahir;
			
			// Convert Ke Date Time
			$biday = new DateTime($birthday);
			$today = new DateTime();			
			$diff = $today->diff($biday);
			$usia = $diff->y ." Tahun";

            $data[] = array($i,$j->nama,$j->rayon);
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Jemaat_model->countAll(),
            "recordsFiltered" => $this->Jemaat_model->countFiltered($_POST),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);
    }

}