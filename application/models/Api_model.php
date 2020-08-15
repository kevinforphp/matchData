<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Api_model extends CI_Model
{
  public function __construct()
    {
        parent::__construct();
    }
    public function select_users($params=[]){
        $result=[];
        $username = $params['username'];
        if(!empty($params)){
           
        }
        return $result;
    }
}