<?php 

	$level_guru = $_SESSION['level_guru'];
	$hak_akses = $mysqli->getData("SELECT * FROM tbl_hak_akses where level_guru = '". $level_guru ."' AND kelas='1' ");

if (empty($hak_akses)) {
	?>
	<script type="text/javascript">
		alert("MAAF ANDA TIDAK DAPAT MENGAKSES HALAMAN INI!!");
		window.location.href="dashboard.php?page=transaksi";
	</script>
	<?php
}

