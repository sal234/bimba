<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
?>


<h3><center>Laporan data pendaftaran:</h3>
 

<table width="100%" border="0">
  <tr>
    <th width="5%"><center>no</td>
    <th width="10%"><center>kode_pendaftaran</td>
    <th width="25%"><center>kode_siswa</td>
    <th width="25%"><center>tgl</td>
    <th width="20%"><center>periode_ajaran</td>
    <th width="10%"><center>level</td>
    <th width="5%"><center>keterangan</td>
    <th width="5%"><center>kode_jadwal</td>
  </tr>
<?php  
  $sql="select * from `$tbpendaftaran` order by `kode_pendaftaran` desc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$kode_pendaftaran=$d["kode_pendaftaran"];
				$kode_siswa=$d["kode_siswa"];
				$tgl=$d["tgl"];
				$periode_ajaran=$d["periode_ajaran"];
				$level=$d["level"];
				$keterangan=$d["keterangan"];
				$kode_jadwal=$d["kode_jadwal"];
						
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td>$no</td>
				<td>$kode_pendaftaran</td>
				<td>$kode_siswa</td>
				<td>$tgl</td>
				<td>$periode_ajaran</td>
				<td>$level</td>
				<td>$keterangan</td>
				<td>$kode_jadwal</td>
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td>$no</td>
				<td>$kode_pendaftaran</td>
				<td>$kode_siswa</td>
				<td>$tgl</td>
				<td>$periode_ajaran</td>
				<td>$level</td>
				<td>$keterangan</td>
				<td>$kode_jadwal</td>
				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data pendaftaran belum tersedia...</blink></td></tr>";}
		
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

