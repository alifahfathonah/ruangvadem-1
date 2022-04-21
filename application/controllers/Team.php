<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('team_model');
	}

	public function index()
	{
		$team_inti    = $this->team_model->load_inti();
		$jabatan	  = $this->team_model->load_jabatan();
		$team_anggota = $this->team_model->load_anggota();

		$data = array(	'title'				=> 'TEAM VADEM',
						'team_inti'			=> $team_inti,
						'team_jabatan'		=> $jabatan,
						'team_anggota'		=> $team_anggota,
						'isi'				=> 'frontend/team/index',
						'name'				=> 'team'
			);
		$this->load->view('frontend/layout/wrapper', $data);
	}

}