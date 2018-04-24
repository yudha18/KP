    <form class="form-horizontal" method="post">
  <div class="control-group">
    <label for="inputEmail" class="control-label"><strong>Nama Kelas</strong></label>
    <div class="controls">
    <input type="text" id="inputEmail" name="nama" placeholder="Nama Kelas">
    </div>
  </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Tahun Ajaran</strong></label>
    <div class="controls">
    <input type="text" id="inputEmail" name="tahun" placeholder="Tahun Ajaran">
    </div>
  </div>
   <div class="control-group">
    <label for="inputEmail" class="control-label"><strong>Semester</strong></label>
    <div class="controls">
    <select name="semester">
    <option value="Ganjil">Ganjil</option>
    <option value="Genap">Genap</option>
    </select>
    </div>
  </div> 
  <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Nama Walikelas</strong></label>
    <div class="controls">
    <?php
	echo combodata('nip','guru','NIP','Nama_guru');
	?>
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
		if($_POST['nama']=="")
		{
			MsgBox('Nma kosong');
		}elseif($_POST['tahun']=="")
		{
			MsgBox('Tahun Kosong');
		}elseif($_POST['semester']=="")
		{
			MsgBox('semester Kosong');
		}else{
			if(jika_ada('kelas','Kelas',$_POST['nama']))
			{
				MsgBox('Nama Kelas ini sudah ada');
			}else{
				if(eksekusi("Insert into kelas (`Kelas`,`Thn_ajaran`,`Semester`,`NIP_walikelas`) value ('".$_POST['nama']."','".($_POST['tahun'])."','".$_POST['semester']."','".$_POST['nip']."')"))
				{
					MsgBox('Berhasil ditambahkan');
					direct('?dir=tu&mod=kelas');
				}else{
					echo mysql_error();
				}
			}
		}
	}
	?>