<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
    
    public $us;
    public $url;
    public $type;
    public $mods = array(
        'top_menu'      => array(),
        'last_news'     => array(),
        'last_articles' => array(),
        'cats_tree'     => array()
    );
    public $page = array(
        
    );
    public $out;
    
    public function __construct() {
        parent::__construct();
        $this->baseload();
        $this->urlroute();
        //$this->output->enable_profiler(TRUE);
    }
    
    public function index() {
        $this->getcontent();
        $this->loadmodules();
        $this->out();
    }
    
    private function getcontent(){
        switch($this->type){
            case 'pages':
                
                break;
            case 'articles':
                
                break;
            case 'news':
                
                break;
            case 'catalog':
                
                break;
            case 'items':
                
                break;
            case 'contacts':
                
                break;
            case 'main':
                
                break;
        }
    }
    
    private function loadmodules(){
        $this->mods = array(
            'top_menu'      => $this->modules_model->top_menu(),
            'last_news'     => $this->modules_model->last_news(),
            'last_articles' => $this->modules_model->last_articles(),
            'cats_tree'     => $this->modules_model->getcatstree(),
            'last_items'    => $this->modules_model->getlastitems()
        );
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
                //default :        $this->type = 'main';      break; 
                default :        $this->type = $this->url[1];      break; 
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
