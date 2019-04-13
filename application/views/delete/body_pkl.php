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

	<center>
		<a href="<?=base_url()?>index.php/home/input_mhs"><button class="btn btn-info btn-lg">Masukkan Data Siswa PKL</button></a>
	</center>

	<hr>
	<h3>Data Siswa PKL PT.INTI</h3>

	<form>
		<input type="text">
		<button class="btn btn-info">Cari</button>
	</form>

	<table class="table table-hover">
      <thead>
        <tr>
          <th>NO</th>
          <th>Tanggal</th>
          <th>Nama Siswa</th>
          <th>Lembaga</th>
          <th>Jurusan</th>
          <th>Divisi</th>
          <th>Bagian</th>
          <th>Tanggal Awal</th>
          <th>Tanggal Akhir</th>
          <th>Pembimbing</th>
          <th>Action</th>
        </tr>
      </thead>						

      <tbody>
		<tr>
			<td>1</td>
			<td>6-Jan-2014</td>
			<td>GAGAN PRIATNA</td>
			<td>SML AN-NUR PACET</td>
			<td>Rekayasa Perangkat Lunak</td>
			<td>SEKPER</td>
			<td>PKBL</td>
			<td>01 April 2014</td>
			<td>31 Mei 2014</td>
			<td>SURYAMAN DAHLAN</td>
			<td>
				<button type="button" class="btn btn-info btn-xs">
					edit
				</button>
				<button type="button" class="btn btn-info btn-xs">
					delete
				</button>
			</td>
		</tr>
		<tr>
			<td>1</td>
			<td>6-Jan-2014</td>
			<td>GAGAN PRIATNA</td>
			<td>SML AN-NUR PACET</td>
			<td>Rekayasa Perangkat Lunak</td>
			<td>SEKPER</td>
			<td>PKBL</td>
			<td>01 April 2014</td>
			<td>31 Mei 2014</td>
			<td>SURYAMAN DAHLAN</td>
			<td>
				<button type="button" class="btn btn-info btn-xs">
					edit
				</button>
				<button type="button" class="btn btn-info btn-xs">
					delete
				</button>
			</td>
		</tr>
		<tr>
			<td>1</td>
			<td>6-Jan-2014</td>
			<td>GAGAN PRIATNA</td>
			<td>SML AN-NUR PACET</td>
			<td>Rekayasa Perangkat Lunak</td>
			<td>SEKPER</td>
			<td>PKBL</td>
			<td>01 April 2014</td>
			<td>31 Mei 2014</td>
			<td>SURYAMAN DAHLAN</td>
			<td>
				<button type="button" class="btn btn-info btn-xs">
					edit
				</button>
				<button type="button" class="btn btn-info btn-xs">
					delete
				</button>
			</td>
		</tr>
      </tbody>
    </table>
</div>
