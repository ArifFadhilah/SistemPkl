<?php //ini_set('memory_limit', '-1');?>

<div class="container" style="font-size:15px;">
<br><br><br>
<br><br><br><br>
  <center>
      <center><img src="other/images/serti.png"  height="50px" "></center>
        <br><br><br>
  </center>
  <center>
    <b style="font-size:20px;">Praktek Kerja Lapangan</b>
  </center>
    <div style="width:250px; margin-left:235px; border-top: 0px solid black; margin-top: 1px; margin-bottom: 0;"></div>
    <b style="font-size:14px; text-align:center;margin-left:-212px;">No. <?php if (strlen($rowss->NO_KETERANGAN < 10)){echo "0".$rowss->NO_KETERANGAN;}else{echo $rowss->NO_KETERANGAN;}?>/<?php echo $surat->kode?>/<?php $now = date('Y'); echo $now;?></b>

   <br><br>

    <span style="display:inline-block; width: 103px;"></span>
    <center>Diberikan Kepada : </center>
  <br><br>

    <table style="margin-left:125px;">
      <tr>
        <td style="width:175px;">NAMA</td>
        <td height="30px">:</td>
        <td><b><?php echo $rowss->NM_SISWA?></b></td>
      </tr>
      <tr>
        <td>NIS</td>
        <td height="30px">:</td>
        <td><b><?php echo $rowss->NRP_SISWA?></b></td>
      </tr>
      <tr >
        <td>Lembaga</td>
        <td height="30px">:</td>
        <td><b><?php echo $rowss->LEMBAGA?></b></td>
      </tr>
      <tr >
        <td>Jurusan/Program Study</td>
        <td height="30px">:</td>
        <td><b><?php echo $rowss->JURUSAN?></b></td>
      </tr>
    </table>

  <br><br>
  <center>

    Telah melaksanakan Praktek Kerja Lapangan di 
    <br>
    PT. Industri Telekomunikasi Indonesia (Persero)
  </center>
    
  <br><br>

  
      <table style="margin-left:125px;">
      
        <tr>
          <td height="30px" style="width:175px;">Tanggal Mulai</td>
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
          <td height="30px" style="width:175px;">Tanggal Akhir</td>
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
      <center>
          Dengan hasil <b>A</b>
      </center>
      </table>


  <br><br>
  <br><br>
  <br><br>

      <table align="center">
        <tr>
      
          <td align="center">Bandung, <?php $y = date('Y'); $m = date('n'); $d = date('d');
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
                                                        echo $d." ".$m." ".$y;?></td>
        </tr>
        <tr>
         
          <td style="width:175px;"><center><b><?php echo $format; ?></b></center><br><br><br><br><br></td>
        </tr>
        <tr>
          
          <td><b><u> <center><?php echo $kaurdiklat->AN_KA_URDIKLAT?></center></u></b></td>
        </tr>
        <tr>
 
          <td><center><b><?php echo $kaurdiklat->NP?></b></center></td>
          
        </tr>
      </table>

</div>