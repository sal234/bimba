<?php
$pro="simpan";
$tanggal=WKT(date("Y-m-d"));
?>
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" /> 
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
    <link href="js/jquery-ui.css" rel="stylesheet">
	   <script src="js/jquery-ui-1.9.0.custom.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
          $("#isi").accordion({
  		        animated: "easeOutBounce"     
          });
      });
    </script>  
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
win=window.open('penilaian/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

 <body style="font-size:100%;">
      <div id="isi">
     
  <?php  
  $sqld="select * from `$tbpenilaian` where kode_siswa='".$_SESSION["cid"]."' order by `kode_penilaian` desc";
	$arrd=getData($conn,$sqld);
		foreach($arrd as $dd) {							
				$kode_penilaian=$dd["kode_penilaian"];
				$kode_siswa=getSiswa($conn,$dd["kode_siswa"]);
				$periode_ajaran=$dd["periode_ajaran"];
				$level=$dd["level"];
				$keterangan=$dd["keterangan"]; 
				?>  
<h2><a href="#">Menu Penilaian <?php echo $kode_siswa."- Level : $level"?></a></h2>
<div>
<?php
echo"<h2>periode_ajaran: $periode_ajaran</h2>";
echo"<h2>level: $level</h2>";
echo"<h2>keterangan: $kode_penilaian #$keterangan</h2>";

?>
<table width="100%" border="0">
  <tr bgcolor="#00FF99">
    <td width="3%"><center>no</th>
    <td width="10%"><center>kode-matpel</th>
    <td width="20%"><center>nama_matapelajaran</th>
    <td width="10%"><center>nilai</th>
    <td width="15%"><center>catatan</th>
  </tr>
<?php  
  $sql="select * from `$tbpenilaiandetail` where kode_penilaian='$kode_penilaian' order by `id` desc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
		$arr=getData($conn,$sql);
		foreach($arr as $d) {							
				$id=$d["id"];
				$kode_matapelajaran=$d["kode_matapelajaran"];
				$kode_penilaian=getPenilaian($conn,$d["kode_penilaian"]);
				$namamatpel=getMatapelajaran($conn,$d["kode_matapelajaran"]);
				$nilai=$d["nilai"];
				$catatan=$d["catatan"];
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$kode_matapelajaran</td>
				<td>$namamatpel</td>
				<td>$nilai</td>
				<td>$catatan</td>
				
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data penilaiandetail belum tersedia...</blink></td></tr>";}
?>
</table>

</div>
<?php
}
?>


</div>
