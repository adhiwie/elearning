<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gb_model extends CI_Model {

	public function get_gb_list(){
		$this->db->order_by('gb_id');
		return $this->db->get('gb');
	}

	public function insert($data){
		$this->db->insert('gb',$data);
	}
}

?>