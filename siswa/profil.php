<?php
$pro="simpan";
$tgl_lahir=WKT(date("Y-m-d"));
?>
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tgl_lahir").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>    

<script type="text/javascript"> 
function PRINT(){ 
win=window.open('siswa/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, telepon=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php

	$kode_siswa=$_SESSION["cid"];
	$sql="select * from `$tbsiswa` where `kode_siswa`='$kode_siswa'";
	$d=getField($conn,$sql);
				$kode_siswa=$d["kode_siswa"];
				$kode_siswa0=$d["kode_siswa"];
				$nama_siswa=$d["nama_siswa"];
				$jenis_kelamin=$d["jenis_kelamin"];
				$tgl_lahir=WKT($d["tgl_lahir"]);
				$alamat=$d["alamat"];
				$telepon=$d["telepon"];
				$agama=$d["agama"];
				$email=$d["email"];
				$nama_ortu=$d["nama_ortu"];
				$username=$d["username"];
				$password=$d["password"];
				$status=$d["status"];

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
<td height="24"><label for="tgl_lahir">Tanggal Lahir</label>
<td valign="top">:
<td><input name="tgl_lahir" type="text" id="tgl_lahir" value="<?php echo $tgl_lahir;?>" size="15" />
  <label for="kode_barang"></label></td>
</tr>

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
<td valign="top">:<td colspan="2"><?php echo $status;?>
</td></tr>


<tr>
<td>
<td valign="top">
<td colspan="2">	<input name="Simpan" type="submit" id="Simpan" value="Update Profil" />
        <a href="?mnu=profil"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>

<?php
if(isset($_POST["Simpan"])){
	$kode_siswa0=strip_tags($_SESSION["cid"]);
	$nama_siswa=strip_tags($_POST["nama_siswa"]);
	$jenis_kelamin=strip_tags($_POST["jenis_kelamin"]);
	$tgl_lahir=BAL(strip_tags($_POST["tgl_lahir"]));
	$alamat=strip_tags($_POST["alamat"]);
	$telepon=strip_tags($_POST["telepon"]);
	$agama=strip_tags($_POST["agama"]);
	$email=strip_tags($_POST["email"]);
	$nama_ortu=strip_tags($_POST["nama_ortu"]);
	$username=strip_tags($_POST["username"]);
	$password=strip_tags($_POST["password"]);
	
$sql="update `$tbsiswa` set 
`nama_siswa`='$nama_siswa',
`jenis_kelamin`='$jenis_kelamin' ,
`tgl_lahir`='$tgl_lahir',`agama`='$agama',
`telepon`='$telepon',
`alamat`='$alamat',
`email`='$email',
`nama_ortu`='$nama_ortu' ,
`username`='$username',
`password`='$password'
where `kode_siswa`='$kode_siswa0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $kode_siswa berhasil diubah !');document.location.href='?mnu=profil';</script>";}
	else{echo"<script>alert('Data $kode_siswa gagal diubah...');document.location.href='?mnu=profil';</script>";}
	
}
?>
