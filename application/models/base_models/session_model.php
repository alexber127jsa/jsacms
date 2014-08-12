<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Session_model extends CI_Model {
    
    public $u = 'users';
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
    
    public function checkuser($v){
        $this->db->where('username',$v['u']);
        $this->db->where('password',md5($v['p']));
        $q = $this->db->get($this->u);
        $data = $q->row_array();
        if(empty($data)) echo 'none';
        else $this->installsess($data);
    }
    
    private function installsess($data){
        $this->def = $data;
        $this->def['auth'] = true;
        $this->session->set_userdata('user_data',$this->def);
        echo 'complete';
    }
    
    public function checkussess(){
        if(!$this->us['auth']){
            redirect(base_url().'admin');
        }
    }
    
    public function uncheckussess(){
        if($this->us['auth']){
            redirect(base_url().'admin/main');
        }
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url().'admin');
    }
    
}