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
        <li><a href="<?=base_url()?>index.php/admin/admin_pkl" class="current">PKL/Riset</a></li>
        <li><a href="<?=base_url()?>index.php/admin/pembimbing">Pembimbing</a></li>
        <li><a href="<?=base_url()?>index.php/admin/admin_lembaga" >Lembaga</a></li>
        <li><img src="<?=base_url();?>other/images/nav_logo.png"></a>
        <li><a href="<?=base_url()?>index.php/admin/admin_jurusan" >Jurusan</a></li>
        <li><a href="<?=base_url()?>index.php/admin/admin_urdiklat" >Ka.Urusan &<br>Surat</a></li>
        <li><a href="<?=base_url()?>index.php/admin/logout">Log Out</a></li>
    </ul>
  </div>
    <div class="clearfix"></div>
</div>

<!-- content -->
<div class="container">
  <h3>UBAH ADMIN</h3>
  <div class="hr-style"></div>
  
  <?php echo form_open('admin/exe_updateadmin');?>
  <div class="row">
    <div class="col-md-6">
      <input type="hidden" value="<?php echo $admin->id_admin?>" name="id_admin">
      <table class="table">
        <tr>
          <td>Username</td>
          <td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $admin->username?>" name="username" required></td>
        </tr>
        <tr>
          <td>Password</td>
          <td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $admin->password?>" name="password" required></td>
        </tr>
      </table>
      <div class="hr-style2"></div>
      <input type="submit" name="upload" class="btn btn-warning" value="Update">

    </div>
  </form>
    </div>

</div>