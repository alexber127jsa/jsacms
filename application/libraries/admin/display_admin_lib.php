<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Display_admin_lib {
    
    public $C;
    
    public function __construct() {
        $this->C = &get_instance();
    }
    
    public function login(){
        $this->C->load->view('load/load');
        $this->C->load->view('admin/head/head');
        $this->C->load->view('admin/pages/login');
        $this->C->load->view('admin/bottom/bottom');
    }
    
}
