    <form class="form-horizontal" method="post">
  <div class="control-group">
    <label for="inputEmail" class="control-label"><strong>Kode Mata Pelajaran</strong></label>
    <div class="controls">
    <input type="text" id="inputEmail" name="kode" placeholder="Kode Mata Pelajaran">
    </div>
  </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Nama Mata Pelajaran</strong></label>
    <div class="controls">
    <input type="text" id="inputEmail" name="nama" placeholder="Nama Mata Pelajaran">
    </div>
  </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>SKBM</strong></label>
    <div class="controls">
    <input type="text" id="inputEmail" name="skbm" placeholder="SKBM">
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
		if($_POST['kode']=="")
		{
			MsgBox('Kode kosong');
		}elseif($_POST['nama']=="")
		{
			MsgBox('Nma Kosong');
		}elseif($_POST['skbm']=="")
		{
			MsgBox('SKBM Kosong');
		}else{
			if(jika_ada('mata_pelajaran','Kd_matapelajaran',$_POST['kode']))
			{
				MsgBox('Kode ini sudah ada');
			}else{
				if(eksekusi("Insert into mata_pelajaran (`Kd_matapelajaran`,`Nama_matapelajaran`,`SKBM`) value ('".$_POST['kode']."','".($_POST['nama'])."','".$_POST['skbm']."')"))
				{
					MsgBox('Berhasil ditambahkan');
					direct('?dir=tu&mod=matpel');
				}else{
					MsgBox('Gagal ditambahkan');
				}
			}
		}
	}
	?>