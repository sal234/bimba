<?php
$pro = "simpan";
$tgl = date("Y-m-d");
?>
<link type="text/css" href="<?php echo "$PATH/base/"; ?>ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo "$PATH/"; ?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/"; ?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/"; ?>ui/i18n/ui.datepicker-id.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$("#tgl").datepicker({
			dateFormat: "dd MM yy",
			changeMonth: true,
			changeYear: true
		});
	});
</script>

<script type="text/javascript">
	function PRINT() {
		win = window.open('pendaftaran/print.php', 'win', 'width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, keterangan=0');
	}
</script>
<script language="JavaScript">
	function buka(url) {
		window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');
	}
</script>

<?php
$sql = "select `kode_pendaftaran` from `$tbpendaftaran` order by `kode_pendaftaran` desc";
$q = mysqli_query($conn, $sql);
$jum = mysqli_num_rows($q);
$th = date("y");
$bl = date("m") + 0;
if ($bl < 10) {
	$bl = "0" . $bl;
}

$kd = "PDF" . $th . $bl; //KEG1610001
if ($jum > 0) {
	$d = mysqli_fetch_array($q);
	$idmax = $d["kode_pendaftaran"];

	$bul = substr($idmax, 5, 2);
	$tah = substr($idmax, 3, 2);
	if ($bul == $bl && $tah == $th) {
		$urut = substr($idmax, 7, 3) + 1;
		if ($urut < 10) {
			$idmax = "$kd" . "00" . $urut;
		} else if ($urut < 100) {
			$idmax = "$kd" . "0" . $urut;
		} else {
			$idmax = "$kd" . $urut;
		}
	} //==
	else {
		$idmax = "$kd" . "001";
	}
} //jum>0
else {
	$idmax = "$kd" . "001";
}
$kode_pendaftaran = $idmax;
?>

<?php
if ($_GET["pro"] == "ubah") {
	$kode_pendaftaran = $_GET["kode"];
	$sql = "select * from `$tbpendaftaran` where `kode_pendaftaran`='$kode_pendaftaran'";
	$d = getField($conn, $sql);
	$kode_pendaftaran = $d["kode_pendaftaran"];
	$kode_pendaftaran0 = $d["kode_pendaftaran"];
	$kode_siswa = $d["kode_siswa"];
	$tgl = $d["tgl"];
	$periode_ajaran = $d["periode_ajaran"];
	$level = $d["level"];
	$keterangan = $d["keterangan"];
	$kode_jadwal = $d["kode_jadwal"];
	$status = $d["status"];
	$pro = "ubah";
}
?>


