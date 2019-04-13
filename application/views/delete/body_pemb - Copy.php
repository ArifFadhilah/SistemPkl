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
		    <li><a href="<?=base_url()?>index.php/home/pkl">PKL</a></li>
		    <li class="active"><a href="<?=base_url()?>index.php/home/pembimbing">PEMBIMBING</a></li>
		    <li><a href="<?=base_url()?>index.php/home/smart">SMART</a>
		  </ul>
		</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>

	<div class="form-group">
	    <label for="exampleInputFile"><h3>Upload Data Pembimbing Terbaru</h3></label>
	    <input type="file" id="exampleInputFile">
	    <p class="help-block">Upload file excel yang berisikan data pembimbing terbaru.</p>
	</div>
	<hr>

	<h3>Data Pembimbing PT.INTI</h3>

	<form>
		<input type="text">
		<button class="btn btn-info">Cari</button>
	</form>
	<table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>NIP</th>
          <th>Nama</th>
          <th>Divisi</th>
          <th>Bagian</th>
          <th>NIP Atasan</th>
          <th>Nama Atasan</th>
          <th>Jabatan</th>
        </tr>
      </thead>						

      <tbody>
		<tr>
			<td>1</td>
			<td>PP.199801013</td>
			<td>KUSNO PRIJONO</td>
			<td>HUMAN CAPITAL MANAGEMENT</td>
			<td>-</td>
			<td>DD.0903003</td>
			<td>DAYU P. RENGGANIS</td>
			<td>KA. DIVISI HUMAN CAPITAL MANAGEMENT</td>
		</tr>
       	<tr>
			<td>1</td>
			<td>PP.199801013</td>
			<td>KUSNO PRIJONO</td>
			<td>HUMAN CAPITAL MANAGEMENT</td>
			<td>-</td>
			<td>DD.0903003</td>
			<td>DAYU P. RENGGANIS</td>
			<td>KA. DIVISI HUMAN CAPITAL MANAGEMENT</td>
		</tr>
		<tr>
			<td>1</td>
			<td>PP.199801013</td>
			<td>KUSNO PRIJONO</td>
			<td>HUMAN CAPITAL MANAGEMENT</td>
			<td>-</td>
			<td>DD.0903003</td>
			<td>DAYU P. RENGGANIS</td>
			<td>KA. DIVISI HUMAN CAPITAL MANAGEMENT</td>
		</tr>
      </tbody>
    </table>
</div>
