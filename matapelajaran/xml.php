<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbmatapelajaran`";
if(getJum($conn,$sql)>0){
	print "<matapelajaran>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$kode_matapelajaran=$d["kode_matapelajaran"];
				$nama_matapelajaran=$d["nama_matapelajaran"];
				$deskripsi=$d["deskripsi"];
												
				print "<record>\n";
				print "  <nama_matapelajaran>$nama_matapelajaran</nama_matapelajaran>\n";
				print "  <deskripsi>$deskripsi</deskripsi>\n";
				print "  <kode_matapelajaran>$kode_matapelajaran</kode_matapelajaran>\n";
				print "</record>\n";
			}
	print "</matapelajaran>\n";
}
else{
	$null="null";
	print "<matapelajaran>\n";
		print "<record>\n";
				print "  <nama_matapelajaran>$null</nama_matapelajaran>\n";
				print "  <deskripsi>$null</deskripsi>\n";
				print "  <kode_matapelajaran>$null</kode_matapelajaran>\n";
		print "</record>\n";
	print "</matapelajaran>\n";
	}
/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

function getJum($conn,$sql){
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
	$rs->free();
	return $jum;
}

function getData($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$arr = $rs->fetch_all(MYSQLI_ASSOC);
	
	$rs->free();
	return $arr;
}
?>
	