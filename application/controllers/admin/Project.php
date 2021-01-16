<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

	// load data
	public function __construct()
	{
		parent::__construct();
		$this->load->model('project_model');
		// Tambahkan proteksi halaman
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
		// Ambil check login dari simple_login
		$this->simple_login->check_login($pengalihan);
	}

	public function index()
	{
		$project 		= $this->project_model->load_admin();

		$data = array(	'title'		=> 'Project',
						'project'	=> $project,
						'name'		=> 'project',
						'isi'		=> 'admin/project/index'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// proses
	public function proses()
	{
		$id_project		= $this->input->post('id_project');

		// Check id_project kosong atau tidak
		if($id_project == "") {
			$this->session->set_flashdata('warning', 'Anda belum memilih data');
			redirect(base_url('admin/project'),'refresh');
		}

		// Proses hapus jika klik tombol "hapus", jika ga ada yg kosong
		if(isset($_POST['hapus'])) {
			// Proses hapus diloop
			for($i=0;$i<sizeof($id_project);$i++)
			{
				$id_project1 = $id_project[$i];
				// Proses hapus gambar
				$project1 = $this->project_model->get_all_image($id_project1);
				// Hapus gambar lama
				foreach ($project1 as $project1) {
					if($project1->gambar !="") {
						unlink('./assets/img/project/'.$project1->gambar);
						unlink('./assets/img/project/thumbs/'.$project1->gambar);
					}
					$data1 = array(	'id_gambar_project' => $project1->id_gambar_project);
					$this->project_model->delete_gambar($data1);
				}
				// End hapus gambar lama
				$data = array(	'id_project' => $id_project1);
				$this->project_model->delete($data);
			}
			// End proses hapus
			$this->session->set_flashdata('sukses', 'Data telah dihapus');
			redirect(base_url('admin/project'),'refresh');

		}elseif(isset($_POST['draft'])) {
            $inp 				= $this->input;
			$id_projectnya		= $inp->post('id_project');
			for($i=0; $i < sizeof($id_projectnya);$i++) {
				$data = array(	'id_project'	=> $id_projectnya[$i], 'status_project' => 'Draft');
   				$this->project_model->edit($data);
   			}

            $this->session->set_flashdata('sukses', 'Data telah ditambah ke draft');
   			redirect(base_url('admin/project'),'refresh');
        // PROSES SETTING PUBLISH
        }elseif(isset($_POST['publish'])) {
            $inp 				= $this->input;
			$id_projectnya		= $inp->post('id_project');
			for($i=0; $i < sizeof($id_projectnya);$i++) {
				$data = array(	'id_project'	=> $id_projectnya[$i], 'status_project' => 'Publish');
   				$this->project_model->edit($data);
   			}

            $this->session->set_flashdata('sukses', 'Data telah ditambah ke publish');
   			redirect(base_url('admin/project'),'refresh');
        }
	}

	// Tambah
	public function tambah()
	{
		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('urutan','Urutan diisi','required',
			array(	'required'	=> '%s harus diisi'));

		if($valid->run()) {
			if(!empty($_FILES['gambar']['name'])) {
				$config['upload_path'] 		= './assets/img/project/thumbs';
				$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
				$config['max_size']  		= '2400'; // KB
				$config['max_width']  		= '720'; // Pixel
				$config['max_height']  		= '720'; //Pixel
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('gambar')){
					// End validasi

					$data = array(	'title'		=> 'Tambah Project',
									'error'		=> $this->upload->display_errors(),
									'isi'		=> 'admin/project/tambah'
								);
					$this->load->view('admin/layout/wrapper', $data, FALSE);
					// Masuk database
				}else{
					$upload_data	= array('uploads' =>$this->upload->data());

					$config['image_library']  	= 'gd2';
			        $config['source_image']   	= './assets/img/project/thumbs/'.$upload_data['uploads']['file_name']; 
			        $config['new_image']     	= './assets/img/project';
			        $config['create_thumb']   	= TRUE;
			        $config['quality']       	= "100%";
			        $config['maintain_ratio']   = TRUE;
			        $config['width']       		= 490; // Pixel
			        $config['height']       	= 490; // Pixel
			        $config['x_axis']       	= 0;
			        $config['y_axis']       	= 0;
			        $config['thumb_marker']   	= '';
			        $this->load->library('image_lib', $config);
			        $this->image_lib->resize();

					$i  = $this->input;
					$data_project = array(	
											'judul_project'	=> $i->post('judul'),
											'deskripsi_project'	=> $i->post('deskripsi'),
											'tahun'			=> $i->post('tahun'),
											'status_project'=> $i->post('status'),
											'urutan'		=> $i->post('urutan')
										);
					$this->project_model->tambah($data_project);

					$data_gambar  = array(
											'id_project' 	=> $this->db->insert_id(), 
											'judul_gambar'	=> $i->post('judul'),
											'urutan'		=> 1,
											'gambar'		=> $upload_data['uploads']['file_name']);
					$this->project_model->tambah_gambar($data_gambar);
					$this->session->set_flashdata('sukses', 'Data telah ditambah');
					redirect(base_url('admin/project'),'refresh');
				}
			}
		}
		// End masuk database
		$data = array(	'title'		=> 'Tambah Project',
						'name'		=> 'project_tambah',
						'isi'		=> 'admin/project/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Edit
	public function edit($id_project)
	{
		$project = $this->project_model->detail($id_project);
		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('urutan','Urutan diisi','required',
			array(	'required'	=> '%s harus diisi'));

		if($valid->run()) {
			$i = $this->input;
			$data = array(	
							'id_project'	=> $id_project,
							'judul_project'	=> $i->post('judul'),
							'deskripsi_project'	=> $i->post('deskripsi'),
							'tahun'			=> $i->post('tahun'),
							'status_project'=> $i->post('status'),
							'urutan'		=> $i->post('urutan')
						);
			$this->project_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('admin/project'),'refresh');
		}
		// End masuk database
		$data = array(	'title'		=> 'Edit project: '.$project->urutan,
						'project'	=> $project,
						'name'		=> 'project',
						'isi'		=> 'admin/project/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Delete
	public function delete($id_project)
	{
		$project = $this->project_model->get_all_image($id_project);
		// Hapus gambar lama
		foreach ($project as $project1) {
			if($project1->gambar !="") {
				unlink('./assets/img/project/'.$project1->gambar);
				unlink('./assets/img/project/thumbs/'.$project1->gambar);
			}
			$data1 = array(	'id_gambar_project' => $project1->id_gambar_project);
			$this->project_model->delete_gambar($data1);
		}
		$data = array(	'id_project'	=> $id_project);
		$this->project_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data berhasil dihapus');
		redirect(base_url('admin/project'),'refresh');
	}

	public function gambar($id_project)
	{
		$gambar 		= $this->project_model->get_all_image($id_project);
		$project 		= $this->project_model->detail($id_project);

		$data = array(	'title'		=> 'Gambar Project - '.$project->judul_project,
						'gambar'	=> $gambar,
						'project'	=> $project,
						'name'		=> 'project',
						'isi'		=> 'admin/project/gambar'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// proses
	public function proses_gambar($id_project)
	{
		$id_gambar		= $this->input->post('id_gambar');

		// Check id_project kosong atau tidak
		if($id_gambar == "") {
			$this->session->set_flashdata('warning', 'Anda belum memilih data');
			redirect(base_url('admin/project/gambar/'.$id_project),'refresh');
		}

		// Proses hapus jika klik tombol "hapus", jika ga ada yg kosong
		if(isset($_POST['hapus'])) {
			// Proses hapus diloop
			for($i=0;$i<sizeof($id_gambar);$i++)
			{
				$id_gambar1 = $id_gambar[$i];
				// Proses hapus gambar
				$gambar1 = $this->project_model->get_image_id($id_gambar1);
				// Hapus gambar lama
				if($gambar1->gambar !="") {
					unlink('./assets/img/project/'.$gambar1->gambar);
					unlink('./assets/img/project/thumbs/'.$gambar1->gambar);
				}
				$data1 = array(	'id_gambar_project' => $gambar1->id_gambar_project);
				$this->project_model->delete_gambar($data1);
			}
			// End proses hapus
			$this->session->set_flashdata('sukses', 'Data telah dihapus');
			redirect(base_url('admin/project/gambar/'.$id_project),'refresh');

		}
	}

	public function tambah_gambar($id_project)
	{
		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('urutan','Urutan diisi','required',
			array(	'required'	=> '%s harus diisi'));

		if($valid->run()) {
			if(!empty($_FILES['gambar']['name'])) {
				$config['upload_path'] 		= './assets/img/project/thumbs';
				$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
				$config['max_size']  		= '2400'; // KB
				$config['max_width']  		= '720'; // Pixel
				$config['max_height']  		= '720'; //Pixel
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('gambar')){
					// End validasi
					// Masuk database
				}else{
					$upload_data	= array('uploads' =>$this->upload->data());

					$config['image_library']  	= 'gd2';
			        $config['source_image']   	= './assets/img/project/thumbs/'.$upload_data['uploads']['file_name']; 
			        $config['new_image']     	= './assets/img/project';
			        $config['create_thumb']   	= TRUE;
			        $config['quality']       	= "100%";
			        $config['maintain_ratio']   = TRUE;
			        $config['width']       		= 490; // Pixel
			        $config['height']       	= 490; // Pixel
			        $config['x_axis']       	= 0;
			        $config['y_axis']       	= 0;
			        $config['thumb_marker']   	= '';
			        $this->load->library('image_lib', $config);
			        $this->image_lib->resize();

					$i  = $this->input;

					$data_gambar  = array(
											'id_project' 	=> $id_project, 
											'judul_gambar'	=> $i->post('judul'),
											'urutan'		=> $i->post('urutan'),
											'gambar'		=> $upload_data['uploads']['file_name']);
					$this->project_model->tambah_gambar($data_gambar);
					$this->session->set_flashdata('sukses', 'Data telah ditambah');
					redirect(base_url('admin/project/gambar/'.$id_project),'refresh');
				}
			}
		}
		// End masuk database
		$data = array(	'title'		=> 'Tambah Gambar Project',
						'id_project'=> $id_project,
						'name'		=> 'project',
						'isi'		=> 'admin/project/tambah_gambar'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function edit_gambar($id_gambar)
	{
		$gambar = $this->project_model->get_image_id($id_gambar);

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('urutan','Urutan diisi','required',
			array(	'required'	=> '%s harus diisi'));

		if($valid->run()) {
			if(!empty($_FILES['gambar']['name'])) {
				$config['upload_path'] 		= './assets/img/project/thumbs';
				$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
				$config['max_size']  		= '2400'; // KB
				$config['max_width']  		= '720'; // Pixel
				$config['max_height']  		= '720'; //Pixel
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('gambar')){
				}else{
					$upload_data	= array('uploads' =>$this->upload->data());

					$config['image_library']  	= 'gd2';
			        $config['source_image']   	= './assets/img/project/thumbs/'.$upload_data['uploads']['file_name']; 
			        $config['new_image']     	= './assets/img/project';
			        $config['create_thumb']   	= TRUE;
			        $config['quality']       	= "100%";
			        $config['maintain_ratio']   = TRUE;
			        $config['width']       		= 490; // Pixel
			        $config['height']       	= 490; // Pixel
			        $config['x_axis']       	= 0;
			        $config['y_axis']       	= 0;
			        $config['thumb_marker']   	= '';
			        $this->load->library('image_lib', $config);
			        $this->image_lib->resize();

			        if($gambar->gambar != ""){
			        	unlink('./assets/img/project/'.$gambar->gambar);
						unlink('./assets/img/project/thumbs/'.$gambar->gambar);
			        }

					$i  = $this->input;

					$data_gambar  = array(
											'id_gambar_project' => $id_gambar,
											'id_project' 	=> $gambar->id_project, 
											'judul_gambar'	=> $i->post('judul'),
											'urutan'		=> $i->post('urutan'),
											'gambar'		=> $upload_data['uploads']['file_name']);
					$this->project_model->edit_gambar($data_gambar);
					$this->session->set_flashdata('sukses', 'Data telah diupdate');
					redirect(base_url('admin/project/gambar/'.$gambar->id_project),'refresh');
				}
			}else{
				$i  = $this->input;

				$data_gambar  = array(
										'id_gambar_project' => $id_gambar,
										'id_project' 	=> $gambar->id_project, 
										'judul_gambar'	=> $i->post('judul'),
										'urutan'		=> $i->post('urutan'));
				$this->project_model->edit_gambar($data_gambar);
				$this->session->set_flashdata('sukses', 'Data telah diupdate');
				redirect(base_url('admin/project/gambar/'.$gambar->id_project),'refresh');
			}
		}

		// die(var_dump($gambar));
		// End masuk database
		$data = array(	'title'		=> 'Edit Gambar Project',
						'gambar'	=> $gambar,
						'name'		=> 'project',
						'isi'		=> 'admin/project/edit_gambar'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function hapus_gambar($id_gambar)
	{
		$gambar = $this->project_model->get_image_id($id_gambar);

		// Hapus gambar lama
		if($gambar->gambar !="") {
			unlink('./assets/img/project/'.$gambar->gambar);
			unlink('./assets/img/project/thumbs/'.$gambar->gambar);
		}
		$data1 = array(	'id_gambar_project' => $gambar->id_gambar_project);
		$this->project_model->delete_gambar($data1);

		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/project/gambar/'.$gambar->id_project),'refresh');
	}
}
