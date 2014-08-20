<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Modules_model extends CI_Model {
    
    const T_pages       = 'pages';
    const T_news        = 'news';
    const T_articles    = 'articles';
    const T_catalog     = 'catalog';
    const T_items       = 'items';
    const T_users       = 'users';

    public function __construct() {
        parent::__construct();
    }
    
    public function last_articles(){
        $this->db->where('in_published','1');
        //----------- sortable ------------------
        $this->db->order_by('id','desc');
        //----------- select field --------------
        $this->db->select('id');
        $this->db->select('title');
        $this->db->select('slug');
        //---------------------------------------
        $q = $this->db->get(self::T_pages);
        return $q->result_array();
    }
    
    public function top_menu(){
        $this->db->where('in_published','1');
        $this->db->where('in_menu','1');
        //----------- sortable ------------------
        $this->db->order_by('position','asc');
        //----------- select field --------------
        $this->db->select('id');
        $this->db->select('slug');
        $this->db->select('name_menu');
        $this->db->select('type');
        //---------------------------------------
        $q = $this->db->get(self::T_pages);
        return $q->result_array();
    }
    
    public function last_news($c = 3){
        $this->db->where('in_published','1');
        //----------- sortable ------------------
        $this->db->order_by('id','desc');
        //----------- select field --------------
        $this->db->select('id');
        $this->db->select('title');
        $this->db->select('summary');
        $this->db->select('created');
        //---------------------------------------
        $q = $this->db->get(self::T_news);
        $data = $q->result_array();
        if(!empty($data)){
            $data = $this->date_model->parsedateform($data);
        }
        return $data;
    }
    
    public function getcatstree(){
        return $this->catalog_model->select('all');
    }
    
    public function getlastitems(){
        return $this->items_model->select('lastitems');
    }
    
}