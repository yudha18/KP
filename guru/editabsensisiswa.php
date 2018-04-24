<?php
$status=$_GET['status'];
$kelas=$_GET['kelas'];
$tanggal=$_GET['tanggal'];
$tahun=$_GET['tahun'];
$smes=$_GET['smes'];
$id=$_GET['id'];
$tglskrg=date("Y-m-d");
$qa=mysql_query("Select status,Thn_ajaran from absensi_siswa Where NIS='".$id."' and tanggal='".$tglskrg."' and Thn_ajaran='".$tahun."' and Semester='".$smes."'");
$rca=mysql_num_rows($qa);
if($rca > 0)
{
	if(eksekusi("Update absensi_siswa SET status='".$status."' Where NIS='".$id."' and tanggal='".$tglskrg."'")==true)
	{
		MsgBox('Absen sudah diubah');
		direct('?dir=guru&mod=absensisiswa');
	}
}else{
	if(eksekusi("Insert into absensi_siswa (`tanggal`,`Id_kelas`,`NIS`,`status`,`Thn_ajaran`,`Semester`) value ('".$tglskrg."','".$kelas."','".$id."','".$status."','".$tahun."','".$smes."')")==true)
	{
		MsgBox('Absen sudah ditambahkan');
		direct('?dir=guru&mod=absensisiswa');
	}
}
?>