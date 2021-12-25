<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbpenilaian`";
if(getJum($conn,$sql)>0){
	print "<penilaian>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$kode_penilaian=$d["kode_penilaian"];
				$kode_siswa=$d["kode_siswa"];
				$periode_ajaran=$d["periode_ajaran"];
				$level=$d["level"];
			    $keterangan=$d["keterangan"];
												
				print "<record>\n";
				print "  <kode_siswa>$kode_siswa</kode_siswa>\n";
				print "  <periode_ajaran>$periode_ajaran</periode_ajaran>\n";
				print "  <level>$level</level>\n";
				print "  <keterangan>$keterangan</keterangan>\n";
				print "  <kode_penilaian>$kode_penilaian</kode_penilaian>\n";
				print "</record>\n";
			}
	print "</penilaian>\n";
}
else{
	$null="null";
	print "<penilaian>\n";
		print "<record>\n";
				print "  <kode_siswa>$null</kode_siswa>\n";
				print "  <periode_ajaran>$null</periode_ajaran>\n";
				print "  <level>$null</level>\n";
				print "  <keterangan>$null</keterangan>\n";
				print "  <kode_penilaian>$null</kode_penilaian>\n";
		print "</record>\n";
	print "</penilaian>\n";
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
	