<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('site_model');
		// Tambahkan proteksi halaman
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
		// Ambil check login dari simple_login
		$this->simple_login->check_login($pengalihan);
	}

	// General Configuration
	public function index() {
		$site = $this->site_model->listing();
		
		// Validasi 
		$this->form_validation->set_rules('email','Email','valid_email');
		
		if($this->form_validation->run() === FALSE) {
			
			$data = array(	'title'	=> 'Konfigurasi',
				'site'	=> $site,
				'name'	=> 'konfigurasi_umum',
				'isi'	=> 'admin/konfigurasi/index');
			$this->load->view('admin/layout/wrapper',$data);
		}else{
			$i = $this->input;
			$data = array(	'id_konfigurasi'	=> $i->post('id_konfigurasi'),
				'tentang'			=> $i->post('tentang'),
				'email'				=> $i->post('email'),
				'alamat'			=> $i->post('alamat'),
				'home_deskripsi'	=> $i->post('home_deskripsi'),
				'project_deskripsi'	=> $i->post('project_deskripsi'),
				'document_deskripsi'=> $i->post('document_deskripsi'),
				'merchant_deskripsi'=> $i->post('merchant_deskripsi'),
				'team_deskripsi'	=> $i->post('team_deskripsi'),
				'keywords'			=> $i->post('keywords'),
				'facebook'			=> $i->post('facebook'),
				'youtube'			=> $i->post('youtube'),
				'instagram'			=> $i->post('instagram'));
			$this->site_model->edit($data);
			$this->session->set_flashdata('sukses','Konfigurasi Berhasil Diperbarui');
			redirect(base_url('admin/konfigurasi'));
		}
	}

	public function icon()
	{
		$site = $this->site_model->listing();
		
		$v = $this->form_validation;
		$v->set_rules('id_konfigurasi','ID Konfigurasi','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/img/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '12000'; // KB
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('icon')) {
				
				$data = array(	'title'	=> 'New Icon',
					'site'	=> $site,
					'name'	=> 'konfigurasi_icon',
					'error'	=> $this->upload->display_errors(),
					'isi'	=> 'admin/konfigurasi/icon');
				$this->load->view('admin/layout/wrapper',$data);
			}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Hapus gambar lama
				unlink('./assets/img/'.$site->icon);
				// Masuk ke database
				$i = $this->input;
				$data = array(	'id_konfigurasi'=> $i->post('id_konfigurasi'),
					'icon'			=> $upload_data['uploads']['file_name']);
				$this->site_model->edit($data);
				$this->session->set_flashdata('sukses','Icon changed');
				redirect(base_url('admin/konfigurasi/icon'));
			}}
		// Default page
			$data = array(	'title'	=> 'New Icon',
				'site'	=> $site,
				'name'	=> 'konfigurasi_icon',
				'isi'	=> 'admin/konfigurasi/icon');
			$this->load->view('admin/layout/wrapper',$data);
	}

	public function up_tinymce()
	{
		$config['upload_path'] = './assets/img/tiny/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = 0;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('file')) {
			$this->output->set_header('HTTP/1.0 500 Server Error');
			exit;
		} else {
			$file = $this->upload->data();
			$this->output
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode(['location' => base_url().'assets/img/tiny/'.$file['file_name']]))
				->_display();
			exit;
		}
	}
}