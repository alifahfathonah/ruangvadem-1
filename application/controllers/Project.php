<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('project_model');
	}

	public function index()
	{
		$project 	= $this->project_model->load();
		$tahun	 	= $this->project_model->tahun();

		$data = array(	'title'				=> 'PROJECT VADEM',
						'tahun'				=> $tahun,
						'project'			=> $project,
						'isi'				=> 'frontend/project/index',
						'name'				=> 'project'
			);
		$this->load->view('frontend/layout/wrapper', $data);
	}

	public function detail($id)
	{
		$project 	= $this->project_model->detail($id);
		$gambar		= $this->project_model->get_all_image($id);
		$jumlah		= count($gambar);

		// die(var_dump(count($gambar)));

		$data = array(	'title'				=> 'PROJECT - '.$project->judul_project,
						'gambar'			=> $gambar,
						'project'			=> $project,
						'jumlah'			=> $jumlah,
						'isi'				=> 'frontend/project/detail',
						'name'				=> 'project'
			);
		$this->load->view('frontend/layout/wrapper', $data);
	}

}