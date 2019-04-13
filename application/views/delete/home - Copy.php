<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->model('model_universal');

		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	}

	public function index()
	{
		$this->gohome();
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function gohome()
	{
		$data['riset'] = $this->model_universal->model_home_riset()->result();
		$data['pkl'] = $this->model_universal->model_home_pkl()->result();
		$data['observasi'] = $this->model_universal->model_home_observasi()->result();

		$this->load->view('header');
		$this->load->view('body_home', $data);
		$this->load->view('footer');
	}

	public function prosedur()
	{
		$this->load->view('header');
		$this->load->view('body_prosedur');
		$this->load->view('footer');
	}

	public function pkl()
	{
		if($this->uri->segment(3) == ""){
			$offset = 0;
		}else{
			$offset = $this->uri->segment(3);
		}
		$limit = 10;
		$data['judul'] = "Seluruh Data Siswa/Mahasiswa PKL, Riset dan Observasi di PT.INTI";
		$data['pkl'] = $this->model_universal->select_all_pkl($offset, $limit);
		
		$config = array();
		$config['base_url'] = base_url() . 'index.php/home/pkl/';
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 5;
		$config['total_rows'] = $this->model_universal->jumlah_all_pkl();
		$this->pagination->initialize($config);
		$this->session->set_userdata('row', $this->uri->segment(3));

		$this->load->view('header');
		$this->load->view('body_pkl', $data);
		$this->load->view('footer');
	}

	public function lembaga()
	{		
		/*$config['total_rows']  = count($this->model_universal->jumlah_all_lembaga()->result());
		$config['base_url'] = base_url() . 'index.php/home/lembaga/';
		$config['per_page'] = '10'; 
		$config['uri_segment'] = 3; 
		$this->pagination->initialize($config);
		
		$data['lembaga'] = $this->model_universal->select_all_lembaga($config['per_page'],
		$this->uri->segment(3));*/

		if($this->uri->segment(3) == ""){
			$offset = 0;
		}else{
			$offset = $this->uri->segment(3);
		}
		$limit = 10;
		$data['lembaga'] = $this->model_universal->select_all_lembaga($offset, $limit);
		
		$config = array();
		$config['base_url'] = base_url() . 'index.php/home/lembaga/';
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 5;
		$config['total_rows'] = $this->model_universal->jumlah_all_lembaga();
		$this->pagination->initialize($config);
		$this->session->set_userdata('row', $this->uri->segment(3));

		$this->load->view('header');
		$this->load->view('body_lembaga', $data);
		$this->load->view('footer');
	}

	public function jurusan()
	{
		if($this->uri->segment(3) == ""){
			$offset = 0;
		}else{
			$offset = $this->uri->segment(3);
		}
		$limit = 10;
		$data['jurusan'] = $this->model_universal->select_all_jurusan($offset, $limit);
		
		$config = array();
		$config['base_url'] = base_url() . 'index.php/home/jurusan/';
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 5;
		$config['total_rows'] = $this->model_universal->jumlah_all_jurusan();
		$this->pagination->initialize($config);
		$this->session->set_userdata('row', $this->uri->segment(3));

		$this->load->view('header');
		$this->load->view('body_jurusan', $data);
		$this->load->view('footer');
	}

	public function pembimbing()
	{
		$this->load->view('header');
		$this->load->view('body_pemb');
		$this->load->view('footer');
	}

	public function laporan()
	{
		$data['total'] = $this->model_universal->totalsementara();
		$data['lembaga'] = $this->model_universal->selectlembaga();
		$data['jurusan'] = $this->model_universal->selectjurusan();

		$this->load->view('header');
		$this->load->view('body_laporan', $data);
		$this->load->view('footer');
	}

	public function smart()
	{
		$this->load->view('header');
		$this->load->view('body_smart');
		$this->load->view('footer');
	}

	public function input_mhs()
	{
		$this->load->view('header');
		$this->load->view('body_input_mhs');
		$this->load->view('footer');
	}

	function search_lembaga()
	{
		/*$loggen_in=$this->session->userdata('loggen_in');
		if(!$loggen_in)
		{
			redirect(site_url('account'));
		}*/

		$search = $this->input->post('search', true);
		$data['slem'] = $this->model_universal->model_search_lembaga($search)->result();

		$this->load->view('header');
		$this->load->view('body_search_lembaga', $data);
		$this->load->view('footer');

	}

	function search_jurusan()
	{
		$search = $this->input->post('search', true);
		$data['sjur'] = $this->model_universal->model_search_jurusan($search)->result();

		$this->load->view('header');
		$this->load->view('body_search_jurusan', $data);
		$this->load->view('footer');

	}

	function search_pkl()
	{
		$search = $this->input->post('search', true);
		$data['judul'] = "Data Siswa/Mahasiswa PKL di PT. INTI";
		$data['spkl'] = $this->model_universal->model_search_pkl($search)->result();

		$this->load->view('header');
		$this->load->view('body_search_pkl', $data);
		$this->load->view('footer');

	}

	public function subpkl()
	{
		if($this->uri->segment(3) == ""){
			$offset = 0;
		}else{
			$offset = $this->uri->segment(3);
		}
		$limit = 10;
		$data['judul'] = "Data Siswa PKL di PT.INTI";
		$data['pkl'] = $this->model_universal->select_all_subpkl($offset, $limit);
		
		$config = array();
		$config['base_url'] = base_url() . 'index.php/home/subpkl/';
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 5;
		$config['total_rows'] = $this->model_universal->jumlah_all_subpkl();
		$this->pagination->initialize($config);
		$this->session->set_userdata('row', $this->uri->segment(3));

		$this->load->view('header');
		$this->load->view('body_pkl', $data);
		$this->load->view('footer');
	}

	public function subriset()
	{
		if($this->uri->segment(3) == ""){
			$offset = 0;
		}else{
			$offset = $this->uri->segment(3);
		}
		$limit = 10;
		$data['judul'] = "Data Siswa/Mahasiswa Riset di PT.INTI";
		$data['pkl'] = $this->model_universal->select_all_riset($offset, $limit);
		
		$config = array();
		$config['base_url'] = base_url() . 'index.php/home/subriset/';
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 5;
		$config['total_rows'] = $this->model_universal->jumlah_all_riset();
		$this->pagination->initialize($config);
		$this->session->set_userdata('row', $this->uri->segment(3));

		$this->load->view('header');
		$this->load->view('body_pkl', $data);
		$this->load->view('footer');
	}

	public function subobservasi()
	{
		if($this->uri->segment(3) == ""){
			$offset = 0;
		}else{
			$offset = $this->uri->segment(3);
		}
		$limit = 10;
		$data['judul'] = "Data Siswa/Mahasiswa Observasi di PT.INTI";
		$data['pkl'] = $this->model_universal->select_all_observasi($offset, $limit);
		
		$config = array();
		$config['base_url'] = base_url() . 'index.php/home/subobservasi/';
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 5;
		$config['total_rows'] = $this->model_universal->jumlah_all_observasi();
		$this->pagination->initialize($config);
		$this->session->set_userdata('row', $this->uri->segment(3));

		$this->load->view('header');
		$this->load->view('body_pkl', $data);
		$this->load->view('footer');
	}

	public function exe_report()
	{
		/*$this->session->set_userdata("SESSION_NAME","VALUE");*/

		$bulan = $this->input->post('bulan', 'true');
		$tahun = $this->input->post('tahun', 'true');
		$jenis = $this->input->post('jenis', 'true');
		$program_pend = $this->input->post('program_pend', 'true');
		$lembaga = $this->input->post('lembaga', 'true');
		$jurusan = $this->input->post('jurusan', 'true');

		$this->session->set_userdata(array(
                            'bulan'       		=> $bulan,
                            'tahun'      		=> $user->tahun,
                            'jenis'      		=> $user->jenis,
                            'program_pend'      => $program_pend,
                            'lembaga'        	=> $lembaga,
                            'jurusan'        	=> $jurusan
                    	));

		$data['total'] = $this->model_universal->totalsementara();
		$data['lembaga'] = $this->model_universal->selectlembaga();
		$data['jurusan'] = $this->model_universal->selectjurusan();


		if(($bulan == 'semua') && ($tahun == 'semua') && ($jenis == 'semua') && ($program_pend == 'semua') && ($lembaga == 'semua') && ($jurusan == 'semua'))
		{
			if($this->uri->segment(3) == ""){
			$offset = 0;
			}else{
				$offset = $this->uri->segment(3);
			}
			$limit = 10;	

			$data['total'] = $this->model_universal->totalsementara();
			$data['lembaga'] = $this->model_universal->selectlembaga();
			$data['jurusan'] = $this->model_universal->selectjurusan();

			$data['semua'] = $this->model_universal->select_all_resemua($offset, $limit);
			
			$config = array();
			$config['base_url'] = base_url() . 'index.php/home/exe_report1/';
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['num_links'] = 5;
			$config['total_rows'] = $this->model_universal->resemua($bulan, $tahun, $jenis, $program_pend, $lembaga, $jurusan);
			$this->pagination->initialize($config);
			$this->session->set_userdata('row', $this->uri->segment(3));

			$this->load->view('header');
			$this->load->view('body_laporan_result', $data);
			$this->load->view('footer');
		}
		else if(($bulan != 'semua') && ($tahun == 'semua') && ($jenis == 'semua') && ($program_pend == 'semua') && ($lembaga == 'semua') && ($jurusan == 'semua'))
		{
			//$this->exe_report2($bulan);
			$data['semua'] = $this->model_universal->rebulans($bulan)->result();

			$this->load->view('header');
			$this->load->view('body_laporan_result', $data);
			$this->load->view('footer');
		}
		else if(($bulan == 'semua') && ($tahun != 'semua') && ($jenis == 'semua') && ($program_pend == 'semua') && ($lembaga == 'semua') && ($jurusan == 'semua'))
		{
			$data['semua'] = $this->model_universal->retahun($tahun)->result();

			$this->load->view('header');
			$this->load->view('body_laporan_result', $data);
			$this->load->view('footer');
		}
		else if(($bulan == 'semua') && ($tahun == 'semua') && ($jenis != 'semua') && ($program_pend == 'semua') && ($lembaga == 'semua') && ($jurusan == 'semua'))
		{
			$data['semua'] = $this->model_universal->rejenis($jenis)->result();

			$this->load->view('header');
			$this->load->view('body_laporan_result', $data);
			$this->load->view('footer');
		}
		else if(($bulan == 'semua') && ($tahun == 'semua') && ($jenis == 'semua') && ($program_pend != 'semua') && ($lembaga == 'semua') && ($jurusan == 'semua'))
		{
			$data['semua'] = $this->model_universal->reprogram_pend($program_pend)->result();

			$this->load->view('header');
			$this->load->view('body_laporan_result', $data);
			$this->load->view('footer');
		}
		else if(($bulan == 'semua') && ($tahun == 'semua') && ($jenis == 'semua') && ($program_pend == 'semua') && ($lembaga != 'semua') && ($jurusan == 'semua'))
		{
			$data['semua'] = $this->model_universal->relembaga($lembaga)->result();

			$this->load->view('header');
			$this->load->view('body_laporan_result', $data);
			$this->load->view('footer');
		}
		else if(($bulan == 'semua') && ($tahun == 'semua') && ($jenis == 'semua') && ($program_pend == 'semua') && ($lembaga == 'semua') && ($jurusan != 'semua'))
		{
			$data['semua'] = $this->model_universal->rejurusan($jurusan)->result();

			$this->load->view('header');
			$this->load->view('body_laporan_result', $data);
			$this->load->view('footer');
		}
		else if(($bulan != 'semua') && ($tahun != 'semua') && ($jenis == 'semua') && ($program_pend == 'semua') && ($lembaga == 'semua') && ($jurusan == 'semua'))
		{
			$data['semua'] = $this->model_universal->bulantahun($bulan, $tahun)->result();

			$this->load->view('header');
			$this->load->view('body_laporan_result', $data);
			$this->load->view('footer');
		}
		else if(($bulan != 'semua') && ($tahun != 'semua') && ($jenis != 'semua') && ($program_pend == 'semua') && ($lembaga == 'semua') && ($jurusan == 'semua'))
		{
			$data['semua'] = $this->model_universal->bulantahunjenis($bulan, $tahun, $jenis)->result();

			$this->load->view('header');
			$this->load->view('body_laporan_result', $data);
			$this->load->view('footer');
		}
		else if(($bulan != 'semua') && ($tahun != 'semua') && ($jenis != 'semua') && ($program_pend != 'semua') && ($lembaga == 'semua') && ($jurusan == 'semua'))
		{
			$data['semua'] = $this->model_universal->bulantahunjenisprogram($bulan, $tahun, $jenis, $program_pend)->result();

			$this->load->view('header');
			$this->load->view('body_laporan_result', $data);
			$this->load->view('footer');
		}
		else if(($bulan != 'semua') && ($tahun != 'semua') && ($jenis != 'semua') && ($program_pend != 'semua') && ($lembaga != 'semua') && ($jurusan == 'semua'))
		{
			$data['semua'] = $this->model_universal->bulantahunjenisprogramlembaga($bulan, $tahun, $jenis, $program_pend, $lembaga)->result();

			$this->load->view('header');
			$this->load->view('body_laporan_result', $data);
			$this->load->view('footer');
		}
		else if(($bulan != 'semua') && ($tahun != 'semua') && ($jenis != 'semua') && ($program_pend != 'semua') && ($lembaga != 'semua') && ($jurusan != 'semua'))
		{
			$data['semua'] = $this->model_universal->bulantahunjenisprogramlembagajurusan($bulan, $tahun, $jenis, $program_pend, $lembaga, $jurusan)->result();

			$this->load->view('header');
			$this->load->view('body_laporan_result', $data);
			$this->load->view('footer');
		}
		else
		{
			echo "haha";
		}
	}

	public function exe_report1($bulan, $tahun, $jenis, $program_pend, $lembaga, $jurusan)
	{
		if($this->uri->segment(3) == ""){
		$offset = 0;
		}else{
			$offset = $this->uri->segment(3);
		}
		$limit = 10;	

		$data['total'] = $this->model_universal->totalsementara();
		$data['lembaga'] = $this->model_universal->selectlembaga();
		$data['jurusan'] = $this->model_universal->selectjurusan();

		$data['semua'] = $this->model_universal->select_all_resemua($offset, $limit);
		
		$config = array();
		$config['base_url'] = base_url() . 'index.php/home/exe_report1/';
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 5;
		$config['total_rows'] = $this->model_universal->resemua($bulan, $tahun, $jenis, $program_pend, $lembaga, $jurusan);
		$this->pagination->initialize($config);
		$this->session->set_userdata('row', $this->uri->segment(3));

		$this->load->view('header');
		$this->load->view('body_laporan_result', $data);
		$this->load->view('footer');
	}

	public function exe_report2($bulan)
	{
		if($this->uri->segment(3) == ""){
		$offset = 0;
		}else{
			$offset = $this->uri->segment(3);
		}
		$limit = 10;	

		$data['total'] = $this->model_universal->totalsementara();
		$data['lembaga'] = $this->model_universal->selectlembaga();
		$data['jurusan'] = $this->model_universal->selectjurusan();

		$data['semua'] = $this->model_universal->select_all_rebulan($offset, $limit, $bulan);
		
		$config = array();
		$config['base_url'] = base_url() . 'index.php/home/exe_report1/';
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 5;
		$config['total_rows'] = $this->model_universal->rebulan($bulan);
		$this->pagination->initialize($config);
		$this->session->set_userdata('row', $this->uri->segment(3));

		$this->load->view('header');
		$this->load->view('body_laporan_result', $data);
		$this->load->view('footer');
	}








	public function detail_mhs($ID_PKL)
	{
		$data['mhs'] = $this->model_universal->model_detail_mhs($ID_PKL)->row();

		$this->load->view('header');
		$this->load->view('detail_mhs', $data);
		$this->load->view('footer');

	}




	public function pdflaporan()
	{
		$data['semua'] = $this->model_universal->temp()->result();

		$this->load->view('body_laporan_pdf', $data);
		$html = $this->output->get_output();
		
		$this->load->library('dompdf_gen');
		
		$this->dompdf->load_html($html);
		$this->dompdf->set_paper('letter', 'landscape');
		$this->dompdf->render();
		$this->dompdf->stream("report.pdf", array('Attachment'=>0));
		
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */