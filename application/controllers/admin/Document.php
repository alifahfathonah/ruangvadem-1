<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document extends CI_Controller {

	// load data
	public function __construct()
	{
		parent::__construct();
		$this->load->model('document_model');
		$this->load->database();
		// Tambahkan proteksi halaman
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
		// Ambil check login dari simple_login
		$this->simple_login->check_login($pengalihan);
	}

	public function index()
	{
		$document 		= $this->document_model->get_all();

		$data = array(	'title'		=> 'Document',
						'document'	=> $document,
						'name'		=> 'document',
						'isi'		=> 'admin/document/index'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Tambah
	public function tambah()
	{
		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('urutan','Urutan diisi','required',
			array(	'required'	=> '%s harus diisi'));

		if($valid->run()) {
			$i = $this->input;
			if ($i->post('tipe') == 'foto' || $i->post('tipe') == 'slider') {
				if(!empty($_FILES['gambar']['name'])) {
					$config['upload_path'] 		= './assets/img/document/thumbs';
					$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
					$config['max_size']  		= '2400'; // KB
					$config['max_width']  		= '720'; // Pixel
					$config['max_height']  		= '720'; //Pixel
					$this->load->library('upload', $config);
					if ( ! $this->upload->do_upload('gambar')){
						// End validasi

						$data = array(	'title'		=> 'Tambah document',
										'error'		=> $this->upload->display_errors(),
										'isi'		=> 'admin/document/tambah'
									);
						$this->load->view('admin/layout/wrapper', $data, FALSE);
						// Masuk database
					}else{
						$upload_data	= array('uploads' =>$this->upload->data());

						$config['image_library']  	= 'gd2';
				        $config['source_image']   	= './assets/img/document/thumbs/'.$upload_data['uploads']['file_name']; 
				        $config['new_image']     	= './assets/img/document';
				        $config['create_thumb']   	= TRUE;
				        $config['quality']       	= "100%";
				        $config['maintain_ratio']   = TRUE;
				        $config['width']       		= 500; // Pixel
				        $config['height']       	= 500; // Pixel
				        $config['x_axis']       	= 0;
				        $config['y_axis']       	= 0;
				        $config['thumb_marker']   	= '';
				        $this->load->library('image_lib', $config);
				        $this->image_lib->resize();

						$data = array(	
										'tipe'			=> $i->post('tipe'),
										'urutan'		=> $i->post('urutan'),
										'gambar'		=> $upload_data['uploads']['file_name'],
									);
						$this->document_model->tambah($data);
						$this->session->set_flashdata('sukses', 'Data telah ditambah');
						redirect(base_url('admin/document'),'refresh');
					}
				}
			}else{
				$data = array(	
								'tipe'			=> $i->post('tipe'),
								'urutan'		=> $i->post('urutan'),
								'gambar'		=> $i->post('video'),
							);
				$this->document_model->tambah($data);
				$this->session->set_flashdata('sukses', 'Data telah ditambah');
				redirect(base_url('admin/document'),'refresh');
			}
		}
		// End masuk database
		$data = array(	'title'		=> 'Tambah document',
						'name'		=> 'document_tambah',
						'isi'		=> 'admin/document/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Edit
	public function edit($id_document)
	{
		$document = $this->document_model->detail($id_document);
		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('urutan','Urutan diisi','required',
			array(	'required'	=> '%s harus diisi'));

		if($valid->run()) {
			$i = $this->input;
			if ($i->post('tipe') == 'foto' || $i->post('tipe') == 'slider') {
				if(!empty($_FILES['gambar']['name'])) {
					$config['upload_path'] 		= './assets/img/document/thumbs';
					$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
					$config['max_size']  		= '2400'; // KB
					$config['max_width']  		= '720'; // Pixel
					$config['max_height']  		= '720'; //Pixel
					$this->load->library('upload', $config);
					if ( ! $this->upload->do_upload('gambar')){
						// End validasi

						$data = array(	'title'		=> 'Edit document',
										'error'		=> $this->upload->display_errors(),
										'isi'		=> 'admin/document/edit'
									);
						$this->load->view('admin/layout/wrapper', $data, FALSE);
						// Masuk database
					}else{
						$upload_data	= array('uploads' =>$this->upload->data());

						$config['image_library']  	= 'gd2';
				        $config['source_image']   	= './assets/img/document/thumbs/'.$upload_data['uploads']['file_name']; 
				        $config['new_image']     	= './assets/img/document';
				        $config['create_thumb']   	= TRUE;
				        $config['quality']       	= "100%";
				        $config['maintain_ratio']   = TRUE;
				        $config['width']       		= 500; // Pixel
				        $config['height']       	= 500; // Pixel
				        $config['x_axis']       	= 0;
				        $config['y_axis']       	= 0;
				        $config['thumb_marker']   	= '';
				        $this->load->library('image_lib', $config);
				        $this->image_lib->resize();

						$data = array(	
										'id_document'	=> $id_document,
										'tipe'			=> $i->post('tipe'),
										'urutan'		=> $i->post('urutan'),
										'gambar'		=> $upload_data['uploads']['file_name'],
									);
						$this->document_model->edit($data);
						$this->session->set_flashdata('sukses', 'Data telah ditambah');
						redirect(base_url('admin/document'),'refresh');
					}
				}
				else{
					$data = array(	
									'id_document'	=> $id_document,
									'tipe'			=> $i->post('tipe'),
									'urutan'		=> $i->post('urutan')
								);
					$this->document_model->edit($data);
					$this->session->set_flashdata('sukses', 'Data telah diupdate');
					redirect(base_url('admin/document'),'refresh');
				}
			}else{
				$data = array(	
									'id_document'	=> $id_document,
									'gambar'		=> $i->post('video'),
									'tipe'			=> $i->post('tipe'),
									'urutan'		=> $i->post('urutan')
								);
					$this->document_model->edit($data);
					$this->session->set_flashdata('sukses', 'Data telah diupdate');
					redirect(base_url('admin/document'),'refresh');
			}
		}
		// End masuk database
		$data = array(	'title'		=> 'Edit document: '.$document->urutan,
						'document'	=> $document,
						'name'		=> 'document',
						'isi'		=> 'admin/document/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Delete
	public function delete($id_document)
	{
		$document = $this->document_model->detail($id_document);
		if ($document->tipe == 'foto') {
			if($document->gambar !='') {
				unlink('./assets/img/document/'.$document->gambar);
				unlink('./assets/img/document/thumbs/'.$document->gambar);
			}		
		}
		$data = array(	'id_document'	=> $id_document);
		$this->document_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data berhasil dihapus');
		redirect(base_url('admin/document'),'refresh');
	}

	// proses
	public function proses()
	{
		$id_document		= $this->input->post('id_document');

		// Check id_project kosong atau tidak
		if($id_document == "") {
			$this->session->set_flashdata('warning', 'Anda belum memilih data');
			redirect(base_url('admin/document'),'refresh');
		}

		// Proses hapus jika klik tombol "hapus", jika ga ada yg kosong
		if(isset($_POST['hapus'])) {
			// Proses hapus diloop
			for($i=0;$i<sizeof($id_document);$i++)
			{
				$id_document1 = $id_document[$i];
				// Proses hapus gambar
				$document1 = $this->document_model->detail($id_document1);
				// Hapus gambar lama
				if ($document1->tipe == 'foto') {
					if($document1->gambar !="") {
						unlink('./assets/img/document/'.$document1->gambar);
						unlink('./assets/img/document/thumbs/'.$document1->gambar);
					}	
				}
				// End hapus gambar lama
				$data = array(	'id_document' => $id_document1);
				$this->document_model->delete($data);
			}
			// End proses hapus
			$this->session->set_flashdata('sukses', 'Data telah dihapus');
			redirect(base_url('admin/document'),'refresh');

		}
	}

}