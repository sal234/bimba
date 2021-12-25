    <?php
$tgl_lahir=WKT(date("y-m-d"));
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
     
          <div class="col_w410">
                <div id="contact_form">        
                <h4>Daftar Sebagai Anggota</h4>
<form method="post" name="contact" action="#">
<label for="author">Nama Anak:</label> 
<input name="nama_siswa" type="text" class="input_field" id="nama_siswa" maxlength="50" />
<div class="cleaner_h10"></div>
                     
<label for="jenis_kelamin">jenis_kelamin:</label> 
<input name="jenis_kelamin" type="text" class="input_field" id="jenis_kelamin" maxlength="50" />
<div class="cleaner_h10"></div>
                            

<label for="agama">Agama:</label> 
<select name="agama" id="agama">
  <option value="-">Pilih Agama</option>
  <option value="Islam"<?php if($agama=="Islam"){echo "selected"; } ?>>Islam</option>
  <option value="Hindu"<?php if($agama=="Hindu"){echo "selected"; } ?>>Hindu</option>
  <option value="Budha"<?php if($agama=="Budha"){echo "selected"; } ?>>Budha</option>
  <option value="Kristen"<?php if($agama=="Kristen"){echo "selected"; } ?>>Kristen</option>
  <option value="Khatolik"<?php if($agama=="Khatolik"){echo "selected"; } ?>>Khatolik</option>
</select>
<div class="cleaner_h10"></div>

<label for="tgl_lahir">tgl_lahir:</label> 
<input name="tgl_lahir" type="text" class="input_field" id="tgl_lahir" maxlength="50" value="<?php echo $tgl_lahir; ?>" />
<div class="cleaner_h10"></div>


<label for="text">alamat:
</label> <textarea id="alamat" name="alamat" rows="0" cols="0" class="required"></textarea>
<div class="cleaner_h10"></div>
    

<label for="telepon">telepon:</label> 
<input name="telepon" type="text" class="input_field" id="telepon" maxlength="50" />
<div class="cleaner_h10"></div>


<label for="email">email:</label> 
<input name="email" type="text" class="input_field" id="email" maxlength="50" />
<div class="cleaner_h10"></div>



<label for="nama_ortu">nama_ortu:</label> 
<input name="nama_ortu" type="text" class="input_field" id="nama_ortu" maxlength="50" />
<div class="cleaner_h10"></div>



<label for="username">username:</label> 
<input name="username" type="text" class="input_field" id="username" maxlength="50" />
<div class="cleaner_h10"></div>
  
<label for="username">password:</label> 
<input name="password" type="text" class="input_field" id="password" maxlength="50" />
<div class="cleaner_h10"></div>                      
<input type="submit" class="submit_btn float_l" name="Kirim" id="submit" value="Send" />
<input type="reset" class="submit_btn float_r" name="reset" id="reset" value="Reset" />
                        
</form>

</div>
</div>
        
             
                
               <div class="col_w410 last_col">
               <h4>Mailing Address</h4>
               
                <h6><strong>Location</strong></h6>
                Jln kp bulak timur RT 06/RW10 No 54, <br />
                Cipayung, Depok<br />
                Indonesia<br />
				<br />
				Tel: 082297007778<br />
				Email: Bimbacipayungjembatanserong@gmail.com<br />
				
			
            </div>
            

<?php
if(isset($_POST["Kirim"])){
	 $sql="select `kode_siswa` from `$tbsiswa` order by `kode_siswa` desc";
$q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kd="SWA".$th.$bl;//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["kode_siswa"];
   
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
  $kode_siswa=$idmax;
  
	$nama_siswa=strip_tags($_POST["nama_siswa"]);
	$jenis_kelamin=strip_tags($_POST["jenis_kelamin"]);
	$agama=strip_tags($_POST["agama"]);
	$tgl_lahir=BAL(strip_tags($_POST["tgl_lahir"]));
	$alamat=strip_tags($_POST["alamat"]);
	$telepon=strip_tags($_POST["telepon"]);
	$email=strip_tags($_POST["email"]);
	$nama_ortu=strip_tags($_POST["nama_ortu"]);
	$username=strip_tags($_POST["username"]);
	$password=strip_tags($_POST["password"]);
	$status="Aktif";
	
$sql=" INSERT INTO `$tbsiswa` (
`kode_siswa` ,
`nama_siswa` ,
`jenis_kelamin` ,
`agama` ,`tgl_lahir` ,
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
'$jenis_kelamin','$agama',
'$tgl_lahir',
'$alamat',
'$telepon',
'$email', 
'$nama_ortu',
'$username',
'$password',
'Tidak Aktif'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data Pendaftaran $nama_siswa berhasil disimpan !');document.location.href='?mnu=login';</script>";}
		else{echo"<script>alert('Data Pendaftaran $nama_siswa gagal disimpan...');document.location.href='?mnu=pendaftaran';</script>";}

}
sss?>