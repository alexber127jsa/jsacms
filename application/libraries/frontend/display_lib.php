<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Display_lib {
    
    public $C;
    
    public function __construct() {
        $this->C = &get_instance();
    }
    
}
