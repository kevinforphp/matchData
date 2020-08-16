<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataList extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */ 
	public function __construct()
	  {
	      parent::__construct();
		  $this->load->model('Api_model','API');
		  $this->load->helper('url'); 
	  }
	public function index(){
		$page = $this->input->get('page') ? $this->input->get('page'):1;
		$type =  $this->input->get('type') ?$this->input->get('type'):"";
		$result =  $this->API->MATCH_LIST(['page'=>$page,'type'=>$type]);
		if($result['status']){
			$data['result'] = $result['data'];
		}else{
			$data['result'] = [];
		}
		$this->load->view('dataview',$data);
	}
}
