<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbsiswa`";
if(getJum($conn,$sql)>0){
	print "<siswa>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$kode_siswa=$d["kode_siswa"];
				$nama_siswa=$d["nama_siswa"];
				$jenis_kelamin=$d["jenis_kelamin"];
				$tgl_lahir=$d["tgl_lahir"];
				$agama=$d["agama"];
			    $alamat=$d["alamat"];
				$telepon=$d["telepon"];
				$email=$d["email"];
				$nama_ortu=$d["nama_ortu"];
				$username=$d["username"];
			    $password=$d["password"];
				$status=$d["status"];
												
				print "<record>\n";
				print "  <nama_siswa>$nama_siswa</nama_siswa>\n";
				print "  <jenis_kelamin>$jenis_kelamin</jenis_kelamin>\n";
				print "  <tgl_lahir>$tgl_lahir</tgl_lahir>\n";
				print "  <alamat>$alamat</alamat>\n";
				print "  <agama>$agama</agama>\n";
				print "  <telepon>$telepon</telepon>\n";
				print "  <email>$email</email>\n";
				print "  <nama_ortu>$nama_ortu</nama_ortu>\n";
				print "  <username>$username</username>\n";
				print "  <password>$password</password>\n";
				print "  <status>$status</status>\n";
				print "  <kode_siswa>$kode_siswa</kode_siswa>\n";
				print "</record>\n";
			}
	print "</siswa>\n";
}
else{
	$null="null";
	print "<siswa>\n";
		print "<record>\n";
				print "  <nama_siswa>$null</nama_siswa>\n";
				print "  <jenis_kelamin>$null</jenis_kelamin>\n";
				print "  <tgl_lahir>$null</tgl_lahir>\n";
				print "  <alamat>$null</alamat>\n";	
				print "  <agama>$null</agama>\n";
				print "  <telepon>$null</telepon>\n";
				print "  <email>$null</email>\n";
				print "  <nama_ortu>$null</nama_ortu>\n";
				print "  <username>$null</username>\n";
				print "  <password>$null</password>\n";
				print "  <status>$null</status>\n";
				print "  <kode_siswa>$null</kode_siswa>\n";
		print "</record>\n";
	print "</siswa>\n";
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
	