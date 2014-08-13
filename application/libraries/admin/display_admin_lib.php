<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Display_admin_lib {
    
    public $C;
    public $dt = array();
    
    public function __construct() {
        $this->C = &get_instance();
    }
    
    public function setdatamain($d){
        $this->dt = $d;
    }
    
    public function login(){
        $this->C->load->view('load/load');
        $this->C->load->view('admin/head/head');
        $this->C->load->view('admin/pages/login');
        $this->C->load->view('admin/bottom/bottom');
    }
    
    public function main(){
        $this->C->load->view('load/load',$this->dt);
        $this->C->load->view('admin/head/head_us');
        $this->C->load->view('admin/mods/topmenu');
        $this->C->load->view('admin/pages/main');
        $this->C->load->view('admin/bottom/bottom_us');
    }
    
    public function news(){
        $this->C->load->view('load/load',$this->dt);
        $this->C->load->view('admin/head/head_us');
        $this->C->load->view('admin/mods/topmenu');
        $this->C->load->view('admin/pages/news');
        $this->C->load->view('admin/bottom/bottom_us');
    }
    
    public function articles(){
        $this->C->load->view('load/load',$this->dt);
        $this->C->load->view('admin/head/head_us');
        $this->C->load->view('admin/mods/topmenu');
        $this->C->load->view('admin/pages/articles');
        $this->C->load->view('admin/bottom/bottom_us');
    }
    
    public function catalog(){
        $this->C->load->view('load/load',$this->dt);
        $this->C->load->view('admin/head/head_us');
        $this->C->load->view('admin/mods/topmenu');
        $this->C->load->view('admin/pages/catalog');
        $this->C->load->view('admin/bottom/bottom_us');
    }
    
}
