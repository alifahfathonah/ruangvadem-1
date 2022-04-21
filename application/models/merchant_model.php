<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merchant_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_all()
	{
		$this->db->select('*');
		$this->db->from('merchandise');
		$this->db->order_by('id_merchandise','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function jumlah()
	{
		$this->db->select('*');
		$this->db->from('merchandise');
		$this->db->order_by('id_merchandise','DESC');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function pagin($limit,$start) {
		$this->db->select('*');
		$this->db->from('merchandise');
		$this->db->join('gambar_merchandise', 'merchandise.id_merchandise = gambar_merchandise.id_merchandise', 'left');
		$this->db->order_by('merchandise.id_merchandise','DESC');
		$this->db->where('gambar_merchandise.urutan', 1);
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query;
	}

	public function detail($id_merchandise)
	{
		$this->db->select('*');
		$this->db->from('merchandise');
		$this->db->where('id_merchandise', $id_merchandise);
		$query = $this->db->get();
		return $query->row();
	}

	public function get_gambar($id_merchandise)
	{
		$this->db->select('*');
		$this->db->from('gambar_merchandise');
		$this->db->where('id_merchandise', $id_merchandise);
		$query = $this->db->get();
		return $query->result();
	}

	public function tambah($data)
	{
		$this->db->insert('merchandise', $data);
	}

	public function edit($data)
	{
		$this->db->where('id_merchandise',$data['id_merchandise']);
		$this->db->update('merchandise', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_merchandise',$data['id_merchandise']);
		$this->db->delete('merchandise', $data);
	}

	public function delete_gambar($data)
	{
		$this->db->where('id_gambar_merchandise',$data['id_gambar_merchandise']);
		$this->db->delete('gambar_merchandise', $data);
	}

	public function total_search($keywords)
	{
		$this->db->select('*');
		$this->db->from('merchandise');
		$this->db->like('nama_merchandise',$keywords);
		$this->db->order_by('id_merchandise','DESC');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function search($keywords,$limit,$start)
	{
		$this->db->select('*');
		$this->db->from('merchandise');
		$this->db->join('gambar_merchandise', 'merchandise.id_merchandise = gambar_merchandise.id_merchandise', 'left');
		$this->db->order_by('merchandise.id_merchandise','DESC');
		$this->db->where('gambar_merchandise.urutan', 1);
		$this->db->like('nama_merchandise',$keywords);
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query;
	}

	public function get_last_num_image($id_merchandise)
	{
		$this->db->select('urutan');
		$this->db->from('gambar_merchandise');
		$this->db->where('id_merchandise',$id_merchandise);
		$this->db->order_by('urutan','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	public function tambah_gambar($data)
	{
		$this->db->insert('gambar_merchandise', $data);
	}

	public function get_image_id($id)
	{
		$this->db->select('*');
		$this->db->from('gambar_merchandise');
		$this->db->where('id_gambar_merchandise', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function edit_gambar($data)
	{
		$this->db->where('id_gambar_merchandise',$data['id_gambar_merchandise']);
		$this->db->update('gambar_merchandise', $data);
	}
}