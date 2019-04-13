<!-- 
SISTEM INFORMASI SISWA/MAHASISWA PKL/RISET DI PT.INTI BANDUNG, INDONESIA
Author  : Syifa Afifah Fitriani
email   : syifaafifahf@gmail.com
from Universitas Pendidikan Indonesia 

Updated by 
Author 	: Alif Yonanta, Agustian Ardiansyah and M Arif Fadhillah
from Telkom University
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
  <h3><?php echo $judul;?></h3>
  <div class="hr-style"></div>
  <a href="<?=base_url()?>index.php/home/pkl"><input type="submit" class="btn btn-warning" value="Seluruh Data Siswa"></a>
  <a href="<?=base_url()?>index.php/home/subpkl"><input type="submit" class="btn btn-warning" value="Data Siswa PKL"></a>
  <a href="<?=base_url()?>index.php/home/subriset"><input type="submit" class="btn btn-warning" value="Data Siswa RISET"></a>
  <a href="<?=base_url()?>index.php/home/subpmmb"><input type="submit" class="btn btn-warning" value="Data Siswa PMMB"></a>
  <!-- 
  <a href="<?=base_url()?>index.php/home/subobservasi"><input type="submit" class="btn btn-warning" value="Data Siswa OBSERVASI/PENELITIAN"></a> -->
	<div class="hr-style"></div>

  <!-- search -->
  <?php echo form_open('home/search_pkl');?>
    <input type="text" placeholder="Berdasarkan Nama Siswa" size="50" name="search">
    <button class="btn btn-warning">Cari</button>
  </form>
	<br>
  <!-- result -->
  <div class="scroll2">
	<table class="table table-hover form1">
      <thead>
        <tr>
          <th>NO</th>
          <th>Tanggal</th>
          <th>No.Surat</th>
          <th>Nama Siswa</th>
          <th>Jenis</th>
          <th>Lembaga</th>
          <th>Jurusan</th>
          <th>Divisi</th>
          <th>Bagian</th>
          <th>Tanggal Awal</th>
          <th>Tanggal Akhir</th>
          <th>Pembimbing</th>
        </tr>
      </thead>            

      <tbody>
        <?php 
          $no = 1;
          foreach($pkl as $row):?>
        <tr>
          <td><?php echo $this->session->userdata('row')+$no; ?></td>
          <td><?php echo $row->TANGGAL?></td>
          <td><?php echo $row->NO?></td>
          <td><a href="<?php echo (site_url('home/detail_mhs' . '/' . $row->ID_PKL));?>"><?php echo $row->NM_SISWA?></a></td>
          <td><?php echo $row->JENIS_PKL?></td>
          <td><?php echo $row->LEMBAGA?></td>
          <td><?php echo $row->JURUSAN?></td>
          <td><?php echo $row->DIVISI?></td>
          <td><?php echo $row->BAGIAN?></td>
          <td><?php echo $row->TGL_AWAL?></td>
          <td><?php echo $row->TGL_AKHIR?></td>
          <td><?php echo $row->NAMA_PEMB?></td>
        </tr>
          <?php
            $no++;
            endforeach;
          ?>
      </tbody>
    </table>
    <?php echo $this->pagination->create_links(); ?>
    </div>
    <div class="hr-style"></div>

</div>
