<?php
$pro = "simpan";
$tanggal = WKT(date("Y-m-d"));
?>
<link type="text/css" href="<?php echo "$PATH/base/"; ?>ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo "$PATH/"; ?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/"; ?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/"; ?>ui/i18n/ui.datepicker-id.js"></script>

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
		win = window.open('penilaiandetail/print.php', 'win', 'width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0');
	}
</script>
<script language="JavaScript">
	function buka(url) {
		window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');
	}
</script>



<?php

$kode_penilaian = $_GET["id"];
$sql = "select * from `$tbpenilaian` where `kode_penilaian`='$kode_penilaian'";
$d = getField($conn, $sql);
$kode_penilaian = $d["kode_penilaian"];
$kode_penilaian0 = $d["kode_penilaian"];
$kode_matapelajaran = $d["kode_matapelajaran"];
$kode_siswa = getSiswa($conn, $d["kode_siswa"]);
$periode_ajaran = $d["periode_ajaran"];
$level = $d["level"];
$catatan = $d["catatan"];
$nilai = $d["nilai"];

?>


<form action="" method="post" enctype="multipart/form-data">
	<table width="464">


		<tr>
			<td width="142"><label for="kode_penilaian">Kode Penilaian</label>
			<td width="10" valign="top">:
			<td width="297" colspan="2"><b><?php echo $kode_penilaian; ?></b>
		</tr>

		<tr>
			<td><label for="kode_siswa">Siswa</label>
			<td valign="top">:
			<td colspan="2"><?php echo $kode_siswa; ?></td>
		</tr>

		<tr>
			<td><label for="kode_matapelajaran">Kode Matapelajaran</label>
			<td valign="top">:
			<td colspan="2"><?php echo $kode_matapelajaran; ?></td>
		</tr>

		<tr>
			<td height="24"><label for="periode_ajaran">Periode Ajaran</label>
			<td valign="top">:
			<td colspan="2"><?php echo $periode_ajaran; ?>
			</td>
		</tr>

		<tr>
			<td height="24"><label for="level">Level</label>
			<td valign="top">:
			<td><?php echo $level; ?></td>
		</tr>

		<tr>
			<td height="24"><label for="catatan">Catatan</label>
			<td valign="top">:
			<td colspan="2"><?php echo $catatan; ?>
			</td>
		</tr>

		<tr>
			<td height="24"><label for="nilai">Nilai</label>
			<td valign="top">:
			<td><?php echo $nilai; ?></td>
		</tr>

	</table>
	<?php


	if ($_GET["pro"] == "ubah") {
		$id = $_GET["kode"];
		$sql = "select * from `$tbpenilaiandetail` where `id`='$id'";
		$d = getField($conn, $sql);
		$id = $d["id"];
		$id0 = $d["id"];
		$kode_penilaian = $d["kode_penilaian"];
		$kode_matapelajaran = $d["kode_matapelajaran"];
		$nilai = $d["nilai"];
		$catatan = $d["catatan"];
		$pro = "ubah";
	}
	?>

	Print Data:
	<!-- | <a href="penilaiandetail/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> -->
	<!-- | <a href="penilaiandetail/xls.php"><img src='ypathicon/xls.png' alt='XLS'></a> -->
	<!-- | <a href="penilaiandetail/xml.php"><img src='ypathicon/xml.png' alt='XML'></a> -->
	| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
	<br>

	<?php
	if (isset($_POST["Simpan"])) {
		$pro = strip_tags($_POST["pro"]);
		$id = strip_tags($_POST["id"]);
		$id0 = strip_tags($_POST["id0"]);
		$kode_penilaian = strip_tags($_POST["kode_penilaian"]);
		$kode_matapelajaran = strip_tags($_POST["kode_matapelajaran"]);
		$nilai = strip_tags($_POST["nilai"]);
		$catatan = strip_tags($_POST["catatan"]);

		if ($pro == "simpan") {
			$sql = " INSERT INTO `$tbpenilaiandetail` (
`id` ,
`kode_penilaian` ,
`kode_matapelajaran` ,
`nilai` ,
`catatan`
) VALUES (
'', 
'$kode_penilaian', 
'$kode_matapelajaran',
'$nilai',
'$catatan'
)";

			$simpan = process($conn, $sql);
			if ($simpan) {
				echo "<script>alert('Data $id berhasil disimpan !');document.location.href='?mnu=penilaiandetail&id=$kode_penilaian';</script>";
			} else {
				echo "<script>alert('Data $id gagal disimpan...');document.location.href='?mnu=penilaiandetail&id=$kode_penilaian';</script>";
			}
		} else {
			$sql = "update `$tbpenilaiandetail` set 
`kode_penilaian`='$kode_penilaian',
`kode_matapelajaran`='$kode_matapelajaran' ,
`nilai`='$nilai',
`catatan`='$catatan' 
where `id`='$id0'";
			$ubah = process($conn, $sql);
			if ($ubah) {
				echo "<script>alert('Data $id berhasil diubah !');document.location.href='?mnu=penilaiandetail&id=$kode_penilaian';</script>";
			} else {
				echo "<script>alert('Data $id gagal diubah...');document.location.href='?mnu=penilaiandetail&id=$kode_penilaian';</script>";
			}
		} //else simpan
	}
	?>

	<?php
	if ($_GET["pro"] == "hapus") {
		$id = $_GET["kode"];
		$kode_penilaian = $_GET["id"];
		$sql = "delete from `$tbpenilaiandetail` where `id`='$id'";
		$hapus = process($conn, $sql);
		if ($hapus) {
			echo "<script>alert('Data penilaiandetail $id berhasil dihapus !');document.location.href='?mnu=penilaiandetail&id=$kode_penilaian';</script>";
		} else {
			echo "<script>alert('Data penilaiandetail $id gagal dihapus...');document.location.href='?mnu=penilaiandetail&id=$kode_penilaian';</script>";
		}
	}
	?>