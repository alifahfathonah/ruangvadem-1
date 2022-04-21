<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function load()
	{
		$this->db->select('*');
		$this->db->from('project');
		$this->db->where(array(	'status_project'	=> 'Publish'));
		$this->db->order_by('tahun','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function load_limit()
	{
		$this->db->select('*');
		$this->db->from('project');
		$this->db->where(array(	'status_project'	=> 'Publish'));
		$this->db->limit(6);
		$this->db->order_by('id_project','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function load_admin()
	{
		$this->db->select('*');
		$this->db->from('project');
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}


	public function tahun()
	{
		$this->db->select('tahun');
		$this->db->from('project');
		$this->db->where(array(	'status_project'	=> 'Publish'));
		$this->db->group_by('tahun');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_image_first($id)
	{
		$this->db->select('*');
		$this->db->from('gambar_project');
		$this->db->where(array(	'id_project'	=> $id));
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->row();
	}

	public function get_image_id($id)
	{
		$this->db->select('*');
		$this->db->from('gambar_project');
		$this->db->where('id_gambar_project', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function detail($id)
	{
		$this->db->select('*');
		$this->db->from('project');
		$this->db->where(array(	'id_project'	=> $id));
		$query = $this->db->get();
		return $query->row();
	}

	public function get_all_image($id)
	{
		$this->db->select('*');
		$this->db->from('gambar_project');
		$this->db->where(array(	'id_project'	=> $id));
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function tambah($data)
	{
		$this->db->insert('project', $data);
	}

	public function tambah_gambar($data)
	{
		$this->db->insert('gambar_project', $data);
	}

	public function edit($data)
	{
		$this->db->where('id_project',$data['id_project']);
		$this->db->update('project', $data);
	}

	public function edit_gambar($data)
	{
		$this->db->where('id_gambar_project',$data['id_gambar_project']);
		$this->db->update('gambar_project', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_project',$data['id_project']);
		$this->db->delete('project', $data);
	}

	public function delete_gambar($data)
	{
		$this->db->where('id_gambar_project',$data['id_gambar_project']);
		$this->db->delete('gambar_project', $data);
	}

	public function get_last_num()
	{
		$this->db->select('urutan');
		$this->db->from('project');
		$this->db->order_by('urutan','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	public function get_last_num_image($id_project)
	{
		$this->db->select('urutan');
		$this->db->from('gambar_project');
		$this->db->where('id_project',$id_project);
		$this->db->order_by('urutan','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	public function get_id()
	{
		$this->db->select('*');
		$this->db->from('project');
		$this->db->order_by('id_project','DESC');
		$query = $this->db->get();
		return $query->row();
	}

}