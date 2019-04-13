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
        <li><a href="<?=base_url()?>index.php/admin/pembimbing">Pembimbing</a></li>
        <li><a href="<?=base_url()?>index.php/admin/admin_lembaga"  class="current" >Lembaga</a></li>
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
  <h3>UBAH LEMBAGA</h3>
  <div class="hr-style"></div>

  <?php echo form_open('admin/exe_updatelembaga');?>
  <div class="row">
    <div class="col-md-6">
      <input type="hidden" value="<?php echo $mhs->ID_LEMBAGA?>" name="id_lembaga">
      <table class="table">
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $mhs->NAMA_LEMBAGA?>" name="nama_lembaga" required></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $mhs->ALAMAT_LEMBAGA?>" name="alamat_lembaga" ></td>
        </tr>
        <tr>
          <td>Telepon</td>
          <td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $mhs->TELP_LEMBAGA?>" name="telp_lembaga" ></td>
        </tr>
        <tr>
          <td>Email</td>
          <td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $mhs->EMAIL_LEMBAGA?>" name="email_lembaga" ></td>
        </tr>
      </table>
      <div class="hr-style2"></div>
      <input type="submit" name="upload" class="btn btn-warning" value="Update">

    </div>
  </form>
    </div>

</div>