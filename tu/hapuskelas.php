<?php
$id=$_GET['id'];
if(eksekusi("Delete from kelas Where Id_kelas='".$id."'"))
{
	MsgBox('Berhasil dihapus');
	direct('?dir=tu&mod=kelas');
}
?>