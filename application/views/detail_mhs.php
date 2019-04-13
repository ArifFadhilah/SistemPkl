<!-- 
SISTEM INFORMASI SISWA/MAHASISWA PKL/RISET DI PT.INTI BANDUNG, INDONESIA
Author  : Syifa Afifah Fitriani
email   : syifaafifahf@gmail.com
from Universitas Pendidikan Indonesia 
-->

<!-- menu -->
<div class="headers">
	<div class="container">
		<ul id="nav">
            <li><a href="<?=base_url();?>index.php/home/gohome">Home</a></li>
            <li><a href="<?=base_url()?>index.php/home/prosedur">Prosedur</a></li>
            <li><a href="<?=base_url()?>index.php/home/pkl" class="current">PKL/Riset</a></li>
            <li><a href="<?=base_url()?>index.php/home/lembaga">Lembaga</a></li>
            <li><img src="<?=base_url();?>other/images/nav_logo.png"></a>
            <li><a href="<?=base_url()?>index.php/home/jurusan">Jurusan</a></li>
            <li><a href="<?=base_url()?>index.php/home/laporan">Pencarian</a></li>
            <li><a href="<?=base_url()?>index.php/home/smart">Urutan<br>Lembaga</a></li>
            <li><a href="<?=base_url()?>index.php/home/login">Admin</a></li>
        </ul>
	</div>
    <div class="clearfix"></div>
</div>

<!-- content -->
<div class="container">
  <h3>DETAIL DATA SISWA/MAHASISWA</h3>
  <div class="hr-style"></div>
  
  <div class="row">
    <div class="col-md-4">
      <table class="table">
        <tr>
          <td>No Surat</td>
          <td>:</td>
          <td><b><?php echo $mhs->NO?></b></td>
        </tr>
        <tr>
          <td>Tanggal Daftar</td>
          <td>:</td>
          <td><b><?php echo $mhs->TANGGAL?></b></td>
        </tr>
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td><b><?php echo $mhs->NM_SISWA?></b></td>
        </tr>
        <tr>
          <td>NRP</td>
          <td>:</td>
          <td><b><?php echo $mhs->NRP_SISWA?></b></td>
        </tr>
        <tr>
          <td>Tanggal Awal</td>
          <td>:</td>
          <td><b><?php 
                      $date = $mhs->TGL_AWAL;
                    if(substr($date, 4, 1) != "-")
                    {
                      echo $date;
                    }
                    else
                    {
                      $explodedate = explode("-", $date);
                      $year = $explodedate[0];
                      $month = $explodedate[1];
                      $day = $explodedate[2];
                      if ($month == 1) { $month1 = 'Januari'; }
                      if ($month == 2) { $month1 = 'Februari'; }
                      if ($month == 3) { $month1 = 'Maret'; }
                      if ($month == 4) { $month1 = 'April'; }
                      if ($month == 5) { $month1 = 'Mei'; }
                      if ($month == 6) { $month1 = 'Juni'; }
                      if ($month == 7) { $month1 = 'Juli'; }
                      if ($month == 8) { $month1 = 'Agustus'; }
                      if ($month == 9) { $month1 = 'September'; }
                      if ($month == 10) { $month1 = 'Oktober'; }
                      if ($month == 11) { $month1 = 'November'; }
                      if ($month == 12) { $month1 = 'Desember'; }
                      echo $day." ".$month1." ".$year;                    }
          ?></b></td>
        </tr>
        <tr>
          <td>Tanggal Akhir</td>
          <td>:</td>
          <td><b><?php 
                    $date = $mhs->TGL_AKHIR;
                    if(substr($date, 4, 1) != "-")
                    {
                      echo $date;
                    }
                    else
                    {
                      $explodedate = explode("-", $date);
                      $year = $explodedate[0];
                      $month = $explodedate[1];
                      $day = $explodedate[2];
                      if ($month == 1) { $month1 = 'Januari'; }
                      if ($month == 2) { $month1 = 'Februari'; }
                      if ($month == 3) { $month1 = 'Maret'; }
                      if ($month == 4) { $month1 = 'April'; }
                      if ($month == 5) { $month1 = 'Mei'; }
                      if ($month == 6) { $month1 = 'Juni'; }
                      if ($month == 7) { $month1 = 'Juli'; }
                      if ($month == 8) { $month1 = 'Agustus'; }
                      if ($month == 9) { $month1 = 'September'; }
                      if ($month == 10) { $month1 = 'Oktober'; }
                      if ($month == 11) { $month1 = 'November'; }
                      if ($month == 12) { $month1 = 'Desember'; }
                      echo $day." ".$month1." ".$year;
                    }
          ?></b></td>
        </tr>
      </table>
    </div>
    <div class="col-md-4">
      <table class="table">
        <tr>
          <td>Lembaga</td>
          <td>:</td>
          <td><b><?php echo $mhs->LEMBAGA?></b></td>
        </tr>
        <tr>
          <td>Jurusan</td>
          <td>:</td>
          <td><b><?php echo $mhs->JURUSAN?></b></td>
        </tr>
        <tr>
          <td>Program Pendidian</td>
          <td>:</td>
          <td><b><?php echo $mhs->PROG_PEND?></b></td>
        </tr>
        <tr>
          <td>Jenis PKL</td>
          <td>:</td>
          <td><b><?php echo $mhs->JENIS_PKL?></b></td>
        </tr>
      </table>
    </div>
    <div class="col-md-4 clearfix">
      <table class="table">
        <tr>
          <td>Divisi</td>
          <td>:</td>
          <td><b><?php echo $mhs->DIVISI?></b></td>
        </tr>
        <tr>
          <td>Bagian</td>
          <td>:</td>
          <td><b><?php echo $mhs->BAGIAN?></b></td>
        </tr>
        <tr>
          <td>Pembimbing</td>
          <td>:</td>
          <td><b><?php echo $mhs->NAMA_PEMB?></b></td>
        </tr><!-- 
        <tr>
          <td>an. Ka.Urusan Diklat</td>
          <td>:</td>
          <td><?php //echo $mhs->AN_KA_URDIKLAT?></td>
        </tr> -->
      </table>
    </div>
   
    <div class="col-md-12">
   <div class="hr-style2"></div>
      <table class="table">
        <tr>
          <td>Alamat</td>
          <td>:</td>
          <td><?php echo $mhs->ALAMAT_SISWA?></td>
        </tr>
        <tr>
          <td>Telepon</td>
          <td>:</td>
          <td><?php echo $mhs->TELP_SISWA?></td>
        </tr>
        <tr>
          <td>Email</td>
          <td>:</td>
          <td><?php echo $mhs->EMAIL?></td>
        </tr>
        <tr>
          <td>Telepon Lembaga</td>
          <td>:</td>
          <td><?php echo $mhs->TELP_LEMBAGA?></td>
        </tr>
        <tr>
          <td>Email Lembaga</td>
          <td>:</td>
          <td><?php echo $mhs->EMAIL_LEMBAGA?></td>
        </tr>
        <tr>
          <td>Pembimbing Lembaga</td>
          <td>:</td>
          <td><?php echo $mhs->NAMA_PEMB_LEMBAGA?></td>
        </tr>
        <tr>
          <td>Telepon Pembimbing Lembaga</td>
          <td>:</td>
          <td><?php echo $mhs->TELP_PEMB_LEMBAGA?></td>
        </tr>
      </table>
    </div>
  </div>


</div>