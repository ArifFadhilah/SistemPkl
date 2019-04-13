<?php 
/**
SISTEM INFORMASI SISWA/MAHASISWA PKL/RISET DI PT.INTI BANDUNG, INDONESIA
Author 	: Syifa Afifah Fitriani
email 	: syifaafifahf@gmail.com
from Universitas Pendidikan Indonesia

Updated by 
Author 	: Alif Yonanta, Agustian Ardiansyah and M Arif Fadhillah
from Telkom University
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->model('model_universal');
		//hide warning
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	}

	public function index()
	{
		$this->gohome();
	}

	public function login()
	{
		//login menuju laman admin
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
		$data['judul'] = "Seluruh Data Siswa/Mahasiswa PKL, Riset dan PMMB di PT.INTI";
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

	public function laporan()
	{
		$data['total'] = $this->model_universal->totalsementara();
		$data['lembaga'] = $this->model_universal->selectlembaga();
		$data['jurusan'] = $this->model_universal->selectjurusan();
		$data['divisi'] = $this->model_universal->selectdivisi();
		$data['bagian'] = $this->model_universal->selectbagian();
		$data['pembimbing'] = $this->model_universal->selectpembimbing();

		$this->load->view('header');
		$this->load->view('body_laporan', $data);
		$this->load->view('footer');
	}

	public function smart()
	{
		$data['smart'] = $this->model_universal->model_smart();
		
		$this->load->view('header');
		$this->load->view('body_smart', $data);
		$this->load->view('footer');
	}

	function search_lembaga()
	{
		$search = $this->input->post('search', true);
		$data['lembaga'] = $this->model_universal->model_search_lembaga($search)->result();

		$this->load->view('header');
		$this->load->view('body_lembaga', $data);
		$this->load->view('footer');
	}

	function search_jurusan()
	{
		$search = $this->input->post('search', true);
		$data['jurusan'] = $this->model_universal->model_search_jurusan($search)->result();

		$this->load->view('header');
		$this->load->view('body_jurusan', $data);
		$this->load->view('footer');
	}

	function search_pkl()
	{
		$search = $this->input->post('search', true);
		$data['judul'] = "Data Siswa/Mahasiswa PKL di PT.INTI";
		$data['pkl'] = $this->model_universal->model_search_pkl($search)->result();

		$this->load->view('header');
		$this->load->view('body_pkl', $data);
		$this->load->view('footer');
	}

	function search_pmmb()
	{
		$search = $this->input->post('search', true);
		$data['judul'] = "Data Mahasiswa PMMB di PT.INTI";
		$data['pkl'] = $this->model_universal->model_search_pmmb($search)->result();

		$this->load->view('header');
		$this->load->view('body_pmmb', $data);
		$this->load->view('footer');
	}

		//menampilkan data siswa/mahasiswa berdasrkan program pendidikannya   
		public function subpkl()
		{
			if($this->uri->segment(3) == ""){
				$offset = 0;
			}else{
				$offset = $this->uri->segment(3);
			}
			$limit = 10;
			$data['judul'] = "Data Siswa/Mahasiswa PKL di PT.INTI";
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

		public function subpmmb()
		{
			if($this->uri->segment(3) == ""){
				$offset = 0;
			}else{
				$offset = $this->uri->segment(3);
			}
			$limit = 10;
			$data['judul'] = "Data Mahasiswa PMMB di PT.INTI";
			$data['pkl'] = $this->model_universal->select_all_pmmb($offset, $limit);
			
			$config = array();
			$config['base_url'] = base_url() . 'index.php/home/subpmmb/';
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['num_links'] = 5;
			$config['total_rows'] = $this->model_universal->jumlah_all_pmmb();
			$this->pagination->initialize($config);
			$this->session->set_userdata('row', $this->uri->segment(3));

			$this->load->view('header');
			$this->load->view('body_pmmb', $data);
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


	//laporan
	public function report()
	{
		$tgl_awal = $this->input->post('tgl_awal', 'true');
		$tgl_akhir = $this->input->post('tgl_akhir', 'true');
		//$tgl_pel_awal = $this->input->post('tgl_pel_awal', 'true');
		//$tgl_pel_akhir = $this->input->post('tgl_pel_akhir', 'true');
		$jenis = $this->input->post('jenis', 'true');
		$prog_pend = $this->input->post('prog_pend', 'true');
		$lembaga = $this->input->post('lembaga', 'true');
		$jurusan = $this->input->post('jurusan', 'true');
		$no = $this->input->post('no', 'true');
		$nrp_siswa = $this->input->post('nrp_siswa', 'true');
		$divisi = $this->input->post('divisi', 'true');
		$bagian = $this->input->post('bagian', 'true');
		$nama_pemb = $this->input->post('nama_pemb', 'true');
		$nama_pemb_lembaga = $this->input->post('nama_pemb_lembaga', 'true');

		echo $rep['prog_pend'];
		$rep = $this->session->userdata('report');
		$sess['tgl_awal'] = $tgl_awal === false ? $rep['tgl_awal'] : $tgl_awal;
		$sess['tgl_akhir'] = $tgl_akhir === false ? $rep['tgl_akhir'] : $tgl_akhir;
		//$sess['tgl_pel_awal'] = $tgl_pel_awal === false ? $rep['tgl_pel_awal'] : $tgl_pel_awal;
		//$sess['tgl_pel_akhir'] = $tgl_pel_akhir === false ? $rep['tgl_pel_akhir'] : $tgl_pel_akhir;
		$sess['jenis'] = $jenis === false ? $rep['jenis'] : $jenis;
		$sess['prog_pend'] = $prog_pend === false ? $rep['prog_pend'] : $prog_pend;
		$sess['lembaga'] = $lembaga === false ? $rep['lembaga'] : $lembaga;
		$sess['jurusan'] = $jurusan === false ? $rep['jurusan'] : $jurusan;
		$sess['no'] = $no === false ? $rep['no'] : $no;
		$sess['nrp_siswa'] = $nrp_siswa === false ? $rep['nrp_siswa'] : $nrp_siswa;
		$sess['divisi'] = $divisi === false ? $rep['divisi'] : $divisi;
		$sess['bagian'] = $bagian === false ? $rep['bagian'] : $bagian;
		$sess['nama_pemb'] = $nama_pemb === false ? $rep['nama_pemb'] : $nama_pemb;
		$sess['nama_pemb_lembaga'] = $nama_pemb_lembaga === false ? $rep['nama_pemb_lembaga'] : $nama_pemb_lembaga;

		$this->session->set_userdata('report', $sess);
		//echo "ini ". $lembaga;
		$rep = $this->session->userdata('report');
		//$this->exe_report4($rep['tgl_awal'], $rep['tgl_akhir'], $rep['tgl_pel_awal'], $rep['tgl_pel_akhir'], $rep['jenis'], $rep['prog_pend'], $rep['lembaga'], $rep['jurusan'], $rep['no'], $rep['nrp_siswa'], $rep['divisi'], $rep['bagian'], $rep['nama_pemb'], $rep['nama_pemb_lembaga']);
		$this->exe_report4($rep['tgl_awal'], $rep['tgl_akhir'], $rep['jenis'], $rep['prog_pend'], $rep['lembaga'], $rep['jurusan'], $rep['no'], $rep['nrp_siswa'], $rep['divisi'], $rep['bagian'], $rep['nama_pemb'], $rep['nama_pemb_lembaga']);
	}

	public function exe_report4($tgl_awal, $tgl_akhir, $jenis, $program_pend, $lembaga, $jurusan, $no, $nrp_siswa, $divisi, $bagian, $nama_pemb, $nama_pemb_lembaga)
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
		$data['pembimbing'] = $this->model_universal->selectpembimbing();
		$data['divisi'] = $this->model_universal->selectdivisi();
		$data['bagian'] = $this->model_universal->selectbagian();
		$temp = $this->model_universal->select_by_criteria($offset, $limit, $tgl_awal, $tgl_akhir, $jenis, $program_pend, $lembaga, $jurusan, $no, $nrp_siswa, $divisi, $bagian, $nama_pemb, $nama_pemb_lembaga);
		$data['semua'] = $temp->result();

		$i = 1;
		foreach($data['semua'] as $k => $v)
		{
			$data['semua'][$k]->NOMOR = $offset + $i;
			$i++;
		}
		
		$config = array();
		$config['base_url'] = base_url() . 'index.php/home/report/';
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 5;
		$config['total_rows'] = $this->model_universal->count_by_criteria($tgl_awal, $tgl_akhir, $jenis, $program_pend, $lembaga, $jurusan, $no, $nrp_siswa, $divisi, $bagian, $nama_pemb, $nama_pemb_lembaga);

		if($config['total_rows'] < 1) 
		{
			$data['status'] = "Tidak Ada";
		}
		else
		{
			$data['status'] = "";
		}
		$this->pagination->initialize($config);
		$this->session->set_userdata('row4', $this->uri->segment(3));
		$this->load->view('header');
		$this->load->view('body_laporan_res', $data);
		$this->load->view('footer');
	}

	public function detail_mhs($ID_PKL)
	{
		$data['mhs'] = $this->model_universal->model_detail_mhs($ID_PKL)->row();

		$this->load->view('header');
		$this->load->view('detail_mhs', $data);
		$this->load->view('footer');
	}

	//surat permohonan
	public function pdflaporan($ID_PKL)
	{
		$selectKaur = $this->model_universal->selectKaur();
		$selectKaur = $selectKaur[0];
		$data['format'] = $selectKaur->keterangan;

		$data['rowss'] = $this->model_universal->model_detail_mhs($ID_PKL)->row();
		$data['surat'] = $this->model_universal->model_surat()->row();

		$this->load->view('body_laporan_pdf', $data);
		$html = $this->output->get_output();
		
		$this->load->library('dompdf_gen');
		
		$this->dompdf->load_html($html);
		$this->dompdf->set_paper('A4', 'portrait');
		$this->dompdf->render();
		$this->dompdf->stream("report.pdf", array('Attachment'=>0));
		
	}

	//surat keterangan
	public function pdflaporan2($ID_PKL)
	{
		$selectKaur = $this->model_universal->selectKaur();
		$selectKaur = $selectKaur[0];
		$data['format'] = $selectKaur->keterangan;

		$data['rowss'] = $this->model_universal->model_detail_mhsselesai($ID_PKL)->row();
		$data['kaurdiklat'] = $this->model_universal->kaurdiklat()->row();
		$data['surat'] = $this->model_universal->model_surat()->row();

		//$selectNo = $this->model_universal->selectNo($ID_PKL);
		//$selectNo = $selectNo[0];
		//$no = $selectNo->no;

		//$no_keterangan = $this->model_universal->model_detail_mhsRes($ID_PKL, $no);
		//$no_keterangan = $no_keterangan[0];
		//$data['NO_KETERANGAN'] = $no_keterangan->NO_KETERANGAN;

		$this->load->view('body_laporan_result', $data);
		$html = $this->output->get_output();
		
		$this->load->library('dompdf_gen');
		
		$this->dompdf->load_html($html);
		$this->dompdf->set_paper('letter', 'portrait');
		$this->dompdf->render();
		$this->dompdf->stream("report.pdf", array('Attachment'=>0));
		
	}

	//surat permohonan tanpa ttd atasan
	public function pdflaporan3($ID_PKL)
	{
		$selectKaur = $this->model_universal->selectKaur();
		$selectKaur = $selectKaur[0];
		$data['format'] = $selectKaur->keterangan;
		
		$data['rowss'] = $this->model_universal->model_detail_mhs($ID_PKL)->row();
		$data['surat'] = $this->model_universal->model_surat()->row();

		$this->load->view('body_laporan_pdf2', $data);
		$html = $this->output->get_output();
		
		$this->load->library('dompdf_gen');
		
		$this->dompdf->load_html($html);
		$this->dompdf->set_paper('A4', 'portrait');
		$this->dompdf->render();
		$this->dompdf->stream("report.pdf", array('Attachment'=>0));
		
	}
	public function pdfsertifikatA($ID_PKL)
	{
		$selectKaur = $this->model_universal->selectKaur();
		$selectKaur = $selectKaur[0];
		$data['format'] = $selectKaur->keterangan;

		$data['rowss'] = $this->model_universal->model_detail_mhsselesai($ID_PKL)->row();
		$data['kaurdiklat'] = $this->model_universal->kaurdiklat()->row();
		$data['surat'] = $this->model_universal->model_surat()->row();

		//$selectNo = $this->model_universal->selectNo($ID_PKL);
		//$selectNo = $selectNo[0];
		//$no = $selectNo->no;

		//$no_keterangan = $this->model_universal->model_detail_mhsRes($ID_PKL, $no);
		//$no_keterangan = $no_keterangan[0];
		//$data['NO_KETERANGAN'] = $no_keterangan->NO_KETERANGAN;

		$this->load->view('body_sertifikat_result', $data);
		$html = $this->output->get_output();
		
		$this->load->library('dompdf_gen');
		
		$this->dompdf->load_html($html);
		$this->dompdf->set_paper('letter', 'portrait');
		$this->dompdf->render();
		$this->dompdf->stream("report.pdf", array('Attachment'=>0));
		
	}
		public function pdfsertifikatB($ID_PKL)
	{
		$selectKaur = $this->model_universal->selectKaur();
		$selectKaur = $selectKaur[0];
		$data['format'] = $selectKaur->keterangan;

		$data['rowss'] = $this->model_universal->model_detail_mhsselesai($ID_PKL)->row();
		$data['kaurdiklat'] = $this->model_universal->kaurdiklat()->row();
		$data['surat'] = $this->model_universal->model_surat()->row();

		//$selectNo = $this->model_universal->selectNo($ID_PKL);
		//$selectNo = $selectNo[0];
		//$no = $selectNo->no;

		//$no_keterangan = $this->model_universal->model_detail_mhsRes($ID_PKL, $no);
		//$no_keterangan = $no_keterangan[0];
		//$data['NO_KETERANGAN'] = $no_keterangan->NO_KETERANGAN;

		$this->load->view('body_sertifikatB_result', $data);
		$html = $this->output->get_output();
		
		$this->load->library('dompdf_gen');
		
		$this->dompdf->load_html($html);
		$this->dompdf->set_paper('letter', 'portrait');
		$this->dompdf->render();
		$this->dompdf->stream("report.pdf", array('Attachment'=>0));
		
	}
	public function pdfsertifikatpmmb($ID_PKL)
	{
		$selectKaur = $this->model_universal->selectKaur();
		$selectKaur = $selectKaur[0];
		$data['format'] = $selectKaur->keterangan;

		$data['rowss'] = $this->model_universal->model_detail_mhspmmb($ID_PKL)->row();
		$data['executive'] = $this->model_universal->executive()->row();
		$data['hcm'] = $this->model_universal->hcm()->row();

		//$selectNo = $this->model_universal->selectNo($ID_PKL);
		//$selectNo = $selectNo[0];
		//$no = $selectNo->no;

		//$no_keterangan = $this->model_universal->model_detail_mhsRes($ID_PKL, $no);
		//$no_keterangan = $no_keterangan[0];
		//$data['NO_KETERANGAN'] = $no_keterangan->NO_KETERANGAN;

		$this->load->view('body_sertifikatPMMB_result', $data);
		$html = $this->output->get_output();
		
		$this->load->library('dompdf_gen');
		
		$this->dompdf->load_html($html);
		$this->dompdf->set_paper('letter', 'landscape');
		$this->dompdf->render();
		$this->dompdf->stream("report.pdf", array('Attachment'=>0));
		
	}
	public function pdfnilaisertifikatpmmb($ID_PKL)
	{
		$selectKaur = $this->model_universal->selectKaur();
		$selectKaur = $selectKaur[0];
		$data['format'] = $selectKaur->keterangan;

		$data['rowss'] = $this->model_universal->model_detail_mhspmmb($ID_PKL)->row();
		$data['executive'] = $this->model_universal->executive()->row();
		$data['hcm'] = $this->model_universal->hcm()->row();

		//$selectNo = $this->model_universal->selectNo($ID_PKL);
		//$selectNo = $selectNo[0];
		//$no = $selectNo->no;

		//$no_keterangan = $this->model_universal->model_detail_mhsRes($ID_PKL, $no);
		//$no_keterangan = $no_keterangan[0];
		//$data['NO_KETERANGAN'] = $no_keterangan->NO_KETERANGAN;

		$this->load->view('body_nilaisertifikat_result', $data);
		$html = $this->output->get_output();
		
		$this->load->library('dompdf_gen');
		
		$this->dompdf->load_html($html);
		$this->dompdf->set_paper('letter', 'landscape');
		$this->dompdf->render();
		$this->dompdf->stream("report.pdf", array('Attachment'=>0));
		
	}
		public function pdfidcardpmmb($ID_PKL)
	{
		$selectKaur = $this->model_universal->selectKaur();
		$selectKaur = $selectKaur[0];
		$data['format'] = $selectKaur->keterangan;

		$data['rowss'] = $this->model_universal->model_detail_mhspmmb($ID_PKL)->row();
		$data['kaurdiklat'] = $this->model_universal->kaurdiklat()->row();
		$data['surat'] = $this->model_universal->model_surat()->row();

		//$selectNo = $this->model_universal->selectNo($ID_PKL);
		//$selectNo = $selectNo[0];
		//$no = $selectNo->no;

		//$no_keterangan = $this->model_universal->model_detail_mhsRes($ID_PKL, $no);
		//$no_keterangan = $no_keterangan[0];
		//$data['NO_KETERANGAN'] = $no_keterangan->NO_KETERANGAN;

		$this->load->view('body_idcard', $data);
		$html = $this->output->get_output();
		
		$this->load->library('dompdf_gen');
		
		$this->dompdf->load_html($html);
		$customPaper = array(0,0,261,404);
		$this->dompdf->set_paper($customPaper,'potrait');
		$this->dompdf->render();
		$this->dompdf->stream("report.pdf", array('Attachment'=>0));
		
	}

	public function pdfnilaipmmb($ID_PKL)
	{
		$selectKaur = $this->model_universal->selectKaur();
		$selectKaur = $selectKaur[0];
		$data['format'] = $selectKaur->keterangan;

		$data['rowss'] = $this->model_universal->model_detail_mhspmmb($ID_PKL)->row();
		$data['kaurdiklat'] = $this->model_universal->kaurdiklat()->row();
		$data['surat'] = $this->model_universal->model_surat()->row();

		//$selectNo = $this->model_universal->selectNo($ID_PKL);
		//$selectNo = $selectNo[0];
		//$no = $selectNo->no;

		//$no_keterangan = $this->model_universal->model_detail_mhsRes($ID_PKL, $no);
		//$no_keterangan = $no_keterangan[0];
		//$data['NO_KETERANGAN'] = $no_keterangan->NO_KETERANGAN;

		$this->load->view('body_nilaisertifikat_result', $data);
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
