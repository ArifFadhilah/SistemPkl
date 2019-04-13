<?php
/**
SISTEM INFORMASI SISWA/MAHASISWA PKL/RISET DI PT.INTI BANDUNG, INDONESIA
Author 	: Syifa Afifah Fitriani
email 	: syifaafifahf@gmail.com
from Universitas Pendidikan Indonesia
*/
class Model_admin extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	#login
	#untuk user admin
	function check_user_admin($username, $password)
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get();
	}
	
	//read pembimbing
		public function jumlah_all_pemb(){
			$query = $this->db->query("SELECT * FROM pembimbing");
			return $query->num_rows();
		}
		
		public function select_all_pemb($offset, $limit){
			$query = $this->db->query("
									SELECT * FROM pembimbing ORDER BY NAMA ASC 
									LIMIT $offset, $limit
									");
			return $query->result();
		}
		function model_search_pemb($search)
		{
			$this->db->select('*');
			$this->db->from('pembimbing');
			$this->db->like('NAMA', $search);
			$this->db->order_by('NAMA', 'ASC');
			return $this->db->get();
		}

	//urdiklat dan nomor surat
		//urdiklat
		function urdiklat()
		{
			$this->db->select('*');
			$this->db->from('urdiklat');
			$this->db->where('status', 1);
			$this->db->order_by('AN_KA_URDIKLAT', 'ASC');
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

		//admin
		function model_edit_admin()
		{
			$this->db->select('*');
			$this->db->from('admin');
			$this->db->where('id_admin', 1);
			return $this->db->get();
		}
		//surat
		function surat()
		{
			$this->db->select('*');
			$this->db->from('surat');
			$this->db->order_by('kode', 'ASC');
			return $this->db->get();
		}

		//urusan 
		function kaur()
		{
			$this->db->select('*');
			$this->db->from('urusan');
			$this->db->order_by('keterangan', 'ASC');
			return $this->db->get();
		}

	//upload csv file pada pembimbing	    
	    function insert_csv($data) {
	        $this->db->insert('pembimbing', $data);
	    }

	    public function delete_csv()
	    {
	        $this->db->query("TRUNCATE TABLE pembimbing");
	    }

	//delete peserta
	function model_delete($id_pkl)
	{
		$this->db->query("DELETE FROM datasiswa WHERE ID_PKL=$id_pkl");
	}

	//delete peserta selesai
	function model_delete_selesai($id_pkl)
	{
		$this->db->query("DELETE FROM datasiswaselesai WHERE ID_PKL=$id_pkl");
	}

	//delete pembimbing
	function model_deletepemb($id_pemb)
	{
		$this->db->query("DELETE FROM pembimbing WHERE ID_PEMBIMBING=$id_pemb");
	}

	//delete lembaga
	function model_deletelembaga($id_lembaga)
	{
		$this->db->query("DELETE FROM lembaga WHERE ID_LEMBAGA=$id_lembaga");
	}

	//delete jurusan
	function model_deletejurusan($id_jurusan)
	{
		$this->db->query("DELETE FROM jurusan WHERE ID_JURUSAN=$id_jurusan");
	}

	//delete urdiklat
	function model_deleteurdiklat($id_urdiklat)
	{
		$this->db->query("DELETE FROM urdiklat WHERE id_urdiklat = $id_urdiklat");
	}

	//delete peserta pmmb
	function model_deletepmmb($id_pkl)
	{
		$this->db->query("DELETE FROM datapmmb WHERE ID_PKL=$id_pkl");
	}

	//update peserta
	function view_update($id_pkl)
	{
		$this->db->select('*');
		$this->db->from('datasiswa');
		$this->db->where('ID_PKL', $id_pkl);
		return $this->db->get();
	}

	//update pmmb
	function view_updatepmmb($id_pkl)
	{
		$this->db->select('*');
		$this->db->from('datapmmb');
		$this->db->where('ID_PKL', $id_pkl);
		return $this->db->get();
	}

	//update peserta selesai
	function view_update_selesai($id_pkl)
	{
		$this->db->select('*');
		$this->db->from('datasiswaselesai');
		$this->db->where('ID_PKL', $id_pkl);
		return $this->db->get();
	} 

	//update pembimbing
	function view_updatepemb($id_pemb)
	{
		$this->db->select('*');
		$this->db->from('pembimbing');
		$this->db->where('ID_PEMBIMBING', $id_pemb);
		return $this->db->get();
	}

	//update lembaga
	function view_updatelembaga($id_lembaga)
	{
		$this->db->select('*');
		$this->db->from('lembaga');
		$this->db->where('ID_LEMBAGA', $id_lembaga);
		return $this->db->get();
	}
	
	//update jurusan
	function view_updatejurusan($id_jurusan)
	{
		$this->db->select('*');
		$this->db->from('jurusan');
		$this->db->where('ID_JURUSAN', $id_jurusan);
		return $this->db->get();
	}

	//update urdiklat
	function view_updateurdiklat($id_urdiklat)
	{
		$this->db->select('*');
		$this->db->from('urdiklat');
		$this->db->where('id_urdiklat', $id_urdiklat);
		return $this->db->get();
	}

	//update surat
	function view_updatesurat($id_surat)
	{
		$this->db->select('*');
		$this->db->from('surat');
		$this->db->where('id_surat', $id_surat);
		return $this->db->get();
	}

	//update urusan 
	function view_updatekaur($id)
	{
		$this->db->select('*');
		$this->db->from('urusan');
		$this->db->where('id', $id);
		return $this->db->get();
	}

	public function selectKaur()
	{
		$query = $this->db->query("SELECT keterangan AS keterangan FROM urusan where id = 1");
		return $query->result();
	}
	//insert data pkl
	public function model_insert($data)
	{
		$this->db->insert('datasiswa', $data);
	}

	//insert data pmmb
	public function model_insertpmmb($data)
	{
		$this->db->insert('datapmmb', $data);
	}
	//update data pkl
	function model_update($id_pkl, $no, $tanggal, $nm_siswa, $lembaga, $jurusan, $divisi, $bagian, $tgl_awal, $tgl_akhir, $nama_pemb, $nip_pemb, $nrp_siswa, $prog_pend, $jenis_pkl, $atasan, $pp, $np, $an_ka_urdiklat, $alamat_siswa, $telp_siswa, $email, $alamat_lembaga, $telp_lembaga, $email_lembaga, $nama_pemb_lembaga, $telp_pemb_lembaga, $via, $keterangan)
	{
		$this->db->set('NO', $no);
		//$this->db->set('NO_KETERANGAN', $no_ket);
		$this->db->set('TANGGAL', $tanggal);
		$this->db->set('NM_SISWA', $nm_siswa);
		$this->db->set('LEMBAGA', $lembaga);
		$this->db->set('JURUSAN', $jurusan);
		$this->db->set('DIVISI', $divisi);
		$this->db->set('BAGIAN', $bagian);
		$this->db->set('TGL_AWAL', $tgl_awal);
		$this->db->set('TGL_AKHIR', $tgl_akhir);
		$this->db->set('NAMA_PEMB', $nama_pemb);
		$this->db->set('NIP_PEMB', $nip_pemb);
		$this->db->set('NRP_SISWA', $nrp_siswa);
		$this->db->set('PROG_PEND', $prog_pend);
		$this->db->set('JENIS_PKL', $jenis_pkl);
		$this->db->set('ATASAN', $atasan);
		$this->db->set('PP', $pp);
		$this->db->set('NP', $np);
		$this->db->set('AN_KA_URDIKLAT', $an_ka_urdiklat);
		$this->db->set('ALAMAT_SISWA', $alamat_siswa);
		$this->db->set('TELP_SISWA', $telp_siswa);
		$this->db->set('EMAIL', $email);
		$this->db->set('ALAMAT_LEMBAGA', $alamat_lembaga);
		$this->db->set('TELP_LEMBAGA', $telp_lembaga);
		$this->db->set('EMAIL_LEMBAGA', $email_lembaga);
		$this->db->set('NAMA_PEMB_LEMBAGA', $nama_pemb_lembaga);
		$this->db->set('TELP_PEMB_LEMBAGA', $telp_pemb_lembaga);
		$this->db->set('VIA', $via);
		$this->db->set('KETERANGAN', $keterangan);
		$this->db->where('ID_PKL', $id_pkl);
		$this->db->update('datasiswa');
	}
	//update pmmb
	function model_updatepmmb($id_pkl, $no, $tanggal, $nm_siswa, $lembaga, $jurusan, $divisi, $bagian, $tgl_awal, $tgl_akhir, $nama_pemb, $nip_pemb, $nrp_siswa, $prog_pend, $atasan, $pp, $np, $an_ka_urdiklat, $alamat_siswa, $telp_siswa, $email, $alamat_lembaga, $telp_lembaga, $email_lembaga, $nama_pemb_lembaga, $telp_pemb_lembaga, $hasil, $via, $keterangan, $integritas, $ketwaktu, $keahlian, $kerjasama, $komunikasi, $penggunaan, $pengembangan, $total)
	{
		$this->db->set('NO', $no);
		//$this->db->set('NO_KETERANGAN', $no_ket);
		$this->db->set('TANGGAL', $tanggal);
		$this->db->set('NM_SISWA', $nm_siswa);
		$this->db->set('LEMBAGA', $lembaga);
		$this->db->set('JURUSAN', $jurusan);
		$this->db->set('DIVISI', $divisi);
		$this->db->set('BAGIAN', $bagian);
		$this->db->set('TGL_AWAL', $tgl_awal);
		$this->db->set('TGL_AKHIR', $tgl_akhir);
		$this->db->set('NAMA_PEMB', $nama_pemb);
		$this->db->set('NIP_PEMB', $nip_pemb);
		$this->db->set('NRP_SISWA', $nrp_siswa);
		$this->db->set('PROG_PEND', $prog_pend);
		$this->db->set('ATASAN', $atasan);
		$this->db->set('PP', $pp);
		$this->db->set('NP', $np);
		$this->db->set('AN_KA_URDIKLAT', $an_ka_urdiklat);
		$this->db->set('ALAMAT_SISWA', $alamat_siswa);
		$this->db->set('TELP_SISWA', $telp_siswa);
		$this->db->set('EMAIL', $email);
		$this->db->set('ALAMAT_LEMBAGA', $alamat_lembaga);
		$this->db->set('TELP_LEMBAGA', $telp_lembaga);
		$this->db->set('EMAIL_LEMBAGA', $email_lembaga);
		$this->db->set('NAMA_PEMB_LEMBAGA', $nama_pemb_lembaga);
		$this->db->set('TELP_PEMB_LEMBAGA', $telp_pemb_lembaga);
		$this->db->set('HASIL', $hasil);
		$this->db->set('VIA', $via);
		$this->db->set('KETERANGAN', $keterangan);
		$this->db->set('INTEGRITAS', $integritas);
		$this->db->set('KETWAKTU', $ketwaktu);
		$this->db->set('KEAHLIAN', $keahlian);
		$this->db->set('KERJASAMA', $kerjasama);
		$this->db->set('KOMUNIKASI', $komunikasi);
		$this->db->set('PENGGUNAAN', $penggunaan);
		$this->db->set('PENGEMBANGAN', $pengembangan);
		$this->db->set('TOTAL', $total);
		$this->db->where('ID_PKL', $id_pkl);
		$this->db->update('datapmmb');
	}

	//update data pkl dengan keterangan "beres"
	function model_update2($id_pkl, $no, $tanggal, $nm_siswa, $lembaga, $jurusan, $divisi, $bagian, $tgl_awal, $tgl_akhir, $nama_pemb, $nip_pemb, $nrp_siswa, $prog_pend, $jenis_pkl, $atasan, $pp, $np, $an_ka_urdiklat, $alamat_siswa, $telp_siswa, $email, $alamat_lembaga, $telp_lembaga, $email_lembaga, $nama_pemb_lembaga, $telp_pemb_lembaga, $via, $keterangan, $status, $NO_KETERANGAN)
	{
		$this->db->set('NO', $no);
		$this->db->set('TANGGAL', $tanggal);
		$this->db->set('NM_SISWA', $nm_siswa);
		$this->db->set('LEMBAGA', $lembaga);
		$this->db->set('JURUSAN', $jurusan);
		$this->db->set('DIVISI', $divisi);
		$this->db->set('BAGIAN', $bagian);
		$this->db->set('TGL_AWAL', $tgl_awal);
		$this->db->set('TGL_AKHIR', $tgl_akhir);
		$this->db->set('NAMA_PEMB', $nama_pemb);
		$this->db->set('NIP_PEMB', $nip_pemb);
		$this->db->set('NRP_SISWA', $nrp_siswa);
		$this->db->set('PROG_PEND', $prog_pend);
		$this->db->set('JENIS_PKL', $jenis_pkl);
		$this->db->set('ATASAN', $atasan);
		$this->db->set('PP', $pp);
		$this->db->set('NP', $np);
		$this->db->set('AN_KA_URDIKLAT', $an_ka_urdiklat);
		$this->db->set('ALAMAT_SISWA', $alamat_siswa);
		$this->db->set('TELP_SISWA', $telp_siswa);
		$this->db->set('EMAIL', $email);
		$this->db->set('ALAMAT_LEMBAGA', $alamat_lembaga);
		$this->db->set('TELP_LEMBAGA', $telp_lembaga);
		$this->db->set('EMAIL_LEMBAGA', $email_lembaga);
		$this->db->set('NAMA_PEMB_LEMBAGA', $nama_pemb_lembaga);
		$this->db->set('TELP_PEMB_LEMBAGA', $telp_pemb_lembaga);
		$this->db->set('VIA', $via);
		$this->db->set('KETERANGAN', $keterangan);
		$this->db->set('status', $status);
		$this->db->set('NO_KETERANGAN', $NO_KETERANGAN);
		$this->db->where('ID_PKL', $id_pkl);
		$this->db->update('datasiswa');
	}

	//update selesai
	function model_update3($id_pkl, $tanggal, $nm_siswa, $lembaga, $jurusan, $divisi, $bagian, $tgl_awal, $tgl_akhir, $nama_pemb, $nip_pemb, $nrp_siswa, $prog_pend, $jenis_pkl, $atasan, $pp, $np, $an_ka_urdiklat, $alamat_siswa, $telp_siswa, $email, $alamat_lembaga, $telp_lembaga, $email_lembaga, $nama_pemb_lembaga, $telp_pemb_lembaga, $via, $keterangan, $status, $NO_KETERANGAN)
	{
		//$this->db->set('NO', $no);
		$this->db->set('TANGGAL', $tanggal);
		$this->db->set('NM_SISWA', $nm_siswa);
		$this->db->set('LEMBAGA', $lembaga);
		$this->db->set('JURUSAN', $jurusan);
		$this->db->set('DIVISI', $divisi);
		$this->db->set('BAGIAN', $bagian);
		$this->db->set('TGL_AWAL', $tgl_awal);
		$this->db->set('TGL_AKHIR', $tgl_akhir);
		$this->db->set('NAMA_PEMB', $nama_pemb);
		$this->db->set('NIP_PEMB', $nip_pemb);
		$this->db->set('NRP_SISWA', $nrp_siswa);
		$this->db->set('PROG_PEND', $prog_pend);
		$this->db->set('JENIS_PKL', $jenis_pkl);
		$this->db->set('ATASAN', $atasan);
		$this->db->set('PP', $pp);
		$this->db->set('NP', $np);
		$this->db->set('AN_KA_URDIKLAT', $an_ka_urdiklat);
		$this->db->set('ALAMAT_SISWA', $alamat_siswa);
		$this->db->set('TELP_SISWA', $telp_siswa);
		$this->db->set('EMAIL', $email);
		$this->db->set('ALAMAT_LEMBAGA', $alamat_lembaga);
		$this->db->set('TELP_LEMBAGA', $telp_lembaga);
		$this->db->set('EMAIL_LEMBAGA', $email_lembaga);
		$this->db->set('NAMA_PEMB_LEMBAGA', $nama_pemb_lembaga);
		$this->db->set('TELP_PEMB_LEMBAGA', $telp_pemb_lembaga);
		$this->db->set('VIA', $via);
		$this->db->set('KETERANGAN', $keterangan);
		$this->db->set('status', $status);
		$this->db->set('NO_KETERANGAN', $NO_KETERANGAN);
		$this->db->where('ID_PKL', $id_pkl);
		$this->db->update('datasiswaselesai');
	}

	//update datasiswaselesai
	function model_insert_selesai($id_pkl, $no, $tanggal, $nm_siswa, $lembaga, $jurusan, $divisi, $bagian, $tgl_awal, $tgl_akhir, $nama_pemb, $nip_pemb, $nrp_siswa, $prog_pend, $jenis_pkl, $atasan, $pp, $np, $an_ka_urdiklat, $alamat_siswa, $telp_siswa, $email, $alamat_lembaga, $telp_lembaga, $email_lembaga, $nama_pemb_lembaga, $telp_pemb_lembaga, $via, $keterangan, $status, $NO_KETERANGAN)
	{
		$this->db->set('NO', $no);
		$this->db->set('TANGGAL', $tanggal);
		$this->db->set('NM_SISWA', $nm_siswa);
		$this->db->set('LEMBAGA', $lembaga);
		$this->db->set('JURUSAN', $jurusan);
		$this->db->set('DIVISI', $divisi);
		$this->db->set('BAGIAN', $bagian);
		$this->db->set('TGL_AWAL', $tgl_awal);
		$this->db->set('TGL_AKHIR', $tgl_akhir);
		$this->db->set('NAMA_PEMB', $nama_pemb);
		$this->db->set('NIP_PEMB', $nip_pemb);
		$this->db->set('NRP_SISWA', $nrp_siswa);
		$this->db->set('PROG_PEND', $prog_pend);
		$this->db->set('JENIS_PKL', $jenis_pkl);
		$this->db->set('ATASAN', $atasan);
		$this->db->set('PP', $pp);
		$this->db->set('NP', $np);
		$this->db->set('AN_KA_URDIKLAT', $an_ka_urdiklat);
		$this->db->set('ALAMAT_SISWA', $alamat_siswa);
		$this->db->set('TELP_SISWA', $telp_siswa);
		$this->db->set('EMAIL', $email);
		$this->db->set('ALAMAT_LEMBAGA', $alamat_lembaga);
		$this->db->set('TELP_LEMBAGA', $telp_lembaga);
		$this->db->set('EMAIL_LEMBAGA', $email_lembaga);
		$this->db->set('NAMA_PEMB_LEMBAGA', $nama_pemb_lembaga);
		$this->db->set('TELP_PEMB_LEMBAGA', $telp_pemb_lembaga);
		$this->db->set('VIA', $via);
		$this->db->set('KETERANGAN', $keterangan);
		$this->db->set('status', $status);
		$this->db->set('NO_KETERANGAN', $NO_KETERANGAN);
		$this->db->insert('datasiswaselesai');
		
	}

	//update data pembimbing
	function model_updatepemb($id_pembimbing, $nip, $nama, $divisi, $bagian, $nip_atasan, $nama_atasan, $nama_jabatan)
	{
		$this->db->set('NIP', $nip);
		$this->db->set('NAMA', $nama);
		$this->db->set('DIVISI', $divisi);
		$this->db->set('BAGIAN', $bagian);
		$this->db->set('NIP_ATASAN', $nip_atasan);
		$this->db->set('NAMA_ATASAN', $nama_atasan);
		$this->db->set('NAMA_JABATAN', $nama_jabatan);
		$this->db->where('ID_PEMBIMBING', $id_pembimbing);
		$this->db->update('pembimbing');
	}

	//update data lembaga
	function model_updatelemb($id_lembaga, $nama_lembaga, $alamat_lembaga, $telp_lembaga, $email_lembaga)
	{
		$this->db->set('NAMA_LEMBAGA', $nama_lembaga);
		$this->db->set('ALAMAT_LEMBAGA', $alamat_lembaga);
		$this->db->set('TELP_LEMBAGA', $telp_lembaga);
		$this->db->set('EMAIL_LEMBAGA', $email_lembaga);
		$this->db->where('ID_LEMBAGA', $id_lembaga);
		$this->db->update('lembaga');
	}	

	//update data jurusan
	function model_updatejurusan($id_jurusan, $nama_jurusan)
	{
		$this->db->set('NAMA_JURUSAN', $nama_jurusan);
		$this->db->where('ID_JURUSAN', $id_jurusan);
		$this->db->update('jurusan');
	}

	//update data urdiklat
	function model_updateurdiklat($id_urdiklat, $np, $an_ka_urdiklat)
	{
		$this->db->set('np', $np);
		$this->db->set('AN_KA_URDIKLAT', $an_ka_urdiklat);
		$this->db->where('id_urdiklat', $id_urdiklat);
		$this->db->update('urdiklat');
	}

	//update data admin
	function model_updateadmin($id_admin, $username, $password)
	{
		$this->db->set('username', $username);
		$this->db->set('password', $password);
		$this->db->where('id_admin', $id_admin);
		$this->db->update('admin');
	}

	//update nomor surat
	function model_updatesurat($id_surat, $kode)
	{
		$this->db->set('kode', $kode);
		$this->db->where('id_surat', $id_surat);
		$this->db->update('surat');
	}

	function model_updateketerangan($id, $keterangan)
	{
		$this->db->set('keterangan', $keterangan);
		$this->db->where('id', $id);
		$this->db->update('urusan');
	}

	//insert jurusan
	public function insertjurusan($data)
	{
		$this->db->insert('jurusan', $data);
	}

	//insert lembaga
	public function insertlembaga($data)
	{
		$this->db->insert('lembaga', $data);
	}

	//insert urdiklat
	public function inserturdiklat($data)
	{
		$this->db->insert('urdiklat', $data);
	}

	//form upload
		public function selectdivisi()
		{
			$query = $this->db->query("SELECT DIVISI FROM pembimbing GROUP BY DIVISI ORDER BY DIVISI ASC");
			return $query->result();
		}
		public function selectbagian()
		{
			$query = $this->db->query("SELECT BAGIAN FROM pembimbing GROUP BY BAGIAN ORDER BY BAGIAN ASC");
			return $query->result();
		}
		public function selectpembimbing()
		{
			$query = $this->db->query("SELECT * FROM pembimbing GROUP BY NAMA ORDER BY NAMA ASC");
			return $query->result();
		}
		public function selecturdiklat()
		{
			$query = $this->db->query("SELECT * FROM urdiklat WHERE status=1 ORDER BY AN_KA_URDIKLAT ASC");
			return $query->result();
		}

	//auto fill form
		public function isilembaga($id_lembaga)
		{
			$query = $this->db->query("SELECT * FROM lembaga WHERE ID_LEMBAGA='$id_lembaga'");
			return $query->result();
		}
		public function isijurusan($id_jurusan)
		{
			$query = $this->db->query("SELECT * FROM jurusan WHERE ID_JURUSAN='$id_jurusan'");
			return $query->result();
		}
		public function isipemb($id_pemb)
		{
			$this->db->select('*');
			$this->db->from('pembimbing');
			$this->db->where('ID_PEMBIMBING', $id_pemb);
			return $this->db->get();
		}
		public function isiur($id_ur)
		{
			$this->db->select('*');
			$this->db->from('urdiklat');
			$this->db->where('ID_URDIKLAT', $id_ur);
			return $this->db->get();
		}

		//update pas upload pdf hasil scan surat pengantar
		public function updatepdfpengantar($filename, $id)
		{
			$this->db->set('pdf_permohonan', $filename);
			$this->db->where('ID_PKL', $id);
			$this->db->update('datasiswa');
		}

		public function updatepdfbalasan($filename, $id)
		{
			$this->db->set('pdf_balasan', $filename);
			$this->db->where('ID_PKL', $id);
			$this->db->update('datasiswa');
		}

		public function updatepdfketerangan($filename, $id)
		{
			$this->db->set('pdf_keterangan', $filename);
			$this->db->where('ID_PKL', $id);
			$this->db->update('datasiswaselesai');
		}

		//upload foto
		public function updatefoto($filename, $id)
		{
			$this->db->set('foto', $filename);
			$this->db->where('ID_PKL', $id);
			$this->db->update('datapmmb');
		}

}

?>