<?php
if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE);  
  ?>
<?php
session_start();
//error_reporting(0);
require_once"konmysqli.php";

$mnu=$_GET["mnu"];
date_default_timezone_set("Asia/Jakarta");

?>

<title>SISTEM INFORMASI <?php strtoupper($header);?></title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<script src="js/jquery-1.4.js" type="text/javascript"></script>
<script src="js/superfish.js" type="text/javascript"></script>
<script src="js/hoverIntent.js" type="text/javascript"></script>
	<script type="text/javascript">
      $(document).ready(function(){
			   $('ul.nav').superfish();
		  });
  </script>
<style type="text/css">
</style>
<body>
<div id="tabel"><img src="img/headers.jpg"></div>
<div id="tabelsystem">
<div id="top">
<ul class="nav">            
<?php
if(isset($_SESSION["cid"])){	
      echo"
	  <li><a href='index.php?mnu=home'>Home</a></li>
      <li><a href='index.php?mnu=admin'>Admin</a></li>
	  <li><a href='index.php?mnu=matapelajaran'>Mata Pelajaran</a></li>
	  <li><a href='index.php?mnu=jadwal'>Jadwal</a></li>

	  <li><a href='index.php?mnu=siswa'>Siswa</a></li>
	  <li><a href='index.php?mnu=pendaftaran'>Pendaftaran</a></li>
	  <li><a href='index.php?mnu=absensi'>Absensi</a></li>
	  <li><a href='index.php?mnu=penilaian'>Penilaian</a></li>
      <li><a href='index.php?mnu=logout'>Logout</a></li>";
}
else{
	 echo"<li><a href='index.php?mnu=home'>Home</a></li>";
	 echo"<li><a href='index.php?mnu=login'>Login</a></li>";	 
	}
      ?>
<li class="sep"></li>
<li class="right"></li>
</ul>			
</div></div>
<?php include "kiri.php"; ?>
<?php 
echo"<div id=groupmodul1>
      <table id=tablemodul>               
       <tr><th width='1500'><strong>MENU ".strtoupper($mnu)."</strong></th></tr>"; 
       echo "<tr><td>";
				//-=====================
				
if($mnu=="admin"){require_once"admin/admin.php";}
else if($mnu=="matapelajaran"){require_once"matapelajaran/matapelajaran.php";}
else if($mnu=="jadwal"){require_once"jadwal/jadwal.php";}

else if($mnu=="siswa"){require_once"siswa/siswa.php";}
else if($mnu=="pendaftaran"){require_once"pendaftaran/pendaftaran.php";}
else if($mnu=="absensi"){require_once"absensi/absensi.php";}
else if($mnu=="penilaian"){require_once"penilaian/penilaian.php";}
else if($mnu=="penilaiandetail"){require_once"penilaiandetail/penilaiandetail.php";}

else if($mnu=="login"){require_once"login.php";}
else if($mnu=="logout"){require_once"logout.php";}

else {require_once"home.php";}
				
				//-=====================
				echo"</td></tr></table>
</div>";
 ?>

<div id=footer><center>Sistem Informasi <?php echo $footer;?></div>


<?php function RP($rupiah){return number_format($rupiah,"2",",",".");}?>
<?php
function WKT($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,0,4);

$judul_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei","Juni", "Juli", "Agustus", "September","Oktober", "November", "Desember");
$wk=$tanggal." ".$judul_bln[(int)$bulan]." ".$tahun;
return $wk;
}
?>
<?php
function WKTP($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,2,2);

$judul_bln=array(1=> "Jan", "Feb", "Mar", "Apr", "Mei","Jun", "Jul", "Agu", "Sep","Okt", "Nov", "Des");
$wk=$tanggal." ".$judul_bln[(int)$bulan]."'".$tahun;
return $wk;
}
?>
<?php
function BAL($tanggal){
	$arr=split(" ",$tanggal);
	if($arr[1]=="Januari"){$bul="01";}
	else if($arr[1]=="Februari"){$bul="02";}
	else if($arr[1]=="Maret"){$bul="03";}
	else if($arr[1]=="April"){$bul="04";}
	else if($arr[1]=="Mei"){$bul="05";}
	else if($arr[1]=="Juni"){$bul="06";}
	else if($arr[1]=="Juli"){$bul="07";}
	else if($arr[1]=="Agustus"){$bul="08";}
	else if($arr[1]=="September"){$bul="09";}
	else if($arr[1]=="Oktober"){$bul="10";}
	else if($arr[1]=="November"){$bul="11";}
	else if($arr[1]=="Nopember"){$bul="11";}
	else if($arr[1]=="Desember"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";	
}
?>

<?php
function BALP($tanggal){
	$arr=split(" ",$tanggal);
	if($arr[1]=="Jan"){$bul="01";}
	else if($arr[1]=="Feb"){$bul="02";}
	else if($arr[1]=="Mar"){$bul="03";}
	else if($arr[1]=="Apr"){$bul="04";}
	else if($arr[1]=="Mei"){$bul="05";}
	else if($arr[1]=="Jun"){$bul="06";}
	else if($arr[1]=="Jul"){$bul="07";}
	else if($arr[1]=="Agu"){$bul="08";}
	else if($arr[1]=="Sep"){$bul="09";}
	else if($arr[1]=="Okt"){$bul="10";}
	else if($arr[1]=="Nov"){$bul="11";}
	else if($arr[1]=="Nop"){$bul="11";}
	else if($arr[1]=="Des"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";	
}
?>


<?php
function process($conn,$sql){
$s=false;
$conn->autocommit(FALSE);
try {
  $rs = $conn->query($sql);
  if($rs){
	    $conn->commit();
	    $last_inserted_id = $conn->insert_id;
 		$affected_rows = $conn->affected_rows;
  		$s=true;
  }
} 
catch (Exception $e) {
	echo 'fail: ' . $e->getMessage();
  	$conn->rollback();
}
$conn->autocommit(TRUE);
return $s;
}

function getJum($conn,$sql){
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
	$rs->free();
	return $jum;
}

function getField($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$d= $rs->fetch_assoc();
	$rs->free();
	return $d;
}

function getData($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$arr = $rs->fetch_all(MYSQLI_ASSOC);
	//foreach($arr as $row) {
	//  echo $row['nama_kelas'] . '*<br>';
	//}
	
	$rs->free();
	return $arr;
}

function getAdmin($conn,$kode){
$field="username";
$sql="SELECT `$field` FROM `tb_admin` where `kode_admin`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	
	function getSiswa($conn,$kode){
$field="nama_siswa";
$sql="SELECT `$field` FROM `tb_siswa` where `kode_siswa`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	
	function getJadwal($conn,$kode){
$field="pertemuan";
$sql="SELECT `$field` FROM `tb_jadwal` where `kode_jadwal`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	
	function getPenilaian($conn,$kode){
$field="kode_penilaian";
$sql="SELECT `$field` FROM `tb_penilaian` where `kode_penilaian`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	
	function getMatapelajaran($conn,$kode){
$field="nama_matapelajaran";
$sql="SELECT `$field` FROM `tb_matapelajaran` where `kode_matapelajaran`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
?>

