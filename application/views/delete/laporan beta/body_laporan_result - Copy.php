<div class="headers">
	<div class="container">
		<ul id="nav">
            <li><a href="<?=base_url();?>index.php/home/gohome">Home</a></li>
            <li><a href="<?=base_url()?>index.php/home/prosedur">Prosedur</a></li>
            <li><a href="<?=base_url()?>index.php/home/pkl">PKL/Riset/<br>Observasi</a></li>
            <li><a href="<?=base_url()?>index.php/home/lembaga">Lembaga</a></li>
            <li><img src="<?=base_url();?>other/images/nav_logo.png"></a>
            <li><a href="<?=base_url()?>index.php/home/jurusan">Jurusan</a></li>
            <li><a href="<?=base_url()?>index.php/home/laporan" class="current">Laporan</a></li>
            <li><a href="<?=base_url()?>index.php/home/smart">Sistem<br>Cerdas</a></li>
            <li><a href="<?=base_url()?>index.php/home/login">Admin</a></li>
        </ul>
	</div>
    <div class="clearfix"></div>
</div>

<div class="container">
  <div class="col-xs-6 col-sm-4">
    <h2 style="text-align:right;">LAPORAN</h2>
      <p style="text-align:right;">Total peserta berdasarkan tahun pendaftaran.</p>
    <div class="hr-style2"></div>
      <table class="table table-hover form1">
        <thead>
          <tr>
            <th>No.</th>
            <th>Tahun</th>
            <th>Jumlah</th>
          </tr>
        </thead>            

        <tbody>
          <?php 
            $no = 1;
            foreach($total as $row):?>
          <tr>
            <td><?php echo $no?></td>
            <td><?php echo $row->tahun?></td>
            <td><?php echo $row->jumlah?></td>
          </tr>
          <?php
              $no++;
              endforeach;
            ?>
        </tbody>
      </table>
  </div>
<?php //echo $this->session->userdata("bulan");?>
  <?php echo form_open('home/exe_report');?>
    <div class="col-xs-6 col-sm-8 bkiri">
    <br>
      <div class="form-horizontal form1" role="form">
        <div class="col-xs-6 ">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Bulan</label>
            <div class="col-sm-9">
              <select class="form-control" name="bulan">
                <option value="semua">Semua</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
              </select>
            </div>
          </div>
        </div>
        <div class="col-xs-6 ">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Tahun</label>
            <div class="col-sm-9">
              <?php 
                $now = date('Y');
                $lamatahun = $now-2006;
                ?>
              <select class="form-control" name="tahun">
                <option value="semua">Semua</option>
                <?php for ($i=0; $i < $lamatahun ; $i++) { 
                  echo "<option value=".$now.">".$now,"</option>";
                  $now--;
                }?>
              </select>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="hr-style"></div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Jenis</label>
            <div class="col-sm-6">
              <select class="form-control" name="jenis">
                <option value="semua">Semua</option>
                <option value="pkl">PKL</option>
                <option value="riset">Riset</option>
                <option value="observasi">Observasi</option>
              </select>
            </div>
          </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Program Pendidikan</label>
            <div class="col-sm-6">
              <select class="form-control" name="program_pend">
                <option value="semua">Semua</option>
                <option value="smk">SMK</option>
                <option value="sma">SMA</option>
                <option value="d1">D1</option>
                <option value="d2">D2</option>
                <option value="d3">D3</option>
                <option value="d4">D4</option>
                <option value="s1">S1</option>
                <option value="s2">S2</option>
                <option value="s3">S3</option>
              </select>
            </div>
          </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Lembaga</label>
            <div class="col-sm-6">
              <select class="form-control" name="lembaga">
                <option value="semua">Semua</option>
                <?php foreach($lembaga as $row):
                  echo "<option value".$row->NAMA_LEMBAGA.">".$row->NAMA_LEMBAGA."</option>";
                endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Jurusan</label>
            <div class="col-sm-6">
              <select class="form-control" name="jurusan">
                <option value="semua">Semua</option>
                <?php foreach($jurusan as $rows):
                  echo "<option value".$rows->NAMA_JURUSAN.">".$rows->NAMA_JURUSAN."</option>";
                endforeach; ?>
              </select>
            </div>
          </div>

          <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-warning">Submit</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <div class="clearfix"></div>

  <div class="col-xs-12">
    <div class="hr-style"></div>
    <a href="<?=base_url()?>index.php/home/pdflaporan" target="_blank"><input type="submit" value="PDF" class="btn btn-warning"></a>
    <div class="hr-style2"></div>
  	<table class="table table-hover form1">
        <thead>
          <tr>
            <th>NO</th>
            <th>Tanggal</th>
            <th>Nama Siswa</th>
            <th>Jenis</th>
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
            foreach($semua as $rowss):?>
          <tr>
            <td><?php echo $this->session->userdata('row')+$no;?></td>
            <td><?php echo $rowss->TANGGAL?></td>
            <td><a href="<?php echo (site_url('home/detail_mhs' . '/' . $rowss->ID_PKL));?>"><?php echo $rowss->NM_SISWA?></a></td>
            <td><?php echo $rowss->JENIS_PKL?></td>
            <td><?php echo $rowss->LEMBAGA?></td>
            <td><?php echo $rowss->JURUSAN?></td>
            <td><?php echo $rowss->DIVISI?></td>
            <td><?php echo $rowss->BAGIAN?></td>
            <td><?php echo $rowss->TGL_AWAL?></td>
            <td><?php echo $rowss->TGL_AKHIR?></td>
            <td><?php echo $rowss->NAMA_PEMB?></td>
          </tr>
            <?php
              $no++;
              endforeach;
            ?>
        </tbody>
      </table>
      <?php echo $this->pagination->create_links(); ?>

      <div class="hr-style"></div>
  </div>
</div>