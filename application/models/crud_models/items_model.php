<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Items_model extends CI_Model {
    
    const T = 'items';

    public function __construct() {
        parent::__construct();
    }
    
     public function select($status,$id = 0){
        switch($status){
            case 'lastitems':
                $this->db->order_by('id','desc');
                $this->db->limit(10);
                $q = $this->db->get(self::T);
                return $q->result_array();
                break;
            case 'id':
                $this->db->where('id',$id);
                $q = $this->db->get(self::T);
                return $q->row_array();
                break;
            case'all':
                $this->db->order_by('id','asc');
                $q = $this->db->get(self::T);
                return $q->result_array();
                break;
            default :
                return array();
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
    
}