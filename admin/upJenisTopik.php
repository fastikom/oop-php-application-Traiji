<?php
	include "../class/crud.php";
	$db = new crud();
	$db->koneksi();
	$db->select("tbJenisTopik", "*", "idJenisTopik=$_GET[id]");
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
					<form method="post" action="simpan.php?aksi=edit">
						<table align="center">
							<?php foreach($hasil as $kolom){ ?>
							<tr>
								<td>Id Jenis Topik</td><td> : </td>
								<td><input type="text" name="id" value="<?php echo $kolom['idJenisTopik']; ?>" readonly></td>
							</tr>
							<tr>
								<td>Jenis Topik</td><td> : </td>
								<td><input type="text" name="jnsTopik" value="<?php echo $kolom['jenisTopik']; ?>" required></td>
							</tr>
							<tr>
								<td><button type="submit">Simpan</button></td>
							</tr>
							<?php } ?>
						</table>
						<input type="hidden" name="tabel" value="tbJenisTopik">
					</form>
				</div>
			</div>
			<div id="footer">Copyright &copy; 2017</div>
		</div>
	</body>
</html>