<?php
	include "../class/crud.php";
	$db = new crud();
	$db->koneksi();
	$db->select('tbJenisTopik');
	$admin = $db->hasil();
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
					<form method="post" action="simpan.php?aksi=input" enctype="multipart/form-data">
						<table align="center">
							<tr>
								<td>Judul</td><td> : </td>
								<td><input type="text" name="judul" required></td>
							</tr>
							<tr>
								<td valign="top">Berita</td><td valign="top"> : </td>
								<td><textarea name="berita" cols="30" rows="10"></textarea></td>
							</tr>
							<tr>
								<td>Gambar</td><td> : </td>
								<td><input type="file" name="gambar"></td>
							</tr>
							<tr>
								<td>Jenis</td><td> : </td>
								<td><select name="jenis">
										<?php foreach ($admin as $kolom) { ?>
											<option value="<?php echo $kolom['idJenisTopik']; ?>"><?php echo $kolom['jenisTopik']; ?></option>
										<?php } ?>
								</select></td>
							</tr>
							<tr>
								<td>Admin</td><td> : </td>
								<td><input type="text" name="idAdmin" required></td>
								<input type="hidden" name="tabel" value="tbTopik">
							</tr>
							<tr>
								<td><button type="submit">Simpan</button></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
			<div id="footer">Copyright &copy; 2017</div>
		</div>
	</body>
</html>