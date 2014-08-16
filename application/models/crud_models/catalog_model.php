<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Catalog_model extends CI_Model {
    
    const T         = 'catalog';
    public $time    = array();
    public $compl   = array();

    public function __construct() {
        parent::__construct();
    }
    
    public function select($status,$id = 0){
        switch($status){
            case 'id':
                $this->db->where('id',$id);
                $q = $this->db->get(self::T);
                return $q->row_array();
                break;
            case 'getforitems':
                $this->db->select('id');
                $this->db->select('title');
                $q = $this->db->get(self::T);
                return $q->result_array();
                break;
            case 'alladmin':
                $this->db->order_by('id','desc');
                $q = $this->db->get(self::T);
                return $q->result_array();
                break;
            case'all':
                $this->db->select('id');
                $this->db->select('slug');
                $this->db->select('title');
                $this->db->select('parent_id');
                $this->db->select('in_published');
                $q = $this->db->get(self::T);
                $data = $q->result_array();
                if($data){
                    $this->time = $data;
                    foreach($data as $i){
                        if($i['parent_id'] == '0'){
                            $this->compl[] = $this->recursionchild($i,$this->time);
                        }
                    }
                    $data = $this->compl;
                }
                return $data;
                break;
        }
    }
    
    public function update($d){
        $this->db->where('id',$d['id']);
        $this->db->update(self::T, $d);
    }
    
    public function insert($d){
        $this->db->insert(self::T,$d);
    }
    
    public function delete($i){
        $this->db->where('id',$i);
        $this->db->delete(self::T);
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