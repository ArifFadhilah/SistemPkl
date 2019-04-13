<div class="headers">
	<div class="container">
		<ul id="nav">
            <li><a href="<?=base_url();?>index.php/home/gohome">Home</a></li>
            <li><a href="<?=base_url()?>index.php/home/prosedur">Prosedur</a></li>
            <li><a href="<?=base_url()?>index.php/home/pkl">PKL/Riset/<br>Observasi</a></li>
            <li><a href="<?=base_url()?>index.php/home/lembaga">Lembaga</a></li>
            <li><img src="<?=base_url();?>other/images/nav_logo.png"></a>
            <li><a href="<?=base_url()?>index.php/home/jurusan" class="current">Jurusan</a></li>
            <li><a href="<?=base_url()?>index.php/home/laporan">Laporan</a></li>
            <li><a href="<?=base_url()?>index.php/home/smart">Sistem<br>Cerdas</a></li>
            <li><a href="<?=base_url()?>index.php/home/login">Admin</a></li>
        </ul>
	</div>
    <div class="clearfix"></div>
</div>

<div class="container">
	<div class="col-xs-6 col-sm-4">
    
	    <h2 style="text-align:right;">Jurusan Lembaga Pendidikan yang Telah Bekerjasama dengan PT.INTI dalam Penerimaan Siswa PKL</h2>
	    <div class="hr-style"></div>
	    </div>

	    <div class="col-xs-6 col-sm-8 bkiri">
	      <br>
			<?php echo form_open('home/search_jurusan');?>
				<input type="text" placeholder="Berdasarkan Nama Jurusan" size="50" name="search">
				<button class="btn btn-warning">Cari</button>
			</form>
			<br>
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
					foreach($sjur as $row):?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $row->NAMA_JURUSAN?></td>
				</tr>
				<?php
					$no++;
					endforeach;
				?>
		      </tbody>
		    </table>
		   </div>
</div>