<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Items_images_model extends CI_Model {
    
    const T = 'items_images';


    public function __construct() {
        parent::__construct();
    }
    
    public function select($status,$item_id = '0'){
        switch($status){
            case'item_id':
                $this->db->where('item_id',$item_id);
                $q = $this->db->get(self::T);
                return $q->result_array();
                break;
        }
    }
    
    public function insert($d){
        $this->db->insert(self::T,$d);
    }
    
    
    
}



