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
        <li><a href="<?=base_url()?>index.php/admin/admin_lembaga" >Lembaga</a></li>
        <li><img src="<?=base_url();?>other/images/nav_logo.png"></a>
        <li><a href="<?=base_url()?>index.php/admin/admin_jurusan" >Jurusan</a></li>
        <li><a href="<?=base_url()?>index.php/admin/admin_urdiklat" class="current">Ka.Urusan &<br>Surat</a></li>
        <li><a href="<?=base_url()?>index.php/admin/logout">Log Out</a></li>
    </ul>
  </div>
    <div class="clearfix"></div>
</div>

<!-- content -->
<div class="container">
  <h3>UBAH NOMOR SURAT</h3>
  <div class="hr-style"></div>

  <?php echo form_open('admin/exe_updatesurat');?>
  <div class="row">
    <div class="col-md-6">
      <input type="hidden" value="<?php echo $mhs->id_surat?>" name="id_surat">
      <table class="table">
        <tr>
          <td>No. Surat</td>
          <td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $mhs->kode?>" name="kode" required></td>
        </tr>
      </table>
      <div class="hr-style2"></div>
      <input type="submit" name="upload" class="btn btn-warning" value="Update">

    </div>
  </form>
    </div>

</div>