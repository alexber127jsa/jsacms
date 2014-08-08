<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Display_lib {
    
    public $C;
    
    public function __construct() {
        $this->C = &get_instance();
    }
    
    public function main(){
        $this->C->load->view('load/load');
        $this->C->load->view('fronend/head/head');
        $this->C->load->view('fronend/pages/main');
        $this->C->load->view('fronend/bottom/bottom');
    }
    
}
