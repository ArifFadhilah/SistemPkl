<div class="header">
	<div class="container">
		<ul id="nav">
            <li><a href="<?=base_url();?>index.php/home/gohome" class="current">Home</a></li>
            <li><a href="<?=base_url()?>index.php/home/prosedur" >Prosedur</a></li>
            <li><a href="<?=base_url()?>index.php/home/pkl">PKL/Riset/<br>Observasi</a></li>
            <li><a href="<?=base_url()?>index.php/home/lembaga">Lembaga</a></li>
            <li><img src="<?=base_url();?>other/images/nav_logo.png"></a>
            <li><a href="<?=base_url()?>index.php/home/jurusan">Jurusan</a></li>
            <li><a href="<?=base_url()?>index.php/home/laporan">Laporan</a></li>
            <li><a href="<?=base_url()?>index.php/home/smart">Sistem<br>Cerdas</a></li>
            <li><a href="<?=base_url()?>index.php/home/login">Admin</a></li>
        </ul>
        <div class="clearfix"></div>

		<center>
			<div class="moto">
				<!-- "Menjadi Pilihan Pertama Bagi Pelanggan Dalam<br> Mentransformasikan Mimpi Menjadi Kenyataan" -->
				<img src="<?=base_url();?>other/images/islamic-wallpaper.png" width="150px" height="100px">
			</div>
			<br>
			<div class="fwhite">PT. Industri Telekomunikasi Indonesia</div>
			<br>
			<a href="http://www.inti.co.id/"><button type="button" class="btn btn-warning btn-lg">KUNJUNGI WEBSITE RESMI PT.INTI</button></a>
		</center>
	</div>
</div>

<div class="container">
	<div class="row mtop">
		<div class="col-xs-3 form1">
			<p style="text-align:center; font-weight:bold;">DATA SISWA/MAHASISWA RISET TERBARU</p>
			<div class="hr-style"></div>
			<table class="table table-hover form1">
		        <thead>
		          <tr>
		            <th>No.</th>
		            <th>Nama Siswa</th>
		            <th>Lembaga</th>
		          </tr>
		        </thead>            

		        <tbody>
		          <?php 
		            $no = 1;
		            foreach($riset as $row):?>
		          <tr>
		            <td><?php echo $no?></td>
		            <td><a href="<?php echo (site_url('home/detail_mhs' . '/' . $row->ID_PKL));?>"><?php echo $row->NM_SISWA?></a></td>
		            <td><?php echo $row->LEMBAGA?></td>
		          </tr>
		          <?php
		              $no++;
		              endforeach;
		            ?>
		        </tbody>
		      </table>
		</div>
		<div class="col-xs-6">
			<p style="text-align:justify;">Website ini merupakan Sistem Informasi Siswa/uMahasiswa yang melaksanakan PKL (Praktek Kerja Lapangan), Riset di PT.  Industri Telekomunikasi Indonesia (PT. INTI) yang beralamat di Moh. Toha No 77 Bandung 40253, Indonesia. Di dalam website ini juga terdapat Sistem Rekomendasi penerimaan Siswa/Mahasiswa yang ingin melaksanakan PKL di PT. INTI berdasarkan history lembaga pendidikannya. <br>Di harapkan website ini dapat memudahkan penggunanya baik itu admin maupun pihak-pihak yang membutuhkan informasi tersebut.   </p>
			<div class="hr-style2"></div>
			<p style="text-align: center;">PENDAHULUAN</p>
			<p style="text-align: justify;">Di bawah Lembaga Pendidikan, kerja praktek/Riset merupakan mata kuliah wajib yang harus diambil oleh setiap siswa/mahasiswa. Untuk itulah PT. INTI sudah sejak beberapa tahun silam membantu para siswa/mahasiswa untuk belajar mengaplikasikan ilmunya di dunia kerja dan menjadi upaya yang efektif untuk menjembatani kesenjangan teori yang diterima para siswa/mahasiswa di perkuliahan dengan tantangan implementasi teori di dunia kerja nyata.<br><br>
			Agar penerimaan, penempatan dan pelaksanaan praktek kerja lapangan/riset di PT. INTI ini berjalan dengan baik yang akan berdampak pada citra perusahaan, maka perlu dibuat prosedur yang menjadi acuan para siswa/mahasiswa melakukan kerja praktek/riset di PT. INTI.</p>
			<center>
				<a href="<?=base_url()?>index.php/home/prosedur"><button type="button" class="btn btn-warning btn-lg">PROSEDUR PENGAJUAN PKL/RISET/OBSERVASI</button></a>
			</center>
		</div>
		<div class="col-xs-3 form1">
			<p style="text-align:center; font-weight:bold;">DATA SISWA/MAHASISWA PKL TERBARU</p>
			<div class="hr-style"></div>
			<table class="table table-hover form1">
		        <thead>
		          <tr>
		            <th>No.</th>
		            <th>Nama Siswa</th>
		            <th>Lembaga</th>
		          </tr>
		        </thead>            

		        <tbody>
		          <?php 
		            $no = 1;
		            foreach($pkl as $row):?>
		          <tr>
		            <td><?php echo $no?></td>
		            <td><a href="<?php echo (site_url('home/detail_mhs' . '/' . $row->ID_PKL));?>"><?php echo $row->NM_SISWA?></a></td>
		            <td><?php echo $row->LEMBAGA?></td>
		          </tr>
		          <?php
		              $no++;
		              endforeach;
		            ?>
		        </tbody>
		      </table>
		</div>
	</div>
	<div class="clearfix"></div>

	<div class="row mtop">
		<div class="col-xs-12 form1">
			<p style="text-align:center; font-weight:bold;">DATA SISWA/MAHASISWA OBSERVASI TERBARU</p>
			<div class="hr-style"></div>
			<table class="table table-hover form1">
		        <thead>
		          <tr>
		            <th>No.</th>
		            <th>Nama Siswa</th>
		            <th>Lembaga</th>
		            <th>Bagian</th>
		            <th>Divisi</th>
		            <th>Pembimbing</th>
		          </tr>
		        </thead>            

		        <tbody>
		          <?php 
		            $no = 1;
		            foreach($observasi as $row):?>
		          <tr>
		            <td><?php echo $no?></td>
		            <td><a href="<?php echo (site_url('home/detail_mhs' . '/' . $row->ID_PKL));?>"><?php echo $row->NM_SISWA?></a></td>
		            <td><?php echo $row->LEMBAGA?></td>
		            <td><?php echo $row->BAGIAN?></td>
		            <td><?php echo $row->DIVISI?></td>
		            <td><?php echo $row->NAMA_PEMB?></td>
		          </tr>
		          <?php
		              $no++;
		              endforeach;
		            ?>
		        </tbody>
		      </table>
		</div>
	</div>
</div>