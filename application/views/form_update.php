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
        <li><a href="<?=base_url()?>index.php/admin/pembimbing"  >Pembimbing</a></li>
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
  <h3>DETAIL DATA SISWA/MAHASISWA</h3>
  <div class="hr-style"></div>

  <?php echo form_open('admin/exe_update');?>
  <div class="row">
    <div class="col-md-6">
      <h4>DATA SISWA/MAHASISWA</h4>
      <input type="hidden" value="<?php echo $mhs->ID_PKL?>" name="id_pkl">
      <table class="table">
        <tr>
          <td>Nomor</td>
          <td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $mhs->NO?>" name="no"></td>
        </tr>
        <tr>
          <td>Tanggal Daftar</td>
          <td>:</td>
          <td><input type="date" class="form-control" value="<?php echo $mhs->TANGGAL?>" name="tanggal"></td>
        </tr>
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $mhs->NM_SISWA?>" name="nm_siswa" ></td>
        </tr>
        <tr>
          <td>NRP</td>
          <td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $mhs->NRP_SISWA?>" name="nrp_siswa" ></td>
        </tr>
        <tr>
          <td>Tanggal Awal</td>
          <td>:</td>
          <td>
            <?php 
              $date = $mhs->TGL_AWAL;
              if(substr($date, 4, 1) != "-")
              {
                echo "<input type='text' class='form-control' value='". $mhs->TGL_AWAL ."' name='tgl_awal'>";
              }
              else
              {
                echo "<input type='date' class='form-control' value='". $mhs->TGL_AWAL ."' name='tgl_awal'>";
              }
            ?>
          </td>
        </tr>
        <tr>
          <td>Tanggal Akhir</td>
          <td>:</td>
          <td>
            <?php 
              $date = $mhs->TGL_AKHIR;
              if(substr($date, 4, 1) != "-")
              {
                echo "<input type='text' class='form-control' value='". $mhs->TGL_AKHIR ."' name='tgl_akhir'>";
              }
              else
              {
                echo "<input type='date' class='form-control' value='". $mhs->TGL_AKHIR ."' name='tgl_akhir'>";
              }
            ?>
          </td>
        </tr>
        <tr>
          <td>Alamat Siswa</td>
          <td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $mhs->ALAMAT_SISWA?>" name="alamat_siswa"></td>
        </tr>
        <tr>
          <td>Telepon</td>
          <td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $mhs->TELP_SISWA?>" name="telp_siswa"></td>
        </tr>
        <tr>
          <td>Email</td>
          <td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $mhs->EMAIL?>" name="email"></td>
        </tr>
      </table>
    </div>
    <div class="col-md-6 clearfix">
    <H4>DATA LEMBAGA</H4>
      <table class="table">
        <tr>
          <td>Lembaga</td>
          <td>:</td>
          <td>
              <select class="form-control" name="lembaga">
                <option value="<?php echo $mhs->LEMBAGA?>"><?php echo $mhs->LEMBAGA?></option>
                <?php foreach($lembaga as $row):
                  echo "<option value".$row->NAMA_LEMBAGA.">".$row->NAMA_LEMBAGA."</option>";
                endforeach; ?>
              </select>
          </td>
        </tr>
        <tr>
          <td>Jurusan</td>
          <td>:</td>
          <td>
              <select class="form-control" name="jurusan">
                <option value="<?php echo $mhs->JURUSAN?>"><?php echo $mhs->JURUSAN?></option>
                <?php foreach($jurusan as $rows):
                  echo "<option value".$rows->NAMA_JURUSAN.">".$rows->NAMA_JURUSAN."</option>";
                endforeach; ?>
              </select>
          </td>
        </tr>
        <tr>
          <td>Program Pendidian</td>
          <td>:</td>
          <td>
              <select class="form-control" name="prog_pend">
                <option value="<?php echo $mhs->PROG_PEND?>"><?php echo $mhs->PROG_PEND?></option>
                <?php $temp="SMK";
                  if($temp!=$mhs->PROG_PEND)
                  echo "<option value='SMK'>SMK</option>";?>
                <?php $temp="SMA";
                  if($temp!=$mhs->PROG_PEND)
                  echo "<option value='SMA'>SMA</option>";?>
                <?php $temp="D1";
                  if($temp!=$mhs->PROG_PEND)
                  echo "<option value='D1'>D1</option>";?>
                <?php $temp="D2";
                  if($temp!=$mhs->PROG_PEND)
                  echo "<option value='D2'>D2</option>";?>
                <?php $temp="D3";
                  if($temp!=$mhs->PROG_PEND)
                  echo "<option value='D3'>D3</option>";?>
                <?php $temp="D4";
                  if($temp!=$mhs->PROG_PEND)
                  echo "<option value='D4'>D4</option>";?>
                <?php $temp="S1";
                  if($temp!=$mhs->PROG_PEND)
                  echo "<option value='S1'>S1</option>";?>
                <?php $temp="S2";
                  if($temp!=$mhs->PROG_PEND)
                  echo "<option value='S2'>S2</option>";?>
                <?php $temp="S3";
                  if($temp!=$mhs->PROG_PEND)
                  echo "<option value='S3'>S3</option>";?>
              </select>
          </td>
        </tr>
        <tr>
          <td>Jenis PKL</td>
          <td>:</td>
          <td>
              <select class="form-control" name="jenis_pkl">
                <option value="<?php echo $mhs->JENIS_PKL?>"><?php echo $mhs->JENIS_PKL?></option>
                <?php $temp="PKL";
                  if($temp!=$mhs->JENIS_PKL)
                  echo "<option value='PKL'>PKL</option>";?>
                <?php $temp="RISET";
                  if($temp!=$mhs->JENIS_PKL)
                  echo "<option value='RISET'>RISET</option>";?>
              </select>
          </td>
        </tr>
        <tr>
          <td>Alamat Lembaga</td>
          <td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $mhs->ALAMAT_LEMBAGA?>" name="alamat_lembaga"></td>
        </tr>
        <tr>
          <td>Telepon Lembaga</td>
          <td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $mhs->TELP_LEMBAGA?>" name="telp_lembaga"></td>
        </tr>
        <tr>
          <td>Email Lembaga</td>
          <td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $mhs->EMAIL_LEMBAGA?>" name="email_lembaga"></td>
        </tr>
        <tr>
          <td>Pembimbing Lembaga</td>
          <td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $mhs->NAMA_PEMB_LEMBAGA?>" name="nama_pemb_lembaga"></td>
        </tr>
        <tr>
          <td>Telepon Pembimbing Lembaga</td>
          <td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $mhs->TELP_PEMB_LEMBAGA?>" name="telp_pemb_lembaga"></td>
        </tr>
      </table>
    </div>
   
    <div class="col-md-12">
   <div class="hr-style2"></div>
   <H4>DATA PEMBIMBING</H4>
      <table class="table">
        
        <tr>
          <td>Divisi</td>
          <td>:</td>
          <td>
              <select class="form-control" name="divisi">
                <option value="<?php echo $mhs->DIVISI?>"><?php echo $mhs->DIVISI?></option>
                <?php foreach($divisi as $rows):
                  echo "<option value".$rows->DIVISI.">".$rows->DIVISI."</option>";
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
                <?php foreach($bagian as $rows):
                  echo "<option value".$rows->BAGIAN.">".$rows->BAGIAN."</option>";
                endforeach; ?>
              </select>
          </td>
        </tr>
        <tr>
          <td>Pembimbing</td>
          <td>:</td>
          <td>
              <select class="form-control" name="nama_pemb">
                <option value="<?php echo $mhs->NAMA_PEMB?>"><?php echo $mhs->NAMA_PEMB?></option>
                <?php foreach($pembimbing as $rows):
                  echo "<option value".$rows->NAMA.">".$rows->NAMA."</option>";
                endforeach; ?>
              </select>
          </td>
        </tr>
        <tr>
          <td>NIP Pembimbing</td>
          <td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $mhs->NIP_PEMB?>" name="nip_pemb"></td>
        </tr>
        <tr>
          <td>Atasan Pembimbing</td>
          <td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $mhs->ATASAN?>" name="atasan"></td>
        </tr>
        <tr>
          <td>NIP Atasan Pembimbing</td>
          <td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $mhs->PP?>" name="pp"></td>
        </tr>
        <tr>
          <td>an. Ka.Urusan Diklat</td>
          <td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $mhs->AN_KA_URDIKLAT?>" name="an_ka_urdiklat"></td>
        </tr>
        <tr>
          <td>NIP an. Ka.Urusan Diklat</td>
          <td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $mhs->NP?>" name="np"></td>
        </tr>
        </table>
        <div class="hr-style2"></div>

        <h4>KETERANGAN</h4>
        <table class="table">
        <tr>
          <td>VIA</td>
          <td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $mhs->VIA?>" name="via"></td>
        </tr>
        <tr>
          <td>Keterangan</td>
          <td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $mhs->KETERANGAN?>" name="keterangan"><br>
          <p style="font-size:11px">Isi dengan kata "Beres" pada kolom keterangan untuk mencetak surat keterangan telah melaksanakn PKL/Riset di PT. INTI</td>
        </tr>
      </table>
      <div class="hr-style2"></div>
      <input type="submit" name="upload" class="btn btn-warning" value="Update">
    </div>
  </div>
  </form>
  
  <div class="hr-style2"></div>

  <!-- upload scan pdf surat permohonan -->
  <div class="col-md-6">
    <h4>UPLOAD HASIL SCAN SURAT PERMOHONAN(PDF)</h4>
      <?php if (isset($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('success') == TRUE): ?>
            <div class="alert alert-info"><?php echo $this->session->flashdata('success'); ?></div>
        <?php endif; ?>
      <form method="post" action="<?=base_url()?>index.php/admin/uploadpdfpengantar" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $mhs->ID_PKL?>"><br><br>
          <input type="file" name="userfile" ><br><br>
          <input type="submit" name="submit" value="Upload" class="btn btn-danger">
      </form>  
  </div>
  <div class="col-md-6">
    <h4>UPLOAD HASIL SCAN SURAT PERNYATAAN PKL/RISET(PDF)</h4>
      <?php if (isset($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('success') == TRUE): ?>
            <div class="alert alert-info"><?php echo $this->session->flashdata('success'); ?></div>
        <?php endif; ?>
      <form method="post" action="<?=base_url()?>index.php/admin/uploadpdfbalasan" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $mhs->ID_PKL?>"><br><br>
          <input type="file" name="userfile" ><br><br>
          <input type="submit" name="submit" value="Upload" class="btn btn-danger">
      </form>  
  </div>
  

</div>