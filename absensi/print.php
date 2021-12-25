<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
?>


<h3><center>Laporan data absensi:</h3>
 

<table width="100%" border="0">
  <tr>
    <th width="5%"><center>no</td>
    <th width="10%"><center>kode_absensi</td>
    <th width="25%"><center>tgl</td>
    <th width="25%"><center>jam</td>
    <th width="20%"><center>kode_siswa</td>
    <th width="10%"><center>status</td>
    <th width="5%"><center>keterangan</td>
  </tr>
<?php  
  $sql="select * from `$tbabsensi` order by `kode_absensi` desc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$kode_absensi=$d["kode_absensi"];
				$tgl=$d["tgl"];
				$jam=$d["jam"];
				$kode_siswa=$d["kode_siswa"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];
						
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td>$no</td>
				<td>$kode_absensi</td>
				<td>$tgl</td>
				<td>$jam</td>
				<td>$kode_siswa</td>
				<td>$status</td>
				<td>$keterangan</td>
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td>$no</td>
				<td>$kode_absensi</td>
				<td>$tgl</td>
				<td>$jam</td>
				<td>$kode_siswa</td>
				<td>$status</td>
				<td>$keterangan</td>
				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data absensi belum tersedia...</blink></td></tr>";}
		
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

