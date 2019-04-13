<?php //ini_set('memory_limit', '-1');?>

<div class="container" style="font-size:13px;">
<br><br><br>

  <center>
      <b style="font-family: sans-serif; font-size:22px;">Daftar Nilai Program Magang Mahasiswa Bersertifikat<br>
PT. INTI</b>
      <br><br>
  </center>
   <br><br>

    <span style="display:inline-block; width: 103px;"></span>
    <table style="margin-left:125px;">
      <tr>
        <td style="width:175px;">NAMA</td>
        <td height="30px">:</td>
        <td><b><?php echo $rowss->NM_SISWA?></b></td>
      </tr>
     <tr >
        <td>Jurusan/Program Study</td>
        <td height="30px">:</td>
        <td><b><?php echo $rowss->JURUSAN?></b></td>
      </tr>
      <tr >
        <td>Lembaga</td>
        <td height="30px">:</td>
        <td><b><?php echo $rowss->LEMBAGA?></b></td>
      </tr>
    </table>

  <br><br>
 <table align="center" border="0.01" width="700px">
    <tr>
        <td align="center" rowspan="2"> No</td>
        <td align="center" rowspan="2"> Komponen</td>
        <td align="center" colspan="2" >Daftar Nilai</td>
    </tr>
    <tr>
        <td align="center"> Angka</td>
        <td align="center"> Huruf</td>
    </tr>
    <tr>
        <td align="center"> 1</td>
        <td align="center"> Integritas (Etika, moral dan kesungguhan)</td>
        <td align="center"> <?php echo $rowss->INTEGRITAS?></td>
        <td align="center"> <?php $rowss->INTEGRITAS; if($rowss->INTEGRITAS >= 86){$rowss->INTEGRITAS = "A";}
                                                elseif($rowss->INTEGRITAS >= 71){$rowss->INTEGRITAS = "B";}
                                                elseif($rowss->INTEGRITAS >= 0){$rowss->INTEGRITAS = "C";}
                                                echo $rowss->INTEGRITAS;?></td>
    </tr>
    <tr>
        <td align="center"> 2</td>
        <td align="center"> Ketepatan waktu dalam bekerja</td>
        <td align="center"> <?php echo $rowss->KETWAKTU?></td>
        <td align="center"> <?php $rowss->KETWAKTU; if($rowss->KETWAKTU >= 86){$rowss->KETWAKTU = "A";}
                                                elseif($rowss->KETWAKTU >= 71){$rowss->KETWAKTU = "B";}
                                                elseif($rowss->KETWAKTU >= 0){$rowss->KETWAKTU = "C";}
                                                echo $rowss->KETWAKTU;?></td>
        <tr>
        <td align="center"> 3</td>
        <td align="center"> Keahlian berdasarkan bidang ilmu</td>
        <td align="center"> <?php echo $rowss->KEAHLIAN?></td>
        <td align="center"> <?php $rowss->KEAHLIAN; if($rowss->KEAHLIAN >= 86){$rowss->KEAHLIAN = "A";}
                                                elseif($rowss->KEAHLIAN >= 71){$rowss->KEAHLIAN = "B";}
                                                elseif($rowss->KEAHLIAN >= 0){$rowss->KEAHLIAN = "C";}
                                                echo $rowss->KEAHLIAN;?></td>
        <tr>
        <td align="center"> 4</td>
        <td align="center"> Kerjasama dalam tim</td>
        <td align="center"> <?php echo $rowss->KERJASAMA?></td>
        <td align="center"><?php $rowss->KERJASAMA; if($rowss->KERJASAMA >= 86){$rowss->KERJASAMA = "A";}
                                                elseif($rowss->KERJASAMA >= 71){$rowss->KERJASAMA = "B";}
                                                elseif($rowss->KERJASAMA >= 0){$rowss->KERJASAMA = "C";}
                                                echo $rowss->KERJASAMA;?></td>
        <tr>
        <td align="center"> 5</td>
        <td align="center"> Komunikasi</td>
        <td align="center"> <?php echo $rowss->KOMUNIKASI?></td>
        <td align="center"> <?php $rowss->KOMUNIKASI; if($rowss->KOMUNIKASI >= 86){$rowss->KOMUNIKASI = "A";}
                                                elseif($rowss->KOMUNIKASI >= 71){$rowss->KOMUNIKASI = "B";}
                                                elseif($rowss->KOMUNIKASI >= 0){$rowss->KOMUNIKASI = "C";}
                                                echo $rowss->KOMUNIKASI;?></td>
        <tr>
        <td align="center"> 6</td>
        <td align="center"> Penggunaan teknologi informasi</td>
        <td align="center"> <?php echo $rowss->PENGGUNAAN?></td>
        <td align="center"> <?php $rowss->PENGGUNAAN; if($rowss->PENGGUNAAN >= 86){$rowss->PENGGUNAAN = "A";}
                                                elseif($rowss->PENGGUNAAN >= 71){$rowss->PENGGUNAAN = "B";}
                                                elseif($rowss->PENGGUNAAN >= 0){$rowss->PENGGUNAAN = "C";}
                                                echo $rowss->PENGGUNAAN;?></td>
        <tr>
        <td align="center"> 7</td>
        <td align="center"> Pengembangan diri</td>
        <td align="center"> <?php echo $rowss->PENGEMBANGAN?></td>
        <td align="center"> <?php $rowss->PENGEMBANGAN; if($rowss->PENGEMBANGAN >= 86){$rowss->PENGEMBANGAN = "A";}
                                                elseif($rowss->PENGEMBANGAN >= 71){$rowss->PENGEMBANGAN = "B";}
                                                elseif($rowss->PENGEMBANGAN >= 0){$rowss->PENGEMBANGAN = "C";}
                                                echo $rowss->PENGEMBANGAN;?></td>
        <tr>
        <td align="center" colspan="2"> Total Nilai Pembimbing Perusahaan</td>
        <td align="center"> <?php echo $rowss->TOTAL?></td>
        <td align="center"> <?php $rowss->TOTAL; if($rowss->TOTAL >= 86){$rowss->TOTAL = "A";}
                                                elseif($rowss->TOTAL >= 71){$rowss->TOTAL = "B";}
                                                elseif($rowss->TOTAL >= 0){$rowss->TOTAL = "C";}
                                                echo $rowss->TOTAL;?></td>

</table>

  
    
  <br><br>

  <br><br>

      <table align="center">
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
          <td style="width:500px;font-size:13px"><center><b>Kriteria Total Nilai Pembimbing Perusahaan</b><br>

          86 - 100        Sangat Memuaskan<br>
          71 - 85          Memuaskan<br>
          0 - 70            Cukup Memuaskan<br>
          </center><br><br><br><br></td>
          <td style="width:500px;"><center>Pembimbing<br><b></b></center><br><br><br><br><br></td>
        </tr>
        <tr>
          <td><b><u> <center></center></u></b></td>
          <td><b><u> <center><?php echo $rowss->NAMA_PEMB?></center></u></b></td>
        </tr>
        <tr>
          <td><center><b></b></center></td>
          <td><center><b><?php echo $rowss->NIP_PEMB?></b></center></td>
          
        </tr>
      </table>
 

</div>