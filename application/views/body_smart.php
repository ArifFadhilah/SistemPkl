<!-- 
SISTEM INFORMASI SISWA/MAHASISWA PKL/RISET DI PT.INTI BANDUNG, INDONESIA
Author  : Syifa Afifah Fitriani
email   : syifaafifahf@gmail.com
from Universitas Pendidikan Indonesia 
-->

<!-- menu -->
<div class="headers">
	<div class="container">
		<ul id="nav">
            <li><a href="<?=base_url();?>index.php/home/gohome">Home</a></li>
            <li><a href="<?=base_url()?>index.php/home/prosedur">Prosedur</a></li>
            <li><a href="<?=base_url()?>index.php/home/pkl">PKL/Riset</a></li>
            <li><a href="<?=base_url()?>index.php/home/lembaga" >Lembaga</a></li>
            <li><img src="<?=base_url();?>other/images/nav_logo.png"></a>
            <li><a href="<?=base_url()?>index.php/home/jurusan">Jurusan</a></li>
            <li><a href="<?=base_url()?>index.php/home/laporan">Pencarian</a></li>
            <li><a href="<?=base_url()?>index.php/home/smart"class="current">Urutan<br>Lembaga</a></li>
            <li><a href="<?=base_url()?>index.php/home/login">Admin</a></li>
        </ul>
	</div>
    <div class="clearfix"></div>
</div>

<div class="container">
	<div class="col-xs-6 col-sm-4">
    
  <h2 style="text-align:right;">10 Lembaga dengan jumlah peserta PKL terbanyak di PT.INTI</h2>
  <div class="hr-style"></div>
  </div>

  <div class="col-xs-6 col-sm-8 bkiri">
  
  <br>
  <!-- result -->
  <table class="table table-hover form1">
      <thead>
        <tr>
          <th>NO</th>
          <th>Lembaga</th>
          <th>Jumlah Peserta</th>
        </tr>
      </thead>            

      <tbody>
          <?php 
      $no = 1;
      foreach($smart as $row):?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $row->LEMBAGA?></td>
      <td><?php echo $row->jumlah_peserta?></td>
    </tr>
    <?php
      $no++;
      endforeach;
    ?>
      </tbody>
    </table>
  </div>

</div>