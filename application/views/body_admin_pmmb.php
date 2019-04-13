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
  
  <!-- tombol input data -->
  <div class="col-xs-6 col-sm-3 r">
    <h3><?php echo $judul;?></h3>
    <div class="hr-style"></div>
    <p style="margin-top:5px;margin-bottom:5px;"><a href="<?=base_url()?>index.php/admin/view_insertpmmb"><button class="btn btn-warning">Masukkan Data Mahasiswa</button></a></p>
    <p style="margin-top:5px;margin-bottom:5px;"><a href="#lembaga"><button class="btn btn-warning">Masukkan Data Lembaga</button></a></p>
    <p style="margin-top:5px;margin-bottom:5px;"><a href="#jurusan"><button class="btn btn-warning">Masukkan Data Jurusan</button></a></p>
    <p style="margin-top:5px;margin-bottom:5px;"><a href="#urdiklat"><button class="btn btn-warning">Masukkan Data Ka.Urusan</button></a></p>
    <div class="hr-style2"></div>
    <p style="margin-top:5px;margin-bottom:5px;"><a href="<?=base_url()?>index.php/admin/admin_edit"><button class="btn btn-warning">Edit Admin</button></a></p>
  </div>

  <!-- select only pkl/ riset -->
  <div class="col-xs-6 col-sm-9 bkiri">
    <br>
    <a href="<?=base_url()?>index.php/admin/admin_pkl"><input type="submit" class="btn btn-warning" value="Seluruh Data Siswa"></a>
    <a href="<?=base_url()?>index.php/admin/subpkl"><input type="submit" class="btn btn-warning" value="Data Siswa PKL"></a>
    <a href="<?=base_url()?>index.php/admin/subriset"><input type="submit" class="btn btn-warning" value="Data Siswa Riset"></a>
    <a href="<?=base_url()?>index.php/admin/subpmmb"><input type="submit" class="btn btn-warning" value="Data Mahasiswa PMMB"></a>
    <a href="<?=base_url()?>index.php/admin/subselesai"><input type="submit" class="btn btn-warning" value="Siswa Selesai PKL/Riset"></a>
    <!-- <a href="<?=base_url()?>index.php/admin/subobservasi"><input type="submit" class="btn btn-warning" value="Data Siswa OBSERVASI/PENELITIAN"></a> -->

    <div class="hr-style2"></div>

    <!-- input data jurusan -->
    <a href="#x" class="overlay" id="jurusan"></a>
        <div class="popup">
            <?php echo form_open('admin/exe_insert_jurusan');?>
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
            <?php echo form_open('admin/exe_insert_lembaga');?>
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
            <?php echo form_open('admin/exe_insert_urdiklat');?>
                <h4>INPUT AN KA URDIKLAT</h4>
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

    <!-- search -->
    <div class="row">
      <div class="col-xs-4">
        <form action="<?=base_url()?>index.php/admin/search_pkl" method="post">
        <input type="text" placeholder="Berdasarkan Nama Siswa"  name="search">
        <!-- <input type="submit" class="btn btn-warning" value="Cari" name="cari"> -->
        <button class="btn btn-warning" name="cari">Cari</button>
      </form>
      </div>


      <div class="col-xs-4">
        <form action="<?=base_url()?>index.php/admin/search_pmmb_tahun" method="post">
          <input type="text" placeholder="Berdasarkan Tahun" name="search">
          <!-- <input type="submit" class="btn btn-warning" value="Cari" name="cari"> -->
          <button class="btn btn-warning" name="cari">Cari</button>
        </form>
      </div>
      <div class="col-xs-4">
        <form action="<?=base_url()?>index.php/admin/search_pmmb_batch" method="post">
          <input type="text" placeholder="Berdasarkan Batch" name="search">
          <!-- <input type="submit" class="btn btn-warning" value="Cari" name="cari"> -->
          <button class="btn btn-warning" name="cari">Cari</button>
        </form>
      </div>
    </div>
    <br>
    <br>

    <!-- result -->
    <div class="scroll">
      <table class="table table-hover form1">
        <thead>
          <tr>
            <th>NO</th>
            <th>Action</th>
            <th>Tanggal</th>
            <th>No.Surat</th>
            <th>Nama Siswa</th>
            <th>Batch</th>
            <th>Lembaga</th>
            <th>Jurusan</th>
            <th>Divisi</th>
            <th>Bagian</th>
            <th>Tanggal Awal</th>
            <th>Tanggal Akhir</th>
            <th>Pembimbing</th>
          </tr>
        </thead>            

        <tbody>
          <?php 
            $no = 1;
            foreach($pkl as $row):?>
          <tr>
            <td><?php echo $this->session->userdata('row')+$no; ?></td>
            <td>
              <a href="<?php echo site_url('admin/updatepmmb' . '/' . $row->ID_PKL); ?>">
                <p><button type="button" class="btn btn-warning btn-xs">edit</button></p>
              </a>
              <a href="<?php echo site_url('admin/deletepmmb' . '/' . $row->ID_PKL); ?>">
                <p><button type="button" class="btn btn-danger btn-xs">delete</button></p>
              </a>
            </td>
            <td><?php echo $row->TANGGAL?></td>
            <td>
            <?php if($row->pdf_permohonan == ""){?>
              <?php echo $row->NO?></td>
            <?php }else{?>
              <a href="<?php echo base_url(); echo $row->pdf_permohonan;?>" target="_blank"><?php echo $row->NO?></a></td>
            <?php } ?>
            <td><a href="<?php echo (site_url('admin/detail_mhs_pmmb' . '/' . $row->ID_PKL));?>"><?php echo $row->NM_SISWA?></a></td>
            <td><?php echo $row->BATCH?></td>
            <td>
            <?php if($row->pdf_balasan == ""){?>
              <?php echo $row->LEMBAGA?></td>
            <?php }else{?>
              <a href="<?php echo base_url(); echo $row->pdf_balasan;?>" target="_blank"><?php echo $row->LEMBAGA?></a></td>
            <?php } ?>
            </td>
            <td><?php echo $row->JURUSAN?></td>
            <td><?php echo $row->DIVISI?></td>
            <td><?php echo $row->BAGIAN?></td>
            <td><?php echo $row->TGL_AWAL?></td>
            <td><?php echo $row->TGL_AKHIR?></td>
            <td><?php echo $row->NAMA_PEMB?></td>
          </tr>
            <?php
              $no++;
              endforeach;
            ?>
        </tbody>
      </table>
      <?php echo $this->pagination->create_links(); ?>
    </div>
  </div>

</div>