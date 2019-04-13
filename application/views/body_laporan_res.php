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
            <li><a href="<?=base_url()?>index.php/home/pkl">PKL/Riset</a></li>
            <li><a href="<?=base_url()?>index.php/home/lembaga">Lembaga</a></li>
            <li><img src="<?=base_url();?>other/images/nav_logo.png"></a>
            <li><a href="<?=base_url()?>index.php/home/jurusan">Jurusan</a></li>
            <li><a href="<?=base_url()?>index.php/home/laporan" class="current">Pencarian</a></li>
            <li><a href="<?=base_url()?>index.php/home/smart">Urutan<br>Lembaga</a></li>
            <li><a href="<?=base_url()?>index.php/home/login">Admin</a></li>
        </ul>
	</div>
    <div class="clearfix"></div>
</div>

<!-- content -->
<div class="container">
  

  <div class="col-xs-12">
    <div class="hr-style"></div>
    <!-- result pencarian -->
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
            foreach($semua as $rowss):?>
          <tr>
            <td><?php echo $rowss->NOMOR;?></td>
            <td><?php echo $rowss->TANGGAL?></td>
            <td><?php echo $rowss->NO?></td>
            <td><a href="<?php echo (site_url('home/detail_mhs' . '/' . $rowss->ID_PKL));?>"><?php echo $rowss->NM_SISWA?></a></td>
            <td><?php echo $rowss->JENIS_PKL?></td>
            <td><?php echo $rowss->LEMBAGA?></td>
            <td><?php echo $rowss->JURUSAN?></td>
            <td><?php echo $rowss->DIVISI?></td>
            <td><?php echo $rowss->BAGIAN?></td>
            <td><?php echo $rowss->TGL_AWAL?></td>
            <td><?php echo $rowss->TGL_AKHIR?></td>
            <td><?php echo $rowss->NAMA_PEMB?></td>
          </tr>
            <?php
              $no++;
              endforeach;
            ?>
        </tbody>
      </table>
      <?php echo $this->pagination->create_links(); ?>
      <center><?php echo $status;?></center>
      </div>
      <div class="hr-style"></div>
  </div>
</div>