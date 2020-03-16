<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mahasiswa extends CI_Controller {

	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$cari = $this->input->post('txt_cari');
			$jurusan = $this->input->post('jurusan');
			
			if(empty($cari) && empty($jurusan)){
				$where = ' ';
				$kata = $this->session->userdata('cari');
			}else{
				if(!empty($cari)){
					$sess_data['cari'] = $this->input->post("txt_cari");
					$this->session->set_userdata($sess_data);
					$cari = $this->session->userdata('cari');
					$where = " WHERE nim LIKE '%$cari%' OR nama LIKE '%$cari%'";
				}else{
					$sess_data['jurusan'] = $this->input->post("jurusan");
					$this->session->set_userdata($sess_data);
					$jurusan = $this->session->userdata('jurusan');
					$where = " WHERE id_jurusan='$jurusan'";
					$d['jurusan'] = $jurusan;
				}
				
			}
			
			$d['prg']= $this->config->item('prg');
			$d['web_prg']= $this->config->item('web_prg');
			
			$d['nama_program']= $this->config->item('nama_program');
			$d['instansi']= $this->config->item('instansi');
			$d['usaha']= $this->config->item('usaha');
			$d['alamat_instansi']= $this->config->item('alamat_instansi');

			
			$d['judul']="Mahasiswa";
			
			//paging
			$page=$this->uri->segment(3);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$text = "SELECT * FROM mahasiswa $where ";		
			$tot_hal = $this->app_model->manualQuery($text);		
			
			$d['tot_hal'] = $tot_hal->num_rows();
			
			$config['base_url'] = site_url() . '/mahasiswa/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['next_link'] = 'Lanjut &raquo;';
			$config['prev_link'] = '&laquo; Kembali';
			$config['last_link'] = '<b>Terakhir &raquo; </b>';
			$config['first_link'] = '<b> &laquo; Pertama</b>';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			$d['hal'] = $offset;
			

			$text = "SELECT * FROM mahasiswa $where 
					ORDER BY nim ASC 
					LIMIT $limit OFFSET $offset";
			$d['data'] = $this->app_model->manualQuery($text);
			
			$d['l_jurusan'] = $this->app_model->getAllData("jurusan");
			$d['content'] = $this->load->view('mahasiswa/view', $d, true);		
			$this->load->view('home',$d);
		}else{
			header('location:'.base_url());
		}
	}
	
	public function tambah()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['prg']= $this->config->item('prg');
			$d['web_prg']= $this->config->item('web_prg');
			
			$d['nama_program']= $this->config->item('nama_program');
			$d['instansi']= $this->config->item('instansi');
			$d['usaha']= $this->config->item('usaha');
			$d['alamat_instansi']= $this->config->item('alamat_instansi');

			$d['judul']="Data Mahasiswa";
			
			$d['nim']	='';
			$d['nama']	='';
			$d['tempat_lahir']	='';
			$d['tanggal_lahir']	='';
			$d['umur']	='';
			$d['jenis_kelamin']	='';
			$d['jurusan']	='';
			//$d['satuan']	='';
			//$d['hrg_beli']	='';
			//$d['hrg_jual']	='';
			//$d['stok_awal']	='';
			//$d['jurusan']	='';	
			
			$d['l_jurusan'] = $this->app_model->getAllData("nim");
			$d['content'] = $this->load->view('mahasiswa/form', $d, true);		
			$this->load->view('home',$d);
		}else{
			header('location:'.base_url());
		}
	}
	
	public function edit()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			
			$d['prg']= $this->config->item('prg');
			$d['web_prg']= $this->config->item('web_prg');
			
			$d['nama_program']= $this->config->item('nama_program');
			$d['instansi']= $this->config->item('instansi');
			$d['usaha']= $this->config->item('usaha');
			$d['alamat_instansi']= $this->config->item('alamat_instansi');
			
			$d['judul'] = "Data Warna";
			
			$id = $this->uri->segment(3);
			$text = "SELECT kode_barang,nama_barang FROM barang WHERE kode_barang='$id'";
			$data = $this->app_model->manualQuery($text);
			if($data->num_rows() > 0){
				foreach($data->result() as $db){
					$d['nim']		=$id;
					$d['nama']	=$db->nama;
					//$d['satuan']	=$db->satuan;
					//$d['hrg_beli']	=$db->harga_beli;
					//$d['hrg_jual']	=$db->harga_jual;
					//$d['stok_awal']	=$db->stok_awal;
					//$d['jurusan']	=$db->id_jurusan;
				}
			}else{
					$d['nim']		=$id;
					$d['nama']	='';
					//$d['satuan']	='';
					//$d['hrg_beli']	='';
					//$d['hrg_jual']	='';
					//$d['stok_awal']	='';
					//$d['jurusan']	='';
			}
			//$d['l_jurusan'] = $this->app_model->getAllData("jurusan");			
			$d['content'] = $this->load->view('barang/form', $d, true);		
			$this->load->view('home',$d);
		}else{
			header('location:'.base_url());
		}
	}
	
	public function hapus()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){			
			$id = $this->uri->segment(3);
			$this->app_model->manualQuery("DELETE FROM barang WHERE kode_barang='$id'");
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/barang'>";			
		}else{
			header('location:'.base_url());
		}
	}
	
	public function simpan()
	{
		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
				
				$up['nim']	=$this->input->post('nim');
				$up['nama']	=$this->input->post('nama');
				$up['tempat_lahir']		=$this->input->post('tempat_lahir');//$this->input->post('satuan');
				$up['tanggal_lahir']	=$this->input->post('tanggal_lahir');//$this->input->post('hrg_beli');
	
				$up['jenis_kelamin']	=$this->input->post('jenis_kelamin');//$this->input->post('stok_awal');
				$up['id_jurusan']	=$this->input->post('id_jurusan');//$this->input->post('jurusan');
							$up['umur']	=$this->input->post('umur');;//$this->input->post('hrg_jual');
				$id['nim']=$this->input->post('nim');
				
				$data = $this->app_model->getSelectedData("mahasiswa",$id);
				if($data->num_rows()>0){
					$this->app_model->updateData("mahasiswa",$up,$id);
					echo 'Update data Sukses';
				}else{
					$this->app_model->insertData("mahasiswa",$up);
					echo 'Simpan data Sukses';		
				}
		}else{
				header('location:'.base_url());
		}
	
	}
	
}

/* End of file profil.php */
/* Location: ./application/controllers/profil.php */