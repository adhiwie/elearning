<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Metric_model extends CI_Model {

	public function get_metric_list($offset, $limit)
	{
		$this->db->select('*');
        $this->db->order_by("id", "asc"); 
		$query = $this->db->get('metric',$offset,$limit);
        return $query->result();
	}
	public function get_metric_all()
	{
		$this->db->select('*');
        $this->db->order_by("id", "asc"); 
		$query = $this->db->get('metric');
        return $query->result();
	}

	public function get_total_row()
	{
		return $this->db->count_all('metric');
	}

	public function get_by_id($metric_id)
	{
		$this->db->select('*');
		$this->db->where('id',$metric_id);
		return $this->db->get('metric');
	}

	public function add_metric($data)
	{
		$this->db->insert('metric',$data);
	}

	public function get_cat_name($cat_id)
	{
		$this->db->where('id',$cat_id);
		return $this->db->get('category');
	}

	public function get_proc_name($proc_id)
	{
		$this->db->where('id',$proc_id);
		return $this->db->get('process');
	}

	public function get_cat_list()
	{
		$this->db->order_by('id','asc');
		return $this->db->get('category');
	}

	public function get_proc_list()
	{
		$this->db->order_by('id','asc');
		return $this->db->get('process');
	}

	public function get_proc_by_cat($cat_id)
	{
		$this->db->where('cat_id',$cat_id);
		return $this->db->get('process');
	}

	public function get_metric_by_proc($proc_id)
	{
		$this->db->where('proc_id',$proc_id);
		return $this->db->get('metric');
	}

	public function count_proc()
	{
		return $this->db->count_all('process');
	}

	public function count_cat()
	{
		return $this->db->count_all('category');
	}
}

/* End of file metric.php */
/* Location: ./application/models/metric.php */