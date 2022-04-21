<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing() {
		$this->db->select('*');
		$this->db->from('konfigurasi');
		$this->db->order_by('id_konfigurasi','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Edit
	public function edit($data) {
		$this->db->where('id_konfigurasi',$data['id_konfigurasi']);
		$this->db->update('konfigurasi',$data);
	}

	public function kunjungan()
	{
		$this->db->select('hari, COUNT(*) AS total');
		$this->db->from('kunjungan');
		$this->db->group_by('hari');
		$this->db->order_by('hari', 'desc');
		$this->db->limit(14);
		$query = $this->db->get();
		return $query->result();
	}

	public function project_all()
	{
		$this->db->select('*');
		$this->db->from('project');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function merchant_all()
	{
		$this->db->select('*');
		$this->db->from('merchandise');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function document_all()
	{
		$this->db->select('*');
		$this->db->from('document');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function team_all()
	{
		$this->db->select('*');
		$this->db->from('team');
		$query = $this->db->get();
		return $query->num_rows();
	}
}