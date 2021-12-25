<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbpendaftaran`";
if(getJum($conn,$sql)>0){
	print "<pendaftaran>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$kode_pendaftaran=$d["kode_pendaftaran"];
				$kode_siswa=$d["kode_siswa"];
				$tgl=$d["tgl"];
				$periode_ajaran=$d["periode_ajaran"];
			    $level=$d["level"];
				$keterangan=$d["keterangan"];
				$kode_jadwal=$d["kode_jadwal"];
												
				print "<record>\n";
				print "  <kode_siswa>$kode_siswa</kode_siswa>\n";
				print "  <tgl>$tgl</tgl>\n";
				print "  <periode_ajaran>$periode_ajaran</periode_ajaran>\n";
				print "  <level>$level</level>\n";
				print "  <keterangan>$keterangan</keterangan>\n";
				print "  <kode_jadwal>$kode_jadwal</kode_jadwal>\n";
				print "  <kode_pendaftaran>$kode_pendaftaran</kode_pendaftaran>\n";
				print "</record>\n";
			}
	print "</pendaftaran>\n";
}
else{
	$null="null";
	print "<pendaftaran>\n";
		print "<record>\n";
				print "  <kode_siswa>$null</kode_siswa>\n";
				print "  <tgl>$null</tgl>\n";
				print "  <periode_ajaran>$null</periode_ajaran>\n";
				print "  <level>$null</level>\n";
				print "  <keterangan>$null</keterangan>\n";
				print "  <kode_jadwal>$null</kode_jadwal>\n";
				print "  <kode_pendaftaran>$null</kode_pendaftaran>\n";
		print "</record>\n";
	print "</pendaftaran>\n";
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
	