<!-- 
SISTEM INFORMASI SISWA/MAHASISWA PKL/RISET DI PT.INTI BANDUNG, INDONESIA
Author  : Syifa Afifah Fitriani
email   : syifaafifahf@gmail.com
from Universitas Pendidikan Indonesia 
-->

<script type="text/javascript"> 

  //dissable tombol enter
  function stopRKey(evt) { 
    var evt = (evt) ? evt : ((event) ? event : null); 
    var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null); 
    if ((evt.keyCode == 13) && (node.type=="text"))  {return false;} 
  } 

  document.onkeypress = stopRKey; 

</script>

<!-- menu -->
<div class="headers">
	<div class="container">
    <ul id="nav" style="margin-left:110px;">
        <li><a href="<?=base_url()?>index.php/admin/admin_pkl"  class="current">PKL/Riset</a></li>
        <li><a href="<?=base_url()?>index.php/admin/pembimbing">Pembimbing</a></li>
        <li><a href="<?=base_url()?>index.php/admin/admin_lembaga">Lembaga</a></li>
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
  <h3>INPUT DATA MAHASISWA PMMB</h3>
  <div class="hr-style"></div>

  <?php echo form_open('admin/insertpmmb');?>
  <div class="row">
    <div class="col-md-6">
      <h4>DATA LEMBAGA</h4>
      <table class="table">
        <tr>
          <td>Lembaga</td>
          <td>:</td>
          <td>
              <select class="form-control" name="lembaga">
                <?php foreach($lembaga as $row):
                  echo "<option value=".$row->ID_LEMBAGA.">".$row->NAMA_LEMBAGA."</option>";
                endforeach; ?>
              </select>
              <br>
              <a href="#lembaga">Masukkan Data Lembaga</a>
          </td>
        </tr>
        <tr>
          <td>Jurusan</td>
          <td>:</td>
          <td>
              <select class="form-control" name="jurusan">
                <?php foreach($jurusan as $rows):
                  echo "<option value=".$rows->ID_JURUSAN.">".$rows->NAMA_JURUSAN."</option>";
                endforeach; ?>
              </select>
              <br>
              <a href="#jurusan">Masukkan Data Jurusan</a>
          </td>
        </tr>
        <tr>
          <td>Program Pendidian</td>
          <td>:</td>
          <td>
              <select class="form-control" name="prog_pend">>
                <option value="SMK">SMK</option>
                <option value="SMA">SMA</option>
                <option value="D1">D1</option>
                <option value="D2">D2</option>
                <option value="D3">D3</option>
                <option value="D4">D4</option>
                <option value="S1">S1</option>
                <option value="S2">S2</option>
                <option value="S3">S3</option>
              </select>
          </td>
        <tr>
          <td>Pembimbing Lembaga</td>
          <td>:</td>
          <td><input type="text" class="form-control" name="nama_pemb_lembaga"></td>
        </tr>
        <tr>
          <td>Telepon Pembimbing Lembaga</td>
          <td>:</td>
          <td><input type="text" class="form-control" name="telp_pemb_lembaga"></td>
        </tr>
        </tr>
         <tr>
          <td>Batch PMMB</td>
          <td>:</td>
          <td><input type="text" class="form-control" name="batch"></td>
        </tr>
      </table>
    </div>
    <div class="col-md-6 clearfix">
    <H4>DATA MAHASISWA</H4>
      
      <table class="table">
        <tr>      
          <td>Nomor</td>
          <td>:</td>
          <td>
          <?php
            foreach($nmrpmmb as $row):?>
            <input type="text" class="form-control" name="no" value="<?php echo $row->nomor+1?>" readonly="readonly"></td>
          <?php endforeach;
          ?>         
        </tr>
        <tr>
          <td>Tanggal Daftar</td>
          <td>:</td>
          <td><input type="date" class="form-control" name="tanggal" required></td>
        </tr>
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td><input type="text" class="form-control" name="nm_siswa" required></td>
        </tr>
        <tr>
          <td>NRP/NIK</td>
          <td>:</td>
          <td><input type="text" class="form-control" name="nrp_siswa" required></td>
        </tr>
        <tr>
          <td>Tanggal Awal</td>
          <td>:</td>
          <td><input type="date" class="form-control" name="tgl_awal" required></td>
        </tr>
        <tr>
          <td>Tanggal Akhir</td>
          <td>:</td>
          <td><input type="date" class="form-control" name="tgl_akhir" required></td>
        </tr>
        <tr>
          <td>Alamat Siswa</td>
          <td>:</td>
          <td><input type="text" class="form-control" name="alamat_siswa"></td>
        </tr>
        <tr>
          <td>Telepon</td>
          <td>:</td>
          <td><input type="text" class="form-control" name="telp_siswa"></td>
        </tr>
        <tr>
          <td>Email</td>
          <td>:</td>
          <td><input type="text" class="form-control" name="email"></td>
        </tr>
        
      </table>
    </div>
   
    <div class="col-md-12">
   <div class="hr-style2"></div>
   <H4>DATA PEMBIMBING</H4>
      <table class="table">
        <tr>
          <td>Pembimbing</td>
          <td>:</td>
          <td>
              <select class="form-control" name="nama_pemb">
                <?php foreach($pembimbing as $rows):
                  echo "<option value=".$rows->ID_PEMBIMBING.">".$rows->NAMA."</option>";
                endforeach; ?>
              </select>
          </td>
        </tr>
        
        <tr>
          <td>an. Ka.Urusan Diklat</td>
          <td>:</td>
          <td>
              <select class="form-control" name="an_ka_urdiklat">
                <?php foreach($urdiklat as $rows):
                  echo "<option value=".$rows->id_urdiklat.">".$rows->AN_KA_URDIKLAT."</option>";
                endforeach; ?>
              </select>
              <br>
             <a href="#urdiklat">Masukkan Data Urdiklat</a>
          </td>
        </tr>
        </table>
        <div class="hr-style2"></div>

        <h4>KETERANGAN</h4>
        <table class="table">
        <tr>
          <td>VIA</td>
          <td>:</td>
          <td><input type="text" class="form-control" name="via"></td>
        </tr>
        <tr>
          <td>Keterangan</td>
          <td>:</td>
          <td><input type="text" class="form-control" name="keterangan"></td>
        </tr>
      </table>
      <div class="hr-style2"></div>
      <input type="submit" name="upload" class="btn btn-warning" value="Submit" name="submit_insert">
    </div>
  </div>
  </form>

    <!-- input data jurusan -->
    <a href="#x" class="overlay" id="jurusan"></a>
        <div class="popup">
            <?php echo form_open('admin/exe_insert_jurusan?stat=2');?>
                <h4>INPUT JURUSAN</h4>
                <div class="hr-style2"></div>
                <table class="table">
                    <tr>
                      <td>Nama Jurusan</td>
                      <td>:</td>
                      <td><input type="text" class="form-control" name="nama_jurusan" required></td>
                    </tr>
                </table>
                
                <div class="hr-style2"></div>
                <center><input type="submit" class="btn btn-warning" value="Submit Jurusan" name="satu"></center>
            </form>

            <a class="close" href="#close"></a>
        </div>

    <!-- input data lembaga -->
    <a href="#x" class="overlay" id="lembaga"></a>
        <div class="popup">
            <?php echo form_open('admin/exe_insert_lembaga?stat=2');?>
                <h4>INPUT LEMBAGA</h4>
                <div class="hr-style2"></div>
                <table class="table">
                    <tr>
                      <td>Nama Lembaga</td>
                      <td>:</td>
                      <td><input type="text" class="form-control" name="nama_lembaga" required></td>
                    </tr>
                    <tr>
                      <td>Alamat Lembaga</td>
                      <td>:</td>
                      <td><input type="text" class="form-control" name="alamat_lembaga"></td>
                    </tr>
                    <tr>
                      <td>Telepon Lembaga</td>
                      <td>:</td>
                      <td><input type="text" class="form-control" name="telp_lembaga"></td>
                    </tr>
                    <tr>
                      <td>Email Lembaga</td>
                      <td>:</td>
                      <td><input type="text" class="form-control" name="email_lembaga"></td>
                    </tr>
                </table>
                
                <div class="hr-style2"></div>
                <center><input type="submit" class="btn btn-warning" value="Submit Lembaga" name="dua"></center>
            </form>

            <a class="close" href="#close"></a>
        </div>

    <!-- input data urdiklat -->
    <a href="#x" class="overlay" id="urdiklat"></a>
        <div class="popup">
            <?php echo form_open('admin/exe_insert_urdiklat?stat=2');?>
                <h4>INPUT LEMBAGA</h4>
                <div class="hr-style2"></div>
                <table class="table">
                    <tr>
                      <td>an. Ka.Urusan Diklat</td>
                      <td>:</td>
                      <td><input type="text" class="form-control" name="an_ka_urdiklat" required></td>
                    </tr>
                    <tr>
                      <td>NP</td>
                      <td>:</td>
                      <td><input type="text" class="form-control" name="np" required></td>
                    </tr>
                </table>
                
                <div class="hr-style2"></div>
                <center><input type="submit" class="btn btn-warning" value="Submit" name="tiga"></center>
            </form>

            <a class="close" href="#close"></a>
        </div>
        
</div>