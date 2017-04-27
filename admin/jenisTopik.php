<?php
	include "../class/crud.php";
	$db = new crud();
	$db->koneksi();
	$db->select("tbJenisTopik");
	$hasil = $db->hasil();
?>
<html>
	<head>
		<title>Halaman Admin</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
	</head>
	<body>
		<div id="wrap">
			<div id="header">
				<a href="admin.php"><div class="nav">Admin</div></a>
				<a href="jenisTopik.php"><div class="nav">Jenis Topik</div></a>
				<a href="topik.php"><div class="nav">Topik</div></a>
				<a href="../index.php"><div class="nav">Logout</div></a>
				<div class="bersih"></div>
			</div>
			<div id="konten">
				<div class="item">
				<table border="1" align="center">
					<tr>
						<th colspan="4" align="center"><a href="inJenisTopik.php">Masukkan data baru</a></th>
					</tr>
					<tr>
						<th>ID</th>
						<th>Jenis Topik</th>
						<th colspan="2">Aksi</th>
					</tr>
					<?php foreach($hasil as $kolom){ ?>
						<tr>
							<td align="center"><?php echo $kolom['idJenisTopik']; ?></td>
							<td><?php echo $kolom['jenisTopik']; ?></td>
							<td><a href="upJenisTopik.php?id=<?php echo $kolom['idJenisTopik']; ?>">Edit</a></td>
							<td><a href="simpan.php?aksi=hapus&tabel=tbJenisTopik&id=<?php echo $kolom['idJenisTopik']; ?>">Hapus</a></td>
						</tr>
					<?php } ?>
				</table>
				</div>
			</div>
			<div id="footer">Copyright &copy; 2017</div>
		</div>
	</body>
</html>