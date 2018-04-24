  <?php
   $id=$_GET['id'];
   $p=mysql_query("Select * from mata_pelajaran Where Id_matapelajaran='".$id."'");
   $rs=mysql_fetch_array($p);
   ?>
    <form class="form-horizontal" method="post">
    <div class="control-group">
    <label for="inputEmail" class="control-label"><strong>Kode Mata Pelajaran</strong></label>
    <div class="controls">
    <input type="text" id="inputEmail" name="kode" value="<?php echo $rs['Kd_matapelajaran'];?>" placeholder="Kode Mata Pelajaran">
    </div>
    </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Nama Mata Pelajaran</strong></label>
    <div class="controls">
    <input type="text" id="inputEmail" value="<?php echo $rs['Nama_matapelajaran'];?>" name="nama" placeholder="Nama Mata Pelajaran">
    </div>
    </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>SKBM</strong></label>
    <div class="controls">
    <input type="text" id="inputEmail" value="<?php echo $rs['SKBM'];?>" name="skbm" placeholder="SKBM">
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
			if(jika_ada('mata_pelajaran','Id_matapelajaran',$id)==false)
			{
				MsgBox('Kode ini belum ada');
			}else{
				if(eksekusi("Update mata_pelajaran SET `Kd_matapelajaran`='".$_POST['kode']."',`Nama_matapelajaran`='".($_POST['nama'])."',`SKBM`='".$_POST['skbm']."' Where Id_matapelajaran='".$_GET['id']."'"))
				{
					MsgBox('Berhasil diubah');
					direct('?dir=tu&mod=matpel');
				}else{
					MsgBox('Gagal ditambahkan');
				}
			}
		}
	}
	?>