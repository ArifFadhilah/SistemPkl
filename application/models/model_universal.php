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

class Model_universal extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	//home
		//riset
		public function model_home_riset(){
			$this->db->select('*');
			$this->db->from('datasiswa');
			$this->db->where('JENIS_PKL', 'RISET');
			$this->db->order_by('ID_PKL', 'asc');
			$this->db->limit(5);
			return $this->db->get();
		}
		//pkl
		public function model_home_pkl(){
			$this->db->select('*');
			$this->db->from('datasiswa');
			$this->db->where('JENIS_PKL', 'PKL');
			$this->db->order_by('ID_PKL', 'asc');
			$this->db->limit(5);
			return $this->db->get();
		}
		//observasi
		public function model_home_observasi(){
			$this->db->select('*');
			$this->db->from('datasiswa');
			$this->db->where('JENIS_PKL', 'OBSERVASI');
			$this->db->order_by('ID_PKL', 'asc');
			$this->db->limit(5);
			return $this->db->get();
		}
	//end home

	//detail mahasiswa
		public function model_detail_mhs($ID_PKL)
		{
			$this->db->select('*');
			$this->db->from('datasiswa');
			$this->db->where('ID_PKL', $ID_PKL);
			return $this->db->get();
		}

		//detail mahasiswa pmmb
		public function model_detail_mhspmmb($ID_PKL)
		{
			$this->db->select('*');
			$this->db->from('datapmmb');
			$this->db->where('ID_PKL', $ID_PKL);
			return $this->db->get();
		}

		public function selectKaur()
		{
			$query = $this->db->query("SELECT keterangan AS keterangan FROM urusan where id = 1");
			return $query->result();
		}
		/*public function selectNo($id_pkl){
			$query = $this->db->query("SELECT NO AS no FROM datasiswa WHERE ID_PKL = $id_pkl");
			return $query->result();
		}

		public function model_detail_mhsRes($ID_PKL, $no)
		{
			$query = $this->db->query("SELECT ds.NO_KETERANGAN AS NO_KETERANGAN FROM datasiswa AS d, datasiswaselesai AS ds WHERE d.ID_PKL=$ID_PKL AND ds.NO = $no");
			return $query->result();
		}*/

	//detail mahasiswa
		public function model_detail_mhsselesai($ID_PKL)
		{
			$this->db->select('*');
			$this->db->from('datasiswaselesai');
			$this->db->where('ID_PKL', $ID_PKL);
			return $this->db->get();
		}

	//kaurdiklat
		function kaurdiklat()
		{
			$this->db->select('*');
			$this->db->from('urdiklat');
			$this->db->where('status', 2);
			$this->db->order_by('AN_KA_URDIKLAT', 'ASC');
			return $this->db->get();
		}

		function executive()
		{
			$this->db->select('*');
			$this->db->from('urdiklat');
			$this->db->where('status', 3);
			$this->db->order_by('AN_KA_URDIKLAT', 'ASC');
			return $this->db->get();
		}
		function hcm()
		{
			$this->db->select('*');
			$this->db->from('urdiklat');
			$this->db->where('status', 4);
			$this->db->order_by('AN_KA_URDIKLAT', 'ASC');
			return $this->db->get();
		}
	//end detail mahasiswa 

	//lembaga
		public function jumlah_all_lembaga(){
			$query = $this->db->query("SELECT * FROM lembaga");
			return $query->num_rows();
		}
		
		public function select_all_lembaga($offset, $limit){
			$query = $this->db->query("
									SELECT * FROM lembaga ORDER BY NAMA_LEMBAGA ASC 
									LIMIT $offset, $limit
									");
			return $query->result();
		}

		function model_search_lembaga($search)
		{
			$this->db->select('*');
			$this->db->from('lembaga');
			$this->db->like('NAMA_LEMBAGA', $search);
			return $this->db->get();
		}
	//end lembaga

	//jurusan
		public function jumlah_all_jurusan(){
			$query = $this->db->query("SELECT * FROM jurusan");
			return $query->num_rows();
		}
		
		public function select_all_jurusan($offset, $limit){
			$query = $this->db->query("
									SELECT * FROM jurusan ORDER BY NAMA_JURUSAN ASC 
									LIMIT $offset, $limit
									");
			return $query->result();
		}

		function model_search_jurusan($search)
		{
			$this->db->select('*');
			$this->db->from('jurusan');
			$this->db->like('NAMA_JURUSAN', $search);
			return $this->db->get();
		}
	//end jurusan
	
	//smart
		function model_smart()
		{
			
			$query = $this->db->query("SELECT LEMBAGA, PROG_PEND, COUNT(NM_SISWA) as jumlah_peserta FROM datasiswa WHERE JENIS_PKL='PKL' GROUP BY LEMBAGA ORDER BY jumlah_peserta desc LIMIT 0, 10");
			return $query->result();
		}
	//end smart

	//pkl, riset

		//all
		public function jumlah_all_pkl(){
			$query = $this->db->query("SELECT * FROM datasiswa");
			return $query->num_rows();
		}
		
		public function select_all_pkl($offset, $limit){
			$query = $this->db->query("
									SELECT * FROM datasiswa ORDER BY TANGGAL DESC, NO DESC 
									LIMIT $offset, $limit
									");
			return $query->result();
		}
		function model_search_pkl($search)
		{
			$this->db->select('*');
			$this->db->from('datasiswa');
			$this->db->like('NM_SISWA', $search);
			$this->db->order_by('TANGGAL', 'desc');
			return $this->db->get();
		}
		function model_search_pmmb($search)
		{
			$this->db->select('*');
			$this->db->from('datapmmb');
			$this->db->like('NM_SISWA', $search);
			$this->db->order_by('TANGGAL', 'desc');
			return $this->db->get();
		}

		function model_search_pkl_tahun($search)
		{
			$this->db->select('*');
			$this->db->from('datasiswa');
			$this->db->like('YEAR(TANGGAL)', $search);
			$this->db->order_by('TANGGAL', 'desc');
			return $this->db->get();
		}

		function model_search_pmmb_tahun($search)
		{
			$this->db->select('*');
			$this->db->from('datapmmb');
			$this->db->like('YEAR(TANGGAL)', $search);
			$this->db->order_by('TANGGAL', 'desc');
			return $this->db->get();
		}

		function model_search_pmmb_batch($search)
		{
			$this->db->select('*');
			$this->db->from('datapmmb');
			$this->db->like('BATCH', $search);
			$this->db->order_by('TANGGAL', 'desc');
			return $this->db->get();
		}

		function model_search_pkl_selesai($search)
		{
			$this->db->select('*');
			$this->db->from('datasiswaselesai');
			$this->db->like('NM_SISWA', $search);
			$this->db->order_by('TANGGAL', 'desc');
			return $this->db->get();
		}
		//end all

		//jenis program pkl
		public function jumlah_all_subpkl(){
			$query = $this->db->query("SELECT * FROM datasiswa  where JENIS_PKL='PKL'");
			return $query->num_rows();
		}

		public function select_all_subpkl($offset, $limit){
			$query = $this->db->query("
									SELECT * FROM datasiswa where JENIS_PKL='PKL' ORDER BY TANGGAL desc 
									LIMIT $offset, $limit
									");
			return $query->result();
		}
		//end jenis program pkl

		//read riset
		public function jumlah_all_riset(){
			$query = $this->db->query("SELECT * FROM datasiswa where JENIS_PKL='RISET'");
			return $query->num_rows();
		}

		public function select_all_riset($offset, $limit){
			$query = $this->db->query("
									SELECT * FROM datasiswa where JENIS_PKL='RISET' ORDER BY TANGGAL desc 
									LIMIT $offset, $limit
									");
			return $query->result();
		}
		//end read riset

		//read pmmb
		public function jumlah_all_pmmb(){
			$query = $this->db->query("SELECT * FROM datapmmb");
			return $query->num_rows();
		}

		public function select_all_pmmb($offset, $limit){
			$query = $this->db->query("
									SELECT * FROM datapmmb ORDER BY TANGGAL desc  
									LIMIT $offset, $limit
									");
			return $query->result();
		}
		//end read pmmb

		//read selesai
		public function jumlah_all_selesai(){
			//$query = $this->db->query("SELECT * FROM datasiswa where status=1");
			$query = $this->db->query("SELECT * FROM datasiswaselesai ORDER BY TANGGAL DESC, NO_KETERANGAN DESC");
			return $query->num_rows();
		}

		public function select_all_selesai($offset, $limit){
			$query = $this->db->query("
									SELECT * FROM datasiswaselesai ORDER BY TANGGAL DESC, NO_KETERANGAN DESC 
									LIMIT $offset, $limit
									");
			return $query->result();
		}
		//end read selesai

		//read observasi
		public function jumlah_all_observasi(){
			$query = $this->db->query("SELECT * FROM datasiswa where JENIS_PKL='PENELITIAN' or JENIS_PKL='OBSERVASI'");
			return $query->num_rows();
		}

		public function select_all_observasi($offset, $limit){
			$query = $this->db->query("
									SELECT * FROM datasiswa where JENIS_PKL='PENELITIAN' or JENIS_PKL='OBSERVASI' ORDER BY ID_PKL ASC 
									LIMIT $offset, $limit
									");
			return $query->result();
		}
		//end read observasi

	//end pkl

	//selct count nomor untuk memasukkan nomor surat secara otomatis,
	//nomor akan di reset(jadi 1) ketika pergantian tahun
		public function nomor(){
			$query = $this->db->query("SELECT MAX(NO) AS 'nomor' FROM datasiswa WHERE EXTRACT(YEAR FROM TANGGAL) = YEAR(CURDATE())");
			return $query->result();
		}
		public function nomorpmmb(){
			$query = $this->db->query("SELECT MAX(NO) AS 'nomor' FROM datapmmb WHERE EXTRACT(YEAR FROM TANGGAL) = YEAR(CURDATE())");
			return $query->result();
		}
	//select nomor untuk nomor keterangan
		public function nomorpertahun($id_pkl){
			$query = $this->db->query("SELECT YEAR(TANGGAL) AS 'tanggal' FROM datasiswa WHERE ID_PKL = $id_pkl");
			return $query->result();
		}
		/*public function nomor2($tahun){
			$query = $this->db->query("SELECT MAX(NO_KETERANGAN) AS 'nomor' FROM datasiswa WHERE EXTRACT(YEAR FROM TANGGAL) = $tahun");
			return $query->result();
		}*/
		public function nomor2(){
			//$query = $this->db->query("SELECT MAX(NO_KETERANGAN) AS 'nomor' FROM datasiswa WHERE YEAR(CURDATE()) = YEAR(CURDATE())");
			$query = $this->db->query("SELECT MAX(NO_KETERANGAN) AS 'nomor' FROM datasiswaselesai WHERE YEAR(CURDATE()) = YEAR(CURDATE())");
			return $query->result();
		}
		public function total(){
			$query = $this->db->query("SELECT INTEGRITAS, KETWAKTU, KEAHLIAN, KERJASAMA, KOMUNIKASI, PENGGUNAAN, PENGEMBANGAN, (INTEGRITAS+KETWAKTU+KEAHLIAN+KERJASAMA+KOMUNIKASI+PENGGUNAAN+PENGEMBANGAN) as TOTAL FROM datapmmb");
			return $query->result();
		}
	

	//lporan
		//form laporan
			//select lembaga
			public function selectlembaga()
			{
				$query = $this->db->query("SELECT * FROM lembaga ORDER BY NAMA_LEMBAGA ASC");
				return $query->result();
			}

			//select jurusan
			public function selectjurusan()
			{
				$query = $this->db->query("SELECT * FROM jurusan ORDER BY NAMA_JURUSAN ASC");
				return $query->result();
			}

			//select divisi
			public function selectdivisi()
			{
				$query = $this->db->query("SELECT DIVISI FROM datasiswa GROUP BY DIVISI ORDER BY DIVISI ASC");
				return $query->result();
			}

			//select bagian
			public function selectbagian()
			{
				$query = $this->db->query("SELECT BAGIAN FROM datasiswa GROUP BY BAGIAN ORDER BY BAGIAN ASC");
				return $query->result();
			}

		//model untu kmenalpila data yanga ada dibawah judul laporan
		//data dilihar dari tahun 2007
			public function totalsementara()
			{
				$query = $this->db->query("SELECT EXTRACT(YEAR FROM TANGGAL) AS 'tahun', COUNT('ID_PKL') AS 'jumlah' from datasiswa where EXTRACT(YEAR FROM TANGGAL)>2006 group by EXTRACT(YEAR FROM TANGGAL)");
				return $query->result();
			}

		//search
			public function count_by_criteria($tgl_awal, $tgl_akhir, $jenis, $pendidikan, $lembaga, $jurusan, $no, $nrp_siswa, $divisi, $bagian, $nama_pemb, $nama_pemb_lembaga)
			{
				$q = 'SELECT COUNT(*) as apa FROM datasiswa WHERE ';
				if($tgl_awal != "" && $tgl_akhir == "") $q .= "TANGGAL = '" . $tgl_awal ."' AND ";
				if($tgl_akhir != "" && $tgl_awal == "") $q .= "TANGGAL = '" . $tgl_akhir ."' AND ";
				if($tgl_akhir != "" && $tgl_awal != "") $q .= "TANGGAL BETWEEN '" . $tgl_awal ."' AND '" . $tgl_akhir ."' AND ";
				/*if($tgl_pel_awal != "" && $tgl_pel_akhir == "") $q .= "TGL_AWAL = '" . $tgl_pel_awal ."' AND ";
				if($tgl_pel_akhir != "" && $tgl_pel_awal == "") $q .= "TGL_AKHIR = '" . $tgl_pel_akhir ."' AND ";
				if($tgl_pel_akhir != "" && $tgl_pel_awal != "") $q .= "TGL_AWAL >= '" . $tgl_pel_awal ."' AND TGL_AKHIR <= '" . $tgl_pel_akhir ."' AND ";*/
				if($jenis != "semua") $q .= "JENIS_PKL = '" . $jenis ."' AND ";
				if($pendidikan != "semua") $q .= "PROG_PEND = '" . $pendidikan ."' AND ";
				if($lembaga != "semua") $q .= "LEMBAGA = '" . $lembaga ."' AND ";
				if($jurusan != "semua") $q .= "JURUSAN = '" . $jurusan ."' AND ";
				if($no != "semua") $q .= "NO = '" . $no ."' AND ";
				if($nrp_siswa != "semua") $q .= "NRP_SISWA = '" . $nrp_siswa ."' AND ";
				if($divisi != "semua") $q .= "DIVISI = '" . $divisi ."' AND ";
				if($bagian != "semua") $q .= "BAGIAN = '" . $bagian ."' AND ";
				if($nama_pemb != "semua") $q .= "NAMA_PEMB = '" . $nama_pemb ."' AND ";
				if($nama_pemb_lembaga != "semua") $q .= "NAMA_PEMB_LEMBAGA = '" . $nama_pemb_lembaga ."' AND ";

				if(substr($q, strlen($q) - 4) == "AND ")
					$q = substr($q, 0, strlen($q) - 4);
				else if(substr($q, strlen($q) - 6) == "WHERE ")
					$q = substr($q, 0, strlen($q) - 6);
				$query = $this->db->query($q);
				$res = $query->result();
				return $res[0]->apa;
			}

			public function select_by_criteria($offset, $limit, $tgl_awal, $tgl_akhir, $jenis, $pendidikan, $lembaga, $jurusan, $no, $nrp_siswa, $divisi, $bagian, $nama_pemb, $nama_pemb_lembaga)
			{
				$q = 'SELECT * FROM datasiswa WHERE ';
				if($tgl_awal != "" && $tgl_akhir == "") $q .= "TANGGAL = '" . $tgl_awal ."' AND ";
				if($tgl_akhir != "" && $tgl_awal == "") $q .= "TANGGAL = '" . $tgl_akhir ."' AND ";
				if($tgl_akhir != "" && $tgl_awal != "") $q .= "TANGGAL BETWEEN '" . $tgl_awal ."' AND '" . $tgl_akhir ."' AND ";
				/*if($tgl_pel_awal != "" && $tgl_pel_akhir == "") $q .= "TGL_AWAL = '" . $tgl_pel_awal ."' AND ";
				if($tgl_pel_akhir != "" && $tgl_pel_awal == "") $q .= "TGL_AKHIR = '" . $tgl_pel_akhir ."' AND ";
				if($tgl_pel_akhir != "" && $tgl_pel_awal != "") $q .= "TGL_AWAL >= '" . $tgl_pel_awal ."' AND TGL_AKHIR <= '" . $tgl_pel_akhir ."' AND ";*/
				if($jenis != "semua") $q .= "JENIS_PKL = '" . $jenis ."' AND ";
				if($pendidikan != "semua") $q .= "PROG_PEND = '" . $pendidikan ."' AND ";
				if($lembaga != "semua") $q .= "LEMBAGA = '" . $lembaga ."' AND ";
				if($jurusan != "semua") $q .= "JURUSAN = '" . $jurusan ."' AND ";
				if($no != "semua") $q .= "NO = '" . $no ."' AND ";
				if($nrp_siswa != "semua") $q .= "NRP_SISWA = '" . $nrp_siswa ."' AND ";
				if($divisi != "semua") $q .= "DIVISI = '" . $divisi ."' AND ";
				if($bagian != "semua") $q .= "BAGIAN = '" . $bagian ."' AND ";
				if($nama_pemb != "semua") $q .= "NAMA_PEMB = '" . $nama_pemb ."' AND ";
				if($nama_pemb_lembaga != "semua") $q .= "NAMA_PEMB_LEMBAGA = '" . $nama_pemb_lembaga ."' AND ";

				if(substr($q, strlen($q) - 4) == "AND ")
					$q = substr($q, 0, strlen($q) - 4);
				else if(substr($q, strlen($q) - 6) == "WHERE ")
					$q = substr($q, 0, strlen($q) - 6);

				$q .= " ORDER BY TANGGAL DESC LIMIT $offset, $limit";
				$query = $this->db->query($q);
				//echo $q;
				return $query;
			}

			public function reprogram($program_pend)
			{
				$query = $this->db->query("SELECT * FROM datasiswa WHERE PROG_PEND = '$program_pend'");
				return $query->num_rows();
			}
	//end laporan
	public function selectpembimbing()
		{
			$query = $this->db->query("SELECT * FROM pembimbing GROUP BY NAMA ORDER BY NAMA ASC");
			return $query->result();
		}
	//surat
	public function model_surat()
	{
		$this->db->select('*');
		$this->db->from('surat');
		$this->db->where('id_surat', '1');
		return $this->db->get();
	}

	function model_surat2()
		{
			$this->db->select('*');
			$this->db->from('surat');
			$this->db->order_by('kode', 'ASC');
			return $this->db->get();
		}
}

?>
