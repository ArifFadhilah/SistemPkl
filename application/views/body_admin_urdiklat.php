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
            <li><a href="<?=base_url()?>index.php/admin/admin_jurusan">Jurusan</a></li>
            <li><a href="<?=base_url()?>index.php/admin/admin_urdiklat" class="current">Ka.Urusan &<br>Surat</a></li>
            <li><a href="<?=base_url()?>index.php/admin/logout">Log Out</a></li>
        </ul>
  </div>
    <div class="clearfix"></div>
</div>

<div class="container">
  <div class="col-xs-6 col-sm-3">
    
    <h3 style="text-align:right;">An.<?php echo $format; ?></h3>
    <div class="hr-style"></div>
  </div>

  <div class="col-xs-6 col-sm-9 bkiri">
    <br>
    <!-- an ka urdiklat -->
    <table class="table table-hover form1">
        <thead>
          <tr>
            <th>NO</th>
            <th>NP</th>
            <th>An. Ka. Urdiklat</th>
            <th>Action</th>
          </tr>
        </thead>            

        <tbody>
            <?php 
        $no = 1;
        foreach($urdiklat as $row):?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $row->NP?></td>
        <td><?php echo $row->AN_KA_URDIKLAT?></td>
              <td>
                  <a href="<?php echo site_url('admin/updateurdiklat' . '/' . $row->id_urdiklat); ?>">
                    <p><button type="button" class="btn btn-warning btn-xs">edit</button></p>
                  </a>
                  <a href="<?php echo site_url('admin/deleteurdiklat' . '/' . $row->id_urdiklat); ?>">
                    <p><button type="button" class="btn btn-danger btn-xs">delete</button></p>
                  </a>
              </td>
      </tr>
      <?php
        $no++;
        endforeach;
      ?>
        </tbody>
      </table>
    </div>
    <div class="clearfix"></div>

    <div class="col-xs-6 col-sm-3">
    
    <h3 style="text-align:right;"><?php echo $format; ?></h3>
    <div class="hr-style"></div>
  </div>

  <div class="col-xs-6 col-sm-9 bkiri">
    <br>
    <!-- ka urdiklat -->
    <table class="table table-hover form1">
        <thead>
          <tr>
            <th>NO</th>
            <th>NP</th>
            <th>Ka. Urdiklat</th>
            <th>Action</th>
          </tr>
        </thead>            

        <tbody>
            <?php 
        $no = 1;
        foreach($kaurdiklat as $row):?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $row->NP?></td>
        <td><?php echo $row->AN_KA_URDIKLAT?></td>
              <td>
                  <a href="<?php echo site_url('admin/updateurdiklat' . '/' . $row->id_urdiklat); ?>">
                    <p><button type="button" class="btn btn-warning btn-xs">edit</button></p>
                  </a>
              </td>
      </tr>
      <?php
        $no++;
        endforeach;
      ?>
        </tbody>
      </table>
    </div>
    <div class="clearfix"></div>

    <div class="col-xs-6 col-sm-3">
    
    <h3 style="text-align:right;">Executive Director</h3>
    <div class="hr-style"></div>
  </div>

  <div class="col-xs-6 col-sm-9 bkiri">
    <br>
    <!-- executive -->
    <table class="table table-hover form1">
        <thead>
          <tr>
            <th>NO</th>
            <th>NP</th>
            <th>Executive Director</th>
            <th>Action</th>
          </tr>
        </thead>            

        <tbody>
            <?php 
        $no = 1;
        foreach($executive as $row):?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $row->NP?></td>
        <td><?php echo $row->AN_KA_URDIKLAT?></td>
              <td>
                  <a href="<?php echo site_url('admin/updateurdiklat' . '/' . $row->id_urdiklat); ?>">
                    <p><button type="button" class="btn btn-warning btn-xs">edit</button></p>
                  </a>
              </td>
      </tr>
      <?php
        $no++;
        endforeach;
      ?>
        </tbody>
      </table>
    </div>
    <div class="clearfix"></div>

    <div class="col-xs-6 col-sm-3">
    
    <h3 style="text-align:right;">HCM Director</h3>
    <div class="hr-style"></div>
  </div>

  <div class="col-xs-6 col-sm-9 bkiri">
    <br>
    <!-- executive -->
    <table class="table table-hover form1">
        <thead>
          <tr>
            <th>NO</th>
            <th>NP</th>
            <th>HCM Director</th>
            <th>Action</th>
          </tr>
        </thead>            

        <tbody>
            <?php 
        $no = 1;
        foreach($hcm as $row):?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $row->NP?></td>
        <td><?php echo $row->AN_KA_URDIKLAT?></td>
              <td>
                  <a href="<?php echo site_url('admin/updateurdiklat' . '/' . $row->id_urdiklat); ?>">
                    <p><button type="button" class="btn btn-warning btn-xs">edit</button></p>
                  </a>
              </td>
      </tr>
      <?php
        $no++;
        endforeach;
      ?>
        </tbody>
      </table>
    </div>
    <div class="clearfix"></div>

    <div class="col-xs-6 col-sm-3">
    
    <h3 style="text-align:right;">Nomor Surat</h3>
    <div class="hr-style"></div>
  </div>

  <div class="col-xs-6 col-sm-9 bkiri">
    <br>
    <!-- nomor surat -->
    <table class="table table-hover form1">
        <thead>
          <tr>
            <th>NO</th>
            <th>Kode</th>
            <th>Action</th>
          </tr>
        </thead>            

        <tbody>
            <?php 
        $no = 1;
        foreach($surat as $row):?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $row->kode?></td>
        <td>
            <a href="<?php echo site_url('admin/updatesurat' . '/' . $row->id_surat); ?>">
              <p><button type="button" class="btn btn-warning btn-xs">edit</button></p>
            </a>
        </td>
      </tr>
      <?php
        $no++;
        endforeach;
      ?>
        </tbody>
      </table>
    </div>

    <div class="clearfix"></div>

    <div class="col-xs-6 col-sm-3">
    
    <h3 style="text-align:right;">Format ttd Ka.Urusan</h3>
    <div class="hr-style"></div>
  </div>

  <div class="col-xs-6 col-sm-9 bkiri">
    <br>
    <!-- nomor surat -->
    <table class="table table-hover form1">
        <thead>
          <tr>
            <th>NO</th>
            <th>Keterangan</th>
          </tr>
        </thead>            

        <tbody>
            <?php 
        $no = 1;
        foreach($kaur as $row):?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $row->keterangan?></td>
        <td>
            <a href="<?php echo site_url('admin/updatekaur' . '/' . $row->id); ?>">
              <p><button type="button" class="btn btn-warning btn-xs">edit</button></p>
            </a>
        </td>
      </tr>
      <?php
        $no++;
        endforeach;
      ?>
        </tbody>
      </table>
    </div>

    <div class="clearfix"></div>

  
</div>