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
        //$this->output->enable_profiler(TRUE);
    }
    
    public function index(){
        $this->urlrouteauth();
        $this->out();
    }
    
    private function out(){
        $this->out = array(
            'type'  => $this->type,
            'cont'  => $this->cont,
            'user'  => $this->us,
            'urlv'  => $this->url,
            'post'  => $this->ps
        );
        $this->out['json'] = json_encode($this->out);
        $this->display_admin_lib->setdatamain($this->out);
        switch($this->type){
            case 'main':
            case 'mainedit':
            case 'mainnew':
                $this->display_admin_lib->main();
                break;
            case 'news':
            case 'newsedit':
            case 'newsnew':
                $this->display_admin_lib->news();
                break;
            case 'articles':
            case 'articlesedit':
            case 'articlesnew':
                $this->display_admin_lib->articles();
                break;
        }
    }
    
    private function urlrouteauth(){
        if(!empty($this->url) && isset($this->url[2])){
            $this->session_model->checkussess();
            switch($this->url[2]){
                //============ ARTECLIS ============================================
                case 'articlesnew': 
                    $this->type = 'articlesnew';
                    break;
                case 'articles': 
                    $this->type = 'articles';
                    $this->cont = $this->articles_model->select('all');
                    break;
                case 'articlessave': 
                    $this->articles_model->update($this->ps);
                    redirect(base_url().'admin/articles');
                    break;
                case 'articlesnewsave': 
                    $this->articles_model->insert($this->ps);
                    redirect(base_url().'admin/articles');
                    break;
                case 'articlesdel': 
                    if(isset($this->url[3]))
                        $this->articles_model->delete((int)$this->url[3]);
                    redirect(base_url().'admin/articles');
                case 'articlesedit': 
                    $this->type = 'articlesedit';
                    if(isset($this->url[3]))
                        $this->cont = $this->articles_model->select('id',(int)$this->url[3]);
                    if(empty($this->cont))redirect(base_url().'admin/articles');
                    break;
                //============ NEWS ============================================
                case 'newsnew': 
                    $this->type = 'newsnew';
                    break;
                case 'news': 
                    $this->type = 'news';
                    $this->cont = $this->news_model->select('all');
                    break;
                case 'newssave': 
                    $this->news_model->update($this->ps);
                    redirect(base_url().'admin/news');
                    break;
                case 'newsnewsave': 
                    $this->news_model->insert($this->ps);
                    redirect(base_url().'admin/news');
                    break;
                case 'newsdel': 
                    if(isset($this->url[3]))
                        $this->news_model->delete((int)$this->url[3]);
                    redirect(base_url().'admin/news');
                case 'newsedit': 
                    $this->type = 'newsedit';
                    if(isset($this->url[3]))
                        $this->cont = $this->news_model->select('id',(int)$this->url[3]);
                    if(empty($this->cont))redirect(base_url().'admin/news');
                    break;
                //============ MAIN ============================================
                case 'main': 
                    $this->type = 'main';
                    $this->cont = $this->pages_model->select('all');
                    break;
                case 'mainedit': 
                    $this->type = 'mainedit';
                    if(isset($this->url[3]))
                        $this->cont = $this->pages_model->select('id',(int)$this->url[3]);
                    if(empty($this->cont))redirect(base_url().'admin/main');
                    break;
                case 'mainnew': 
                    $this->type = 'mainnew';
                    break;
                case 'maindel': 
                    if(isset($this->url[3]))
                        $this->pages_model->delete((int)$this->url[3]);
                    redirect(base_url().'admin/main');
                    break;
                case 'mainsave': 
                    $this->pages_model->update($this->ps);
                    redirect(base_url().'admin/main');
                    break;
                case 'mainnewsave': 
                    $this->pages_model->insert($this->ps);
                    redirect(base_url().'admin/main');
                    break;
                case 'logout': 
                    $this->session_model->logout();
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