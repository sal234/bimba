<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
?>


<h3><center>Laporan data siswa:</h3>
 

<table width="100%" border="0">
  <tr>
    <th width="5%"><center>No</td>
    <th width="10%"><center>Kode Sswa</td>
    <th width="25%"><center>Nama Siswa</td>
    <th width="25%"><center>Jenis Kelamin</td>
    <th width="20%"><center>Tgl Lahir</td>
    <th width="20%"><center>Agama</td>
    <th width="10%"><center>Alamat</td>
    <th width="5%"><center>Telepon</td>
    <th width="25%"><center>Email</td>
    <th width="25%"><center>Nama Ortu</td>
    <th width="20%"><center>Username</td>
    <th width="10%"><center>Password</td>
    <th width="5%"><center>Status</td>
  </tr>
<?php  
  $sql="select * from `$tbsiswa` order by `kode_siswa` desc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
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
						
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td>$no</td>
				<td>$kode_siswa</td>
				<td>$nama_siswa</td>
				<td>$jenis_kelamin</td>
				<td>$tgl_lahir</td>		
				<td>$agana</td>
				<td>$alamat</td>
				<td>$telepon</td>
				<td>$email</td>
				<td>$nama_ortu</td>
				<td>$username</td>
				<td>$password</td>
				<td>$status</td>
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td>$no</td>
				<td>$kode_siswa</td>
				<td>$nama_siswa</td>
				<td>$jenis_kelamin</td>
				<td>$tgl_lahir</td>
				<td>$agana</td>
				<td>$alamat</td>
				<td>$telepon</td>
				<td>$email</td>
				<td>$nama_ortu</td>
				<td>$username</td>
				<td>$password</td>
				<td>$status</td>
				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data siswa belum tersedia...</blink></td></tr>";}
		
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

