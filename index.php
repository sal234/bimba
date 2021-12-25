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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Aplikasi Informasi Bimba AIUEO</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.1.3.1.pack.js" type="text/javascript"></script>
<script src="js/jquery.history_remote.pack.js" type="text/javascript"></script>
<script src="js/jquery.tabs.pack.js" type="text/javascript"></script>
<script type="text/javascript">
	$(function() {

		$('#container-4').tabs({ fxFade: true, fxSpeed: 'slow' });

	});
</script>

<link rel="stylesheet" href="jquery.tabs.css" type="text/css" media="print, projection, screen" />
<style type="text/css" media="screen, projection">
	#templatemo_middle {
		overflow: hidden;
		width: 960px;
		height: 320px;
		background: url(images/templatemo_middle.jpg) no-repeat
	}
</style>

</head>
<body>

<div id="templatemo_body_wrapper">
<div id="templatemo_wrapper">

	<div id="templatemo_header">
    	<div id="site_title">
            <a href="#"><img src="ypathfile/bimba.png" alt="Selamat Datang di BIMA AIUEU" /><span></span></a>
        </div> 
    	<!-- end of site_title -->
    </div><!-- end of header -->
    
    <div id="templatemo_menu">
    	<ul>
        <?php
if($_SESSION["cstatus"]=="Administrator"){	
      echo"
      <li><a href='index.php?mnu=admin'>Admin</a></li>
	  <li><a href='index.php?mnu=matapelajaran'>Mata Pelajaran</a></li>
	  <li><a href='index.php?mnu=jadwal'>Jadwal</a></li>

	  <li><a href='index.php?mnu=siswa'>Siswa</a></li>
	  <li><a href='index.php?mnu=pendaftaranadmin'>Pendaftaran</a></li>
	  <li><a href='index.php?mnu=absensi'>Absensi</a></li>
	  <li><a href='index.php?mnu=penilaian'>Penilaian</a></li>
      
	  >";
}
else if($_SESSION["cstatus"]=="Siswa"){	
      echo"
      <li><a href='index.php?mnu=home'>Home</a></li>
      <li><a href='index.php?mnu=profil'>Profil</a></li>
	  <li><a href='index.php?mnu=pendaftaransiswa'>Daftar Ulang</a></li>
	  <li><a href='index.php?mnu=matapelajaransiswa'>Mata Pelajaran</a></li>
	  <li><a href='index.php?mnu=jadwalsiswa'>Jadwal</a></li>
	  <li><a href='index.php?mnu=absensisiswa'>Absensi</a></li>
	  <li><a href='index.php?mnu=penilaiansiswa'>Penilaian</a></li>
      
	  >";
}
else{
	?>
            <li><a href="index.php" <?php if($mnu=="home"){echo"class='current'";}?>>Home</a></li>
            <li><a href="index.php?mnu=tentang" <?php if($mnu=="tentang"){echo"class='current'";}?>>Tentang</a></li>
            <li><a href="index.php?mnu=kontak" <?php if($mnu=="kontak"){echo"class='current'";}?>>Kontak</a></li>
            <li><a href="index.php?mnu=pendaftaran" <?php if($mnu=="pendaftaran"){echo"class='current'";}?>>Pendaftaran</a></li>
            <li><a href="index.php?mnu=login" <?php if($mnu=="login"){echo"class='current'";}?>>Login</a></li>
      <?php
}
?>
      
        </ul> 
    </div> <!-- end of menu -->
 
    <div id="templatemo_middle">
        <div id="container-4">
            <div id="service-1">
                <h1>Pendaftaran Sebagai Anggota Bimba</h1>
                <p>Dengan melakukan pendaftaran berarti anda sudah menjadi anggota di Bimba AIUEO yang selanjutnya adalah Anda menentukan leveling belajar.</p>
            </div>
            <div id="service-2">
                <h1>Penentuan Leveling Tingkatan</h1>
                <p>Dengan metode belajar mengajar sistematis  Kami akan membantu Anda dalam penentuan Leveling Tingkatan Belajar </p>
            </div>
            <div id="service-3">
                <h1>Tiap tiap siswa diberikan kebebasan memilih Jadwal yang diinginkannya</h1>
                <p>Kebebasan memilih jadwal balajr mengajar dalam seminggunya bisa ditentukan sesuai ketersediaan waktu anak dan orang tua</p>
            </div>
            
            
             <div id="service-4">
                <h1>Proses Belajar Mengajar Dimba AIUEO</h1>
                <p>Penentuan Kurikulum belajar mengajar, Evaluasi dan penilaian juga absensi kehadiran dan laporan perkembangan anak</p>
            </div>
            <ul>
                <li><a href="#service-1">Pendaftaran<span>Daftar Sebagai Anggota</span></a></li>
                <li><a href="#service-2">Leveling<span>Pendaftaran Ulang</span></a></li>
                <li><a href="#service-3">Jadwal<span>Pemilihan Jadwal Belajar</span></a></li>
                <li><a href="#service-4">Penilaian<span>Proses Belajar Mengajar</span></a></li>
            </ul>
        </div>
        
        
    </div>
    
    <div id="templatemo_main_base">
    <div id="templatemo_main">
    	
        <div class="content_box">
        
