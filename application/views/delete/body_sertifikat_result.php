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
<!--<?php //echo $this->session->userdata("tgl_awal");?><br>
<?php //echo $this->session->userdata("tgl_akhir");?><br>
<?php //echo $this->session->userdata("jenis");?>-->
  <?php echo form_open('home/report');?>
    <div class="col-xs-6 col-sm-8 bkiri">
    <br>
      <div class="form-horizontal form1" role="form">
      <h4>TANGGAL PENDAFTARAN</h4>
        <div class="col-xs-6 ">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Tanggal Awal</label>
            <div class="col-sm-9">
              <input type="date" class="form-control" name="tgl_awal">
            </div>
          </div>
        </div>
        <div class="col-xs-6 ">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Tanggal Akhir</label>
            <div class="col-sm-9">
              <input type="date" class="form-control" name="tgl_akhir">
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="hr-style2"></div>

        <div class="col-xs-6 ">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Nomor Surat</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="no" value="semua">
            </div>
          </div>
        </div>
        <div class="col-xs-6 ">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">NRP Siswa</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="nrp_siswa" value="semua">
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="hr-style2"></div>

        <div class="col-xs-6 ">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Jenis</label>
            <div class="col-sm-9">
              <select class="form-control" name="jenis">
                <option value="semua">Semua</option>
                <option value="pkl">PKL</option>
                <option value="riset">Riset</option>
                <option value="observasi">Observasi</option>
              </select>
            </div>
          </div>
        </div>
        <div class="col-xs-6 ">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Program Pendidikan</label>
            <div class="col-sm-9">
              <select class="form-control" name="prog_pend">
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
        </div>
        <div class="clearfix"></div>
        <div class="hr-style2"></div>

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
            <label for="inputEmail3" class="col-sm-2 control-label">Divisi</label>
            <div class="col-sm-6">
              <select class="form-control" name="divisi">
                <option value="semua">Semua</option>
                <?php foreach($divisi as $rows):
                  echo "<option value".$rows->DIVISI.">".$rows->DIVISI."</option>";
                endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Bagian</label>
            <div class="col-sm-6">
              <select class="form-control" name="bagian">
                <option value="semua">Semua</option>
                <?php foreach($bagian as $rows):
                  echo "<option value".$rows->BAGIAN.">".$rows->BAGIAN."</option>";
                endforeach; ?>
              </select>
            </div>
          </div>

          <div class="hr-style2"></div>
          <div class="col-xs-6 ">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label">Pembimbing Perusahaan</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="nama_pemb" value="semua">
            </div>
          </div>
        </div>
        <div class="col-xs-6 ">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label">Pembimbing Lembaga</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="nama_pemb_lembaga" value="semua">
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="hr-style2"></div>

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
  	<div class="scroll2">
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
            <td><?php echo $rowss->NOMOR;?></td>
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
      <center><?php echo $status;?></center>
      </div>
      <div class="hr-style"></div>
  </div>
</div>