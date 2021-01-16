<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class team_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function load()
	{
		$this->db->select('*');
		$this->db->from('team');
		$query = $this->db->get();
		return $query->result();
	}

	public function tambah($data)
	{
		$this->db->insert('team', $data);
	}

	public function edit($data)
	{
		$this->db->where('id_team',$data['id_team']);
		$this->db->update('team', $data);
	}

	public function detail($id_team)
	{
		$this->db->select('*');
		$this->db->from('team');
		$this->db->where('id_team', $id_team);
		$query = $this->db->get();
		return $query->row();
	}

	public function delete($data)
	{
		$this->db->where('id_team',$data['id_team']);
		$this->db->delete('team', $data);
	}
}