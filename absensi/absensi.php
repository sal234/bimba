<?php
$pro = "simpan";
$tgl = WKT(date("Y-m-d"));
$jam = date("H:i:s");
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
		win = window.open('absensi/print.php', 'win', 'width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, keterangan=0');
	}
</script>
<script language="JavaScript">
	function buka(url) {
		window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');
	}
</script>

<?php
if ($_GET["pro"] == "ubah") {
	$kode_absensi = $_GET["kode"];
	$sql = "select * from `$tbabsensi` where `kode_absensi`='$kode_absensi'";
	$d = getField($conn, $sql);
	$kode_absensi = $d["kode_absensi"];
	$kode_absensi0 = $d["kode_absensi"];
	$tgl = WKT($d["tgl"]);
	$jam = $d["jam"];
	$kode_siswa = $d["kode_siswa"];
	$status = $d["status"];
	$keterangan = $d["keterangan"];
	$pro = "ubah";
}
?>


<form action="" method="post" enctype="multipart/form-data">
	<table width="505">


		<tr>
			<td><label for="tgl">Tanggal</label>
			<td valign="top">:
			<td colspan="2"><input name="tgl" type="text" id="tgl" value="<?php echo $tgl; ?>" size="15" /></td>
		</tr>

		<tr>
			<td height="24"><label for="jam">Jam</label>
			<td valign="top">:
			<td colspan="2"><input name="jam" type="text" id="jam" value="<?php echo $jam; ?>" size="15" />
			</td>
		</tr>

		<tr>
			<td height="24"><label for="kode_siswa">Pilih Siswa</label>
			<td valign="top">:
			<td><label for="kode_siswa"></label>
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
			<td><label for="status">Status</label>
			<td valign="top">:
			<td colspan="2">
				<input type="radio" name="status" id="status" checked="checked" value="Hadir" <?php if ($status == "Hadir") {
																									echo "checked";
																								} ?> />Hadir
				<input type="radio" name="status" id="status" value="Tidak Hadir" <?php if ($status == "Tidak Hadir") {
																						echo "checked";
																					} ?> />Tidak Hadir
				<input type="radio" name="status" id="status" value="Izin" <?php if ($status == "Izin") {
																				echo "checked";
																			} ?> />Izin
				<input type="radio" name="status" id="status" value="Sakit" <?php if ($status == "Sakit") {
																				echo "checked";
																			} ?> />Sakit
			</td>
		</tr>

		<tr>
			<td><label for="keterangan">Keterangan</label>
			<td valign="top">:
			<td colspan="2"><textarea name="keterangan" cols="30" id="keterangan"><?php echo $keterangan; ?></textarea></td>
		</tr>

		<tr>
			<td>
			<td valign="top">
			<td colspan="2"> <input name="Simpan" type="submit" id="Simpan" value="Simpan" />
				<input name="pro" type="hidden" id="pro" value="<?php echo $pro; ?>" />
				<input name="kode_absensi" type="hidden" id="kode_absensi" value="<?php echo $kode_absensi; ?>" />
				<input name="kode_absensi0" type="hidden" id="kode_absensi0" value="<?php echo $kode_absensi0; ?>" />
				<a href="?mnu=absensi"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
			</td>
		</tr>
	</table>
</form>

