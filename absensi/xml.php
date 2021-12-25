<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbabsensi`";
if(getJum($conn,$sql)>0){
	print "<absensi>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$kode_absensi=$d["kode_absensi"];
				$tgl=$d["tgl"];
				$jam=$d["jam"];
				$kode_siswa=$d["kode_siswa"];
			    $status=$d["status"];
				$keterangan=$d["keterangan"];
												
				print "<record>\n";
				print "  <tgl>$tgl</tgl>\n";
				print "  <jam>$jam</jam>\n";
				print "  <kode_siswa>$kode_siswa</kode_siswa>\n";
				print "  <status>$status</status>\n";
				print "  <keterangan>$keterangan</keterangan>\n";
				print "  <kode_absensi>$kode_absensi</kode_absensi>\n";
				print "</record>\n";
			}
	print "</absensi>\n";
}
else{
	$null="null";
	print "<absensi>\n";
		print "<record>\n";
				print "  <tgl>$null</tgl>\n";
				print "  <jam>$null</jam>\n";
				print "  <kode_siswa>$null</kode_siswa>\n";
				print "  <status>$null</status>\n";
				print "  <keterangan>$null</keterangan>\n";
				print "  <kode_absensi>$null</kode_absensi>\n";
		print "</record>\n";
	print "</absensi>\n";
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
	