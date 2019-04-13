<!DOCTYPE html>
<html>
<head>
  <title>Sertifikat PMMB</title>
  <style type="text/css">
    
    img.a {
  position: absolute;
  left: -50px;
  top: -50px;
  z-index: 1;
}  
  </style>
  
</head>
<body>
  <center><img src="other/images/a.png" class="a" width="1075px" height="823px" "></center>
<center>
  <div class="container" style="font-size:15px;">
<br><br><br>
<br><br><br><br>
  <center>
      <b style="font-family: times; font-size:42px;"></b>
      <br></b>
      <br>
  </center>
    <div style="width:250px; margin-left:235px; border-top: 0px solid black; margin-top: 1px; margin-bottom: 0;"></div>
    <center>
    <b style="font-size:14px; text-align:center;">No. <?php if (strlen($rowss->NO_KETERANGAN < 10)){echo "0".$rowss->NO_KETERANGAN;}else{echo $rowss->NO_KETERANGAN;}?>/PMMB<?php echo $surat->kode?>/<?php $now = date('Y'); echo $now;?></b>
</center>
   <br><br>
    <span style="display:inline-block; width: 103px;"></span>
    <center>Diberikan Kepada : </center>
  <br><br>
   <center>
      <b style="font-family: sans-serif; font-size:20px;"><u><?php echo $rowss->NM_SISWA?></u></b>
      <br><br>
  </center>
  <center>
    Telah melaksanakan  
    <br>
    Program Magang Mahasiswa Bersertifikat (PMMB) pada PT. Industri Telekomunikasi Indonesia (Persero) pada posisi
    <br><b>
    <?php echo $rowss->DIVISI?></b>
    <br>
    selama <?php
            $dateawal  = $rowss->TGL_AWAL;
            $dateakhir = $rowss->TGL_AKHIR;
            $timeStart = strtotime("$dateawal");
            $timeEnd = strtotime("$dateakhir");
            // Menambah bulan ini + semua bulan pada tahun sebelumnya
            $numBulan = 1+(date("Y",$timeEnd)-date("Y",$timeStart))*12;
            // menghitung selisih bulan
            $numBulan += date("m",$timeEnd)-date("m",$timeStart);
            echo $numBulan;
            ?> bulan mulai dari tanggal <?php
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
           ?> s.d <?php 
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
          ?> dengan hasil
    <br>
    <B><?php echo $rowss->HASIL?></b>
  </center>
    
  <br><br>
   <br><br>
    <br><br>
  
     <table >
        <tr>
          <td style="width:390px; color:white;">c</td>
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
          <td style="width:500px;"><center></center><br><br><br><br><br></td>
          <td style="width:500px;"><center></b></center><br><br><br><br><br></td>
        </tr>
       <tr>
          <td><center><?php echo $executive->AN_KA_URDIKLAT?><br><b>Executive Director</center></b></td>
          <td><center><?php echo $hcm->AN_KA_URDIKLAT?><br><b>HCM Director</center></b></td>
        </tr>
        <tr>
          <td><center><b></b><?php echo $executive->NP?></center></td>
          <td><center><b></b><?php echo $hcm->NP?></center></td>
          
        </tr>
      </table>
</div>
</body>
</html>