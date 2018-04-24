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
    <form class="form-horizontal" method="post">
    <div class="control-group">
    <label for="inputEmail" class="control-label"><strong>NIS</strong></label>
    <div class="controls">
    <input type="text" id="inputEmail" name="nis" placeholder="Nomor Induk Siswa">
    </div>
    </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Nama Siswa</strong></label>
    <div class="controls">
    <input type="text" class="input-xxlarge" id="inputEmail" name="nama" placeholder="Nama Siswa">
    </div>
    </div>
   <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Tempat Lahir</strong></label>
    <div class="controls">
    <input type="text" id="inputEmail" name="tempat" placeholder="Tempat Lahir">
    <strong>Tanggal Lahir    </strong>
    <input type="text" id="datepicker" name="tgl" placeholder="Tanggal Lahir">
    </div>
    </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Kelas</strong></label>
    <div class="controls">
    <?php
	echo combodata('kelas','kelas','Id_kelas','Kelas');
	?>
    </div>
    </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Jenis Kelamin</strong></label>
    <div class="controls">
    <select name="jk">
    <option value="Laki-Laki">Laki-Laki</option>
    <option value="Perempuan">Perempuan</option>
    </select>
    </div>
    </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Agama</strong></label>
    <div class="controls">
    <select name="agama">
    <option value="Islam">Islam</option>
    <option value="Kristen">Kristen</option>
    <option value="Hindu">Hindu</option>
    <option value="Budha">Budha</option>
    </select>
    </div>
    </div>
        
    <div class="control-group">
    <label for="inputEmail" class="control-label"><strong>Alamat</strong></label>
    <div class="controls"><strong>
    <input type="text" class="input-xxlarge" id="inputEmail" name="alamat" placeholder="Alamat Lengkap">
    </strong></div>
    </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Telepon</strong></label>
    <div class="controls">
    <input type="text"  id="inputEmail" name="tlp" placeholder="Telepon">
    </div>
    </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Nama Ayah</strong></label>
    <div class="controls">
    <input type="text"  id="inputEmail" name="nmayah" placeholder="Nama Ayah">
    </div>
    </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Nama Ibu</strong></label>
    <div class="controls">
    <input type="text"  id="inputEmail" name="nmibu" placeholder="Nama Ibu">
    </div>
    </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Pekerjaan Ayah</strong></label>
    <div class="controls">
    <input type="text"  id="inputEmail" name="kerjaayah" placeholder="Pekerjaan Ayah">
    </div>
    </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Pekerjaan Ibu</strong></label>
    <div class="controls">
    <input type="text"  id="inputEmail" name="kerjaibu" placeholder="Pekerjaan Ibu">
    </div>
    </div>
    <div class="control-group">
    <div class="controls">    
    <button type="submit" name="submit" class="btn btn-success">Tambah</button>
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
			if(jika_ada('siswa','nis',$_POST['nis']))
			{
				MsgBox('NIS ini sudah ada');
			}elseif(jika_ada('siswa','nama',$_POST['nama']))
			{
				MsgBox('Nama ini sudah ada');
			}else{
				$sql="INSERT INTO `siswa` (`NIS`, `Nama`, `Tmpt_lahir`, `Tgl_lahir`, `JK`, `Agama`, `Alamat`, `Nm_ayah`, `Nm_ibu`, `Pekerjaan_ayah`, `Pekerjaan_ibu`, `Id_kelas`, `Telp`) VALUES('".$_POST['nis']."', '".$_POST['nama']."', '".$_POST['tempat']."', '".$_POST['tgl']."', '".$_POST['jk']."', '".$_POST['agama']."', '".$_POST['alamat']."', '".$_POST['nmayah']."', '".$_POST['nmibu']."', '".$_POST['kerjaayah']."', '".$_POST['kerjaibu']."', '".$_POST['kelas']."', '".$_POST['tlp']."')";
				if(eksekusi($sql))
				{
					MsgBox('Berhasil ditambahkan');
					direct('?dir=tu&mod=siswa');
				}else{
					echo mysql_error();
				}
			}
		}
	}
	?>