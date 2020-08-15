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
	public  $session_key = 'da970bf35433d76ed9b5d67ee166ef4b';
	
	
	
	
	
	public function index(){
		$page = $this->input->get('page') ? $this->input->get('page') : 1;
		$limit = 50;
		$sql = "SELECT * FROM pic LIMIT ".($page - 1) * $limit.",".$limit * $page;
		$query = $this->db->query($sql);
		$data['result'] = $query->result_array();
		$this->load->view('dataview',$data);
	}
}
