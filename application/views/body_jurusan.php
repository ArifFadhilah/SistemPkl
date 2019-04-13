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
            <li><a href="<?=base_url()?>index.php/home/jurusan" class="current">Jurusan</a></li>
            <li><a href="<?=base_url()?>index.php/home/laporan">Pencarian</a></li>
            <li><a href="<?=base_url()?>index.php/home/smart">Urutan<br>Lembaga</a></li>
            <li><a href="<?=base_url()?>index.php/home/login">Admin</a></li>
        </ul>
	</div>
    <div class="clearfix"></div>
</div>

<div class="container">
	<div class="col-xs-6 col-sm-4">
    
    <h2 style="text-align:right;">Jurusan Lembaga Pendidikan yang Telah Bekerjasama dengan PT.INTI dalam Penerimaan Siswa/Mahasiswa PKL/Riset</h2>
    <div class="hr-style"></div>
    </div>

    <div class="col-xs-6 col-sm-8 bkiri">
      <br>
      <!-- search -->
    	<?php echo form_open('home/search_jurusan');?>
    		<input type="text" placeholder="Berdasarkan Nama Jurusan" size="50" name="search">
    		<button class="btn btn-warning">Cari</button>
    	</form>
    	<br>
        <!-- result -->
    	<table class="table table-hover form1">
          <thead>
            <tr>
              <th>NO</th>
              <th>Jurusan</th>
            </tr>
          </thead>						

          <tbody>
            	<?php 
    			$no = 1;
    			foreach($jurusan as $row):?>
    		<tr>
    			<td><?php echo $this->session->userdata('row')+$no; ?></td>
    			<td><?php echo $row->NAMA_JURUSAN?></td>
    		</tr>
    		<?php
    			$no++;
    			endforeach;
    		?>
          </tbody>
        </table>
        <?php echo $this->pagination->create_links(); ?>
      </div>
</div>