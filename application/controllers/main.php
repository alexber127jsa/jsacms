<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
    
    public $us;
    
    public function __construct() {
        parent::__construct();
        $this->us = $this->session_model->getusdata();
    }
    
    public function index() {
        $this->display_lib->main();
    }

}
