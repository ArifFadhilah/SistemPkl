<!-- 
SISTEM INFORMASI SISWA/MAHASISWA PKL/RISET DI PT.INTI BANDUNG, INDONESIA
Author  : Syifa Afifah Fitriani
email   : syifaafifahf@gmail.com
from Universitas Pendidikan Indonesia 
-->

<!-- menu -->
<div class="headers">
	<div class="container">
		<ul id="nav" style="margin-left:110px;">
        <li><a href="<?=base_url()?>index.php/admin/admin_pkl">PKL/Riset</a></li>
        <li><a href="<?=base_url()?>index.php/admin/pembimbing"  class="current">Pembimbing</a></li>
        <li><a href="<?=base_url()?>index.php/admin/admin_lembaga">Lembaga</a></li>
        <li><img src="<?=base_url();?>other/images/nav_logo.png"></a>
        <li><a href="<?=base_url()?>index.php/admin/admin_jurusan">Jurusan</a></li>
        <li><a href="<?=base_url()?>index.php/admin/admin_urdiklat">Ka.Urusan &<br>Surat</a></li>
        <li><a href="<?=base_url()?>index.php/admin/logout">Log Out</a></li>
    </ul>
	</div>
    <div class="clearfix"></div>
</div>

<!-- content -->
<div class="container">
  
  <div class="col-xs-6 col-sm-3 ">
    <h3 class="r">Pembimbing PT.INTI</h3>
    <div class="hr-style"></div>
    	<div class="l">
      <!-- upload/insert data pembimbing -->
    	<h4>UPLOAD DATA PEMBIMBING TERBARU</h4>
	    	<?php if (isset($error)): ?>
	                <div class="alert alert-danger"><?php echo $error; ?></div>
	        <?php endif; ?>
	        <?php if ($this->session->flashdata('success') == TRUE): ?>
	            <div class="alert alert-info"><?php echo $this->session->flashdata('success'); ?></div>
	        <?php endif; ?>
        <form method="post" action="<?=base_url()?>index.php/admin/importcsv" enctype="multipart/form-data">
            <input type="file" name="userfile" ><br><br>
            <input type="submit" name="submit" value="Upload" class="btn btn-danger">
        </form>
        </div>

    <br>
    <div class="hr-style"></div>
  </div>

  <div class="col-xs-6 col-sm-9 bkiri">
    <br>
    <!-- result -->
    <?php echo form_open('admin/search_pemb');?>
      <input type="text" placeholder="Berdasarkan Nama Pembimbing" size="50" name="search">
      <button class="btn btn-warning">Cari</button>
    </form>
    <br>

    <div class="scroll">
    <table class="table table-hover form1">
      <thead>
        <tr>
          <th>ID</th>
          <th>Action</th>
          <th>NIP</th>
          <th>Nama</th>
          <th>Divisi</th>
          <th>Bagian</th>
          <th>NIP Atasan</th>
          <th>Nama Atasan</th>
          <!-- <th>Jabatan</th>/ -->
        <tr>
      </thead>						

      <tbody>
		<?php 
          $no = 1;
          foreach($pemb as $row):?>
        <tr>
          <td><?php echo $this->session->userdata('row')+$no; ?></td>
          <td>
            <a href="<?php echo site_url('admin/updatepemb' . '/' . $row->ID_PEMBIMBING); ?>">
              <p><button type="button" class="btn btn-warning btn-xs">edit</button></p>
            </a>
            <a href="<?php echo site_url('admin/deletepemb' . '/' . $row->ID_PEMBIMBING); ?>">
              <p><button type="button" class="btn btn-danger btn-xs">delete</button></p>
            </a>
          </td>
          <td><?php echo $row->NIP?></td>
          <td><?php echo $row->NAMA?></td>
          <td><?php echo $row->DIVISI?></td>
          <td><?php echo $row->BAGIAN?></td>
          <td><?php echo $row->NIP_ATASAN?></td>
          <td><?php echo $row->NAMA_ATASAN?></td>
          <!-- <td><?php //echo $row->NAMA_JABATAN?></td> -->
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

</div>