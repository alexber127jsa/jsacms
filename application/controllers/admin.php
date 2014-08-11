<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public $us;
    public $url;
    public $type;
    
    public function __construct() {
        parent::__construct();
        $this->loadlibrary();
    }
    
    public function index(){
        $this->display_admin_lib->login();
    }
    
    private function loadlibrary(){
        $this->load->library('admin/display_admin_lib');
    }
    
}