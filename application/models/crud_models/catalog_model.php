<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Catalog_model extends CI_Model {
    
    const T         = 'catalog';
    public $time    = array();
    public $compl   = array();

    public function __construct() {
        parent::__construct();
    }
    
    public function select($status){
        switch($status){
            case 'alladmin':
                $this->db->order_by('id','desc');
                $q = $this->db->get(self::T);
                return $q->result_array();
                break;
            case'all':
                $q = $this->db->get(self::T);
                $data = $q->result_array();
                if($data){
                    $this->time = $data;
                    foreach($data as $i)
                        if($i['parent_id'] == '0')
                            $this->compl[] = $this->recursionchild($i,$this->time);
                    $data = $this->compl;
                }
                return $data;
                break;
        }
    }
    
    public function update(){
        
    }
    
    public function insert(){
        
    }
    
    public function delete(){
        
    }
    
    private function recursionchild($d,$dt){
        foreach($dt as $kt => $v){
            if($d['id'] == $v['parent_id']){
                $d['child'][] = $this->recursionchild($v,$dt);
            }
        }
        return $d;
    }
    
}