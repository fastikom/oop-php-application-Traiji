<?php
	include "../class/crud.php";
	$db = new crud();
	$db->koneksi();
	$db->select("tbAdmin", "*", "idAdmin=$_GET[id]");
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
							<td>ID</td><td> : </td>
							<td><input type="text" name="id" value="<?php echo $kolom['idAdmin']; ?>" readonly></td>
						</tr>
						<tr>
							<td>Username</td><td> : </td>
							<td><input type="text" name="username" value="<?php echo $kolom['username']; ?>" required></td>
						</tr>
						<tr>
							<td>Password</td><td> : </td>
							<td><input type="text" name="pass" value="<?php echo $kolom['pass']; ?>" required></td>
						</tr>
						<tr>
							<td>E-mail</td><td> : </td>
							<td><input type="email" name="email" value="<?php echo $kolom['email']; ?>" required></td>
						</tr>
						<tr>
							<td><button type="submit">Simpan</button></td>
						</tr>
						<?php } ?>
					</table>
					<input type="hidden" name="tabel" value="tbAdmin">
				</form>
				</div>
			</div>
			<div id="footer">Copyright &copy; 2017</div>
		</div>
	</body>
</html>