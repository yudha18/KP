<p>&nbsp;</p>
<table width="100%" border="0">
  <tr>
    <td width="51%" align="left" valign="top"><div align="center">Diketahui Oleh, </div></td>
    <td width="49%" align="center" valign="top">Bantul, <?php echo date("d F Y");?></td>
  </tr>

  <tr>
    <td align="left" valign="top"><center>Kepala Sekolah<p>&nbsp;</p><p>&nbsp;</p>
	<?php $kp="select * from guru where Jabatan='Kepala Sekolah' ";
			  			$hasil=mysql_query($kp);
						while($data=mysql_fetch_array($hasil)){
			echo "<br>$data[Nama_guru]
				  <br>NIP : $data[NIP]</br>";
	}?>
    <br></center></td>
    <td align="center" valign="top"><center>Wakil Kurikulum<p>&nbsp;</p><p>&nbsp;</p>
	<?php $wk="select * from guru where Jabatan='Wakil Kurikulum' ";
						$hasil=mysql_query($wk);
						while($data=mysql_fetch_array($hasil)){
			echo "<br>$data[Nama_guru]
				  <br>NIP : $data[NIP]</br>";
	}?>
	<br></center></td>
  </tr>
</table>
</div>