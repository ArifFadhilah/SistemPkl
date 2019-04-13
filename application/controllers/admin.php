<?php 
/**
SISTEM INFORMASI SISWA/MAHASISWA PKL/RISET DI PT.INTI BANDUNG, INDONESIA
Author 	: Syifa Afifah Fitriani
email 	: syifaafifahf@gmail.com
from Universitas Pendidikan Indonesia
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->model('model_admin');
		$this->load->model('model_universal');

		//library untuk impot file csv pada page pembimbing
		$this->load->library('csvimport');

		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	}

	public function index()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$login = $this->model_admin->check_user_admin($username, $password)->row();

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_message('required', 'Harap isi field %s.');
		

		if($this->form_validation->run()==FALSE)
		{
			$this->session->set_flashdata('notification', 'Maaf, Harap Isi Username &/ Password.');
			echo "diss match";
			redirect(site_url('home/login'));
		}
		else
		{
			if(count($login)>0) #jika username/password terdaftar sbg admin
			{
				$array_items = array (
										'username' => $login->username,
										'loggen_in' => true
								);
				$this->session->set_userdata($array_items);
				
				$this->admin_pkl();
			}
			else #jika username/password tidak cocok, redirect
			{
				$this->session->set_flashdata('notification', 'Maaf, Username & Password tidak cocok.');
				echo "diss match";
				redirect(site_url('home/login'));
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url('home/login'));
	}

	public function admin_pkl()
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		if($this->uri->segment(3) == ""){
			$offset = 0;
		}else{
			$offset = $this->uri->segment(3);
		}
		$limit = 10;
		$data['judul'] = "Seluruh Data Siswa/Mahasiswa PKL dan Riset di PT.INTI";
		$data['pkl'] = $this->model_universal->select_all_pkl($offset, $limit);
		
		$config = array();
		$config['base_url'] = base_url() . 'index.php/admin/admin_pkl/';
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 5;
		$config['total_rows'] = $this->model_universal->jumlah_all_pkl();
		$this->pagination->initialize($config);
		$this->session->set_userdata('row', $this->uri->segment(3));
		
		$this->load->view('header');
		$this->load->view('body_admin', $data);
		$this->load->view('footer');
	}

	public function admin_lembaga()
	{		
		if($this->uri->segment(3) == ""){
			$offset = 0;
		}else{
			$offset = $this->uri->segment(3);
		}
		$limit = 10;
		$data['lembaga'] = $this->model_universal->select_all_lembaga($offset, $limit);
		
		$config = array();
		$config['base_url'] = base_url() . 'index.php/admin/admin_lembaga/';
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 5;
		$config['total_rows'] = $this->model_universal->jumlah_all_lembaga();
		$this->pagination->initialize($config);
		$this->session->set_userdata('row', $this->uri->segment(3));

		$this->load->view('header');
		$this->load->view('body_admin_lembaga', $data);
		$this->load->view('footer');
	}

	public function admin_jurusan()
	{
		if($this->uri->segment(3) == ""){
			$offset = 0;
		}else{
			$offset = $this->uri->segment(3);
		}
		$limit = 10;
		$data['jurusan'] = $this->model_universal->select_all_jurusan($offset, $limit);
		
		$config = array();
		$config['base_url'] = base_url() . 'index.php/admin/admin_jurusan/';
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 5;
		$config['total_rows'] = $this->model_universal->jumlah_all_jurusan();
		$this->pagination->initialize($config);
		$this->session->set_userdata('row', $this->uri->segment(3));

		$this->load->view('header');
		$this->load->view('body_admin_jurusan', $data);
		$this->load->view('footer');
	}

	public function admin_urdiklat($value='')
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		if($this->uri->segment(3) == ""){
			$offset = 0;
		}else{
			$offset = $this->uri->segment(3);
		}

		$selectKaur = $this->model_admin->selectKaur();
		$selectKaur = $selectKaur[0];
		$data['format'] = $selectKaur->keterangan;
		$data['urdiklat'] = $this->model_admin->urdiklat()->result();
		$data['kaurdiklat'] = $this->model_admin->kaurdiklat()->result();
		$data['surat'] = $this->model_admin->surat()->result();
		$data['kaur'] = $this->model_admin->kaur()->result();
		$data['executive'] = $this->model_admin->executive()->result();
		$data['hcm'] = $this->model_admin->hcm()->result();

		$this->load->view('header');
		$this->load->view('body_admin_urdiklat', $data);
		$this->load->view('footer');
	}

	function admin_search_jurusan()
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		$search = $this->input->post('search', true);
		$data['jurusan'] = $this->model_universal->model_search_jurusan($search)->result();

		$this->load->view('header');
		$this->load->view('body_admin_jurusan', $data);
		$this->load->view('footer');

	}

	function admin_search_lembaga()
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		$search = $this->input->post('search', true);
		$data['lembaga'] = $this->model_universal->model_search_lembaga($search)->result();

		$this->load->view('header');
		$this->load->view('body_admin_lembaga', $data);
		$this->load->view('footer');

	}

	public function search_pkl()
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		$search = $this->input->post('search', true);
		$data['judul'] = "Data Siswa/Mahasiswa PKL di PT.INTI";
		$data['pkl'] = $this->model_universal->model_search_pkl($search)->result();

		$this->load->view('header');
		$this->load->view('body_admin', $data);
		$this->load->view('footer');

	}

	public function search_pkl_tahun()
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		$search = $this->input->post('search', true);
		$data['judul'] = "Data Siswa/Mahasiswa PKL di PT.INTI";
		$data['pkl'] = $this->model_universal->model_search_pkl_tahun($search)->result();

		$this->load->view('header');
		$this->load->view('body_admin', $data);
		$this->load->view('footer');

	}

	public function search_pmmb_tahun()
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		$search = $this->input->post('search', true);
		$data['judul'] = "Data Mahasiswa PMMB di PT.INTI";
		$data['pkl'] = $this->model_universal->model_search_pmmb_tahun($search)->result();

		$this->load->view('header');
		$this->load->view('body_admin_pmmb', $data);
		$this->load->view('footer');

	}

	public function search_pmmb_batch()
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		$search = $this->input->post('search', true);
		$data['judul'] = "Data Mahasiswa PMMB di PT.INTI";
		$data['pkl'] = $this->model_universal->model_search_pmmb_batch($search)->result();

		$this->load->view('header');
		$this->load->view('body_admin_pmmb', $data);
		$this->load->view('footer');

	}
	public function search_pklselesai()
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		$search = $this->input->post('search', true);
		$data['judul'] = "Data Siswa/Mahasiswa yang Telah Selesai Melaksanakan PKL/Riset di PT.INTI";
		$data['pkl'] = $this->model_universal->model_search_pkl_selesai($search)->result();

		$this->load->view('header');
		$this->load->view('body_admin_selesai', $data);
		$this->load->view('footer');

	}

	public function subpkl()
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		if($this->uri->segment(3) == ""){
			$offset = 0;
		}else{
			$offset = $this->uri->segment(3);
		}
		$limit = 10;
		$data['judul'] = "Data Siswa PKL di PT.INTI";
		$data['pkl'] = $this->model_universal->select_all_subpkl($offset, $limit);
		
		$config = array();
		$config['base_url'] = base_url() . 'index.php/admin/subpkl/';
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 5;
		$config['total_rows'] = $this->model_universal->jumlah_all_subpkl();
		$this->pagination->initialize($config);
		$this->session->set_userdata('row', $this->uri->segment(3));

		$this->load->view('header');
		$this->load->view('body_admin', $data);
		$this->load->view('footer');
	}

	public function subriset()
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		if($this->uri->segment(3) == ""){
			$offset = 0;
		}else{
			$offset = $this->uri->segment(3);
		}
		$limit = 10;
		$data['judul'] = "Data Siswa/Mahasiswa Riset di PT.INTI";
		$data['pkl'] = $this->model_universal->select_all_riset($offset, $limit);
		
		$config = array();
		$config['base_url'] = base_url() . 'index.php/admin/subriset/';
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 5;
		$config['total_rows'] = $this->model_universal->jumlah_all_riset();
		$this->pagination->initialize($config);
		$this->session->set_userdata('row', $this->uri->segment(3));

		$this->load->view('header');
		$this->load->view('body_admin', $data);
		$this->load->view('footer');
	}

	public function subpmmb()
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		if($this->uri->segment(3) == ""){
			$offset = 0;
		}else{
			$offset = $this->uri->segment(3);
		}
		$limit = 10;
		$data['judul'] = "Data Mahasiswa PMMB di PT.INTI";
		$data['pkl'] = $this->model_universal->select_all_pmmb($offset, $limit);
		
		$config = array();
		$config['base_url'] = base_url() . 'index.php/admin/subpmmb/';
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 5;
		$config['total_rows'] = $this->model_universal->jumlah_all_pmmb();
		$this->pagination->initialize($config);
		$this->session->set_userdata('row', $this->uri->segment(3));

		$this->load->view('header');
		$this->load->view('body_admin_pmmb', $data);
		$this->load->view('footer');
	}

	public function subselesai()
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		if($this->uri->segment(3) == ""){
			$offset = 0;
		}else{
			$offset = $this->uri->segment(3);
		}
		$limit = 10;
		$data['judul'] = "Data Siswa/Mahasiswa yang Telah Selesai Melaksanakan PKL/Riset di PT.INTI";
		$data['pkl'] = $this->model_universal->select_all_selesai($offset, $limit);
		
		$config = array();
		$config['base_url'] = base_url() . 'index.php/admin/subselesai/';
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 5;
		$config['total_rows'] = $this->model_universal->jumlah_all_selesai();
		$this->pagination->initialize($config);
		$this->session->set_userdata('row', $this->uri->segment(3));

		$this->load->view('header');
		$this->load->view('body_admin_selesai', $data);
		$this->load->view('footer');
	}

	public function subobservasi()
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		if($this->uri->segment(3) == ""){
			$offset = 0;
		}else{
			$offset = $this->uri->segment(3);
		}
		$limit = 10;
		$data['judul'] = "Data Siswa/Mahasiswa Observasi di PT.INTI";
		$data['pkl'] = $this->model_universal->select_all_observasi($offset, $limit);
		
		$config = array();
		$config['base_url'] = base_url() . 'index.php/admin/subobservasi/';
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 5;
		$config['total_rows'] = $this->model_universal->jumlah_all_observasi();
		$this->pagination->initialize($config);
		$this->session->set_userdata('row', $this->uri->segment(3));

		$this->load->view('header');
		$this->load->view('body_admin', $data);
		$this->load->view('footer');
	}


	public function pembimbing()
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}
		
		if($this->uri->segment(3) == ""){
			$offset = 0;
		}else{
			$offset = $this->uri->segment(3);
		}
		$limit = 10;
		$data['pemb'] = $this->model_admin->select_all_pemb($offset, $limit);
		
		$config = array();
		$config['base_url'] = base_url() . 'index.php/admin/pembimbing/';
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 5;
		$config['total_rows'] = $this->model_admin->jumlah_all_pemb();
		$this->pagination->initialize($config);
		$this->session->set_userdata('row', $this->uri->segment(3));

		$this->load->view('header');
		$this->load->view('body_pemb', $data);
		$this->load->view('footer');
	}

	function search_pemb()
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		$search = $this->input->post('search', true);
		$data['pemb'] = $this->model_admin->model_search_pemb($search)->result();

		$this->load->view('header');
		$this->load->view('body_pemb', $data);
		$this->load->view('footer');

	}

	//edit admin
	function admin_edit()
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		$data['admin'] = $this->model_admin->model_edit_admin()->row();

		$this->load->view('header');
		$this->load->view('form_updateadmin', $data);
		$this->load->view('footer');
	}

	public function uploadpdfpengantar()
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}


		$data['error'] = '';    //initialize image upload error array to empty

        $config['upload_path'] = './uploads/surat_permohonan';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = '5000';

        $this->load->library('upload', $config);


        // If upload failed, display error
        if (!$this->upload->do_upload()) {
            $data['error'] = $this->upload->display_errors();

            $this->load->view('header');
            $this->load->view('form_update', $data);
            $this->load->view('footer');
        } else 
        {
            $file_data = $this->upload->data();
            $file_path =  './uploads/surat_permohonan/'.$file_data['file_name'];

            $file = 'uploads/surat_permohonan/'.$file_data['file_name'];
            
			$id = $this->input->post('id');
            
                $this->model_admin->updatepdfpengantar($file, $id);
            
            $this->session->set_flashdata('success', 'Surat pengantar berhasil di upload');
            redirect(site_url('admin/admin_pkl'));
                    
        }
	}

	public function uploadpdfbalasan()
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}


		$data['error'] = '';    //initialize image upload error array to empty

        $config['upload_path'] = './uploads/surat_balasan';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = '5000';

        $this->load->library('upload', $config);


        // If upload failed, display error
        if (!$this->upload->do_upload()) {
            $data['error'] = $this->upload->display_errors();

            $this->load->view('header');
            $this->load->view('form_update', $data);
            $this->load->view('footer');
        } else 
        {
            $file_data = $this->upload->data();
            $file_path =  './uploads/surat_balasan/'.$file_data['file_name'];

            $file = 'uploads/surat_balasan/'.$file_data['file_name'];
            
			$id = $this->input->post('id');
            
                $this->model_admin->updatepdfbalasan($file, $id);
            
            $this->session->set_flashdata('success', 'Surat balasan berhasil di upload');
            redirect(site_url('admin/admin_pkl'));        
        }
	}

	public function uploadpdfketerangan()
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}


		$data['error'] = '';    //initialize image upload error array to empty

        $config['upload_path'] = './uploads/surat_keterangan';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = '5000';

        $this->load->library('upload', $config);


        // If upload failed, display error
        if (!$this->upload->do_upload()) {
            $data['error'] = $this->upload->display_errors();

            $this->load->view('header');
            $this->load->view('form_update', $data);
            $this->load->view('footer');
        } else 
        {
            $file_data = $this->upload->data();
            $file_path =  './uploads/surat_keterangan/'.$file_data['file_name'];

            $file = 'uploads/surat_keterangan/'.$file_data['file_name'];
            
			$id = $this->input->post('id');
            
                $this->model_admin->updatepdfketerangan($file, $id);
            
            $this->session->set_flashdata('success', 'Surat keterangan berhasil di upload');
            redirect(site_url('admin/subselesai'));        
        }
	}

	//upload csv file
	function importcsv(){
        $loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in){
			redirect(site_url('home/login'));
		}
		
		if($this->uri->segment(3) == ""){
			$offset = 0;
		}else{
			$offset = $this->uri->segment(3);
		}
		$limit = 10;
		$data['pemb'] = $this->model_admin->select_all_pemb($offset, $limit);
		
		$config = array();
		$config['base_url'] = base_url() . 'index.php/admin/pembimbing/';
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 5;
		$config['total_rows'] = $this->model_admin->jumlah_all_pemb();
		$this->pagination->initialize($config);
		$this->session->set_userdata('row', $this->uri->segment(3));
		///
        $data['error'] = '';    //initialize image upload error array to empty

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'csv'; //file type
        $config['max_size'] = '10000';

        $this->load->library('upload', $config);


        // If upload failed, display error
        if (!$this->upload->do_upload()) {
            $data['error'] = $this->upload->display_errors();

            $this->load->view('header');
            $this->load->view('body_pemb', $data);
            $this->load->view('footer');
        } else {
            $file_data = $this->upload->data();
            $file_path =  './uploads/'.$file_data['file_name'];
            
                    $this->model_admin->delete_csv();
                    
            if ($this->csvimport->get_array($file_path)) {
                $csv_array = $this->csvimport->get_array($file_path);
                foreach ($csv_array as $row) {
                    $insert_data = array(
                        'id'=>$row['ID'],
                        'nip'=>$row['NIP'],
                        'nama'=>$row['NAMA'],
                        'divisi'=>$row['DIVISI'],
                        'bagian'=>$row['BAGIAN'],
                        'nip_atasan'=>$row['NIP_ATASAN'],
                        'nama_atasan'=>$row['NAMA_ATASAN'],
                        'nama_jabatan'=>$row['NAMA_JABATAN'],
                    );
                    $this->model_admin->insert_csv($insert_data);
                }
                $this->session->set_flashdata('success', 'Csv data berhasil di upload');
                redirect(site_url('admin/pembimbing'));
                echo "<pre>"; print_r($insert_data);
            } else 
                $data['error'] = "Error";
                $this->load->view('header');
	            $this->load->view('body_pemb', $data);
	            $this->load->view('footer');
            }
            
    } 
	//end upload csv file

    //upload foto
	public function uploadfoto()
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}


		$data['error'] = '';    //initialize image upload error array to empty

        $config['upload_path'] = './uploads/foto';
        $config['allowed_types'] = 'jpg';
        $config['max_size'] = '1000';

        $this->load->library('upload', $config);


        // If upload failed, display error
        if (!$this->upload->do_upload()) {
            $data['error'] = $this->upload->display_errors();

            $this->load->view('header');
            $this->load->view('form_update', $data);
            $this->load->view('footer');
        } else 
        {
            $file_data = $this->upload->data();
            $file_path =  './uploads/foto/'.$file_data['file_name'];

            $file = 'uploads/foto/'.$file_data['file_name'];
            
			$id = $this->input->post('id');
            
                $this->model_admin->updatefoto($file, $id);
            
            $this->session->set_flashdata('success', 'Foto berhasil di upload');
            redirect(site_url('admin/admin_pkl'));
                    
        }
	}
	//end upload foto

	//detail mhs
	public function detail_mhs($ID_PKL){
        $loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}
		
		$data['mhs'] = $this->model_universal->model_detail_mhs($ID_PKL)->row();
		$data['surat'] = $this->model_universal->model_surat()->row();
		$data['surat2'] = $this->model_universal->model_surat2()->row();

		$this->load->view('header');
		$this->load->view('detail_mhs_admin', $data);
		$this->load->view('footer');

	}

	//detail mhs pmmb
	public function detail_mhs_pmmb($ID_PKL){
        $loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}
		
		$data['mhs'] = $this->model_universal->model_detail_mhspmmb($ID_PKL)->row();
		$data['surat'] = $this->model_universal->model_surat()->row();
		$data['surat2'] = $this->model_universal->model_surat2()->row();

		$this->load->view('header');
		$this->load->view('detail_mhs_pmmb', $data);
		$this->load->view('footer');

	}

	//detail mhs selesai
	public function detail_mhsselesai($ID_PKL){
        $loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}
		
		$data['mhs'] = $this->model_universal->model_detail_mhsselesai($ID_PKL)->row();
		$data['surat'] = $this->model_universal->model_surat()->row();
		$data['surat2'] = $this->model_universal->model_surat2()->row();

		$this->load->view('header');
		$this->load->view('detail_mhs_adminselesai', $data);
		$this->load->view('footer');

	}

	//insert peserta
	public function view_insert()
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		$data['lembaga'] = $this->model_universal->selectlembaga();
		$data['jurusan'] = $this->model_universal->selectjurusan();
		$data['divisi'] = $this->model_admin->selectdivisi();
		$data['bagian'] = $this->model_admin->selectbagian();
		$data['pembimbing'] = $this->model_admin->selectpembimbing();
		$data['nmr'] = $this->model_universal->nomor();
		$data['urdiklat'] = $this->model_admin->selecturdiklat();

		$this->load->view('header');
		$this->load->view('form_insert', $data);
		$this->load->view('footer');
	}

	//insert pmmb
	public function insertpmmb()
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}
		$data['batch'] = $this->input->post('batch');
		$data['no'] = $this->input->post('no');
		$data['tanggal'] = $this->input->post('tanggal');
		$data['nm_siswa'] = $this->input->post('nm_siswa');
		
		$idlembaga = $this->input->post('lembaga');
		$lem = $this->model_admin->isilembaga($idlembaga);
		$lem = $lem[0];
		//print_r($this->input->post());
		$data['lembaga'] = $lem->NAMA_LEMBAGA;
		$data['alamat_lembaga'] = $lem->ALAMAT_LEMBAGA;
		$data['telp_lembaga'] = $lem->TELP_LEMBAGA;
		$data['email_lembaga'] = $lem->EMAIL_LEMBAGA;
		
		$id_jurusan = $this->input->post('jurusan');
		$jur = $this->model_admin->isijurusan($id_jurusan);
		$jur = $jur[0];
		$data['jurusan'] = $jur->NAMA_JURUSAN;

		$data['tgl_awal'] = $this->input->post('tgl_awal');
		$data['tgl_akhir'] = $this->input->post('tgl_akhir');
		
		$id_pemb = $this->input->post('nama_pemb');
		$pemb = $this->model_admin->isipemb($id_pemb)->result();
		$pemb = $pemb[0];
		//echo $id_pemb. "<br>";
		$data['nama_pemb'] = $pemb->NAMA;
		$data['nip_pemb'] = $pemb->NIP;
		$data['divisi'] = $pemb->DIVISI;
		$data['bagian'] = $pemb->BAGIAN;
		$data['atasan'] = $pemb->NAMA_ATASAN;
		$data['pp'] = $pemb->NIP_ATASAN;
		
		$data['nrp_siswa'] = $this->input->post('nrp_siswa');
		$data['prog_pend'] = $this->input->post('prog_pend');
		
		
		$id_urdiklat = $this->input->post('an_ka_urdiklat');
		$ur = $this->model_admin->isiur($id_urdiklat)->result();
		$ur = $ur[0];
		//echo $id_urdiklat. "<br>";
		$data['an_ka_urdiklat'] = $ur->AN_KA_URDIKLAT;
		$data['np'] = $ur->NP;

		$data['alamat_siswa'] = $this->input->post('alamat_siswa');
		$data['telp_siswa'] = $this->input->post('telp_siswa');
		$data['email'] = $this->input->post('email');
		$data['nama_pemb_lembaga'] = $this->input->post('nama_pemb_lembaga');
		$data['telp_pemb_lembaga'] = $this->input->post('telp_pemb_lembaga');
		$data['via'] = $this->input->post('via');
		$data['keterangan'] = $this->input->post('keterangan');


		$this->model_admin->model_insertpmmb($data);

		$this->subpmmb();
		
	}
	public function view_insertpmmb()
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		$data['lembaga'] = $this->model_universal->selectlembaga();
		$data['jurusan'] = $this->model_universal->selectjurusan();
		$data['divisi'] = $this->model_admin->selectdivisi();
		$data['bagian'] = $this->model_admin->selectbagian();
		$data['pembimbing'] = $this->model_admin->selectpembimbing();
		$data['nmrpmmb'] = $this->model_universal->nomorpmmb();
		$data['urdiklat'] = $this->model_admin->selecturdiklat();

		$this->load->view('header');
		$this->load->view('form_insertpmmb', $data);
		$this->load->view('footer');
	}

	public function exe_insert()
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		$data['no'] = $this->input->post('no');
		$data['tanggal'] = $this->input->post('tanggal');
		$data['nm_siswa'] = $this->input->post('nm_siswa');
		
		$idlembaga = $this->input->post('lembaga');
		$lem = $this->model_admin->isilembaga($idlembaga);
		$lem = $lem[0];
		//print_r($this->input->post());
		$data['lembaga'] = $lem->NAMA_LEMBAGA;
		$data['alamat_lembaga'] = $lem->ALAMAT_LEMBAGA;
		$data['telp_lembaga'] = $lem->TELP_LEMBAGA;
		$data['email_lembaga'] = $lem->EMAIL_LEMBAGA;
		
		$id_jurusan = $this->input->post('jurusan');
		$jur = $this->model_admin->isijurusan($id_jurusan);
		$jur = $jur[0];
		$data['jurusan'] = $jur->NAMA_JURUSAN;

		$data['tgl_awal'] = $this->input->post('tgl_awal');
		$data['tgl_akhir'] = $this->input->post('tgl_akhir');
		
		$id_pemb = $this->input->post('nama_pemb');
		$pemb = $this->model_admin->isipemb($id_pemb)->result();
		$pemb = $pemb[0];
		//echo $id_pemb. "<br>";
		$data['nama_pemb'] = $pemb->NAMA;
		$data['nip_pemb'] = $pemb->NIP;
		$data['divisi'] = $pemb->DIVISI;
		$data['bagian'] = $pemb->BAGIAN;
		$data['atasan'] = $pemb->NAMA_ATASAN;
		$data['pp'] = $pemb->NIP_ATASAN;
		
		$data['nrp_siswa'] = $this->input->post('nrp_siswa');
		$data['prog_pend'] = $this->input->post('prog_pend');
		$data['jenis_pkl'] = $this->input->post('jenis_pkl');
		
		$id_urdiklat = $this->input->post('an_ka_urdiklat');
		$ur = $this->model_admin->isiur($id_urdiklat)->result();
		$ur = $ur[0];
		//echo $id_urdiklat. "<br>";
		$data['an_ka_urdiklat'] = $ur->AN_KA_URDIKLAT;
		$data['np'] = $ur->NP;

		$data['alamat_siswa'] = $this->input->post('alamat_siswa');
		$data['telp_siswa'] = $this->input->post('telp_siswa');
		$data['email'] = $this->input->post('email');
		$data['nama_pemb_lembaga'] = $this->input->post('nama_pemb_lembaga');
		$data['telp_pemb_lembaga'] = $this->input->post('telp_pemb_lembaga');
		$data['via'] = $this->input->post('via');
		$data['keterangan'] = $this->input->post('keterangan');

		$this->model_admin->model_insert($data);

		$this->admin_pkl();
		
	}

	//insert jurusan
	public function exe_insert_jurusan()
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		if($_POST["satu"])
		{
			$data['nama_jurusan'] = $this->input->post('nama_jurusan', true);

			$this->model_admin->insertjurusan($data);
			if($_GET['stat'] == 2){
				$this->view_insert();
			}
			else{
				$this->admin_pkl();
			}
		}
		else if($_POST["dua"])
		{
			$this->exe_insert_lembaga();
		}
		else if($_POST["tiga"])
		{
			$this->exe_insert_urdiklat();
		}
		else if($_POST["cari"])
		{
			$this->search_pkl();
		}
	}

	//insert lembaga
	public function exe_insert_lembaga()
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in){
			redirect(site_url('home/login'));
		}

		$data['nama_lembaga'] = $this->input->post('nama_lembaga', true);
		$data['alamat_lembaga'] = $this->input->post('alamat_lembaga', true);
		$data['telp_lembaga'] = $this->input->post('telp_lembaga', true);
		$data['email_lembaga'] = $this->input->post('email_lembaga', true);

		$this->model_admin->insertlembaga($data);
		if($_GET['stat'] == 2){
			$this->view_insert();
		}
		else{
			$this->admin_pkl();
		}
	}

	//insert lembaga
	public function exe_insert_urdiklat(){
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in){
			redirect(site_url('home/login'));
		}

		$data['an_ka_urdiklat'] = $this->input->post('an_ka_urdiklat', true);
		$data['np'] = $this->input->post('np', true);
		$data['status'] = 1;

		$this->model_admin->inserturdiklat($data);
		if($_GET['stat'] == 2){
			$this->view_insert();
		}
		else{
			$this->admin_pkl();
		}
	}

	//delete peserta
	public function delete($id_pkl)
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		$this->model_admin->model_delete($id_pkl);
		redirect(site_url('admin/admin_pkl'));
	}

	//delete peserta selesai
	public function deleteselesai($id_pkl)
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		$this->model_admin->model_delete_selesai($id_pkl);
		redirect(site_url('admin/subselesai'));
	}

	//delete pembimbing
	public function deletepemb($id_pembimbing)
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		$this->model_admin->model_deletepemb($id_pembimbing);
		redirect(site_url('admin/pembimbing'));
	}

	//delete lembaga
	public function deletelembaga($id_lembaga)
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		$this->model_admin->model_deletelembaga($id_lembaga);
		redirect(site_url('admin/admin_lembaga'));
	}

	//delete jurusan
	public function deletejurusan($id_jurusan)
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		$this->model_admin->model_deletejurusan($id_jurusan);
		redirect(site_url('admin/admin_jurusan'));
	}

	//delete urdiklat
	public function deleteurdiklat($id_urdiklat)
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		$this->model_admin->model_deleteurdiklat($id_urdiklat);
		redirect(site_url('admin/admin_urdiklat'));
	}

	//deletepmmb
	public function deletepmmb($id_pkl)
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		$this->model_admin->model_deletepmmb($id_pkl);
		redirect(site_url('admin/subpmmb'));
	}

	//update peserta
	function update($id_pkl)
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in){
			redirect(site_url('home/login'));
		}

		$data['mhs'] = $this->model_admin->view_update($id_pkl)->row();
		$data['lembaga'] = $this->model_universal->selectlembaga();
		$data['jurusan'] = $this->model_universal->selectjurusan();
		$data['divisi'] = $this->model_admin->selectdivisi();
		$data['bagian'] = $this->model_admin->selectbagian();
		$data['pembimbing'] = $this->model_admin->selectpembimbing();

		$this->load->view('header');
		$this->load->view('form_update', $data);
		$this->load->view('footer');
	}

	//update pmmb
	function updatepmmb($id_pkl)
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in){
			redirect(site_url('home/login'));
		}

		$data['mhs'] = $this->model_admin->view_updatepmmb($id_pkl)->row();
		$data['lembaga'] = $this->model_universal->selectlembaga();
		$data['jurusan'] = $this->model_universal->selectjurusan();
		$data['divisi'] = $this->model_admin->selectdivisi();
		$data['bagian'] = $this->model_admin->selectbagian();
		$data['pembimbing'] = $this->model_admin->selectpembimbing();
		$data['tot'] = $this->model_universal->total();

		$this->load->view('header');
		$this->load->view('form_updatepmmb', $data);
		$this->load->view('footer');
	}

	//update peserta selesai
	function updateselesai($id_pkl)
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		$data['mhs'] = $this->model_admin->view_update_selesai($id_pkl)->row();
		$data['lembaga'] = $this->model_universal->selectlembaga();
		$data['jurusan'] = $this->model_universal->selectjurusan();
		$data['divisi'] = $this->model_admin->selectdivisi();
		$data['bagian'] = $this->model_admin->selectbagian();
		$data['pembimbing'] = $this->model_admin->selectpembimbing();

		$this->load->view('header');
		$this->load->view('form_update_selesai', $data);
		$this->load->view('footer');
	}

	//update pembimbing
	function updatepemb($id_pembimbing)
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		$data['mhs'] = $this->model_admin->view_updatepemb($id_pembimbing)->row();
		$data['divisi'] = $this->model_admin->selectdivisi();
		$data['bagian'] = $this->model_admin->selectbagian();

		$this->load->view('header');
		$this->load->view('form_updatepemb', $data);
		$this->load->view('footer');
	}

	//update lembaga
	function updatelembaga($id_lembaga)
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		$data['mhs'] = $this->model_admin->view_updatelembaga($id_lembaga)->row();

		$this->load->view('header');
		$this->load->view('form_updatelemb', $data);
		$this->load->view('footer');
	}

	//update jurusan
	function updatejurusan($id_jurusan)
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		$data['mhs'] = $this->model_admin->view_updatejurusan($id_jurusan)->row();

		$this->load->view('header');
		$this->load->view('form_updatejurusan', $data);
		$this->load->view('footer');
	}

	//update urdiklat
	function updateurdiklat($id_urdiklat)
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		$data['mhs'] = $this->model_admin->view_updateurdiklat($id_urdiklat)->row();

		$this->load->view('header');
		$this->load->view('form_updateurdiklat', $data);
		$this->load->view('footer');
	}

	//update urdiklat
	function updatesurat($id_surat){
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		$data['mhs'] = $this->model_admin->view_updatesurat($id_surat)->row();

		$this->load->view('header');
		$this->load->view('form_updatesurat', $data);
		$this->load->view('footer');
	}

	//update urusan
	function updatekaur($id_kaur){
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		$data['kaur'] = $this->model_admin->view_updatekaur($id_kaur)->row();
		$this->load->view('header');
		$this->load->view('form_updatekaur', $data);
		$this->load->view('footer');
	}

	function exe_update(){
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in){
			redirect(site_url('home/login'));
		}

		$id_pkl = $this->input->post('id_pkl');
		$no = $this->input->post('no');
		$no_ket1 = $this->input->post('no_ket');
		$tanggal = $this->input->post('tanggal');
		$nm_siswa = $this->input->post('nm_siswa');
		$lembaga = $this->input->post('lembaga');
		$jurusan = $this->input->post('jurusan');
		$divisi = $this->input->post('divisi');
		$bagian = $this->input->post('bagian');
		$tgl_awal = $this->input->post('tgl_awal');
		$tgl_akhir = $this->input->post('tgl_akhir');
		$nama_pemb = $this->input->post('nama_pemb');
		$nip_pemb = $this->input->post('nip_pemb');
		$nrp_siswa = $this->input->post('nrp_siswa');
		$prog_pend = $this->input->post('prog_pend');
		$jenis_pkl = $this->input->post('jenis_pkl');
		$atasan = $this->input->post('atasan');
		$pp = $this->input->post('pp');
		$np = $this->input->post('np');
		$an_ka_urdiklat = $this->input->post('an_ka_urdiklat');
		$alamat_siswa = $this->input->post('alamat_siswa');
		$telp_siswa = $this->input->post('telp_siswa');
		$email = $this->input->post('email');
		$alamat_lembaga = $this->input->post('alamat_lembaga');
		$telp_lembaga = $this->input->post('telp_lembaga');
		$email_lembaga = $this->input->post('email_lembaga');
		$nama_pemb_lembaga = $this->input->post('nama_pemb_lembaga');
		$telp_pemb_lembaga = $this->input->post('telp_pemb_lembaga');
		$via = $this->input->post('via');
		$keterangan = $this->input->post('keterangan');

		if(strtolower($keterangan) == "beres"){
			/*$tang= $this->model_universal->nomorpertahun($id_pkl);
			$tang= $tang[0];
			$tanggaltemp = $tang->tanggal;
*/
			//$nom = $this->model_universal->nomor2($tanggaltemp);
			$nom = $this->model_universal->nomor2();
			$nom = $nom[0];
			$no_ket = $nom->nomor+1;

			$status = 1;
			$this->model_admin->model_update2($id_pkl, $no, $tanggal, $nm_siswa, $lembaga, $jurusan, $divisi, $bagian, $tgl_awal, $tgl_akhir, $nama_pemb, $nip_pemb, $nrp_siswa, $prog_pend, $jenis_pkl, $atasan, $pp, $np, $an_ka_urdiklat, $alamat_siswa, $telp_siswa, $email, $alamat_lembaga, $telp_lembaga, $email_lembaga, $nama_pemb_lembaga, $telp_pemb_lembaga, $via, $keterangan, $status, $no_ket);
			//update table datasiswaselesai
			$tgl = date("Y-m-d");
			$this->model_admin->model_insert_selesai($id_pkl, $no, $tgl, $nm_siswa, $lembaga, $jurusan, $divisi, $bagian, $tgl_awal, $tgl_akhir, $nama_pemb, $nip_pemb, $nrp_siswa, $prog_pend, $jenis_pkl, $atasan, $pp, $np, $an_ka_urdiklat, $alamat_siswa, $telp_siswa, $email, $alamat_lembaga, $telp_lembaga, $email_lembaga, $nama_pemb_lembaga, $telp_pemb_lembaga, $via, $keterangan, $status, $no_ket);
		}
		else
		{
			$this->model_admin->model_update($id_pkl, $no, $tanggal, $nm_siswa, $lembaga, $jurusan, $divisi, $bagian, $tgl_awal, $tgl_akhir, $nama_pemb, $nip_pemb, $nrp_siswa, $prog_pend, $jenis_pkl, $atasan, $pp, $np, $an_ka_urdiklat, $alamat_siswa, $telp_siswa, $email, $alamat_lembaga, $telp_lembaga, $email_lembaga, $nama_pemb_lembaga, $telp_pemb_lembaga, $via, $keterangan);
		}

		$this->admin_pkl();
	}

	function exe_updatepmmb(){
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in){
			redirect(site_url('home/login'));
		}

		$id_pkl = $this->input->post('id_pkl');
		$no = $this->input->post('no');
		$no_ket1 = $this->input->post('no_ket');
		$tanggal = $this->input->post('tanggal');
		$nm_siswa = $this->input->post('nm_siswa');
		$lembaga = $this->input->post('lembaga');
		$jurusan = $this->input->post('jurusan');
		$divisi = $this->input->post('divisi');
		$bagian = $this->input->post('bagian');
		$tgl_awal = $this->input->post('tgl_awal');
		$tgl_akhir = $this->input->post('tgl_akhir');
		$nama_pemb = $this->input->post('nama_pemb');
		$nip_pemb = $this->input->post('nip_pemb');
		$nrp_siswa = $this->input->post('nrp_siswa');
		$prog_pend = $this->input->post('prog_pend');
		$atasan = $this->input->post('atasan');
		$pp = $this->input->post('pp');
		$np = $this->input->post('np');
		$an_ka_urdiklat = $this->input->post('an_ka_urdiklat');
		$alamat_siswa = $this->input->post('alamat_siswa');
		$telp_siswa = $this->input->post('telp_siswa');
		$email = $this->input->post('email');
		$alamat_lembaga = $this->input->post('alamat_lembaga');
		$telp_lembaga = $this->input->post('telp_lembaga');
		$email_lembaga = $this->input->post('email_lembaga');
		$nama_pemb_lembaga = $this->input->post('nama_pemb_lembaga');
		$telp_pemb_lembaga = $this->input->post('telp_pemb_lembaga');
		$hasil = $this->input->post('hasil');
		$via = $this->input->post('via');
		$keterangan = $this->input->post('keterangan');
		$integritas = $this->input->post('integritas');
		$ketwaktu = $this->input->post('ketwaktu');
		$keahlian = $this->input->post('keahlian');
		$kerjasama = $this->input->post('kerjasama');
		$komunikasi = $this->input->post('komunikasi');
		$penggunaan = $this->input->post('penggunaan');
		$pengembangan = $this->input->post('pengembangan');
		$total = $this->input->post('total');

		// if(strtolower($keterangan) == "beres"){
			/*$tang= $this->model_universal->nomorpertahun($id_pkl);
			$tang= $tang[0];
			$tanggaltemp = $tang->tanggal;
*/
			//$nom = $this->model_universal->nomor2($tanggaltemp);
		/*	$nom = $this->model_universal->nomor2();
			$nom = $nom[0];
			$no_ket = $nom->nomor+1;

			$status = 1;
			$this->model_admin->model_update2($id_pkl, $no, $tanggal, $nm_siswa, $lembaga, $jurusan, $divisi, $bagian, $tgl_awal, $tgl_akhir, $nama_pemb, $nip_pemb, $nrp_siswa, $prog_pend, $atasan, $pp, $np, $an_ka_urdiklat, $alamat_siswa, $telp_siswa, $email, $alamat_lembaga, $telp_lembaga, $email_lembaga, $nama_pemb_lembaga, $telp_pemb_lembaga, $hasil, $via, $keterangan, $status, $no_ket);
			//update table datasiswaselesai
			$tgl = date("Y-m-d");
			$this->model_admin->model_insert_selesai($id_pkl, $no, $tgl, $nm_siswa, $lembaga, $jurusan, $divisi, $bagian, $tgl_awal, $tgl_akhir, $nama_pemb, $nip_pemb, $nrp_siswa, $prog_pend, $atasan, $pp, $np, $an_ka_urdiklat, $alamat_siswa, $telp_siswa, $email, $alamat_lembaga, $telp_lembaga, $email_lembaga, $nama_pemb_lembaga, $telp_pemb_lembaga, $hasil, $via, $keterangan, $status, $no_ket);
		}
		else
		{ */
			$this->model_admin->model_updatepmmb($id_pkl, $no, $tanggal, $nm_siswa, $lembaga, $jurusan, $divisi, $bagian, $tgl_awal, $tgl_akhir, $nama_pemb, $nip_pemb, $nrp_siswa, $prog_pend, $atasan, $pp, $np, $an_ka_urdiklat, $alamat_siswa, $telp_siswa, $email, $alamat_lembaga, $telp_lembaga, $email_lembaga, $nama_pemb_lembaga, $telp_pemb_lembaga, $hasil, $via, $keterangan, $integritas, $ketwaktu, $keahlian, $kerjasama, $komunikasi, $penggunaan, $pengembangan, $total);
		// }

		$this->subpmmb();
	}

	function exe_update_selesai()
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		$id_pkl = $this->input->post('id_pkl');
		//$no = $this->input->post('no');
		$no_ket = $this->input->post('no_ket');
		$tanggal = $this->input->post('tanggal');
		$nm_siswa = $this->input->post('nm_siswa');
		$lembaga = $this->input->post('lembaga');
		$jurusan = $this->input->post('jurusan');
		$divisi = $this->input->post('divisi');
		$bagian = $this->input->post('bagian');
		$tgl_awal = $this->input->post('tgl_awal');
		$tgl_akhir = $this->input->post('tgl_akhir');
		$nama_pemb = $this->input->post('nama_pemb');
		$nip_pemb = $this->input->post('nip_pemb');
		$nrp_siswa = $this->input->post('nrp_siswa');
		$prog_pend = $this->input->post('prog_pend');
		$jenis_pkl = $this->input->post('jenis_pkl');
		$atasan = $this->input->post('atasan');
		$pp = $this->input->post('pp');
		$np = $this->input->post('np');
		$an_ka_urdiklat = $this->input->post('an_ka_urdiklat');
		$alamat_siswa = $this->input->post('alamat_siswa');
		$telp_siswa = $this->input->post('telp_siswa');
		$email = $this->input->post('email');
		$alamat_lembaga = $this->input->post('alamat_lembaga');
		$telp_lembaga = $this->input->post('telp_lembaga');
		$email_lembaga = $this->input->post('email_lembaga');
		$nama_pemb_lembaga = $this->input->post('nama_pemb_lembaga');
		$telp_pemb_lembaga = $this->input->post('telp_pemb_lembaga');
		$via = $this->input->post('via');
		$keterangan = $this->input->post('keterangan');

		$status = 1;
		$keterangan = "Beres";
		$this->model_admin->model_update3($id_pkl, $tanggal, $nm_siswa, $lembaga, $jurusan, $divisi, $bagian, $tgl_awal, $tgl_akhir, $nama_pemb, $nip_pemb, $nrp_siswa, $prog_pend, $jenis_pkl, $atasan, $pp, $np, $an_ka_urdiklat, $alamat_siswa, $telp_siswa, $email, $alamat_lembaga, $telp_lembaga, $email_lembaga, $nama_pemb_lembaga, $telp_pemb_lembaga, $via, $keterangan, $status, $no_ket);
		
		$this->subselesai();
	}

	function exe_updatepemb()
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		$id_pembimbing = $this->input->post('id_pembimbing');
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$divisi = $this->input->post('divisi');
		$bagian = $this->input->post('bagian');
		$nip_atasan = $this->input->post('nip_atasan');
		$nama_atasan = $this->input->post('nama_atasan');
		$nama_jabatan = $this->input->post('nama_jabatan');
		
		$this->model_admin->model_updatepemb($id_pembimbing, $nip, $nama, $divisi, $bagian, $nip_atasan, $nama_atasan, $nama_jabatan);
		$this->pembimbing();
	}

	function exe_updatelembaga()
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		$id_lembaga = $this->input->post('id_lembaga');
		$nama_lembaga = $this->input->post('nama_lembaga');
		$alamat_lembaga = $this->input->post('alamat_lembaga');
		$telp_lembaga = $this->input->post('telp_lembaga');
		$email_lembaga = $this->input->post('email_lembaga');
		
		$this->model_admin->model_updatelemb($id_lembaga, $nama_lembaga, $alamat_lembaga, $telp_lembaga, $email_lembaga);
		$this->admin_lembaga();
	}

	function exe_updatejurusan()
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		$id_jurusan = $this->input->post('id_jurusan');
		$nama_jurusan = $this->input->post('nama_jurusan');

		$this->model_admin->model_updatejurusan($id_jurusan, $nama_jurusan);
		$this->admin_jurusan();
	}

	function exe_updateurdiklat()
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		$id_urdiklat = $this->input->post('id_urdiklat');
		$np = $this->input->post('np');
		$an_ka_urdiklat = $this->input->post('an_ka_urdiklat');

		$this->model_admin->model_updateurdiklat($id_urdiklat, $np, $an_ka_urdiklat);
		$this->admin_urdiklat();
	}

	function exe_updateadmin()
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		$id_admin = $this->input->post('id_admin');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->model_admin->model_updateadmin($id_admin, $username, $password);
		$this->admin_pkl();
	}

	function exe_updatesurat()
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		$id_surat = $this->input->post('id_surat');
		$kode = $this->input->post('kode');

		$this->model_admin->model_updatesurat($id_surat, $kode);
		$this->admin_urdiklat();
	}

	function exe_updatekaur()
	{
		$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('home/login'));
		}

		$id = $this->input->post('id');
		$keterangan = $this->input->post('keterangan');

		$this->model_admin->model_updateketerangan($id, $keterangan);
		$this->admin_urdiklat();
	}
}