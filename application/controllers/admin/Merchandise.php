<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merchandise extends CI_Controller {

	// load data
	public function __construct()
	{
		parent::__construct();
		$this->load->model('merchant_model');
		$this->load->database();
		// Tambahkan proteksi halaman
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
		// Ambil check login dari simple_login
		$this->simple_login->check_login($pengalihan);
	}

	public function index()
	{
		$merchandise 		= $this->merchant_model->get_all();

		$data = array(	'title'		=> 'Merchandise',
						'merchandise'	=> $merchandise,
						'name'		=> 'merchandise',
						'isi'		=> 'admin/merchandise/index'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// proses
	public function proses()
	{
		$id_merchandise		= $this->input->post('id_merchandise');

		// Check id_merchant kosong atau tidak
		if($id_merchandise == "") {
			$this->session->set_flashdata('warning', 'Anda belum memilih data');
			redirect(base_url('admin/merchandise'),'refresh');
		}

		// Proses hapus jika klik tombol "hapus", jika ga ada yg kosong
		if(isset($_POST['hapus'])) {
			// Proses hapus diloop
			for($i=0;$i<sizeof($id_merchandise);$i++)
			{
				$id_merchandise1 = $id_merchandise[$i];
				// Proses hapus gambar
				$merchandise1 = $this->merchant_model->get_gambar($id_merchandise1);
				// Hapus gambar lama
				foreach ($merchandise1 as $merchandise1) {
					if($merchandise1->gambar !="") {
						unlink('./assets/img/merchant/'.$merchandise1->gambar);
						unlink('./assets/img/merchant/thumbs/'.$merchandise1->gambar);
					}
					$data = array(	'id_gambar_merchandise' => $merchandise1->id_gambar_merchandise);
					$this->merchant_model->delete_gambar($data);
				}
				// End hapus gambar lama
				$data = array(	'id_merchandise' => $id_merchandise1);
				$this->merchant_model->delete($data);
			}
			// End proses hapus
			$this->session->set_flashdata('sukses', 'Data telah dihapus');
			redirect(base_url('admin/merchandise'),'refresh');

		}
	}

	// tambah
	public function tambah()
	{
		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama merchandise','required',
			array(	'required'	=> '%s harus diisi'));

		if ($valid->run()) {
			$i = $this->input;
			$data = array(	
							'nama_merchandise'		=> $i->post('nama'),
							'harga_merchandise'		=> $i->post('harga'),
							'deskripsi_merchandise'	=> $i->post('deskripsi'),
						);
			$this->merchant_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/merchandise'),'refresh');
		}
		// if($valid->run()) {
		// 	if(!empty($_FILES['gambar']['name'])) {
		// 		$config['upload_path'] 		= './assets/img/merchant/thumbs';
		// 		$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		// 		$config['max_size']  		= '2400'; // KB
		// 		$config['max_width']  		= '1000'; // Pixel
		// 		$config['max_height']  		= '1000'; //Pixel
		// 		$this->load->library('upload', $config);
		// 		if ( ! $this->upload->do_upload('gambar')){
		// 			// End validasi

		// 			$data = array(	'title'		=> 'Tambah Merchandise',
		// 							'name'		=> 'merchandise_tambah',
		// 							'error'		=> $this->upload->display_errors(),
		// 							'isi'		=> 'admin/merchandise/tambah'
		// 						);
		// 			$this->load->view('admin/layout/wrapper', $data, FALSE);
		// 			// Masuk database
		// 		}else{
		// 			$upload_data	= array('uploads' =>$this->upload->data());

		// 			$config['image_library']  	= 'gd2';
		// 	        $config['source_image']   	= './assets/img/merchant/thumbs/'.$upload_data['uploads']['file_name']; 
		// 	        $config['new_image']     	= './assets/img/merchant';
		// 	        $config['create_thumb']   	= TRUE;
		// 	        $config['quality']       	= "100%";
		// 	        $config['maintain_ratio']   = TRUE;
		// 	        $config['width']       		= 500; // Pixel
		// 	        $config['height']       	= 500; // Pixel
		// 	        $config['x_axis']       	= 0;
		// 	        $config['y_axis']       	= 0;
		// 	        $config['thumb_marker']   	= '';
		// 	        $this->load->library('image_lib', $config);
		// 	        $this->image_lib->resize();

		// 			$i = $this->input;
		// 			$data = array(	'nama_merchandise'	=> $i->post('nama'),
		// 							'link_merchandise'	=> $i->post('link'),
		// 							'harga_merchandise'	=> $i->post('harga'),
		// 							'deskripsi_merchandise'	=> $i->post('deskripsi'),
		// 						);
		// 			$this->merchant_model->tambah($data);
		// 			$this->session->set_flashdata('sukses', 'Data telah ditambah');
		// 			redirect(base_url('admin/merchandise'),'refresh');
		// 		}
		// 	}
		// }
		// End masuk database
		$data = array(	'title'		=> 'Tambah Merchandise',
						'name'		=> 'merchandise_tambah',
						'isi'		=> 'admin/merchandise/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// tambah
	public function edit($id_merchandise)
	{
		$merchant = $this->merchant_model->detail($id_merchandise);
		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama merchandise','required',
			array(	'required'	=> '%s harus diisi'));

		if ($valid->run()) {
			$i = $this->input;
			$data = array(	
							'id_merchandise'		=> $id_merchandise,
							'nama_merchandise'		=> $i->post('nama'),
							'harga_merchandise'		=> $i->post('harga'),
							'deskripsi_merchandise'	=> $i->post('deskripsi'),
						);
			$this->merchant_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('admin/merchandise'),'refresh');
		}

		// if($valid->run()) {
		// 	if(!empty($_FILES['gambar']['name'])) {
		// 		$config['upload_path'] 		= './assets/img/merchant/thumbs';
		// 		$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		// 		$config['max_size']  		= '2400'; // KB
		// 		$config['max_width']  		= '1000'; // Pixel
		// 		$config['max_height']  		= '1000'; //Pixel
		// 		$this->load->library('upload', $config);
		// 		if ( ! $this->upload->do_upload('gambar')){
		// 			// End validasi

		// 			$data = array(	'title'		=> 'Edit Merchandise',
		// 							'name'		=> 'merchandise',
		// 							'merchant'	=> $merchant,
		// 							'error'		=> $this->upload->display_errors(),
		// 							'isi'		=> 'admin/merchandise/edit'
		// 						);
		// 			$this->load->view('admin/layout/wrapper', $data, FALSE);
		// 			// Masuk database
		// 		}else{
		// 			$upload_data	= array('uploads' =>$this->upload->data());

		// 			$config['image_library']  	= 'gd2';
		// 	        $config['source_image']   	= './assets/img/merchant/thumbs/'.$upload_data['uploads']['file_name']; 
		// 	        $config['new_image']     	= './assets/img/merchant';
		// 	        $config['create_thumb']   	= TRUE;
		// 	        $config['quality']       	= "100%";
		// 	        $config['maintain_ratio']   = TRUE;
		// 	        $config['width']       		= 500; // Pixel
		// 	        $config['height']       	= 500; // Pixel
		// 	        $config['x_axis']       	= 0;
		// 	        $config['y_axis']       	= 0;
		// 	        $config['thumb_marker']   	= '';
		// 	        $this->load->library('image_lib', $config);
		// 	        $this->image_lib->resize();

		// 	        if($merchant->gambar_merchandise !='') {
		// 				unlink('./assets/img/merchant/'.$merchant->gambar_merchandise);
		// 				unlink('./assets/img/merchant/thumbs/'.$merchant->gambar_merchandise);
		// 			}

		// 			$i = $this->input;
		// 			$data = array(	
		// 							'id_merchandise'	=> $id_merchandise,
		// 							'nama_merchandise'	=> $i->post('nama'),
		// 							'deskripsi_merchandise'	=> $i->post('deskripsi'),
		// 							'harga_merchandise'	=> $i->post('harga'),
		// 						);
		// 			$this->merchant_model->edit($data);
		// 			$this->session->set_flashdata('sukses', 'Data telah diupdate');
		// 			redirect(base_url('admin/merchandise'),'refresh');
		// 		}
		// 	}else{
		// 		$i = $this->input;
		// 		$data = array(	
		// 						'id_merchandise'	=> $id_merchandise,
		// 						'nama_merchandise'	=> $i->post('nama'),
		// 						'deskripsi_merchandise'	=> $i->post('deskripsi'),
		// 						'harga_merchandise'	=> $i->post('harga')
		// 					);
		// 		$this->merchant_model->edit($data);
		// 		$this->session->set_flashdata('sukses', 'Data telah diupdate');
		// 		redirect(base_url('admin/merchandise'),'refresh');
		// 	}
		// }
		// End masuk database
		$data = array(	'title'		=> 'Edit Merchandise',
						'name'		=> 'merchandise_tambah',
						'merchant'	=> $merchant,
						'isi'		=> 'admin/merchandise/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Delete
	public function delete($id_merchandise)
	{
		$merchandise = $this->merchant_model->get_gambar($id_merchandise);
		// Hapus gambar lama
		foreach ($merchandise as $merchandise1) {
			if($merchandise1->gambar !="") {
				unlink('./assets/img/merchant/'.$merchandise1->gambar);
				unlink('./assets/img/merchant/thumbs/'.$merchandise1->gambar);
			}
			$data = array(	'id_gambar_merchandise' => $merchandise1->id_gambar_merchandise);
			$this->merchant_model->delete_gambar($data);
		}
		$data = array(	'id_merchandise'	=> $id_merchandise);
		$this->merchant_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data berhasil dihapus');
		redirect(base_url('admin/merchandise'),'refresh');
	}

	public function gambar($id_merchant)
	{
		$gambar 		= $this->merchant_model->get_gambar($id_merchant);
		$merchant 		= $this->merchant_model->detail($id_merchant);

		$data = array(	'title'		=> 'Gambar Merchandise - '.$merchant->nama_merchandise,
						'gambar'	=> $gambar,
						'merchandise'	=> $merchant,
						'name'		=> 'merchandise',
						'isi'		=> 'admin/merchandise/gambar'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tambah_gambar($id_merchandise)
	{
		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('urutan','Urutan diisi','required',
			array(	'required'	=> '%s harus diisi'));

		if($valid->run()) {
			if(!empty($_FILES['gambar']['name'])) {
				$config['upload_path'] 		= './assets/img/merchant/thumbs';
				$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
				$config['max_size']  		= '2400'; // KB
				$config['max_width']  		= '720'; // Pixel
				$config['max_height']  		= '720'; //Pixel
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('gambar')){
					// End validasi
					$data = array(	'title'		=> 'Tambah Gambar merchandise',
									'id_merchandise'=> $id_merchandise,
									'error'		=> $this->upload->display_errors(),
									'name'		=> 'merchandise',
									'isi'		=> 'admin/merchandise/tambah_gambar'
					);
					$this->load->view('admin/layout/wrapper', $data, FALSE);
					// Masuk database
				}else{
					$upload_data	= array('uploads' =>$this->upload->data());

					$config['image_library']  	= 'gd2';
			        $config['source_image']   	= './assets/img/merchant/thumbs/'.$upload_data['uploads']['file_name']; 
			        $config['new_image']     	= './assets/img/merchant';
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
											'id_merchandise' => $id_merchandise, 
											'urutan'		=> $i->post('urutan'),
											'gambar'		=> $upload_data['uploads']['file_name']);
					$this->merchant_model->tambah_gambar($data_gambar);
					$this->session->set_flashdata('sukses', 'Data telah ditambah');
					redirect(base_url('admin/merchandise/gambar/'.$id_merchandise),'refresh');
				}
			}
		}
		// End masuk database
		$data = array(	'title'		=> 'Tambah Gambar merchandise',
						'id_merchandise'=> $id_merchandise,
						'name'		=> 'merchandise',
						'isi'		=> 'admin/merchandise/tambah_gambar'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// proses
	public function proses_gambar($id_merchandise)
	{
		$id_gambar		= $this->input->post('id_gambar');

		// Check id_merchandise kosong atau tidak
		if($id_gambar == "") {
			$this->session->set_flashdata('warning', 'Anda belum memilih data');
			redirect(base_url('admin/merchandise/gambar/'.$id_merchandise),'refresh');
		}

		// Proses hapus jika klik tombol "hapus", jika ga ada yg kosong
		if(isset($_POST['hapus'])) {
			// Proses hapus diloop
			for($i=0;$i<sizeof($id_gambar);$i++)
			{
				$id_gambar1 = $id_gambar[$i];
				// Proses hapus gambar
				$gambar1 = $this->merchant_model->get_image_id($id_gambar1);
				// Hapus gambar lama
				if($gambar1->gambar !="") {
					unlink('./assets/img/merchant/'.$gambar1->gambar);
					unlink('./assets/img/merchant/thumbs/'.$gambar1->gambar);
				}
				$data1 = array(	'id_gambar_merchandise' => $gambar1->id_gambar_merchandise);
				$this->merchant_model->delete_gambar($data1);
			}
			// End proses hapus
			$this->session->set_flashdata('sukses', 'Data telah dihapus');
			redirect(base_url('admin/merchandise/gambar/'.$id_merchandise),'refresh');

		}
	}

	public function edit_gambar($id_gambar)
	{
		$gambar = $this->merchant_model->get_image_id($id_gambar);

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('urutan','Urutan diisi','required',
			array(	'required'	=> '%s harus diisi'));

		if($valid->run()) {
			if(!empty($_FILES['gambar']['name'])) {
				$config['upload_path'] 		= './assets/img/merchant/thumbs';
				$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
				$config['max_size']  		= '2400'; // KB
				$config['max_width']  		= '720'; // Pixel
				$config['max_height']  		= '720'; //Pixel
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('gambar')){
				}else{
					$upload_data	= array('uploads' =>$this->upload->data());

					$config['image_library']  	= 'gd2';
			        $config['source_image']   	= './assets/img/merchant/thumbs/'.$upload_data['uploads']['file_name']; 
			        $config['new_image']     	= './assets/img/merchant';
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
			        	unlink('./assets/img/merchant/'.$gambar->gambar);
						unlink('./assets/img/merchant/thumbs/'.$gambar->gambar);
			        }

					$i  = $this->input;

					$data_gambar  = array(
											'id_gambar_merchandise' => $id_gambar,
											'id_merchandise' 	=> $gambar->id_merchandise, 
											'urutan'		=> $i->post('urutan'),
											'gambar'		=> $upload_data['uploads']['file_name']);
					$this->merchant_model->edit_gambar($data_gambar);
					$this->session->set_flashdata('sukses', 'Data telah diupdate');
					redirect(base_url('admin/merchandise/gambar/'.$gambar->id_merchandise),'refresh');
				}
			}else{
				$i  = $this->input;

				$data_gambar  = array(
										'id_gambar_merchandise' => $id_gambar,
										'id_merchandise' 	=> $gambar->id_merchandise, 
										'urutan'		=> $i->post('urutan'));
				$this->merchant_model->edit_gambar($data_gambar);
				$this->session->set_flashdata('sukses', 'Data telah diupdate');
				redirect(base_url('admin/merchandise/gambar/'.$gambar->id_merchandise),'refresh');
			}
		}

		// die(var_dump($gambar));
		// End masuk database
		$data = array(	'title'		=> 'Edit Gambar merchandise',
						'gambar'	=> $gambar,
						'name'		=> 'merchandise',
						'isi'		=> 'admin/merchandise/edit_gambar'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function hapus_gambar($id_gambar)
	{
		$gambar = $this->merchant_model->get_image_id($id_gambar);

		// Hapus gambar lama
		if($gambar->gambar !="") {
			unlink('./assets/img/merchant/'.$gambar->gambar);
			unlink('./assets/img/merchant/thumbs/'.$gambar->gambar);
		}
		$data1 = array(	'id_gambar_merchandise' => $gambar->id_gambar_merchandise);
		$this->merchant_model->delete_gambar($data1);

		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/merchandise/gambar/'.$gambar->id_merchandise),'refresh');
	}

}