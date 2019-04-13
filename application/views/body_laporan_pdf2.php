<?php //ini_set('memory_limit', '-1');?>

<div class="container" style="font-size:15px;">
<br><br><br><br><br><br>
<br>
  <center>
    <b style="font-size:20px;">NOTA</b>
  </center>
    <div style="width:248px; margin-left:235px; border-top: 2px solid black; margin-top: 1px; margin-bottom: 0;"></div>
    <b style="font-size:14px; text-align:center;margin-left:-218px;">No. <?php if (strlen($rowss->NO < 10)){echo "0".$rowss->NO;}else{echo $rowss->NO;}?>/<?php echo $surat->kode?>/<?php $now = date('Y'); echo $now;?></b>

<br><br><br>

  <table style="margin-top:15px;">
    <tr>
      <td style="width:90px;">&nbsp;&nbsp;&nbsp;Kepada Yth</td>
      <td>:</td>
      <td>Divisi <?php echo $rowss->DIVISI?></td>
    </tr>
    <tr>
      <td>&nbsp;&nbsp;&nbsp;Bagian</td>
      <td>:</td>
      <td><?php echo $rowss->BAGIAN?></td>
    </tr>
    <tr>
      <td>&nbsp;&nbsp;&nbsp;Dari</td>
      <td>:</td>
      <td><?php echo $format; ?></td>
    </tr>
    <tr>
      <td>&nbsp;&nbsp;&nbsp;Lampiran</td>
      <td>:</td>
      <td>1 (satu) lembar</td>
    </tr>
    <tr>
      <td>&nbsp;&nbsp;&nbsp;Perihal</td>
      <td>:</td>
      <td>Praktek kerja / Riset / Permohonan Data</td>
    </tr>
  </table>

  <br><br>
    <span style="display:inline-block; width: 103px;"></span>
    Dengan ini kami hadapkan 1 (satu) siswa / Mahasiswa :
  <br><br>

    <table style="margin-left:78px;">
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td><b><?php echo $rowss->NM_SISWA?></b></td>
      </tr>
      <tr>
        <td>Lembaga</td>
        <td>:</td>
        <td><b><?php echo $rowss->LEMBAGA?></b></td>
      </tr>
      <tr>
        <td>Jurusan/Program Study</td>
        <td>:</td>
        <td><b><?php echo $rowss->JURUSAN?></b></td>
      </tr>
    </table>

  <br><br>
    <span style="display:inline-block; width: 103px;"></span>
    Untuk mengadakan Kerja Praktek/Riset/Permohonan Data * pada :
  <br><br>

  
      <table style="margin-left:78px;">
        <tr>
          <td style="width:150px;">Divisi</td>
          <td style="width:5px;">:</td>
          <td ><b><?php echo $rowss->DIVISI?></b></td>
        </tr>
        <tr>
          <td style="width:150px;">Bagian</td>
          <td style="width:5px;">:</td>
          <td ><b><?php echo $rowss->BAGIAN?></b></td>
        </tr>
        <tr>
          <td style="width:150px;">Tanggal Mulai</td>
          <td style="width:5px;">:</td>
          <td><b><?php 
                    $date = $rowss->TGL_AWAL;
                    if(substr($date, 4, 1) != "-")
                    {
                      echo $date;
                    }
                    else
                    {
                      $explodedate = explode("-", $date);
                      $year = $explodedate[0];
                      $month = $explodedate[1];
                      $day = $explodedate[2];
                      if ($month == 1) { $month1 = 'Januari'; }
                      if ($month == 2) { $month1 = 'Februari'; }
                      if ($month == 3) { $month1 = 'Maret'; }
                      if ($month == 4) { $month1 = 'April'; }
                      if ($month == 5) { $month1 = 'Mei'; }
                      if ($month == 6) { $month1 = 'Juni'; }
                      if ($month == 7) { $month1 = 'Juli'; }
                      if ($month == 8) { $month1 = 'Agustus'; }
                      if ($month == 9) { $month1 = 'September'; }
                      if ($month == 10) { $month1 = 'Oktober'; }
                      if ($month == 11) { $month1 = 'November'; }
                      if ($month == 12) { $month1 = 'Desember'; }
                      echo $day." ".$month1." ".$year;
                    }
                    
          ?></b></td>
        </tr>
        <tr>
          <td style="width:150px;">Tanggal Akhir</td>
          <td style="width:5px;">:</td>
          <td><b><?php 
                    $date = $rowss->TGL_AKHIR;
                    if(substr($date, 4, 1) != "-")
                    {
                      echo $date;
                    }
                    else
                    {
                      $explodedate = explode("-", $date);
                      $year = $explodedate[0];
                      $month = $explodedate[1];
                      $day = $explodedate[2];
                      if ($month == 1) { $month1 = 'Januari'; }
                      if ($month == 2) { $month1 = 'Februari'; }
                      if ($month == 3) { $month1 = 'Maret'; }
                      if ($month == 4) { $month1 = 'April'; }
                      if ($month == 5) { $month1 = 'Mei'; }
                      if ($month == 6) { $month1 = 'Juni'; }
                      if ($month == 7) { $month1 = 'Juli'; }
                      if ($month == 8) { $month1 = 'Agustus'; }
                      if ($month == 9) { $month1 = 'September'; }
                      if ($month == 10) { $month1 = 'Oktober'; }
                      if ($month == 11) { $month1 = 'November'; }
                      if ($month == 12) { $month1 = 'Desember'; }
                      echo $day." ".$month1." ".$year;
                    }
          ?></b></td>
        </tr>
      </table>



  <br><br>
    <span style="display:inline-block; width: 103px;"></span>
    Setuju / tidak setuju * yang bersangkutan melaksanakan Kerja Praktek/Riset/<br>
    <span style="display:inline-block; width: 103px;"></span>
    Permohonan Data di bagian kami.

      <table >
        <tr>
          <td style="width:390px; color:white;">z</td>
          <td style="width:300px;"><center>Bandung, <?php $y = date('Y'); $m = date('n'); $d = date('d');
                                                        if($m == 1){$m = "Januari";}
                                                        else if($m == 2){$m = "Februari";}
                                                        else if($m == 3){$m = "Maret";}
                                                        else if($m == 4){$m = "April";}
                                                        else if($m == 5){$m = "Mei";}
                                                        else if($m == 6){$m = "Juni";}
                                                        else if($m == 7){$m = "Juli";}
                                                        else if($m == 8){$m = "Agustus";}
                                                        else if($m == 9){$m = "September";}
                                                        else if($m == 10){$m = "Oktober";}
                                                        else if($m == 11){$m = "November";}
                                                        else if($m == 12){$m = "Desember";}
                                                        echo $d." ".$m." ".$y;?></center></td>
        </tr>
        <tr>
          <td style="width:150px;"><center><b>Pembimbing</b></center><br><br><br><br></td>
          <td style="width:150px;"><center><b>an. <?php echo $format; ?></b></center><br><br><br><br></td>
        </tr>
        <tr>
          <td><b><u> <center><?php echo $rowss->NAMA_PEMB?></center></u></b></td>
          <td><b><u> <center><?php echo $rowss->AN_KA_URDIKLAT?></center></u></b></td>
        </tr>
        <tr>
          <td><center><b><?php echo $rowss->NIP_PEMB?></b></center></td>
          <td><center><b><?php echo $rowss->NP?></b></center></td>
          
        </tr>
      </table>
</b><br><br><br><br><br><br>
    
  <br>
    &nbsp;&nbsp;&nbsp;*) Coret yang tidak perlu<br>
    &nbsp;&nbsp;&nbsp;Setelah disetujui lembaran ini dan Lampiran dicopy sebanyak 3 (tiga) kali untuk:<br>
    <table style="margin-left:78px;">
      <tr>
        <td style="width:70px;">i</td>
        <td>Pembimbing Unit Kerja penerima siswa / mahasiswa / praktikan.</td>
      </tr>
      <tr>
        <td>ii</td>
        <td>Sekolah / Lembaga / Universitas.</td>
      </tr>
      <tr>
        <td>iii</td>
        <td>Praktikan (Surat ini dibawa pada saat daftar ulang PKL/Riset).</td>
      </tr>
    </table>
  <br>
    &nbsp;&nbsp;&nbsp;Laporan kerja praktek selain hard copy juga dalam bentuk soft copy.<br>
 
  
</div>