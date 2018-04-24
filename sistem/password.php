    <form class="form-horizontal" method="post">
    <div class="control-group">
    <label class="control-label" for="inputEmail">Password Lama</label>
    <div class="controls">
    <input type="password" id="inputPassword" name="pass1" placeholder="Password Lama">
    </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="inputPassword">Password Baru</label>
    <div class="controls">
    <input type="password" id="inputPassword" name="pass2" placeholder="Password Baru">
    </div>
    </div>
    <div class="control-group">
    <div class="controls">    
    <button type="submit" name="submit" class="btn">Ubah</button>
    </div>
    </div>
    </form>
    
    <?php
	if(isset($_POST['submit']))
	{
		$user=$_SESSION['login_username'];
		$q=mysql_query("Select password from tuser Where username='".$user."'");
		$rs=mysql_fetch_array($q);
		$passlama=$rs['password'];
		$checkpasslama=md5($_POST['pass1']);
		if($checkpasslama==$passlama)
		{
			if(eksekusi("Update tuser SET password='".md5($_POST['pass2'])."' Where username='".$user."'")==true)
			{
				MsgBox("Password berhasil diubah");
				direct("?dir=".$_SESSION['login_akses']."&mod=index");
			
			}
		}else{
				MsgBox("Password lama tidak sama");
		}
	}
	?>