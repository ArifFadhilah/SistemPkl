<div class="container">
	<!-- <div class='ribbon'>
	    <a href='#'><span>Home</span></a>
	    <a href='#'><span>About</span></a>
	    <a href='#'><span>Services</span></a>
	    <a href='#'><span>Contact</span></a>
	</div> -->
	<nav class="bforenav navbar navbar-inverse" role="navigation">
		<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <a class="navbar-brand" href="#"></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9">
		  <ul class="nav navbar-nav">
		    <li><a href="<?=base_url()?>index.php/home/gohome">HOME</a></li>
		    <li class="active"><a href="<?=base_url()?>index.php/home/pkl">PKL</a></li>
		    <li><a href="<?=base_url()?>index.php/home/pembimbing">PEMBIMBING</a></li>
		    <li><a href="<?=base_url()?>index.php/home/smart">SMART</a>
		  </ul>
		</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>

	<h3>Masukkan Data Siswa PKL PT.INTI</h3>
	<hr>
	
	<div class="row">
	<form>
		<div class="col-xs-6 ">
		<div class="form-horizontal form1" role="form">
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Tanggal</label>
			    <div class="col-sm-10">
			      <input type="date" class="form-control" id="inputEmail3">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Nama Siswa</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="Nama Siswa">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">NRP Siswa</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="Nomor Induk Siswa">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Awal</label>
			    <div class="col-sm-10">
			      <input type="date" class="form-control" id="inputEmail3">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Akhir</label>
			    <div class="col-sm-10">
			      <input type="date" class="form-control" id="inputEmail3">
			    </div>
			  </div>
			</div>
		</div>
 		<div class="col-xs-6 ">
		<div class="form-horizontal form1" role="form">
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Lembaga</label>
				<div class="col-sm-10">
				  	<select class="form-control">
						<option>Universitas Pendidikan Indonesia</option>
						<option>Universitas Indonesia</option>
						<option>Institut Teknologi Bandung</option>
						<option>Universitas Padjajaran</option>
					</select>
					<a href="">Tambah Lembaga</a>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Jurusan</label>
				<div class="col-sm-10">
				  	<select class="form-control">
						<option>Rekayasa Perangkat Lunak</option>
						<option>Jaringan</option>
						<option>Sistem Informasi</option>
						<option>Management</option>
					</select>
					<a href="">Tambah Jurusan</a>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Program Pendidikan</label>
				<div class="col-sm-10">
				  	<div class="radio">
					  <label>
					    <input type="radio" name="optionsRadios" id="" value="" checked>
					    SMK
					  </label>
					</div>
					<div class="radio">
					  <label>
					    <input type="radio" name="optionsRadios" id="" value="">
					    D1
					  </label>
					</div>
					<div class="radio">
					  <label>
					    <input type="radio" name="optionsRadios" id="" value="">
					    D2
					  </label>
					</div>
					<div class="radio">
					  <label>
					    <input type="radio" name="optionsRadios" id="" value="">
					    D3
					  </label>
					</div>
					<div class="radio">
					  <label>
					    <input type="radio" name="optionsRadios" id="" value="">
					    S1
					  </label>
					</div>
					<div class="radio">
					  <label>
					    <input type="radio" name="optionsRadios" id="" value="">
					    S2
					  </label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">Jenis PKL</label>
				<div class="col-sm-10">
					<div class="radio">
					  <label>
					    <input type="radio" name="optionsRadios" id="" value="">
					    PKL
					  </label>
					</div>
					<div class="radio">
					  <label>
					    <input type="radio" name="optionsRadios" id="" value="">
					    RISET
					  </label>
					</div>
				</div>
			</div>
			</div>
		</div>

		<div class="clearfix"></div>

		<br>
		<div class="col-xs-12 ">
		<div class="form-horizontal form1" role="form">
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Divisi</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputEmail3" placeholder="Divisi">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Bagian</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="Bagian">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Pembimbing</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="Pembimbing">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">an. Ka.Urusan Diklat</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="Kasnanta Suwita">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">NIP</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="PP.19870131">
			    </div>
			  </div>
			  <hr>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Alamat Siswa</label>
			    <div class="col-sm-10">
			      <textarea class="form-control" rows="3"></textarea>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Telp. Siswa</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="Nomor Telepon Siswa">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Email Siswa</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="Email Siswa">
			    </div>
			  </div>
			  <hr>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Telp Lembaga</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="Nomor Telepon Lebaga">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Email Lembaga</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="Email Lembaga">
			    </div>
			  </div>
			  <hr>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Nama Pembimbing Lembaga</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="Nama Pembimbing Lembaga">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Telp Pembimbing Lembaga</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="Nomor Telepon Pembimbing Lembaga">
			    </div>
			  </div>
			  <hr>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">VIA</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Keteranga</label>
			    <div class="col-sm-10">
			      <textarea class="form-control" rows="3"></textarea>
			    </div>
			  </div>

			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-info">Submit</button>
			    </div>
			  </div>
			</div>
		</div>

	</form>
	</div>
</div>