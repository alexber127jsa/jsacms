<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public $us = array();
    public $url = array();
    public $type;
    public $cont = array();
    public $ps = 'none';
    public $out = array();
    
    public function __construct() {
        parent::__construct();
        $this->baseload();
        $this->postinit();
        
    }
    
    public function index(){
        $this->urlrouteauth();
        $this->out();
    }
    
    private function out(){
        $this->out = array(
            'cont'  => $this->cont,
            'user'  => $this->us,
            'urlv'  => $this->url,
            'post'  => $this->ps
        );
        $this->out['json'] = json_encode($this->out);
        $this->display_admin_lib->setdatamain($this->out);
        switch($this->type){
            case 'main':
                $this->display_admin_lib->main();
                break;
            
        }
    }
    
    private function urlrouteauth(){
        if(!empty($this->url) && isset($this->url[2])){
            $this->session_model->checkussess();
            switch($this->url[2]){
                case 'main': 
                    $this->type = 'main';
                    
                    break;
            }
        } else {
            $this->session_model->uncheckussess();
            $this->display_admin_lib->login();
        }
    }
    
    private function routepathpost() {
        switch ($this->ps['data']['type']) {
            case 'usercheck':
                if(isset($this->ps['data']['valdt'])){
                    $s = array();
                    $d = $this->ps['data']['valdt'];
                    $s['u'] = $this->filterds(($d['u'])?$d['u']:exit());
                    $s['p'] = $this->filterds(($d['p'])?$d['p']:exit());
                    $this->session_model->checkuser($s);
                }
                exit();
                break;
        }
    }
    
    private function postinit(){
        $data = $this->input->post();
        if(!empty($data)){
            $this->ps = $this->input->post();
            if(isset($this->ps['data']['type']))
                $this->routepathpost();
            else exit();
        }
    }
    
    private function filterds($v){
        $f = array('\'','<','>',';','*',' ','{','}','(',')','-','&','?','/','%','$','eval','@','!');
        return str_replace($f,'',$v);
    }

    private function baseload(){
        $this->us   = $this->session_model->getusdata();
        $this->url  = $this->uri->segments;
        $this->load->library('admin/display_admin_lib');
    }
    
}