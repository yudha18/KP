<?php
function MsgBox($title)
{
	echo "<script>alert('".$title."')</script>";
}

function direct($url,$tambahan='')
{
	echo "<script>window.location='".$url."'".$tambahan."</script>";
}

function cekSes()
{
	if(isset($_SESSION['login_akses']))
	{
		return $_SESSION['login_akses'];
	}
}

function inc_app($file)
{
	include($file.'.php');
}

function jika_ada($table,$field,$cari)
{
	$q=mysql_query("Select * from ".$table." where ".$field."='".$cari."'");
	$rc=mysql_num_rows($q);
	if($rc > 0) 
	{
		return true;
	}else{
		return false;
	}
}

function eksekusi($sql)
{
	$q=mysql_query($sql) or die(mysql_error());
	if($q)
	{
		return true;
	}else{
		return false;
	}
}

function convert_akses($str)
{
	switch($str)
	{
		case "tu":
		return "Tata Usaha";
		break;
		
		case "guru":
		return "Guru";
		break;
		
		case "kepsek":
		return "Kepala Sekolah";
		break;
		
		case "siswa":
		return "Siswa";
		break;
		
		case "waku":
		return "Wakil Kurikulum";
		break;
		
		case "wasi":
		return "Wakil Kesiswaan";
		break;
		
	}
}

function combodata($nama,$table,$value,$label,$sqltambahan='',$tambahan='')
{
	$q=mysql_query("Select * from ".$table." ".$sqltambahan."");
	echo '<select name="'.$nama.'">';
	$cbtambah=$tambahan;
	$cbva=array();
	while($rs=mysql_fetch_array($q))
	{
		echo '<option value="'.$rs[$value].'">'.$rs[$label].'</option>';
	}
	echo '</select>';
}

function nama_hari()
{
		$format = array(
		'Sun' => 'Minggu', 'Mon' => 'Senin', 'Tue' => 'Selasa', 'Wed' => 'Rabu', 'Thu' => 'Kamis', 'Fri' => 'Jumat', 'Sat' => 'Sabtu'
		);
		
		$tanggal = date('D', strtotime(date("D")));
		return strtr($tanggal, $format);
}

function tanggal_skrg()
{
		$format = array(
		'Sun' => 'Minggu', 'Mon' => 'Senin', 'Tue' => 'Selasa', 'Wed' => 'Rabu', 'Thu' => 'Kamis', 'Fri' => 'Jumat', 'Sat' => 'Sabtu', 'Jan' => 'Januari', 'Feb' => 'Februari', 'Mar' => 'Maret', 'Apr' => 'April', 'May' => 'Mei', 'Jun' => 'Juni', 'Jul' => 'Juli', 'Aug' => 'Agustus', 'Sep' => 'September', 'Oct' => 'Oktober', 'Nov' => 'November', 'Dec' => 'Desember'
		);
		$tanggal = date('D, d M Y', strtotime(date('D, d M Y')));
		return strtr($tanggal, $format);
}

function fungsi_nilai($id,$thn,$smes)
{
	$qq=mysql_query("Select count(Id_matapelajaran) as jumlahdata,sum(Nilai_ulangan) as n1,sum(Nilai_uts) as n2,sum(Nilai_uas) as n3 from nilai_rinci Where nilai_rinci.NIS='".$id."' and nilai_rinci.Thn_ajaran='".$thn."' and nilai_rinci.Semester='".$smes."'");
	$rss=mysql_fetch_array($qq);
	$n1=$rss['n1']/$rss['jumlahdata'];
	$n2=$rss['n2']/$rss['jumlahdata'];
	$n3=$rss['n3']/$rss['jumlahdata'];
	$n4=($n1+$n2+$n3)/3;
	$q=mysql_query("Select * from nilai Where NIS='".$id."' and Thn_ajaran='".$thn."' and Semester='".$smes."'");
	$rc=mysql_num_rows($q);
	if($rc==0)
	{
		eksekusi("Insert into nilai (`Thn_ajaran`,`Semester`,`NIS`,`Rata_rata`) values ('".$thn."','".$smes."','".$id."','".$n4."')");
	}else{
		eksekusi("Update nilai SET Rata_rata='".$n4."' Where NIS='".$id."' and Thn_ajaran='".$thn."' and Semester='".$smes."'");
	}
}

function bidang_guru($nip)
{
	$q=mysql_query("SELECT guru.*, mata_pelajaran.Nama_matapelajaran
FROM guru LEFT JOIN mata_pelajaran ON guru.Id_matapelajaran = mata_pelajaran.Id_matapelajaran
Where NIP='".$nip."'");
	$r=mysql_fetch_array($q);
	return $r['Id_matapelajaran'];
}

function rata2($id)
{
	$q=mysql_query("Select count(Id_nilai) as numrows,sum(Rata_rata) as rt from nilai_rinci Where Kd_nilai='".$id."'");	
	$rt=mysql_fetch_array($q);
	$tt=$rt['numrows'];
	$rata2=$rt['rt']/$tt;
	$t=mysql_query("Update nilai SET Rata_rata='".$rata2."' Where Kd_nilai='".$id."'");
	return round($rata2,2);
}

function jumlahhadir($table,$status,$tipe,$id,$caricustom='')
{
	$q=mysql_query("Select count(Id_absen) as jh from ".$table." Where status='".$status."' and ".$tipe."='".$id."' ".$caricustom."") or die(mysql_error());
	$rc=mysql_fetch_array($q);
	
		return $rc['jh'];
	
}

function ambilraterekap($id,$idmat)
{
	$q=mysql_query("Select sum(Rata_rata) as rt from nilai_rinci Where Kd_nilai='".$id."' and Id_matapelajaran='".$idmat."'");	
	$rt=mysql_fetch_array($q);
	$rata2=$rt['rt'];
	if(!empty($rata2))
	{
		return round($rata2,2); 
	}else{
		return 0;
	}
}
?>