<?php
	include "../class/crud.php";
	$db = new crud();
	$db->koneksi();
	$db->select("tbTopik");
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
						<td colspan="8" align="center"><a href="inTopik.php">Masukkan data baru</a></td>
					</tr>
					<tr>
						<th>ID</th>
						<th>Jenis</th>
						<th>Admin</th>
						<th>Judul</th>
						<th>Berita</th>
						<th>Gambar</th>
						<th colspan="2">Aksi</th>
					</tr>
					<?php foreach($hasil as $kolom){ ?>
						<tr>
							<td><?php echo $kolom['idTopik']; ?></td>
							<td><?php echo $kolom['idJenisTopik']; ?></td>
							<td><?php echo $kolom['idAdmin']; ?></td>
							<td><?php echo $kolom['judul']; ?></td>
							<td><?php echo $kolom['berita']; ?></td>
							<td><?php echo $kolom['img']; ?></td>
							<td><a href="upTopik.php?id=<?php echo $kolom['idTopik']; ?>">Edit</a></td>
							<td><a href="simpan.php?aksi=hapus&tabel=tbTopik&id=<?php echo $kolom['idTopik']; ?>">Hapus</a></td>
						</tr>
					<?php } ?>
				</table>
				</div>
			</div>
			<div id="footer">Copyright &copy; 2017</div>
		</div>
	</body>
</html>