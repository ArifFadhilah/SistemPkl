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
	   <ul id="nav" style="margin-left:110px;">
            <li><a href="<?=base_url()?>index.php/admin/admin_pkl">PKL/Riset</a></li>
            <li><a href="<?=base_url()?>index.php/admin/pembimbing">Pembimbing</a></li>
            <li><a href="<?=base_url()?>index.php/admin/admin_lembaga" >Lembaga</a></li>
            <li><img src="<?=base_url();?>other/images/nav_logo.png"></a>
            <li><a href="<?=base_url()?>index.php/admin/admin_jurusan" class="current">Jurusan</a></li>
            <li><a href="<?=base_url()?>index.php/admin/admin_urdiklat">Ka.Urusan &<br>Surat</a></li>
            <li><a href="<?=base_url()?>index.php/admin/logout">Log Out</a></li>
        </ul>
	</div>
    <div class="clearfix"></div>
</div>

<div class="container">
	<div class="col-xs-6 col-sm-3">
    
    <h3 style="text-align:right;">Jurusan Lembaga Pendidikan yang Telah Bekerjasama dengan PT.INTI dalam Penerimaan Siswa/Mahasiswa PKL/Riset</h3>
    <div class="hr-style"></div>
    </div>

    <div class="col-xs-6 col-sm-9 bkiri">
      <br>
      <!-- search -->
    	<?php echo form_open('admin/admin_search_jurusan');?>
    		<input type="text" placeholder="Berdasarkan Nama Jurusan" size="50" name="search">
    		<button class="btn btn-warning">Cari</button>
    	</form>
    	<br>
      <!-- result -->
      <div class="scroll">
    	<table class="table table-hover form1">
          <thead>
            <tr>
              <th>NO</th>
              <th>Jurusan</th>
              <th>Action</th>
            </tr>
          </thead>						

          <tbody>
            	<?php 
    			$no = 1;
    			foreach($jurusan as $row):?>
    		<tr>
    			<td><?php echo $this->session->userdata('row')+$no; ?></td>
    			<td><?php echo $row->NAMA_JURUSAN?></td>
                <td>
                    <a href="<?php echo site_url('admin/updatejurusan' . '/' . $row->ID_JURUSAN); ?>">
                      <p><button type="button" class="btn btn-warning btn-xs">edit</button></p>
                    </a>
                    <a href="<?php echo site_url('admin/deletejurusan' . '/' . $row->ID_JURUSAN); ?>">
                      <p><button type="button" class="btn btn-danger btn-xs">delete</button></p>
                    </a>
                </td>
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
