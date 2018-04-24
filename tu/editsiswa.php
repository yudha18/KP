     <script>
	 $(function() {
$("#datepicker").datepicker({        
		 dateFormat: "yy-mm-dd",
    });
});
$(function() {
$("#datepicker2").datepicker({        
		 dateFormat: "yy-mm-dd",
    });
});
</script>
<?php
   $id=$_GET['id'];
   $p=mysql_query("SELECT siswa.*, kelas.Kelas
FROM siswa LEFT JOIN kelas ON siswa.Id_kelas = kelas.Id_kelas Where NIS='".$id."'");
   $rs=mysql_fetch_array($p);
   ?>
    <form class="form-horizontal" method="post">
    <div class="control-group">
    <label for="inputEmail" class="control-label"><strong>NIS</strong></label>
    <div class="controls">
    <input type="text" id="inputEmail" name="nis" value="<?php echo $rs['NIS'];?>" placeholder="Nomor Induk Siswa">
    </div>
    </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Nama Siswa</strong></label>
    <div class="controls">
    <input type="text" class="input-xxlarge" value="<?php echo $rs['Nama'];?>" id="inputEmail" name="nama" placeholder="Nama Siswa">
    </div>
    </div>
   <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Tempat Lahir</strong></label>
    <div class="controls">
    <input type="text" id="inputEmail" value="<?php echo $rs['Tmpt_lahir'];?>" name="tempat" placeholder="Tempat Lahir">
    <strong>Tanggal Lahir</strong>
    <input type="text" id="datepicker" value="<?php echo $rs['Tgl_lahir'];?>" name="tgl" placeholder="Tanggal Lahir">
    </div>
    </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Kelas</strong></label>
    <div class="controls">
    <?php
	$tambah='<option value="'.$rs['Id_kelas'].'">'.$rs['Kelas'].'</option><option disabled>-</option>';
	echo combodata('kelas','kelas','Id_kelas','Kelas','',$tambah);
	?>
    </div>
    </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Jenis Kelamin</strong></label>
    <div class="controls">
    <select name="jk">
    <option value="<?php echo $rs['JK'];?>"><?php echo $rs['JK'];?></option>
    <option disabled>-</option>
    <option value="Laki-Laki">Laki-Laki</option>
    <option value="Perempuan">Perempuan</option>
    </select>
    </div>
    </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Agama</strong></label>
    <div class="controls">
    <select name="agama">
    <option value="<?php echo $rs['Agama'];?>"><?php echo $rs['Agama'];?></option>
    <option disabled>-</option>
    <option value="Islam">Islam</option>
    <option value="Kristen">Kristen</option>
    <option value="Hindu">Hindu</option>
    <option value="Budha">Budha</option>
    </select>
    </div>
    </div>
        
    <div class="control-group">
    <label for="inputEmail" class="control-label"><strong>Alamat</strong></label>
    <div class="controls">
    <input type="text" class="input-xxlarge" value="<?php echo $rs['Alamat'];?>" id="inputEmail" name="alamat" placeholder="Alamat Lengkap">
    </div>
    </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Telepon</strong></label>
    <div class="controls">
    <input type="text"  id="inputEmail" value="<?php echo $rs['Telp'];?>" name="tlp" placeholder="Telepon">
    </div>
    </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Nama Ayah</strong></label>
    <div class="controls">
    <input type="text"  id="inputEmail" value="<?php echo $rs['Nm_ayah'];?>" name="nmayah" placeholder="Nama Ayah">
    </div>
    </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Nama Ibu</strong></label>
    <div class="controls">
    <input type="text"  id="inputEmail" value="<?php echo $rs['Nm_ibu'];?>" name="nmibu" placeholder="Nama Ibu">
    </div>
    </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Pekerjaan Ayah</strong></label>
    <div class="controls">
    <input type="text"  id="inputEmail" value="<?php echo $rs['Pekerjaan_ayah'];?>" name="kerjaayah" placeholder="Pekerjaan Ayah">
    </div>
    </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Pekerjaan Ibu</strong></label>
    <div class="controls">
    <input type="text"  id="inputEmail" value="<?php echo $rs['Pekerjaan_ibu'];?>" name="kerjaibu" placeholder="Pekerjaan Ibu">
    </div>
    </div>
    <div class="control-group">
    <div class="controls">    
    <button type="submit" name="submit" class="btn">Ubah</button>
    <button type="button" class="btn btn-inverse" onclick="javascript:history.go(-1)">Batal</button>
    </div>
    </div>
    </form>
    
    <?php
	if(isset($_POST['submit']))
	{
		if($_POST['nis']=="")
		{
			MsgBox('NIS kosong');		
		}elseif($_POST['nama']=="")
		{
			MsgBox('Nama Kosong');
		}elseif($_POST['tempat']=="")
		{
			MsgBox('Tempat Lahir Kosong');
		}elseif($_POST['tgl']=="")
		{
			MsgBox('Tanggal Lahir Kosong');		
		}elseif($_POST['alamat']=="")
		{
			MsgBox('Alamat Kosong');
		}elseif($_POST['tlp']=="")
		{
			MsgBox('Telepon Kosong');
		}else{
			if(jika_ada('siswa','nis',$_POST['nis'])==false)
			{

				MsgBox('NIS ini tidak ada');			
			}else{
				$sql="Update `siswa` SET `Nama`= '".$_POST['nama']."', `Tmpt_lahir`='".$_POST['tempat']."', `Tgl_lahir`='".$_POST['tgl']."', `JK`='".$_POST['jk']."', `Agama`='".$_POST['agama']."', `Alamat`='".$_POST['alamat']."', `Nm_ayah`='".$_POST['nmayah']."', `Nm_ibu`='".$_POST['nmibu']."', `Pekerjaan_ayah`='".$_POST['kerjaayah']."',`Pekerjaan_ibu`= '".$_POST['kerjaibu']."',`Id_kelas`= '".$_POST['kelas']."', `Telp`='".$_POST['tlp']."' Where `NIS`='".$_POST['nis']."'";
				if(eksekusi($sql))
				{
					MsgBox('Berhasil diubah');
					direct('?dir=tu&mod=siswa');
				}else{
					echo mysql_error();
				}
			}
		}
	}
	?>