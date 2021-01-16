<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('document_model');
		$this->load->model('project_model');
	}

	public function index()
	{
		$slider 	= $this->document_model->slider();
		$project 	= $this->project_model->load_limit();
		$tahun	 	= $this->project_model->tahun();

		// die(var_dump($project));

		$data = array(	'title'				=> 'RUANG VADEM',
						'slider'			=> $slider,
						'tahun'				=> $tahun,
						'project'			=> $project,
						'isi'				=> 'frontend/home/index',
						'name'				=> 'room'
			);
		$this->load->view('frontend/layout/wrapper', $data);
	}

}