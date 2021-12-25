<?php
$pro="simpan";
$tanggal=WKT(date("Y-m-d"));
?>
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />  
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>    

<script type="text/javascript"> 
function PRINT(){ 
win=window.open('matapelajaran/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php
  $sql="select `kode_matapelajaran` from `$tbmatapelajaran` order by `kode_matapelajaran` desc";
$q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kd="MTP".$th.$bl;//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["kode_matapelajaran"];
   
   $bul=substr($idmax,5,2);
   $tah=substr($idmax,3,2);
    if($bul==$bl && $tah==$th){
     $urut=substr($idmax,7,3)+1;
     if($urut<10){$idmax="$kd"."00".$urut;}
     else if($urut<100){$idmax="$kd"."0".$urut;}
     else{$idmax="$kd".$urut;}
    }//==
    else{
     $idmax="$kd"."001";
     }   
   }//jum>0
  else{$idmax="$kd"."001";}
  $kode_matapelajaran=$idmax;
?>

<?php
if($_GET["pro"]=="ubah"){
	$kode_matapelajaran=$_GET["kode"];
	$sql="select * from `$tbmatapelajaran` where `kode_matapelajaran`='$kode_matapelajaran'";
	$d=getField($conn,$sql);
				$kode_matapelajaran=$d["kode_matapelajaran"];
				$kode_matapelajaran0=$d["kode_matapelajaran"];
				$nama_matapelajaran=$d["nama_matapelajaran"];
				$deskripsi=$d["deskripsi"];
				$pro="ubah";		
}
?>


<form action="" method="post" enctype="multipart/form-data">
<table width="481">


<tr>
<td width="131"><label for="kode_matapelajaran">Kode Matpel</label>
<td width="10" valign="top">:
<td width="324" colspan="2"><b><?php echo $kode_matapelajaran;?></b>
</tr>

<tr>
<td><label for="nama_matapelajaran">Nama Matpel</label><td valign="top">:
<td colspan="2"><input name="nama_matapelajaran" type="text" id="nama_matapelajaran" value="<?php echo $nama_matapelajaran;?>" size="30" /></td>
</tr>

<tr>
<td height="24"><label for="deskripsi">Deskripsi</label>
<td valign="top">:<td colspan="2"><textarea name="deskripsi" cols="30" id="deskripsi"><?php echo $deskripsi;?></textarea>
</td>
</tr>

<tr>
<td>
<td valign="top">
<td colspan="2">	<input name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="kode_matapelajaran" type="hidden" id="kode_matapelajaran" value="<?php echo $kode_matapelajaran;?>" />
        <input name="kode_matapelajaran0" type="hidden" id="kode_matapelajaran0" value="<?php echo $kode_matapelajaran0;?>" />
        <a href="?mnu=matapelajaran"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>

Data matapelajaran: 
| <a href="matapelajaran/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <a href="matapelajaran/xls.php"><img src='ypathicon/xls.png' alt='XLS'></a> 
| <a href="matapelajaran/xml.php"><img src='ypathicon/xml.png' alt='XML'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table width="100%" border="0">
  <tr bgcolor="#00FF99">
    <td width="3%"><center>no</th>
    <td width="10%"><center>kode</th>
    <td width="20%"><center>nama_matapelajaran</th>
    <td width="10%"><center>deskripsi</th>
    <td width="10%"><center>menu</th>
  </tr>
<?php  
  $sql="select * from `$tbmatapelajaran` order by `kode_matapelajaran` desc";
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
				$kode_matapelajaran=$d["kode_matapelajaran"];
				$nama_matapelajaran=$d["nama_matapelajaran"];
				$deskripsi=$d["deskripsi"];
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$kode_matapelajaran</td>
				<td>$nama_matapelajaran</td>
				<td>$deskripsi</td>
				<td align='center'>
<a href='?mnu=matapelajaran&pro=ubah&kode=$kode_matapelajaran'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=matapelajaran&pro=hapus&kode=$kode_matapelajaran'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama_matapelajaran pada data matapelajaran ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data matapelajaran belum tersedia...</blink></td></tr>";}
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=matapelajaran'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=matapelajaran'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=matapelajaran'>Next »</a></span>";
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
	$kode_matapelajaran=strip_tags($_POST["kode_matapelajaran"]);
	$kode_matapelajaran0=strip_tags($_POST["kode_matapelajaran0"]);
	$nama_matapelajaran=strip_tags($_POST["nama_matapelajaran"]);
	$deskripsi=strip_tags($_POST["deskripsi"]);
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbmatapelajaran` (
`kode_matapelajaran` ,
`nama_matapelajaran` ,
`deskripsi`
) VALUES (
'$kode_matapelajaran', 
'$nama_matapelajaran', 
'$deskripsi'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $kode_matapelajaran berhasil disimpan !');document.location.href='?mnu=matapelajaran';</script>";}
		else{echo"<script>alert('Data $kode_matapelajaran gagal disimpan...');document.location.href='?mnu=matapelajaran';</script>";}
	}
	else{
$sql="update `$tbmatapelajaran` set 
`nama_matapelajaran`='$nama_matapelajaran',
`deskripsi`='$deskripsi'
where `kode_matapelajaran`='$kode_matapelajaran0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $kode_matapelajaran berhasil diubah !');document.location.href='?mnu=matapelajaran';</script>";}
	else{echo"<script>alert('Data $kode_matapelajaran gagal diubah...');document.location.href='?mnu=matapelajaran';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$kode_matapelajaran=$_GET["kode"];
$sql="delete from `$tbmatapelajaran` where `kode_matapelajaran`='$kode_matapelajaran'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data matapelajaran $kode_matapelajaran berhasil dihapus !');document.location.href='?mnu=matapelajaran';</script>";}
else{echo"<script>alert('Data matapelajaran $kode_matapelajaran gagal dihapus...');document.location.href='?mnu=matapelajaran';</script>";}
}
?>

