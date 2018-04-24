    <form class="form-horizontal" method="post">
    <div class="control-group">
    <label class="control-label" for="inputEmail">Tahun ajaran</label>
    <div class="controls">
    <input type="text" id="inputEmail" name="thn" placeholder="Tahun Ajaran">
    </div>
    </div>  
   <div class="control-group">
    <label class="control-label" for="inputEmail">Semester</label>
    <div class="controls">
    <select name="semester">
    <option value="ganjil">Ganjil</option>
    <option value="genap">Genap</option>
    </select>
    </div>
    </div> 
    <div class="control-group">
    <label class="control-label"  for="inputEmail">Kelas</label>
    <div class="controls">
    <?php
	echo combodata('kelas','kelas','Id_kelas','Kelas');
	?>
    </div>
    </div>
   <div class="control-group">
    <label class="control-label"  for="inputEmail">Mata Pelajaran</label>
    <div class="controls">
    <?php echo combodata('matpel','mata_pelajaran','Id_matapelajaran','Nama_matapelajaran'); ?>
    </div>
    </div>
    <div class="control-group">
    <label class="control-label"  for="inputEmail">Guru</label>
    <div class="controls">
    <?php
	echo combodata('guru','guru','NIP','Nama_guru');
	?>
    </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="inputEmail">Hari</label>
    <div class="controls">
    <input type="text" id="inputEmail" name="hari" placeholder="Hari exp Rabu">
    </div>
    </div> 
    <div class="control-group">
    <label class="control-label" for="inputEmail">Jam</label>
    <div class="controls">
    <input type="text" id="inputEmail" name="jam" placeholder="Jam exp 11:56">
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
		if($_POST['thn']=="")
		{
			MsgBox('Tahun kosong');		
		}elseif($_POST['hari']=="")
		{
			MsgBox('Hari Kosong');
		}elseif($_POST['jam']=="")
		{
			MsgBox('Jam Kosong');
		}else{
			$v=mysql_query("Select * from jadwal Where Thn_ajaran='".$_POST['thn']."' and Semester='".$_POST['semester']."' and Id_kelas='".$_POST['kelas']."' and Id_matapelajaran='".$_POST['matpel']."' and NIP='".$_POST['guru']."'");
			$vq=mysql_num_rows($v);
			if($vq == 0)
			{
				$kdjadwal=$_POST['thn'].$_POST['kelas'].$_POST['matpel'].$_POST['guru'];
				if(eksekusi("Insert into jadwal values ('".$kdjadwal."','".$_POST['thn']."','".$_POST['semester']."','".$_POST['kelas']."','".$_POST['matpel']."','".$_POST['guru']."','".$_POST['hari']."','".$_POST['jam']."')"))
				{
					MsgBox('Berhasil ditambahkan');
					direct('?dir=waku&mod=jadwal');
				}else{
					echo mysql_error();
				}
			}else{
				MsgBox("Jadwal sudah ada");
			}		
		}
	}
	?>