<form action="" method="post" enctype="multipart/form-data">
	<table width="503">


		<tr>
			<td width="166"><label for="kode_pendaftaran">Kode Pendaftaran</label>
			<td width="10" valign="top">:
			<td width="312" colspan="2"><b><?php echo $kode_pendaftaran; ?></b>
		</tr>

		<tr>
			<td><label for="kode_siswa">Pilih Siswa</label>
			<td valign="top">:
			<td colspan="2"><label for="kode_siswa"></label>
				<select name="kode_siswa" id="kode_siswa">
					<option value="Pilih">Pilih</option>
					<?php
					$s = "select * from `tb_siswa`";
					$q = getData($conn, $s);
					foreach ($q as $d) {
						$kode_siswa0 = $d["kode_siswa"];
						$nama_siswa = $d["nama_siswa"];
						echo "<option value='$kode_siswa0' ";
						if ($kode_siswa0 == $kode_siswa) {
							echo "selected";
						}
						echo ">$kode_siswa0 - $nama_siswa</option>";
					}
					?>
				</select>
			</td>
		</tr>

		<tr>
			<td height="24">Tanggal
			<td valign="top">:
			<td colspan="2"><input name="tgl" type="text" id="tgl" value="<?php echo $tgl; ?>" size="15" />
			</td>
		</tr>

		<tr>
			<td height="24"><label for="periode_ajaran">Periode Ajaran</label>
			<td valign="top">:
			<td><input name="periode_ajaran" type="text" id="periode_ajaran" value="<?php echo $periode_ajaran; ?>" size="15" />
				<label for="kode_barang"></label>
			</td>
		</tr>

		<tr>
			<td height="24"><label for="level">Level</label>
			<td valign="top">:
			<td colspan="2"><input name="level" type="text" id="level" value="<?php echo $level; ?>" size="15" />
			</td>
		</tr>

		<tr>
			<td><label for="keterangan">Keterangan</label>
			<td valign="top">:
			<td colspan="2"><textarea name="keterangan" cols="30" id="keterangan"><?php echo $keterangan; ?></textarea></td>
		</tr>

		<tr>
			<td><label for="kode_jadwal">Pilih Jadwal</label>
			<td valign="top">:
			<td colspan="2"><label for="kode_jadwal"></label>
				<select name="kode_jadwal" id="kode_jadwal">
					<option value="Pilih">Pilih</option>
					<?php
					$s = "select * from `tb_jadwal`";
					$q = getData($conn, $s);
					foreach ($q as $d) {
						$kode_jadwal0 = $d["kode_jadwal"];
						$pertemuan = $d["pertemuan"];
						echo "<option value='$kode_jadwal0' ";
						if ($kode_jadwal0 == $kode_jadwal) {
							echo "selected";
						}
						echo ">$kode_jadwal0- $pertemuan</option>";
					}
					?>
				</select>
			</td>
		</tr>

		<tr>
			<td><label for="status">Status</label>
			<td valign="top">:
			<td colspan="2">
				<input type="radio" name="status" id="status" checked="checked" value="Proses" <?php if ($status == "Proses") {
																									echo "checked";
																								} ?> />Proses
				<input type="radio" name="status" id="status" value="Valid" <?php if ($status == "Valid") {
																				echo "checked";
																			} ?> />Valid
			</td>
		</tr>
		<tr>
			<td>
			<td valign="top">
			<td colspan="2"> <input name="Simpan" type="submit" id="Simpan" value="Simpan" />
				<input name="pro" type="hidden" id="pro" value="<?php echo $pro; ?>" />
				<input name="kode_pendaftaran" type="hidden" id="kode_pendaftaran" value="<?php echo $kode_pendaftaran; ?>" />
				<input name="kode_pendaftaran0" type="hidden" id="kode_pendaftaran0" value="<?php echo $kode_pendaftaran0; ?>" />
				<a href="?mnu=pendaftaran"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
			</td>
		</tr>
	</table>
</form>

Data pendaftaran:
| <a href="pendaftaran/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a>
| <a href="pendaftaran/xls.php"><img src='ypathicon/xls.png' alt='XLS'></a>
| <a href="pendaftaran/xml.php"><img src='ypathicon/xml.png' alt='XML'></a>
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table width="100%" border="0">
	<tr bgcolor="#00FF99">
		<td width="3%">
			<center>no</th>
		<td width="10%">
			<center>kode</th>
		<td width="20%">
			<center>kode_siswa</th>
		<td width="10%">
			<center>tgl</th>
		<td width="30%">
			<center>periode_ajaran</th>
		<td width="15%">
			<center>level</th>
		<td width="10%">
			<center>keterangan</th>
		<td width="10%">
			<center>kode_jadwal</th>
		<td width="10%">
			<center>menu</th>
	</tr>
	<?php
	$sql = "select * from `$tbpendaftaran` order by `kode_pendaftaran` desc";
	$jum = getJum($conn, $sql);
	if ($jum > 0) {
		//--------------------------------------------------------------------------------------------
		$batas   = 10;
		$page = $_GET['page'];
		if (empty($page)) {
			$posawal  = 0;
			$page = 1;
		} else {
			$posawal = ($page - 1) * $batas;
		}

		$sql2 = $sql . " LIMIT $posawal,$batas";
		$no = $posawal + 1;
		//--------------------------------------------------------------------------------------------									
		$arr = getData($conn, $sql2);
		foreach ($arr as $d) {
			$kode_pendaftaran = $d["kode_pendaftaran"];
			$kode_siswa = getSiswa($conn, $d["kode_siswa"]);
			$tgl = $d["tgl"];
			$periode_ajaran = $d["periode_ajaran"];
			$level = $d["level"];
			$keterangan = $d["keterangan"];
			$status = $d["status"];
			$kode_jadwal = getJadwal($conn, $d["kode_jadwal"]);
			$color = "#dddddd";
			if ($no % 2 == 0) {
				$color = "#eeeeee";
			}
			echo "<tr bgcolor='$color'>
				<td>$no</td>
				<td>$kode_pendaftaran</td>
				<td>$kode_siswa</td>
				<td>$tgl</td>
				<td>$periode_ajaran</td>
				<td>$level #$status</td>
				<td>$keterangan</td>
				<td>$kode_jadwal</td>
				<td align='center'>
<a href='?mnu=pendaftaranadmin&pro=ubah&kode=$kode_pendaftaran'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=pendaftaranadmin&pro=hapus&kode=$kode_pendaftaran'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $kode_siswa pada data pendaftaran ?..\")'></a></td>
				</tr>";

			$no++;
		} //while
	} //if
	else {
		echo "<tr><td colspan='7'><blink>Maaf, Data pendaftaran belum tersedia...</blink></td></tr>";
	}
	?>
