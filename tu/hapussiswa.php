<?php
$id=$_GET['id'];
if(eksekusi("Delete from siswa Where NIS='".$id."'"))
{
	MsgBox('Berhasil dihapus');
	direct('?dir=tu&mod=siswa');
}
?>