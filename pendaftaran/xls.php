<?php
require_once"../koneksivar.php";

$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
if ($conn->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}

 	$buffer = ""; 
    $separator = ","; //, atau ;
    $newline = "\r\n"; 
    		    
    $buffer = "kode_pendaftaran".$separator ."kode_siswa".$separator ."tgl".$separator ."periode_ajaran".$separator ."level".$separator ."keterangan".$separator."kode_jadwal".$separator; 
    $buffer .= $newline; 
    
  $sql="select `kode_pendaftaran`,`kode_siswa`,`tgl`,`periode_ajaran`,`level`,`keterangan`,`kode_jadwal` from `$tbpendaftaran` order by `kode_pendaftaran` desc";
  $jum=getJum($conn,$sql);	
  if($jum>0){						
	  $arr=getData($conn,$sql);
	  foreach($arr as $d) {		 
					$value=$d["kode_pendaftaran"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kode_siswa"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["tgl"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["periode_ajaran"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["level"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["keterangan"];$buffer .= "\"".$value."\"".$separator;
					$value=$d["kode_jadwal"];$buffer .= "\"".$value."\"".$separator;  
				$buffer .= $newline; 
		}	
  }
  else{
    $buffer .= $newline; 
	  }
    header("Content-type: application/vnd.ms-excel"); 
    header("Content-Length: ".strlen($buffer)); 
    header("Content-Disposition: attachment; filename=report.csv"); 
    header("Expires: 0"); 
    header("Cache-Control: must-revalidate, post-check=0,pre-check=0"); 
    header("Pragma: public"); 

    print $buffer;
	
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