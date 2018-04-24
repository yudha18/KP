<?php
$status=$_GET['status'];
$kdjadwal=$_GET['kdjadwal'];
$tanggal=$_GET['tanggal'];
$tahun=$_GET['tahun'];
$smes=$_GET['smes'];
$id=$_GET['id'];
$tglskrg=date("Y-m-d");
$qa=mysql_query("Select status from absensi_guru Where Kd_jadwal='".$kdjadwal."'");
$rca=mysql_num_rows($qa);
if($rca > 0)
{
	if(eksekusi("Update absensi_guru SET status='".$status."' Where Kd_jadwal='".$kdjadwal."'")==true)
	{
		MsgBox('Absen sudah diubah');
		direct('?dir=tu&mod=absensiguru');
	}
}else{
	if(eksekusi("Insert into absensi_guru (`tanggal`,`Thn_ajaran`,`Semester`,`Kd_jadwal`,`NIP`,`status`) value ('".$tglskrg."','".$tahun."','".$smes."','".$kdjadwal."','".$id."','".$status."')")==true)
	{
		MsgBox('Absen sudah ditambahkan');
		direct('?dir=tu&mod=absensiguru');
	}
}
?>