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
		$team 	= $this->team_model->load();

		$data = array(	'title'				=> 'TEAM VADEM',
						'team'				=> $team,
						'isi'				=> 'frontend/team/index',
						'name'				=> 'team'
			);
		$this->load->view('frontend/layout/wrapper', $data);
	}

}