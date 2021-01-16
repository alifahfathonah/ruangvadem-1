<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class gambar_merchant_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing($id_merchandise)
	{
		$this->db->select('*');
		$this->db->from('gambar_merchandise');
		$this->db->where('id_merchandise', $id_merchandise);
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

}