</table>

<?php
//Langkah 3: Hitung total data dan page 
$jmldata = $jum;
if ($jmldata > 0) {
	if ($batas < 1) {
		$batas = 1;
	}
	$jmlhal  = ceil($jmldata / $batas);
	echo "<div class=paging>";
	if ($page > 1) {
		$prev = $page - 1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=pendaftaranadmin'>« Prev</a></span> ";
	} else {
		echo "<span class=disabled>« Prev</span> ";
	}

	// Tampilkan link page 1,2,3 ...
	for ($i = 1; $i <= $jmlhal; $i++)
		if ($i != $page) {
			echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=pendaftaranadmin'>$i</a> ";
		} else {
			echo " <span class=current>$i</span> ";
		}

	// Link kepage berikutnya (Next)
	if ($page < $jmlhal) {
		$next = $page + 1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=pendaftaranadmin'>Next »</a></span>";
	} else {
		echo "<span class=disabled>Next »</span>";
	}
	echo "</div>";
} //if jmldata

$jmldata = $jum;
echo "<p align=center>Total Data <b>$jmldata</b> Item</p>";
?>

<?php
if (isset($_POST["Simpan"])) {
	$pro = strip_tags($_POST["pro"]);
	$kode_pendaftaran = strip_tags($_POST["kode_pendaftaran"]);
	$kode_pendaftaran0 = strip_tags($_POST["kode_pendaftaran0"]);
	$kode_siswa = strip_tags($_POST["kode_siswa"]);
	$tgl = strip_tags($_POST["tgl"]);
	$periode_ajaran = strip_tags($_POST["periode_ajaran"]);
	$level = strip_tags($_POST["level"]);
	$keterangan = strip_tags($_POST["keterangan"]);
	$kode_jadwal = strip_tags($_POST["kode_jadwal"]);
	$status = strip_tags($_POST["status"]);

	if ($pro == "simpan") {
		$sql = " INSERT INTO `$tbpendaftaran` (
`kode_pendaftaran` ,
`kode_siswa` ,
`tgl` ,
`periode_ajaran` ,
`level` ,
`keterangan`,`status`,
`kode_jadwal`
) VALUES (
'$kode_pendaftaran', 
'$kode_siswa', 
'$tgl',
'$periode_ajaran',
'$level',
'$keterangan','$status',
'$kode_jadwal'
)";

		$simpan = process($conn, $sql);
		if ($simpan) {
			echo "<script>alert('Data $kode_pendaftaran berhasil disimpan !');document.location.href='?mnu=pendaftaranadmin';</script>";
		} else {
			echo "<script>alert('Data $kode_pendaftaran gagal disimpan...');document.location.href='?mnu=pendaftaranadmin';</script>";
		}
	} else {
		$sql = "update `$tbpendaftaran` set 
`kode_siswa`='$kode_siswa',
`tgl`='$tgl' ,
`periode_ajaran`='$periode_ajaran',
`keterangan`='$keterangan',`status`='$status',
`kode_jadwal`='$kode_jadwal',
`level`='$level' 
where `kode_pendaftaran`='$kode_pendaftaran0'";
		$ubah = process($conn, $sql);
		if ($ubah) {
			echo "<script>alert('Data $kode_pendaftaran berhasil diubah !');document.location.href='?mnu=pendaftaranadmin';</script>";
		} else {
			echo "<script>alert('Data $kode_pendaftaran gagal diubah...');document.location.href='?mnu=pendaftaranadmin';</script>";
		}
	} //else simpan
}
?>

<?php
if ($_GET["pro"] == "hapus") {
	$kode_pendaftaran = $_GET["kode"];
	$sql = "delete from `$tbpendaftaran` where `kode_pendaftaran`='$kode_pendaftaran'";
	$hapus = process($conn, $sql);
	if ($hapus) {
		echo "<script>alert('Data pendaftaran $kode_pendaftaran berhasil dihapus !');document.location.href='?mnu=pendaftaranadmin';</script>";
	} else {
		echo "<script>alert('Data pendaftaran $kode_pendaftaran gagal dihapus...');document.location.href='?mnu=pendaftaranadmin';</script>";
	}
}
?>