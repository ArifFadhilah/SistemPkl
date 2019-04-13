<!-- 
SISTEM INFORMASI SISWA/MAHASISWA PKL/RISET DI PT.INTI BANDUNG, INDONESIA
Author  : Syifa Afifah Fitriani
email   : syifaafifahf@gmail.com
from Universitas Pendidikan Indonesia 
-->

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>Sistem Informasi Siswa PKL PT.INTI</title>

	<link rel="stylesheet" type="text/css" href="<?=base_url()?>other/css/style.css">

</head>
<body>
	<div class="container">
		<section class="main">
			<center>
				<div class="judul">
				<img src="<?=base_url()?>other/images/judul.png">
				</div>
			</center>
			<center><p style="font-family: sans-serif;"><p><?php echo validation_errors(); ?></p></center>
			<center><p style="font-family: sans-serif;"><?php echo $this->session->flashdata('notification');?></p></center>
			<form class="form-login clearfix" action="<?=base_url()?>index.php/admin" method="post">
				<p>
					<input type="text" id="login" name="username" placeholder="Username">
				        <input type="password" name="password" id="password" placeholder="Password"> 
				</p>
				<button type="submit" name="submit">
			    	<i class="icon-arrow-right"></i>
			    	<span>Log In</span>
			    </button> 
			</form>

		</section>
		<center>
			<a href="<?=base_url();?>index.php/home/gohome">Kembali ke halaman utama</a>
		</center>
	</div>

	<div class="footer">
		<hr>
		<center>
			Syifa Afifah Fitriani &copy 2014
		</center>
	</div>
</body>
</html>
