<?php
$id=$_GET['id'];
if(eksekusi("Delete from jadwal Where Kd_jadwal='".$id."'"))
{
	MsgBox('Berhasil dihapus');
	direct('?dir=waku&mod=jadwal');
}
?>