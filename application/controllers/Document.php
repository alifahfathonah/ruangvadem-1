<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('document_model');
	}

	public function index()
	{
		$document = $this->document_model->get_xslider();

		$data = array(	'title'				=> 'DOCUMENT VADEM',
						'document'			=> $document,
						'isi'				=> 'frontend/document/index',
						'name'				=> 'document'
			);
		$this->load->view('frontend/layout/wrapper', $data);
	}

}