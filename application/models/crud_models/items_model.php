<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Items_model extends CI_Model {
    
    const T = 'items';

    public function __construct() {
        parent::__construct();
    }
    
     public function select($status,$id = 0){
        switch($status){
            case 'lastitems':
                $this->db->where('in_published','1');
                $this->db->order_by('id','desc');
                $this->db->limit(10);
                $q = $this->db->get(self::T);
                return $q->result_array();
                break;
            case 'id':
                $this->db->where('id',$id);
                $q = $this->db->get(self::T);
                return $q->row_array();
                break;
            case'all':
                $this->db->order_by('id','asc');
                $q = $this->db->get(self::T);
                return $q->result_array();
                break;
            default :
                return array();
                break;
        }
    }
    
    public function update($d){
        $this->db->where('id',$d['id']);
        $this->db->update(self::T, $d);
    }
    
    public function insert($d){
        $this->db->insert(self::T,$d);
    }
    
    public function delete($i){
        $this->db->where('id',$i);
        $this->db->delete(self::T);
    }
    
    public function setimage($d){
        $this->load->helper('string');
        $this->load->library('image_lib');
        $conf = array(
            'file_name'     => random_string('alnum', 20),
            'upload_path'   => './userfiles/items/originals/',
            'allowed_types' => 'gif|jpg|jpeg|png|GIF|JPG|PNG|JPEG',
            'max_size'      => '100000000',
            'max_width'     => '1000000',
            'max_height'    => '1000000'
        );
        $this->load->library('upload',$conf);
        if (!$this->upload->do_upload('uploadimgitems')){echo 'error_load';}
        else {
            $data = $this->upload->data();
            $d['name_file'] = $data['raw_name'];
            $d['ext_file']  = str_replace('.','',$data['file_ext']);
            
            $mini = array(
                'image_library' => 'GD2',
                'source_image'  => './userfiles/items/originals/'.$data['file_name'],
                'new_image'     => './userfiles/items/thumbs/'.$data['file_name'],
                'create_thumb'  => TRUE,
                'maintain_ratio'=> TRUE,
                'width'         => 150,
                'height'        => 150
            );
            $this->image_lib->initialize($mini);
            $this->image_lib->resize();
            $this->items_images_model->insert($d);
            echo '<img src="/userfiles/items/originals/'.$data['file_name'].'" style="max-width: 660px; max-height: 390px; margin: 0 auto; display:block;" />';
            exit();
        }
    }
    
}