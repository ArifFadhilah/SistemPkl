<?php
/**
* 
*/
class Model_universal extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	#read lembaga
	/*function jumlah_all_lembaga()
	{
		$this->db->select('*');
		$this->db->from('lembaga');
		return $this->db->get();
	}
	function select_all_lembaga($offset, $limit)
	{
		$this->db->select('*');
        $this->db->from('lembaga');
        $this->db->order_by('NAMA_LEMBAGA', 'asc');

        $getData = $this->db->get('', $offset, $limit);
		if ($getData->num_rows() > 0) {
			return $getData->result();
		} else {
			return null;
		}
	}*/

	//home
		//riset
		public function model_home_riset(){
			$this->db->select('*');
			$this->db->from('pkl2013');
			$this->db->where('JENIS_PKL', 'RISET');
			$this->db->order_by('ID_PKL', 'desc');
			$this->db->limit(5);
			return $this->db->get();
		}
		//pkl
		public function model_home_pkl(){
			$this->db->select('*');
			$this->db->from('pkl2013');
			$this->db->where('JENIS_PKL', 'PKL');
			$this->db->order_by('ID_PKL', 'desc');
			$this->db->limit(5);
			return $this->db->get();
		}
		//riset
		public function model_home_observasi(){
			$this->db->select('*');
			$this->db->from('pkl2013');
			$this->db->where('JENIS_PKL', 'OBSERVASI');
			$this->db->order_by('ID_PKL', 'desc');
			$this->db->limit(5);
			return $this->db->get();
		}
	//end home

	//detail mahasiswa
		public function model_detail_mhs($ID_PKL)
		{
			$this->db->select('*');
			$this->db->from('pkl2013');
			$this->db->where('ID_PKL', $ID_PKL);
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
	
	//pkl

		//read pkl
		public function jumlah_all_pkl(){
			$query = $this->db->query("SELECT * FROM pkl2013");
			return $query->num_rows();
		}
		
		public function select_all_pkl($offset, $limit){
			$query = $this->db->query("
									SELECT * FROM pkl2013 ORDER BY ID_PKL DESC 
									LIMIT $offset, $limit
									");
			return $query->result();
		}
		function model_search_pkl($search)
		{
			$this->db->select('*');
			$this->db->from('pkl2013');
			$this->db->like('NM_SISWA', $search);
			$this->db->order_by('TANGGAL', 'desc');
			return $this->db->get();
		}
		//end read pkl

		//read all jenis program pkl
		public function jumlah_all_subpkl(){
			$query = $this->db->query("SELECT * FROM pkl2013  where JENIS_PKL='PKL'");
			return $query->num_rows();
		}

		public function select_all_subpkl($offset, $limit){
			$query = $this->db->query("
									SELECT * FROM pkl2013 where JENIS_PKL='PKL' ORDER BY ID_PKL DESC 
									LIMIT $offset, $limit
									");
			return $query->result();
		}
		//end all jenis program pkl

		//read riset
		public function jumlah_all_riset(){
			$query = $this->db->query("SELECT * FROM pkl2013 where JENIS_PKL='RISET'");
			return $query->num_rows();
		}

		public function select_all_riset($offset, $limit){
			$query = $this->db->query("
									SELECT * FROM pkl2013 where JENIS_PKL='RISET' ORDER BY ID_PKL DESC 
									LIMIT $offset, $limit
									");
			return $query->result();
		}
		//end read riset

		//read observasi
		public function jumlah_all_observasi(){
			$query = $this->db->query("SELECT * FROM pkl2013 where JENIS_PKL='PENELITIAN' or JENIS_PKL='OBSERVASI'");
			return $query->num_rows();
		}

		public function select_all_observasi($offset, $limit){
			$query = $this->db->query("
									SELECT * FROM pkl2013 where JENIS_PKL='PENELITIAN' or JENIS_PKL='OBSERVASI' ORDER BY ID_PKL DESC 
									LIMIT $offset, $limit
									");
			return $query->result();
		}
		//end read observasi

	//end pkl

	//LAporan
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
		//bawah judul
			public function totalsementara()
			{
				$query = $this->db->query("SELECT EXTRACT(YEAR FROM TANGGAL) AS 'tahun', COUNT('ID_PKL') AS 'jumlah' from pkl2013 where EXTRACT(YEAR FROM TANGGAL)>=2006 group by EXTRACT(YEAR FROM TANGGAL)");
				return $query->result();
			}
		//search
			//semua on
			public function select_all_resemua($offset, $limit){
				$query = $this->db->query("
										SELECT * FROM pkl2013 ORDER BY ID_PKL DESC 
										LIMIT $offset, $limit
										");
				return $query->result();
			}
			public function resemua($bulan, $tahun, $jenis, $program_pend, $lembaga, $jurusan)
			{
				$query = $this->db->query("SELECT * FROM pkl2013");
				return $query->num_rows();
			}
			//only bulan
			public function rebulan($bulan)
			{
				$query = $this->db->query("SELECT * FROM pkl2013 WHERE EXTRACT(MONTH FROM TANGGAL) = $bulan");
				return $query->num_rows();
			}
			public function select_all_rebulan($offset, $limit, $bulan){
				$query = $this->db->query("
										SELECT * FROM pkl2013 WHERE EXTRACT(MONTH FROM TANGGAL) = $bulan ORDER BY ID_PKL DESC 
										LIMIT $offset, $limit
										");
				return $query->result();
			}
			public function rebulans($bulan)
			{
				$this->db->select('*');
				$this->db->from('pkl2013');
				$this->db->where('MONTH(TANGGAL)', $bulan);
				$this->db->order_by('ID_PKL', 'desc');
				return $this->db->get();
			}

			//only tahun
			public function retahun($tahun)
			{
				$this->db->select('*');
				$this->db->from('pkl2013');
				$this->db->where('YEAR(TANGGAL)', $tahun);
				$this->db->order_by('ID_PKL', 'desc');
				return $this->db->get();
			}

			//only jenis
			public function rejenis($jenis)
			{
				$this->db->select('*');
				$this->db->from('pkl2013');
				$this->db->where('JENIS_PKL', $jenis);
				$this->db->order_by('ID_PKL', 'desc');
				return $this->db->get();
			}

			//only program pendidikan
			public function reprogram_pend($program_pend)
			{
				$this->db->select('*');
				$this->db->from('pkl2013');
				$this->db->where('PROG_PEND', $program_pend);
				$this->db->order_by('ID_PKL', 'desc');
				return $this->db->get();
			}

			//only lembaga
			public function relembaga($lembaga)
			{
				$this->db->select('*');
				$this->db->from('pkl2013');
				$this->db->where('LEMBAGA', $lembaga);
				$this->db->order_by('ID_PKL', 'desc');
				return $this->db->get();
			}

			//only jurusan
			public function rejurusan($jurusan)
			{
				$this->db->select('*');
				$this->db->from('pkl2013');
				$this->db->where('JURUSAN', $jurusan);
				$this->db->order_by('ID_PKL', 'desc');
				return $this->db->get();
			}

			//bulan dan tahun
			public function bulantahun($bulan, $tahun)
			{
				$this->db->select('*');
				$this->db->from('pkl2013');
				$this->db->where('MONTH(TANGGAL)', $bulan);
				$this->db->where('YEAR(TANGGAL)', $tahun);
				$this->db->order_by('ID_PKL', 'desc');
				return $this->db->get();
			}

			//bulan, tahun, jenis
			public function bulantahunjenis($bulan, $tahun, $jenis)
			{
				$this->db->select('*');
				$this->db->from('pkl2013');
				$this->db->where('MONTH(TANGGAL)', $bulan);
				$this->db->where('YEAR(TANGGAL)', $tahun);
				$this->db->where('JENIS_PKL', $jenis);
				$this->db->order_by('ID_PKL', 'desc');
				return $this->db->get();
			}

			//bulan, tahun, jenis, program pend
			public function bulantahunjenisprogram($bulan, $tahun, $jenis, $program_pend)
			{
				$this->db->select('*');
				$this->db->from('pkl2013');
				$this->db->where('MONTH(TANGGAL)', $bulan);
				$this->db->where('YEAR(TANGGAL)', $tahun);
				$this->db->where('JENIS_PKL', $jenis);
				$this->db->where('PROG_PEND', $program_pend);
				$this->db->order_by('ID_PKL', 'desc');
				return $this->db->get();
			}

			//bulan, tahun, jenis, program pend, lembaga
			public function bulantahunjenisprogramlembaga($bulan, $tahun, $jenis, $program_pend, $lembaga)
			{
				$this->db->select('*');
				$this->db->from('pkl2013');
				$this->db->where('MONTH(TANGGAL)', $bulan);
				$this->db->where('YEAR(TANGGAL)', $tahun);
				$this->db->where('JENIS_PKL', $jenis);
				$this->db->where('PROG_PEND', $program_pend);
				$this->db->where('LEMBAGA', $lembaga);
				$this->db->order_by('ID_PKL', 'desc');
				return $this->db->get();
			}

			//bulan, tahun, jenis, program pend, lembaga, jurusan
			public function bulantahunjenisprogramlembagajurusan($bulan, $tahun, $jenis, $program_pend, $lembaga, $jurusan)
			{
				$this->db->select('*');
				$this->db->from('pkl2013');
				$this->db->where('MONTH(TANGGAL)', $bulan);
				$this->db->where('YEAR(TANGGAL)', $tahun);
				$this->db->where('JENIS_PKL', $jenis);
				$this->db->where('PROG_PEND', $program_pend);
				$this->db->where('LEMBAGA', $lembaga);
				$this->db->where('JURUSAN', $jurusan);
				$this->db->order_by('ID_PKL', 'desc');
				return $this->db->get();
			}

		//end search
			//temp pdf
			public function temp(){
				$this->db->select('*');
				$this->db->from('pkl2013');
				$this->db->order_by('ID_PKL', 'desc');
				$this->db->limit(20);
				return $this->db->get();
			}
	//end laporan
}

?>