<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
?>


<h3><center>Laporan data Penilaian:</h3>
 

<table width="99%" border="0">
  <tr>
    <th width="5%"><center>No</td>
    <th width="10%"><center>Kode Penilaian</td>
    <th width="20%"><center>NIM</td>
    <th width="20%"><center>Nama</td>
    <th width="20%"><center>Kode Mapel</td>
    <th width="20%"><center>Periode</td>
    <th width="10%"><center>Level</td>
    <th width="10%"><center>Nilai</td>
    <th width="10%"><center>Catatan</td>
  </tr>
<?php  
  $sql = "SELECT tb_penilaian.*, tb_siswa.nama_siswa FROM `tb_penilaian` INNER JOIN tb_siswa ON tb_penilaian.kode_siswa = tb_siswa.kode_siswa;";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$kode_penilaian=$d["kode_penilaian"];
				$kode_siswa=$d["kode_siswa"];
				$nama_siswa=$d["nama_siswa"];
				$kode_matapelajaran=$d["kode_matapelajaran"];
				$periode_ajaran=$d["periode_ajaran"];
				$level=$d["level"];
				$catatan=$d["catatan"];
				$nilai=$d["nilai"];

if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td>$no</td>
				<td>$kode_penilaian</td>
				<td>$kode_siswa</td>
				<td>$nama_siswa</td>
				<td>$kode_matapelajaran</td>
				<td>$periode_ajaran</td>
				<td>$level</td>
				<td>$nilai</td>
				<td>$catatan</td>
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td>$no</td>
				<td>$kode_penilaian</td>
				<td>$kode_siswa</td>
				<td>$nama_siswa</td>
				<td>$kode_matapelajaran</td>
				<td>$periode_ajaran</td>
				<td>$level</td>
				<td>$nilai</td>
				<td>$catatan</td>
				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data penilaiandetail belum tersedia...</blink></td></tr>";}
		
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

</table>

