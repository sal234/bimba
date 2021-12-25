<?php
$pro="simpan";
$tgl_lahir= date("Y-m-d");
?>
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
    
  <!-- <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tgl_lahir").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>     -->

<script type="text/javascript"> 
function PRINT(){ 
win=window.open('siswa/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, telepon=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php
  $sql="select `kode_siswa` from `$tbsiswa` order by `kode_siswa` desc LIMIT 1";
$q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kd=$th.$bl;//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["kode_siswa"];

    if(isset($idmax)){
		$idmax = $idmax + 1;
    }//==
    else{
     $idmax="$kd"."001";
     }   
   }//jum>0
  else{$idmax="$kd"."001";}
  $kode_siswa=$idmax;
?>

<?php
if($_GET["pro"]=="ubah"){
	$kode_siswa=$_GET["kode"];
	$sql="select * from `$tbsiswa` where `kode_siswa`='$kode_siswa'";
	$d=getField($conn,$sql);
				$kode_siswa=$d["kode_siswa"];
				$kode_siswa0=$d["kode_siswa"];
				$nama_siswa=$d["nama_siswa"];
				$jenis_kelamin=$d["jenis_kelamin"];
				$agama=$d["agama"];
				$tgl_lahir=$d["tgl_lahir"];
				$alamat=$d["alamat"];
				$telepon=$d["telepon"];
				$email=$d["email"];
				$nama_ortu=$d["nama_ortu"];
				$username=$d["username"];
				$password=$d["password"];
				$status=$d["status"];
				$pro="ubah";		
}
?>


<form action="" method="post" enctype="multipart/form-data">
<table width="545">


<tr>
<td width="129"><label for="kode_siswa">Kode Siswa</label>
<td width="10" valign="top">:
<td width="391" colspan="2"><b><?php echo $kode_siswa;?></b>
</tr>

<tr>
<td><label for="nama_siswa">Nama Siswa</label>
<td valign="top">:
<td colspan="2"><input name="nama_siswa" type="text" id="nama_siswa" value="<?php echo $nama_siswa;?>" size="30" /></td>
</tr>

<tr>
<td><label for="jenis_kelamin">jenis Kelamin</label>
<td valign="top">:<td colspan="2">
<input type="radio" name="jenis_kelamin" id="jenis_kelamin"  checked="checked" value="Laki-Laki" <?php if($jenis_kelamin=="Laki-Laki"){echo"checked";}?>/>Laki-Laki
<input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan" <?php if($jenis_kelamin=="Perempuan"){echo"checked";}?>/>Perempuan
</td></tr>

<tr>
<td height="24"><label for="agama">Agama</label>
<td valign="top">:
<td><select name="agama" id="agama">
  <option value="-">Pilih Agama</option>
  <option value="Islam"<?php if($agama=="Islam"){echo "selected"; } ?>>Islam</option>
  <option value="Hindu"<?php if($agama=="Hindu"){echo "selected"; } ?>>Hindu</option>
  <option value="Budha"<?php if($agama=="Budha"){echo "selected"; } ?>>Budha</option>
  <option value="Kristen"<?php if($agama=="Kristen"){echo "selected"; } ?>>Kristen</option>
  <option value="Khatolik"<?php if($agama=="Khatolik"){echo "selected"; } ?>>Khatolik</option>
</select></td>
</tr>

<tr>
<td height="24"><label for="tgl_lahir">Tanggal Lahir</label>
<td valign="top">:
<td><input name="tgl_lahir" type="text" id="tgl_lahir" value="<?php echo $tgl_lahir;?>" size="15" />
</td>
</tr>


<tr>
<td height="24"><label for="alamat">Alamat</label>
<td valign="top">:<td colspan="2"><textarea name="alamat" cols="30" id="alamat"><?php echo $alamat;?></textarea>
</td>
</tr>

<tr>
<td><label for="telepon">Telepon</label>
<td valign="top">:<td colspan="2"><input name="telepon" type="text" id="telepon" value="<?php echo $telepon;?>" size="15" /></td></tr>

<tr>
<td><label for="email">Email</label>
<td valign="top">:<td colspan="2"><input name="email" type="text" id="email" value="<?php echo $email;?>" size="30" /></td></tr>

<tr>
<td><label for="nama_ortu">Nama Orang Tua</label>
<td valign="top">:<td colspan="2"><input name="nama_ortu" type="text" id="nama_ortu" value="<?php echo $nama_ortu;?>" size="30" /></td></tr>

<tr>
<td><label for="username">Username</label>
<td valign="top">:<td colspan="2"><input name="username" type="text" id="username" value="<?php echo $username;?>" size="30" /></td></tr>

<tr>
<td><label for="password">Password</label>
<td valign="top">:<td colspan="2"><input name="password" type="text" id="password" value="<?php echo $password;?>" size="30" /></td></tr>

<tr>
<td><label for="status">Status</label>
<td valign="top">:<td colspan="2">
<input type="radio" name="status" id="status"  checked="checked" value="Aktif" <?php if($status=="Aktif"){echo"checked";}?>/>Aktif 
<input type="radio" name="status" id="status" value="Tidak Aktif" <?php if($status=="Tidak Aktif"){echo"checked";}?>/>Tidak Aktif
</td></tr>


<tr>
<td>
<td valign="top">
<td colspan="2">	<input name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="kode_siswa" type="hidden" id="kode_siswa" value="<?php echo $kode_siswa;?>" />
        <input name="kode_siswa0" type="hidden" id="kode_siswa0" value="<?php echo $kode_siswa0;?>" />
        <a href="?mnu=siswa"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>

Data siswa: 
| <a href="siswa/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <a href="siswa/xls.php"><img src='ypathicon/xls.png' alt='XLS'></a> 
| <a href="siswa/xml.php"><img src='ypathicon/xml.png' alt='XML'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table width="100%" border="0">
  <tr bgcolor="#00FF99">
    <td width="3%"><center>no</th>
    <td width="10%"><center>kode</th>
    <td width="20%"><center>nama_siswa</th>
    <td width="10%"><center>jenis_kelamin</th>
    <td width="10%"><center>Agama</th>
    <td width="30%"><center>tgl_lahir</th>
    <td width="15%"><center>alamat</th>
    <td width="10%"><center>telepon</th>
    <td width="10%"><center>email</th>
    <td width="10%"><center>nama_ortu</th>
    <td width="10%"><center>username</th>
    <td width="10%"><center>password</th>
    <td width="10%"><center>status</th>
    <td width="10%"><center>menu</th>
  </tr>
<?php  
  $sql="select * from `$tbsiswa` order by `kode_siswa` desc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
	//--------------------------------------------------------------------------------------------
	$batas   = 10;
	$page = $_GET['page'];
	if(empty($page)){$posawal  = 0;$page = 1;}
	else{$posawal = ($page-1) * $batas;}
	
	$sql2 = $sql." LIMIT $posawal,$batas";
	$no = $posawal+1;
	//--------------------------------------------------------------------------------------------									
	$arr=getData($conn,$sql2);
		foreach($arr as $d) {							
				$kode_siswa=$d["kode_siswa"];
				$nama_siswa=$d["nama_siswa"];
				$jenis_kelamin=$d["jenis_kelamin"];
				$agama=$d["agama"];
				$tgl_lahir=$d["tgl_lahir"];
				$alamat=$d["alamat"];
				$telepon=$d["telepon"];
				$email=$d["email"];
				$nama_ortu=$d["nama_ortu"];
				$username=$d["username"];
				$password=$d["password"];
				$status=$d["status"];
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$kode_siswa</td>
				<td>$nama_siswa</td>
				<td>$jenis_kelamin</td>
				<td>$agama</td>
				<td>$tgl_lahir</td>
				<td>$alamat</td>
				<td>$telepon</td>
				<td>$email</td>
				<td>$nama_ortu</td>
				<td>$username</td>
				<td>$password</td>
				<td>$status</td>
				<td align='center'>
<a href='?mnu=siswa&pro=ubah&kode=$kode_siswa'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=siswa&pro=hapus&kode=$kode_siswa'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama_siswa pada data siswa ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data siswa belum tersedia...</blink></td></tr>";}
?>
</table>

<?php
//Langkah 3: Hitung total data dan page 
$jmldata = $jum;
if($jmldata>0){
	if($batas<1){$batas=1;}
	$jmlhal  = ceil($jmldata/$batas);
	echo "<div class=paging>";
	if($page > 1){
		$prev=$page-1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=siswa'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=siswa'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=siswa'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
	echo "<p align=center>Total Data <b>$jmldata</b> Item</p>";
?>

<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$kode_siswa=strip_tags($_POST["kode_siswa"]);
	$kode_siswa0=strip_tags($_POST["kode_siswa0"]);
	$nama_siswa=strip_tags($_POST["nama_siswa"]);
	$jenis_kelamin=strip_tags($_POST["jenis_kelamin"]);
	$agama=strip_tags($_POST["agama"]);
	$tgl_lahir=strip_tags($_POST["tgl_lahir"]);
	$alamat=strip_tags($_POST["alamat"]);
	$telepon=strip_tags($_POST["telepon"]);
	$email=strip_tags($_POST["email"]);
	$nama_ortu=strip_tags($_POST["nama_ortu"]);
	$username=strip_tags($_POST["username"]);
	$password=strip_tags($_POST["password"]);
	$status=strip_tags($_POST["status"]);
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbsiswa` (
`kode_siswa` ,
`nama_siswa` ,
`jenis_kelamin` ,
`agama` ,
`tgl_lahir` ,
`alamat` ,
`telepon`,
`email` ,
`nama_ortu` ,
`username` ,
`password` ,
`status`  
) VALUES (
'$kode_siswa', 
'$nama_siswa', 
'$jenis_kelamin',
'$agama',
'$tgl_lahir',
'$alamat',
'$telepon',
'$email', 
'$nama_ortu',
'$username',
'$password',
'$status'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $kode_siswa berhasil disimpan !');document.location.href='?mnu=siswa';</script>";}
		else{echo"<script>alert('Data $kode_siswa gagal disimpan...');document.location.href='?mnu=siswa';</script>";}
	}
	else{
$sql="update `$tbsiswa` set 
`nama_siswa`='$nama_siswa',
`jenis_kelamin`='$jenis_kelamin' ,
`agama`='$agama',
`tgl_lahir`='$tgl_lahir',
`alamat`='$alamat',
`telepon`='$telepon',
`email`='$email',
`nama_ortu`='$nama_ortu' ,
`username`='$username',
`password`='$password',
`status`='$status'
where `kode_siswa`='$kode_siswa0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $kode_siswa berhasil diubah !');document.location.href='?mnu=siswa';</script>";}
	else{echo"<script>alert('Data $kode_siswa gagal diubah...');document.location.href='?mnu=siswa';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$kode_siswa=$_GET["kode"];
$sql="delete from `$tbsiswa` where `kode_siswa`='$kode_siswa'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data siswa $kode_siswa berhasil dihapus !');document.location.href='?mnu=siswa';</script>";}
else{echo"<script>alert('Data siswa $kode_siswa gagal dihapus...');document.location.href='?mnu=siswa';</script>";}
}
?>

