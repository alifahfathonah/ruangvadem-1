<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_all()
	{
		$this->db->select('*');
		$this->db->from('document');
		// $this->db->where_not_in('tipe', 'slider');
		$this->db->order_by('tipe','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_xslider()
	{
		$this->db->select('*');
		$this->db->from('document');
		$this->db->where_not_in('tipe', 'slider');
		$this->db->order_by('tipe','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function slider()
	{
		$this->db->select('*');
		$this->db->from('document');
		$this->db->where('tipe', 'slider');
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function tambah($data)
	{
		$this->db->insert('document', $data);
	}

	public function edit($data)
	{
		$this->db->where('id_document',$data['id_document']);
		$this->db->update('document', $data);
	}

	public function detail($id_document)
	{
		$this->db->select('*');
		$this->db->from('document');
		$this->db->where('id_document', $id_document);
		$query = $this->db->get();
		return $query->row();
	}

	public function delete($data)
	{
		$this->db->where('id_document',$data['id_document']);
		$this->db->delete('document', $data);
	}

	public function get_last_num()
	{
		$this->db->select('urutan');
		$this->db->from('document');
		$this->db->order_by('urutan','DESC');
		$query = $this->db->get();
		return $query->row();
	}

}