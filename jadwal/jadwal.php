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
win=window.open('jadwal/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php
  $sql="select `kode_jadwal` from `$tbjadwal` order by `kode_jadwal` desc";
$q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kd="JDW".$th.$bl;//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["kode_jadwal"];
   
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
  $kode_jadwal=$idmax;
?>

<?php
if($_GET["pro"]=="ubah"){
	$kode_jadwal=$_GET["kode"];
	$sql="select * from `$tbjadwal` where `kode_jadwal`='$kode_jadwal'";
	$d=getField($conn,$sql);
				$kode_jadwal=$d["kode_jadwal"];
				$kode_jadwal0=$d["kode_jadwal"];
				$pertemuan=$d["pertemuan"];
				$biaya=$d["biaya"];
				$keterangan=$d["keterangan"];
				$pro="ubah";		
}
?>


<form action="" method="post" enctype="multipart/form-data">
<table width="490">


<tr>
<td width="124"><label for="kode_jadwal">Kode Jadwal</label>
<td width="10" valign="top">:
<td width="341" colspan="2"><b><?php echo $kode_jadwal;?></b>
</tr>

<tr>
<td><label for="pertemuan">Pertemuan</label>
<td valign="top">:
<td colspan="2"><input name="pertemuan" type="text" id="pertemuan" value="<?php echo $pertemuan;?>" size="15" /></td>
</tr>

<tr>
<td height="24"><label for="biaya">Biaya</label>
<td valign="top">:<td colspan="2"><input name="biaya" type="text" id="biaya" value="<?php echo $biaya;?>" size="25" />
</td>
</tr>

<tr>
<td height="24"><label for="keterangan">Keterangan</label>
<td valign="top">:
<td><textarea name="keterangan" cols="30" id="keterangan"><?php echo $keterangan;?></textarea>
</tr>

<tr>
<td>
<td valign="top">
<td colspan="2">	<input name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="kode_jadwal" type="hidden" id="kode_jadwal" value="<?php echo $kode_jadwal;?>" />
        <input name="kode_jadwal0" type="hidden" id="kode_jadwal0" value="<?php echo $kode_jadwal0;?>" />
        <a href="?mnu=jadwal"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>

Data jadwal: 
| <a href="jadwal/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <a href="jadwal/xls.php"><img src='ypathicon/xls.png' alt='XLS'></a> 
| <a href="jadwal/xml.php"><img src='ypathicon/xml.png' alt='XML'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table width="100%" border="0">
  <tr bgcolor="#00FF99">
    <td width="3%"><center>no</th>
    <td width="10%"><center>kode_jadwal</th>
    <td width="20%"><center>pertemuan</th>
    <td width="10%"><center>biaya</th>
    <td width="30%"><center>keterangan</th>
    <td width="10%"><center>menu</th>
  </tr>
<?php  
  $sql="select * from `$tbjadwal` order by `kode_jadwal` desc";
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
				$kode_jadwal=$d["kode_jadwal"];
				$pertemuan=$d["pertemuan"];
				$biaya=$d["biaya"];
				$keterangan=$d["keterangan"];
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$kode_jadwal</td>
				<td>$pertemuan</td>
				<td>$biaya</td>
				<td>$keterangan</td>
				<td align='center'>
<a href='?mnu=jadwal&pro=ubah&kode=$kode_jadwal'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=jadwal&pro=hapus&kode=$kode_jadwal'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $pertemuan pada data jadwal ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data jadwal belum tersedia...</blink></td></tr>";}
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=jadwal'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=jadwal'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=jadwal'>Next »</a></span>";
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
	$kode_jadwal=strip_tags($_POST["kode_jadwal"]);
	$kode_jadwal0=strip_tags($_POST["kode_jadwal0"]);
	$pertemuan=strip_tags($_POST["pertemuan"]);
	$biaya=strip_tags($_POST["biaya"]);
	$keterangan=strip_tags($_POST["keterangan"]);
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbjadwal` (
`kode_jadwal` ,
`pertemuan` ,
`biaya` ,
`keterangan`
) VALUES (
'$kode_jadwal', 
'$pertemuan', 
'$biaya',
'$keterangan'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $kode_jadwal berhasil disimpan !');document.location.href='?mnu=jadwal';</script>";}
		else{echo"<script>alert('Data $kode_jadwal gagal disimpan...');document.location.href='?mnu=jadwal';</script>";}
	}
	else{
$sql="update `$tbjadwal` set 
`pertemuan`='$pertemuan',
`biaya`='$biaya' ,
`keterangan`='$keterangan'
where `kode_jadwal`='$kode_jadwal0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $kode_jadwal berhasil diubah !');document.location.href='?mnu=jadwal';</script>";}
	else{echo"<script>alert('Data $kode_jadwal gagal diubah...');document.location.href='?mnu=jadwal';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$kode_jadwal=$_GET["kode"];
$sql="delete from `$tbjadwal` where `kode_jadwal`='$kode_jadwal'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data jadwal $kode_jadwal berhasil dihapus !');document.location.href='?mnu=jadwal';</script>";}
else{echo"<script>alert('Data jadwal $kode_jadwal gagal dihapus...');document.location.href='?mnu=jadwal';</script>";}
}
?>

