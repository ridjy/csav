<?php if ( ! defined('BASEPATH')) exit('No direct script access
allowed');
 
class global_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database('default',TRUE);	
	}
	
	public function selectRow($table_name, $champs, $where = 1)
	{
		$this->db->select($champs);
		$this->db->from($table_name);
		$this->db->where($where);

		$query = $this->db->get();
		$data = $query->row();
		return $data;
	}

	public function select($table_name, $champs, $where = 1)
	{
		$this->db->select($champs);
		$this->db->from($table_name);
		$this->db->where($where);

		$query = $this->db->get();
		$data = $query->result();
		return $data;
	}

	public function update($table_name, $data, $where)
	{
		$this->db->set($data);	
		$this->db->where($where);
		return $this->db->update($table_name);
	}

	public function delete($table_name, $where)
	{
		$this->db->where($where);
		return $this->db->delete($table_name);
	}


}