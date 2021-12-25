<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbpenilaiandetail`";
if(getJum($conn,$sql)>0){
	print "<penilaiandetail>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$id=$d["id"];
				$kode_penilaian=$d["kode_penilaian"];
				$kode_matapelajaran=$d["kode_matapelajaran"];
				$nilai=$d["nilai"];
			    $catatan=$d["catatan"];
												
				print "<record>\n";
				print "  <kode_penilaian>$kode_penilaian</kode_penilaian>\n";
				print "  <kode_matapelajaran>$kode_matapelajaran</kode_matapelajaran>\n";
				print "  <nilai>$nilai</nilai>\n";
				print "  <catatan>$catatan</catatan>\n";
				print "  <id>$id</id>\n";
				print "</record>\n";
			}
	print "</penilaiandetail>\n";
}
else{
	$null="null";
	print "<penilaiandetail>\n";
		print "<record>\n";
				print "  <kode_penilaian>$null</kode_penilaian>\n";
				print "  <kode_matapelajaran>$null</kode_matapelajaran>\n";
				print "  <nilai>$null</nilai>\n";
				print "  <catatan>$null</catatan>\n";
				print "  <id>$null</id>\n";
		print "</record>\n";
	print "</penilaiandetail>\n";
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
	