<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

	// load data
	public function __construct()
	{
		parent::__construct();
		$this->load->model('team_model');
		// Tambahkan proteksi halaman
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
		// Ambil check login dari simple_login
		$this->simple_login->check_login($pengalihan);
	}

	// Admin page
	public function index()
	{
		$team 		= $this->team_model->load();

		$data = array(	'title'		=> 'Team',
						'team'		=> $team,
						'name'		=> 'team',
						'isi'		=> 'admin/team/index'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Tambah
	public function tambah()
	{
		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama team','required',
			array(	'required'	=> '%s harus diisi'));

		if($valid->run()) {
			if(!empty($_FILES['gambar']['name'])) {
				$config['upload_path'] 		= './assets/img/team/thumbs';
				$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
				$config['max_size']  		= '2400'; // KB
				$config['max_width']  		= '720'; // Pixel
				$config['max_height']  		= '720'; //Pixel
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('gambar')){
					// End validasi

					$data = array(	'title'		=> 'Tambah Team',
									'error'		=> $this->upload->display_errors(),
									'isi'		=> 'admin/team/tambah'
								);
					$this->load->view('admin/layout/wrapper', $data, FALSE);
					// Masuk database
				}else{
					$upload_data	= array('uploads' =>$this->upload->data());

					$config['image_library']  	= 'gd2';
			        $config['source_image']   	= './assets/img/team/thumbs/'.$upload_data['uploads']['file_name']; 
			        $config['new_image']     	= './assets/img/team';
			        $config['create_thumb']   	= TRUE;
			        $config['quality']       	= "100%";
			        $config['maintain_ratio']   = TRUE;
			        $config['width']       		= 720; // Pixel
			        $config['height']       	= 720; // Pixel
			        $config['x_axis']       	= 0;
			        $config['y_axis']       	= 0;
			        $config['thumb_marker']   	= '';
			        $this->load->library('image_lib', $config);
			        $this->image_lib->resize();

					$i = $this->input;
					$data = array(	'nama'				=> $i->post('nama'),
									'jabatan'			=> $i->post('jabatan'),
									'fb'				=> $i->post('facebook'),
									'status'			=> $i->post('status'),
									'ig'				=> $i->post('instagram'),
									'keahlian'			=> $i->post('keahlian'),
									'tahun'				=> $i->post('tahun'),
									'foto'				=> $upload_data['uploads']['file_name'],
								);
					$this->team_model->tambah($data);
					$this->session->set_flashdata('sukses', 'Data telah ditambah');
					redirect(base_url('admin/team'),'refresh');
				}
			}
		}
		// End masuk database
		$data = array(	'title'		=> 'Tambah Team',
						'name'		=> 'team_tambah',
						'isi'		=> 'admin/team/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Edit
	public function edit($id_team)
	{
		$team = $this->team_model->detail($id_team);
		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama team','required',
			array(	'required'	=> '%s harus diisi'));

		if($valid->run()) {
			if(!empty($_FILES['gambar']['name'])) {
				$config['upload_path'] 		= './assets/img/team/thumbs';
				$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
				$config['max_size']  		= '2400'; // KB
				$config['max_width']  		= '720'; // Pixel
				$config['max_height']  		= '720'; //Pixel
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('gambar')){
					// End validasi

					$data = array(	'title'		=> 'Edit Team: '.$team->nama,
									'error'		=> $this->upload->display_errors(),
									'team'		=> $team,
									'name'		=> 'team',
									'isi'		=> 'admin/team/edit'
								);
					$this->load->view('admin/layout/wrapper', $data, FALSE);
					// Masuk database
				}else{
					$upload_data        		= array('uploads' =>$this->upload->data());
			        // Image Editor
			        $config['image_library']  	= 'gd2';
			        $config['source_image']   	= './assets/img/team/thumbs/'.$upload_data['uploads']['file_name']; 
			        $config['new_image']     	= './assets/img/team';
			        $config['create_thumb']   	= TRUE;
			        $config['quality']       	= "100%";
			        $config['maintain_ratio']   = TRUE;
			        $config['width']       		= 720; // Pixel
			        $config['height']       	= 720; // Pixel
			        $config['x_axis']       	= 0;
			        $config['y_axis']       	= 0;
			        $config['thumb_marker']   	= '';
			        $this->load->library('image_lib', $config);
			        $this->image_lib->resize();

					$i = $this->input;
					$data = array(	'id_team'			=> $team->id_team,
									'nama'				=> $i->post('nama'),
									'fb'				=> $i->post('facebook'),
									'status'			=> $i->post('status'),
									'ig'				=> $i->post('instagram'),
									'keahlian'			=> $i->post('keahlian'),
									'jabatan'			=> $i->post('jabatan'),
									'tahun'				=> $i->post('tahun'),
									'foto'				=> $upload_data['uploads']['file_name'],
								);
					$this->team_model->edit($data);
					$this->session->set_flashdata('sukses', 'Data '.$team->nama.' telah diupdate');
					redirect(base_url('admin/team'),'refresh');
				}}
			else{
				$i = $this->input;
				$data = array(	'id_team'			=> $team->id_team,
								'nama'				=> $i->post('nama'),
								'fb'				=> $i->post('facebook'),
								'status'			=> $i->post('status'),
								'ig'				=> $i->post('instagram'),
								'keahlian'			=> $i->post('keahlian'),
								'jabatan'			=> $i->post('jabatan'),
								'tahun'				=> $i->post('tahun')
							);
				$this->team_model->edit($data);
				$this->session->set_flashdata('sukses', 'Data '.$team->nama.' telah diupdate');
				redirect(base_url('admin/team'),'refresh');
			}
		}
		// End masuk database
		$data = array(	'title'		=> 'Edit Team: '.$team->nama,
						'team'		=> $team,
						'name'		=> 'team',
						'isi'		=> 'admin/team/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Delete
	public function delete($id_team)
	{
		$team = $this->team_model->detail($id_team);
		if($team->foto !='') {
			unlink('./assets/img/team/'.$team->foto);
			unlink('./assets/img/team/thumbs/'.$team->foto);
		}
		$data = array(	'id_team'	=> $id_team);
		$this->team_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data berhasil dihapus');
		redirect(base_url('admin/team'),'refresh');
	}

	// proses
	public function proses()
	{
		$id_team		= $this->input->post('id_team');

		// Check id_project kosong atau tidak
		if($id_team == "") {
			$this->session->set_flashdata('statusrning', 'Anda belum memilih data');
			redirect(base_url('admin/team'),'refresh');
		}

		// Proses hapus jika klik tombol "hapus", jika ga ada yg kosong
		if(isset($_POST['hapus'])) {
			// Proses hapus diloop
			for($i=0;$i<sizeof($id_team);$i++)
			{
				$id_team1 = $id_team[$i];
				// Proses hapus gambar
				$team1 = $this->team_model->detail($id_team1);
				// Hapus gambar lama
				if($team1->foto !="") {
					unlink('./assets/img/team/'.$team1->foto);
					unlink('./assets/img/team/thumbs/'.$team->foto);
				}
				// End hapus gambar lama
				$data = array(	'id_team' => $id_team1);
				$this->team_model->delete($data);
			}
			// End proses hapus
			$this->session->set_flashdata('sukses', 'Data telah dihapus');
			redirect(base_url('admin/team'),'refresh');

		}
	}
}