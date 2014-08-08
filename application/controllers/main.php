<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
    
    public $us;
    public $url;
    public $type;
    public $out;
    
    public function __construct() {
        parent::__construct();
        $this->baseload();
        $this->urlroute();
    }
    
    public function index() {
        
        

        $this->out();
    }
    
    private function urlroute(){
        if(isset($this->url[1])){
            switch($this->url[1]){
                case 'pages':    $this->type = 'pages';     break;
                case 'articles': $this->type = 'articles';  break;
                case 'news':     $this->type = 'news';      break;
                case 'catalog':  $this->type = 'catalog';   break;
                case 'items':    $this->type = 'items';     break;
                case 'contacts': $this->type = 'contacts';  break;
                default :        $this->type = 'main';      break; 
            }
        } else {
            $this->type = 'main';
        }
    }
    
    private function baseload(){
        $this->us   = $this->session_model->getusdata();
        $this->url  = $this->uri->segments;
    }
    
    private function out(){
        $this->display_lib->main();
    }

}