<?php

 if($mnu=="" || $mnu=="home"){
	require_once"home1.php";
 }
 else if($mnu=="tentang"){require_once"tentang.php";}
 else if($mnu=="kontak"){require_once"kontak.php";}
 else if($mnu=="login"){require_once"login.php";}
 else if($mnu=="pendaftaran"){require_once"pendaftaran.php";}

else if($mnu=="admin"){require_once"admin/admin.php";}
else if($mnu=="matapelajaran"){require_once"matapelajaran/matapelajaran.php";}
else if($mnu=="jadwal"){require_once"jadwal/jadwal.php";}

else if($mnu=="siswa"){require_once"siswa/siswa.php";}
else if($mnu=="pendaftaranadmin"){require_once"pendaftaran/pendaftaran.php";}
else if($mnu=="absensi"){require_once"absensi/absensi.php";}
else if($mnu=="penilaian"){require_once"penilaian/penilaian.php";}
else if($mnu=="penilaiandetail"){require_once"penilaiandetail/penilaiandetail.php";}


else if($mnu=="matapelajaransiswa"){require_once"matapelajaran/matapelajaransiswa.php";}
else if($mnu=="jadwalsiswa"){require_once"jadwal/jadwalsiswa.php";}
else if($mnu=="profil"){require_once"siswa/profil.php";}
else if($mnu=="profil2"){require_once"siswa/profil2.php";}

else if($mnu=="pendaftaransiswa"){require_once"pendaftaran/pendaftaransiswa.php";}
else if($mnu=="absensisiswa"){require_once"absensi/absensisiswa.php";}
else if($mnu=="penilaiansiswa"){require_once"penilaian/penilaiansiswa.php";}

else if($mnu=="logout"){require_once"logout.php";}
?>        
            
            
            
            <div class="cleaner"></div>
        </div>
        
 <?php
 
 if($mnu=="" || $mnu=="home"||$mnu=="login"){
require_once"home2.php";
 }
 else  if($mnu=="tentang"){
require_once"home3.php";
 }
 ?>       
    
    </div>    
    </div>	<!-- end of main_base -->
    <div id="templatemo_main_bottom"></div>
    
    <div id="templatemo_footer">
    	
         <a href="index.php" class="current">Home</a> | <a href="?mnu=tentang">About Us</a> | <a href="?mnu=pendaftaran">Pendaftaran</a> | 
         <a href="?mnu=bukutamu">Bukutamu</a>|
         
           <?php
		 if(!isset($_SESSION["cid"])){echo"<a href='?mnu=login'>Login</a> |";}
		else{echo"<a href='?mnu=logout'>Logout</a> |";}		 
		 ?>
         
      <br /><br />
    	Copyright © 2017<a href="#">BIMBA AIUEO</a>
    
    </div> <!-- end of footer -->
	
    <div class="cleaner"></div>
</div> <!-- end of wrapper -->
</div> <!-- end of body_wrapper -->

</body>
</html>


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
	$arr=preg_split(" ",$tanggal);
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
	$arr=preg_split(" ",$tanggal);
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

