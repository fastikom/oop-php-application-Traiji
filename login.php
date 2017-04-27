<?php
	include "class/crud.php";
	$db = new crud();
	$db->koneksi();
	$db->select("tbJenisTopik");
	$jnsTopik = $db->hasil();
	$db->select("tbTopik", '*', NULL, 'idTopik DESC');
	$terbaru = $db->hasil();
	$db->select("tbTopik", '*', NULL, 'idTopik DESC', '0, 10');
	$samping = $db->hasil();
?>
<html>
	<head>
		<title>ForBer.com - Tempatnya Diskusi Seputar Berita Terbaru</title>
		<link type="text/css" rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div id="wrap">
			<div id="header">
				<a href="index.php"><div class="nav">ForBer.com</div></a>
				<a href="index.php"><div class="nav">Home</div></a>
				<?php foreach($jnsTopik as $jenis){?>
					<a href="<?php echo $jenis['jenisTopik']; ?>.php"><div class="nav"><?php echo $jenis['jenisTopik']; ?></div></a>
				<?php } ?>
				<a href="login.php"><div class="nav-r">Login</div></a>
				<div class="bersih"></div>
			</div>
			<div id="konten">
				<div id="utama">
					<form method="post" action="valogin.php">
						<table align="center">
							<tr>
								<td>Username</td><td> : </td>
								<td><input type="text" name="username" required></td>
							</tr>
							<tr>
								<td>Password</td><td> : </td>
								<td><input type="password" name="pass" reqiured></td>
							</tr>
							<tr>
								<td colspan="2"></td>
								<td><button type="submit">Login</button></td>
							</tr>
						</table>
					</form>
				</div>
				<div id="samping">
					<div class="judul">Terbaru</div>
					<ul>
						<?php foreach($samping as $side){ ?>
						<li><a href="detail.php?id=<?php echo $side['idTopik']; ?>"><?php echo $side['judul']; ?></a></li>
						<?php } ?>
					</ul>
				</div>
				<div class="bersih"></div>
			</div>
			<div id="footer">Copyright &copy; 2017</div>
		</div>
	</body>
</html>