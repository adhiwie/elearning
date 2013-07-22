<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Elearning_model extends CI_Model {

	public function get_elearning_list($offset, $limit)
	{
		$this->db->select('*');
        $this->db->order_by("id", "desc"); 
		$query = $this->db->get('elearning',$offset,$limit);
        return $query->result();
	}

	public function get_total_row()
	{
		return $this->db->count_all('elearning');
	}

	public function get_by_id($elearning_id)
	{
		$this->db->select('*');
		$this->db->where('id',$elearning_id);
		return $this->db->get('elearning');
	}

	public function add_elearning($data)
	{
		$this->db->insert('elearning',$data);
	}
}

/* End of file elearning_model.php */
/* Location: ./application/models/elearning_model.php */