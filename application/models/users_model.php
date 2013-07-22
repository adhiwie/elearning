<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {

	public function get_user_list($offset, $limit)
	{
		$this->db->select('*');
        $this->db->order_by("id", "desc"); 
		$query = $this->db->get('user',$offset,$limit);
        return $query->result();
	}

	public function get_total_row()
	{
		return $this->db->count_all('user');
	}

	public function get_by_id($user_id)
	{
		$this->db->select('*');
		$this->db->where('id',$user_id);
		return $this->db->get('user');
	}

	public function add_user($data)
	{
		$this->db->insert('user',$data);
	}
}

/* End of file users_model.php */
/* Location: ./application/models/users_model.php */