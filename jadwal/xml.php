<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbjadwal`";
if(getJum($conn,$sql)>0){
	print "<jadwal>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$kode_jadwal=$d["kode_jadwal"];
				$pertemuan=$d["pertemuan"];
				$biaya=$d["biaya"];
				$keterangan=$d["keterangan"];
												
				print "<record>\n";
				print "  <pertemuan>$pertemuan</pertemuan>\n";
				print "  <biaya>$biaya</biaya>\n";
				print "  <keterangan>$keterangan</keterangan>\n";
				print "  <kode_jadwal>$kode_jadwal</kode_jadwal>\n";
				print "</record>\n";
			}
	print "</jadwal>\n";
}
else{
	$null="null";
	print "<jadwal>\n";
		print "<record>\n";
				print "  <pertemuan>$null</pertemuan>\n";
				print "  <biaya>$null</biaya>\n";
				print "  <keterangan>$null</keterangan>\n";
				print "  <kode_jadwal>$null</kode_jadwal>\n";
		print "</record>\n";
	print "</jadwal>\n";
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
	