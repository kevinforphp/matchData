<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Api_model extends CI_Model
{
  public function __construct()
    {
        parent::__construct();
    }
    public function MATCH_LIST($params=[]){
		$result = [];
		$result['status'] = 0;
		$result['data'] = [];
		$result['msg'] = "参数错误";
		
		$page = isset($params['page']) && !empty($params['page']) ? $params['page']:1;
		$type = isset($params['type']) && !empty($params['type']) ? $params['type']:'';
		$limit = 30;
		if($type){
			$sql = "SELECT * FROM pic WHERE type in (".$type.")"." LIMIT ".($page - 1) * $limit.",".$limit * $page;
		}else{
			$sql = "SELECT * FROM pic LIMIT ".($page - 1) * $limit.",".$limit * $page;
		}
		$query = $this->db->query($sql);
		$result['data'] = $query->result_array();
		$result['status'] = 1;
		$result['msg'] = "请求成功";
        return $result;
    }
	public function MATCH_BAR(){
		$result = [];
		$sql = "SELECT * FROM match_bar";
		$query = $this->db->query($sql);
		$result['data'] = $query->result_array();
		$result['status'] = 1;
		$result['msg'] = "请求成功";
		return $result;
	}
}
