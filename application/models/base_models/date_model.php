<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Date_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function parsedateform($d){
        $compl = array();
        foreach($d as $i){
            $i['created'] = $this->formmonth($i['created']);
            $compl[] = $i;
        }
        return $compl;
    }
    
    public function formmonth($d){
        $t = explode('-',mb_substr($d, 0, 10));
        return $t[2].' '.$this->monthrs($t[1]).' '.$t[0];
    }
    
    public function monthrs($m){
        switch($m){
            case '01': return 'Января'; break;
            case '02': return 'Февраля'; break;
            case '03': return 'Марта'; break;
            case '04': return 'Апреля'; break;
            case '05': return 'Мая'; break;
            case '06': return 'Июня'; break;
            case '07': return 'Июля'; break;
            case '08': return 'Августа'; break;
            case '09': return 'Сентября'; break;
            case '10': return 'Октября'; break;
            case '11': return 'Ноября'; break;
            case '12': return 'Декабря'; break;
        }
        return '';
    }
    
}