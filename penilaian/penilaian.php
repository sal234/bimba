<?php
$pro = "simpan";
$tanggal = WKT(date("Y-m-d"));
?>
<link type="text/css" href="<?php echo "$PATH/base/"; ?>ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo "$PATH/"; ?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/"; ?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/"; ?>ui/i18n/ui.datepicker-id.js"></script>
<link href="js/jquery-ui.css" rel="stylesheet">
<script src="js/jquery-ui-1.9.0.custom.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#isi").accordion({
			animated: "easeOutBounce"
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#tanggal").datepicker({
			dateFormat: "dd MM yy",
			changeMonth: true,
			changeYear: true
		});
	});
</script>

<script type="text/javascript">
	function PRINT() {
		win = window.open('penilaian/print.php', 'win', 'width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0');
	}
</script>
<script language="JavaScript">
	function buka(url) {
		window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');
	}
</script>

<?php
$sql = "select `kode_penilaian` from `$tbpenilaian` order by `kode_penilaian` desc";
$q = mysqli_query($conn, $sql);
$jum = mysqli_num_rows($q);
$th = date("y");
$bl = date("m") + 0;
if ($bl < 10) {
	$bl = "0" . $bl;
}

$kd = "PNL" . $th . $bl; //KEG1610001
if ($jum > 0) {
	$d = mysqli_fetch_array($q);
	$idmax = $d["kode_penilaian"];

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
$kode_penilaian = $idmax;
?>

<?php
if ($_GET["pro"] == "ubah") {
	$kode_penilaian = $_GET["kode"];
	$sql = "select * from `$tbpenilaian` where `kode_penilaian`='$kode_penilaian'";
	$d = getField($conn, $sql);
	$kode_penilaian = $d["kode_penilaian"];
	$kode_penilaian0 = $d["kode_penilaian"];
	$kode_matapelajaran = $d["kode_matapelajaran"];
	$kode_matapelajaran0 = $d["kode_matapelajaran"];
	$kode_siswa = $d["kode_siswa"];
	$periode_ajaran = $d["periode_ajaran"];
	$level = $d["level"];
	$nilai = $d["nilai"];
	$catatan = $d["catatan"];
	$pro = "ubah";
}
?>

<body style="font-size:100%;">
	<div id="isi">
		<h2><a href="#">Form Input</a></h2>
		<div>
			<form action="" method="post" enctype="multipart/form-data">
				<table width="464">


					<tr>
						<td width="142"><label for="kode_penilaian">Kode Penilaian</label>
						<td width="10" valign="top">:
						<td width="297" colspan="2"><b><?php echo $kode_penilaian; ?></b>
					</tr>

					<tr>
						<td><label for="kode_siswa">Pilih Siswa</label>
						<td valign="top">:
						<td colspan="2"><select name="kode_siswa" id="kode_siswa">
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
							</select></td>
					</tr>

					<tr>
						<td height="24"><label for="kode_matapelajaran">Pilih Matpel</label>
						<td valign="top">:
						<td colspan="2"><label for="kode_matapelajaran"></label>
							<select name="kode_matapelajaran" id="kode_matapelajaran">
								<option value="Pilih">Pilih</option>
								<?php
								$s = "select * from `tb_matapelajaran`";
								$q = getData($conn, $s);
								foreach ($q as $d) {
									$kode_matapelajaran0 = $d["kode_matapelajaran"];
									$nama_matapelajaran = $d["nama_matapelajaran"];
									echo "<option value='$kode_matapelajaran0' ";
									if ($kode_matapelajaran0 == $kode_matapelajaran) {
										echo "selected";
									}
									echo ">$kode_matapelajaran0 - $nama_matapelajaran</option>";
								}
								?>
							</select>
						</td>
					</tr>

					<tr>
						<td height="24"><label for="periode_ajaran">Periode Ajaran</label>
						<td valign="top">:
						<td colspan="2"><input name="periode_ajaran" type="text" id="periode_ajaran" value="<?php echo $periode_ajaran; ?>" size="15" />
						</td>
					</tr>

					<tr>
						<td height="24"><label for="level">Level</label>
						<td valign="top">:
						<td><input name="level" type="text" id="level" value="<?php echo $level; ?>" size="15" />
							<label for="kode_barang"></label>
						</td>
					</tr>

					<tr>
						<td height="24"><label for="nilai">Nilai</label>
						<td valign="top">:
						<td><input name="nilai" type="text" id="nilai" value="<?php echo $nilai; ?>" size="20" />
							<label for="kode_barang"></label>
						</td>
					</tr>

					<tr>
						<td height="24"><label for="catatan">Catatan</label>
						<td valign="top">:
						<td colspan="2"><textarea name="catatan" cols="30" id="catatan"><?php echo $catatan; ?></textarea>
						</td>
					</tr>

					<tr>
						<td>
						<td valign="top">
						<td colspan="2"> <input name="Simpan" type="submit" id="Simpan" value="Simpan" />
							<input name="pro" type="hidden" id="pro" value="<?php echo $pro; ?>" />
							<input name="kode_penilaian" type="hidden" id="kode_penilaian" value="<?php echo $kode_penilaian; ?>" />
							<input name="kode_penilaian0" type="hidden" id="kode_penilaian0" value="<?php echo $kode_penilaian0; ?>" />
							<a href="?mnu=penilaian"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
						</td>
					</tr>
				</table>
			</form>

		</div>
		<h2><a href="#">Menu Data</a></h2>
		<div>
			Data penilaian:
			| <a href="penilaian/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a>
			| <a href="penilaian/xls.php"><img src='ypathicon/xls.png' alt='XLS'></a>
			| <a href="penilaian/xml.php"><img src='ypathicon/xml.png' alt='XML'></a>
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
						<center>periode_ajaran</th>
					<td width="30%">
						<center>level</th>
					<td width="10%">
						<center>menu</th>
				</tr>
				<?php
				$sql = "select * from `$tbpenilaian` order by `kode_penilaian` desc";
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
						$kode_penilaian = $d["kode_penilaian"];
						$kode_siswa = getSiswa($conn, $d["kode_siswa"]);
						$periode_ajaran = $d["periode_ajaran"];
						$level = $d["level"];
						$nilai = $d["nilai"];
						$catatan = $d["catatan"];
						$color = "#dddddd";
						if ($no % 2 == 0) {
							$color = "#eeeeee";
						}
						echo "<tr bgcolor='$color'>
				<td>$no</td>
				<td>$kode_penilaian</td>
				<td>$kode_siswa</td>
				<td>$periode_ajaran</td>
				<td>$level</td>
				<td align='center'>
<a href='?mnu=penilaiandetail&id=$kode_penilaian'><img src='ypathicon/xls.png' alt='Detail Nilai'></a>				
<a href='?mnu=penilaian&pro=ubah&kode=$kode_penilaian'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=penilaian&pro=hapus&kode=$kode_penilaian'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $kode_siswa pada data penilaian ?..\")'></a></td>
				</tr>";

						$no++;
					} //while
				} //if
				else {
					echo "<tr><td colspan='7'><blink>Maaf, Data penilaian belum tersedia...</blink></td></tr>";
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
					echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=penilaian'>« Prev</a></span> ";
				} else {
					echo "<span class=disabled>« Prev</span> ";
				}

				// Tampilkan link page 1,2,3 ...
				for ($i = 1; $i <= $jmlhal; $i++)
					if ($i != $page) {
						echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=penilaian'>$i</a> ";
					} else {
						echo " <span class=current>$i</span> ";
					}

				// Link kepage berikutnya (Next)
				if ($page < $jmlhal) {
					$next = $page + 1;
					echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=penilaian'>Next »</a></span>";
				} else {
					echo "<span class=disabled>Next »</span>";
				}
				echo "</div>";
			} //if jmldata

			$jmldata = $jum;
			echo "<p align=center>Total Data <b>$jmldata</b> Item</p></div>";
			?>

		</div>
		<?php
		if (isset($_POST["Simpan"])) {
			$pro = strip_tags($_POST["pro"]);
			$kode_penilaian = strip_tags($_POST["kode_penilaian"]);
			$kode_penilaian0 = strip_tags($_POST["kode_penilaian0"]);
			$kode_siswa = strip_tags($_POST["kode_siswa"]);
			$kode_matapelajaran = strip_tags($_POST["kode_matapelajaran"]);
			$periode_ajaran = strip_tags($_POST["periode_ajaran"]);
			$level = strip_tags($_POST["level"]);
			$catatan = strip_tags($_POST["catatan"]);
			$nilai = strip_tags($_POST["nilai"]);

			if ($pro == "simpan") {
				$sql = " INSERT INTO `$tbpenilaian` (
					`kode_penilaian` ,
					`kode_siswa` ,
					`kode_matapelajaran` ,
					`periode_ajaran` ,
					`level` ,
					`catatan` ,
					`nilai` 
					) VALUES (
					'$kode_penilaian', 
					'$kode_siswa', 
					'$kode_matapelajaran', 
					'$periode_ajaran',
					'$level',
					'$catatan',
					'$nilai'
					)";

				$simpan = process($conn, $sql);
				if ($simpan) {
					echo "<script>alert('Data $kode_penilaian berhasil disimpan !');document.location.href='?mnu=penilaian';</script>";
				} else {
					echo "<script>alert('Data $kode_penilaian gagal disimpan...');document.location.href='?mnu=penilaian';</script>";
				}
			} else {
				$sql = "update `$tbpenilaian` set 
					`kode_siswa`='$kode_siswa',
					`kode_matapelajaran`='$kode_matapelajaran',
					`periode_ajaran`='$periode_ajaran' ,
					`level`='$level',
					`catatan`='$catatan',
					`nilai`='$nilai'
					where `kode_penilaian`='$kode_penilaian0'";
				$ubah = process($conn, $sql);
				if ($ubah) {
					echo "<script>alert('Data $kode_penilaian berhasil diubah !');document.location.href='?mnu=penilaian';</script>";
				} else {
					echo "<script>alert('Data $kode_penilaian gagal diubah...');document.location.href='?mnu=penilaian';</script>";
				}
			} //else simpan
		}
		?>

		<?php
		if ($_GET["pro"] == "hapus") {
			$kode_penilaian = $_GET["kode"];
			$sql = "delete from `$tbpenilaian` where `kode_penilaian`='$kode_penilaian'";
			$hapus = process($conn, $sql);
			if ($hapus) {
				echo "<script>alert('Data penilaian $kode_penilaian berhasil dihapus !');document.location.href='?mnu=penilaian';</script>";
			} else {
				echo "<script>alert('Data penilaian $kode_penilaian gagal dihapus...');document.location.href='?mnu=penilaian';</script>";
			}
		}
		?>