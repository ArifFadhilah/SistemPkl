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
        <li><a href="<?=base_url()?>index.php/admin/pembimbing"  class="current">Pembimbing</a></li>
        <li><a href="<?=base_url()?>index.php/admin/admin_lembaga"  >Lembaga</a></li>
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
  <h3>DETAIL DATA PEMBIMBING</h3>
  <div class="hr-style"></div>

  <?php echo form_open('admin/exe_updatepemb');?>
  <div class="row">
    <div class="col-md-6">
      <input type="hidden" value="<?php echo $mhs->ID_PEMBIMBING?>" name="id_pembimbing">
      <table class="table">
        <tr>
          <td>NIP</td>
          <td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $mhs->NIP?>" name="nip" required></td>
        </tr>
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $mhs->NAMA?>" name="nama" required></td>
        </tr>
        <tr>
          <td>Divisi</td>
          <td>:</td>
          <td>
              <select class="form-control" name="divisi">
                <option value="<?php echo $mhs->DIVISI?>"><?php echo $mhs->DIVISI?></option>
                <?php foreach($divisi as $row):
                  echo "<option value".$row->DIVISI.">".$row->DIVISI."</option>";
                endforeach; ?>
              </select>
          </td>
        </tr>
        <tr>
          <td>Bagian</td>
          <td>:</td>
          <td>
              <select class="form-control" name="bagian">
                <option value="<?php echo $mhs->BAGIAN?>"><?php echo $mhs->BAGIAN?></option>
                <?php foreach($bagian as $row):
                  echo "<option value".$row->BAGIAN.">".$row->BAGIAN."</option>";
                endforeach; ?>
              </select>
          </td>
        </tr>
        <tr>
          <td>NIP Atasan</td>
          <td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $mhs->NIP_ATASAN?>" name="nip_atasan" required></td>
        </tr>
        <tr>
          <td>Nama Atasan</td>
          <td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $mhs->NAMA_ATASAN?>" name="nama_atasan" required></td>
        </tr>
        <tr>
          <td>Nama Jabatan</td>
          <td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $mhs->NAMA_JABATAN?>" name="nama_jabatan"></td>
        </tr>
      </table>
      <div class="hr-style2"></div>
      <input type="submit" name="upload" class="btn btn-warning" value="Update">

    </div>
  </form>
    </div>

</div>