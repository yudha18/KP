   <?php
   $id=$_GET['id'];
   $p=mysql_query("Select * from tuser Where Id_user='".$id."'");
   $rs=mysql_fetch_array($p);
   ?>
    <form class="form-horizontal" method="post">
    <div class="control-group">
    <label for="inputEmail" class="control-label"><strong>Username</strong></label>
    <div class="controls">
    <input type="text" id="inputEmail" value="<?php echo $rs['Username'];?>" name="username" placeholder="Username">
    </div>
    </div>
    <div class="control-group">
    <label  for="inputEmail" class="control-label"><strong>Password</strong></label>
    <div class="controls">
    <input type="password" id="inputEmail" value="<?php echo $rs['Password'];?>" name="password" placeholder="Password">
    </div>
    </div>
    <div class="control-group">
    <label for="inputPassword" class="control-label"><strong>Hak Akses</strong></label>
    <div class="controls">
   <select name="akses">
   <option value="<?php echo $rs['Level'];?>"><?php echo convert_akses($rs['Level']);?></option> 
   <option disabled>-</option>
   <option value="tu">Tata Usaha</option>
   <option value="guru">Guru</option>
   <option value="siswa">Siswa</option>
   <option value="waku">Wakil Kurikulum</option>
   <option value="wasi">Wakil Kesiswaan</option>
   <option value="kepsek">Kepala Sekolah</option>
   </select>
    </div>
    </div>
    <div class="control-group">
    <div class="controls">    
    <button type="submit" name="submit" class="btn">Ubah</button>
    <button type="button" name="submit2" onClick="window.location='?dir=tu&mod=user'" class="btn btn-inverse">Batal</button>
    </div>
    </div>
    </form>
    <?php
    if(isset($_POST['submit']))
	{
		if($_POST['username']=="")
		{
			MsgBox('Username kosong');
		}elseif($_POST['password']=="")
		{
			MsgBox('Password Kosong');
		}else{
			if(jika_ada('tuser','Username',$_POST['username'])==false)
			{
				MsgBox('User ini tidak ada');
			}else{
				if(eksekusi("Update tuser SET password='".md5($_POST['password'])."',Level='".$_POST['akses']."' Where Id_user='".$_POST['username']."'"))
				{
					MsgBox('Berhasil diubah');
					direct('?dir=tu&mod=user');
				}else{
					MsgBox('Gagal diubah');
				}
			}
		}
	}
	?>