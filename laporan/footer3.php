<table width="862" height="57" border="0">
          <tr>
          
            <td  width="352"><p>Diketahui Oleh :<br /><p>Bantul, <?php echo date("d F Y");?><br />
              Kepala Sekolah 
              SMKN 1 Pleret</p><br />
              <br />
              <br />
              <br />
              <strong><u><?php $kp="select * from guru where Jabatan='Kepala Sekolah' ";
			  			$hasil=mysql_query($kp);

						while($data=mysql_fetch_array($hasil)){
						echo "	<tr>
								<td>$data[Nama_guru]<br>
								NIP : $data[NIP]</td> </tr>";
								}?>
						</td>

          </tr>
        </table> 