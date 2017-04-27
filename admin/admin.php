<?php
	include "../class/crud.php";
	$db = new crud();
	$db->koneksi();
	$db->select("tbAdmin");
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
						<th colspan="6" align="center"><a href="inAdmin.php">Masukkan data baru</a></th>
					</tr>
					<tr>
						<th>ID</th>
						<th>Username</th>
						<th>Password</th>
						<th>email</th>
						<th colspan="2">Aksi</th>
					</tr>
					<?php foreach($hasil as $kolom){ ?>
						<tr>
							<td><?php echo $kolom['idAdmin']; ?></td>
							<td><?php echo $kolom['username']; ?></td>
							<td><?php echo $kolom['pass']; ?></td>
							<td><?php echo $kolom['email']; ?></td>
							<td><a href="upAdmin.php?id=<?php echo $kolom['idAdmin']; ?>">Edit</a></td>
							<td><a href="simpan.php?aksi=hapus&tabel=tbAdmin&id=<?php echo $kolom['idAdmin']; ?>">Hapus</a></td>
						</tr>
					<?php } ?>
				</table>
				</div>
			</div>
			<div id="footer">Copyright &copy; 2017</div>
		</div>
	</body>
</html>