Data absensi:
| <a href="absensi/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a>
| <a href="absensi/xls.php"><img src='ypathicon/xls.png' alt='XLS'></a>
| <a href="absensi/xml.php"><img src='ypathicon/xml.png' alt='XML'></a>
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table width="100%" border="0">
	<tr bgcolor="#00FF99">
		<td width="3%">
			<center>No</th>
		<td width="20%">
			<center>Tgl Jam</th>
		<td width="30%">
			<center>Siswa</th>
		<td width="15%">
			<center>Status</th>
		<td width="10%">
			<center>Keterangan</th>
		<td width="10%">
			<center>Menu</th>
	</tr>
	<?php
	$sql = "select * from `$tbabsensi` order by `kode_absensi` desc";
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
			$kode_absensi = $d["kode_absensi"];
			$tgl = WKT($d["tgl"]);
			$jam = $d["jam"];
			$kode_siswa = getSiswa($conn, $d["kode_siswa"]);
			$status = $d["status"];
			$keterangan = $d["keterangan"];
			$color = "#dddddd";
			if ($no % 2 == 0) {
				$color = "#eeeeee";
			}
			echo "<tr bgcolor='$color'>
				<td>$no</td>
				<td>$tgl<br>$jam</td>
				<td>$kode_siswa</td>
				<td>$status</td>
				<td>$keterangan</td>
				<td align='center'>
<a href='?mnu=absensi&pro=ubah&kode=$kode_absensi'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=absensi&pro=hapus&kode=$kode_absensi'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $tgl pada data absensi ?..\")'></a></td>
				</tr>";

			$no++;
		} //while
	} //if
	else {
		echo "<tr><td colspan='7'><blink>Maaf, Data absensi belum tersedia...</blink></td></tr>";
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=absensi'>« Prev</a></span> ";
	} else {
		echo "<span class=disabled>« Prev</span> ";
	}

	// Tampilkan link page 1,2,3 ...
	for ($i = 1; $i <= $jmlhal; $i++)
		if ($i != $page) {
			echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=absensi'>$i</a> ";
		} else {
			echo " <span class=current>$i</span> ";
		}

	// Link kepage berikutnya (Next)
	if ($page < $jmlhal) {
		$next = $page + 1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=absensi'>Next »</a></span>";
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
	$kode_absensi = strip_tags($_POST["kode_absensi"]);
	$kode_absensi0 = strip_tags($_POST["kode_absensi0"]);
	$tgl = BAL(strip_tags($_POST["tgl"]));
	$jam = strip_tags($_POST["jam"]);
	$kode_siswa = strip_tags($_POST["kode_siswa"]);
	$status = strip_tags($_POST["status"]);
	$keterangan = strip_tags($_POST["keterangan"]);

	if ($pro == "simpan") {
		$sql = " INSERT INTO `$tbabsensi` (
`kode_absensi` ,
`tgl` ,
`jam` ,
`kode_siswa` ,
`status` ,
`keterangan` 
) VALUES (
'', 
'$tgl', 
'$jam',
'$kode_siswa',
'$status',
'$keterangan'
)";

		$simpan = process($conn, $sql);
		if ($simpan) {
			echo "<script>alert('Data $kode_absensi berhasil disimpan !');document.location.href='?mnu=absensi';</script>";
		} else {
			echo "<script>alert('Data $kode_absensi gagal disimpan...');document.location.href='?mnu=absensi';</script>";
		}
	} else {
		$sql = "update `$tbabsensi` set 
`tgl`='$tgl',
`jam`='$jam' ,
`kode_siswa`='$kode_siswa',
`keterangan`='$keterangan',
`status`='$status' 
where `kode_absensi`='$kode_absensi0'";
		$ubah = process($conn, $sql);
		if ($ubah) {
			echo "<script>alert('Data $kode_absensi berhasil diubah !');document.location.href='?mnu=absensi';</script>";
		} else {
			echo "<script>alert('Data $kode_absensi gagal diubah...');document.location.href='?mnu=absensi';</script>";
		}
	} //else simpan
}
?>

<?php
if ($_GET["pro"] == "hapus") {
	$kode_absensi = $_GET["kode"];
	$sql = "delete from `$tbabsensi` where `kode_absensi`='$kode_absensi'";
	$hapus = process($conn, $sql);
	if ($hapus) {
		echo "<script>alert('Data absensi $kode_absensi berhasil dihapus !');document.location.href='?mnu=absensi';</script>";
	} else {
		echo "<script>alert('Data absensi $kode_absensi gagal dihapus...');document.location.href='?mnu=absensi';</script>";
	}
}
?>