<!DOCTYPE html>
<html>
<head>
<style>
img.a {
  position: absolute;
  left: -45px;
  top:-50px;
  z-index: -1;
}
</style>
</head>
<body>
<center><img src="other/images/idcard.png" class="a" width="349px" height="545px" "></center>
<center>

 <br><br><br><br> 
 <br><br><br><br>

<div>
  <br><br><br><br><br><br>
  <u style="font-family: sans-serif; font-size:20px;line-height: 10px;"><b><?php echo $rowss->NM_SISWA?></u>
  <p style="font-family: sans-serif; font-size:14px;line-height: 15px"><b><?php echo $rowss->DIVISI?></p>
  <p style="font-family: sans-serif; font-size:13px;line-height: 10px"><?php echo $rowss->LEMBAGA?></p>
  <p style="font-family: sans-serif; font-size:13px;line-height: 5px">Joined: <?php
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
           ?></p>
  <p style="font-family: sans-serif; font-size:13px;">Expire: <?php 
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
          ?></p>
  
</div>
</center>



</body>
</html>
