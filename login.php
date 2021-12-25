          <div class="col_w410">
                <div id="contact_form">        
                <h4>Login / Otentikasi Keanggotaan</h4>
<form method="post" name="contact" action="#">

<label for="username">username:</label> 
<input name="username" type="text" class="input_field" id="username" maxlength="50" />
<div class="cleaner_h10"></div>
  
<label for="username">password:</label> 
<input name="password" type="text" class="input_field" id="password" maxlength="50" />
<div class="cleaner_h10"></div>                      
<input type="submit" class="submit_btn float_l" name="Login" id="submit" value="Send" />
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
if(isset($_POST["Login"])){
	$usr=$_POST["username"];
	$pas=$_POST["password"];
	
		$sql1="select * from `$tbsiswa` where `username`='$usr' and `password`='$pas' and `status`='Aktif'";
		$sql2="select * from `$tbadmin` where `username`='$usr' and `password`='$pas' and `status`='Aktif'";
		//$sql3="select * from `$tbadmin` where `username`='$usr' and `password`='$pas' and `status`='Aktif'";
		
		if(getJum($conn,$sql1)>0){
			$d=getField($conn,$sql1);
				$kode=$d["kode_siswa"];
				$nama=$d["nama_siswa"];
				   $_SESSION["cid"]=$kode;
				   $_SESSION["cnama"]=$nama;
				   $_SESSION["cstatus"]="Siswa";
		echo "<script>alert('Otentikasi ".$_SESSION["cstatus"]." ".$_SESSION["cnama"]." (".$_SESSION["cid"].") berhasil Login!');
		document.location.href='index.php?mnu=home';</script>";
		}
		else		if(getJum($conn,$sql2)>0){
			$d=getField($conn,$sql2);
				$kode=$d["kode_admin"];
				$nama=$d["username"];
				   $_SESSION["cid"]=$kode;
				   $_SESSION["cnama"]=$nama;
				   $_SESSION["cstatus"]="Administrator";
		echo "<script>alert('Otentikasi ".$_SESSION["cstatus"]." ".$_SESSION["cnama"]." (".$_SESSION["cid"].") berhasil Login!');
		document.location.href='index.php?mnu=home';</script>";
		}
		else{
			session_destroy();
			echo "<script>alert('Otentikasi Login GAGAL !,Silakan cek data Anda kembali...');
			document.location.href='index.php?mnu=login';</script>";
		}
}


?>