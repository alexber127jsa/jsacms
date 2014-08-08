<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Session_model extends CI_Model {
    
    public $s = array();    
    public $def = array(
        'auth' => false
    );
    
    public function __construct() {
        parent::__construct();
        $this->getsess();
        $this->init();
    }
    
    public function init(){
        if(empty($this->s['user_data'])){
            $this->session->set_userdata('user_data',$this->def);
            $this->s['user_data'] = $this->def;
        }
    }
    
    public function getsess(){
        $this->s = $this->session->all_userdata();
    }
    
    public function getusdata(){
        return $this->s['user_data'];
    }
    
}