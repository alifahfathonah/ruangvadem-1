<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merchandise extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('merchant_model');
		$this->load->model('gambar_merchant_model');
		$this->load->library('pagination');
	}

	public function index()
	{
		// pagination
		$config['base_url'] 		= base_url().'merchandise/index';
		$config['total_rows'] 		= $this->merchant_model->jumlah();
		$config['use_page_numbers'] = TRUE;
		$config['per_page'] 		= 8;
		$config['first_url'] 		= base_url().'merchandise';
		$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
		$this->pagination->initialize($config); 
		$page 		= ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
		$merchant 	= $this->merchant_model->pagin($config['per_page'], $page)->result();

		// die(print_r($config['per_page'].' == '.$page));

		$data = array(	'title'				=> 'Merchandise VADEM',
						'merchant'			=> $merchant,
						'pagin' 			=> $this->pagination->create_links(),
						'isi'				=> 'frontend/merchandise/index',
						'name'				=> 'merchandise'
			);
		$this->load->view('frontend/layout/wrapper', $data);
	}

	// Search
	public function cari()
	{
		$this->load->helper('security');
		$s 			= $this->input->post('keywords');
		$keyword 	= xss_clean($s);
		$keywords	= encode_php_tags($keyword);

		if($keywords!="") {
			redirect(base_url('merchandise/search?keywords='.$keywords),'refresh');
		}else{
			redirect(base_url('merchandise'),'refresh');
		}
	}

	public function search()
	{
		$this->load->helper('security');
		$keyword 	= xss_clean($_GET['keywords']);
		$keywords	= encode_php_tags($keyword);

		// pagination
		$config['base_url'] 		= base_url().'merchandise/search?keywords='.$keywords.'/index/';
		$config['total_rows'] 		= $this->merchant_model->total_search($keywords);
		$config['use_page_numbers'] = TRUE;
		$config['per_page'] 		= 8;
		$config['first_url'] 		= base_url().'merchandise/search?keywords='.$keywords;
		$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
		$this->pagination->initialize($config); 
		$page 		= ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
		$merchant 	= $this->merchant_model->search($keywords,$config['per_page'], $page)->result();

		// die(print_r($config['per_page'].' == '.$page));

		$data = array(	'title'				=> 'Merchandise VADEM',
						'merchant'			=> $merchant,
						'pagin' 			=> $this->pagination->create_links(),
						'isi'				=> 'frontend/merchandise/index',
						'name'				=> 'merchandise'
			);
		$this->load->view('frontend/layout/wrapper', $data);
	}

	public function detail($id_merchant)
	{
		$merchant = $this->merchant_model->detail($id_merchant);
		$gambar   = $this->gambar_merchant_model->listing($id_merchant);

		$data = array(	'title'				=> 'Merchandise - '.$merchant->nama_merchandise,
						'merchant'			=> $merchant,
						'gambar'			=> $gambar,
						'isi'				=> 'frontend/merchandise/detail',
						'name'				=> 'merchandise'
			);
		$this->load->view('frontend/layout/wrapper', $data);
	}

}
