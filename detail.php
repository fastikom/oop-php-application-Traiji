<?php
	include "class/crud.php";
	$db = new crud();
	$db->koneksi();
	$db->select("tbJenisTopik");
	$jnsTopik = $db->hasil();
	$id = $_GET['id'];
	$db->select("tbTopik", '*', "idTopik=$id");
	$detail = $db->hasil();
	$db->select("tbTopik", '*', NULL, 'idTopik DESC', '0, 10');
	$samping = $db->hasil();
	$db->select("tbForum", '*', "idTopik=$id", 'idTopik DESC');
	$komen = $db->hasil();
?>
<html>
	<head>
		<title>ForBer.com - Tempatnya Diskusi Seputar Berita Terbaru</title>
		<link type="text/css" rel="stylesheet" href="css/style.css">
		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		
	</head>
	<body>
		<div id="wrap">
			<div id="header">
				<a href="index.php"><div class="nav">ForBer.com</div></a>
				<a href="index.php"><div class="nav">Home</div></a>
				<?php foreach($jnsTopik as $jenis){?>
					<a href="<?php echo $jenis['jenisTopik']; ?>.php"><div class="nav"><?php echo $jenis['jenisTopik']; ?></div></a>
				<?php } ?>
				<div class="bersih"></div>
			</div>
			<div id="konten">
				<div id="utama">
					<div class="detail">
						<?php foreach($detail as $berita){ ?>
							<img src="<?php echo $berita['img']; ?>"><br>
							<p><?php echo $berita['berita']; ?></p>
						<?php } ?>
					</div>
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
				<div class="form">
					<form method="post" action="admin/simpan.php?aksi=input">		
						<table>
							<tr>
								<td>Nama</td><td> : </td>
								<td><input type="text" name="nama"></td>
							</tr>
							<tr>
								<td valign="top">Pesan</td><td valign="top"> : </td>
								<td><textarea name="pesan" cols="30" rows="10"></textarea></td>
								<input type="hidden" name="tabel" value="tbForum">
								<input type="hidden" name="id" value="<?php echo $id; ?>">
							</tr>
							<tr>
								<td><button type="submit">Kirim</button></td>
							</tr>
						</table>
					</form>
				</div>
				<div class="komen">
					<i>Komentar :</i>
					<table cellpadding="20">
						<?php foreach($komen as $komentar){ ?>
							<tr>
								<td><?php echo $komentar['nama']; ?> : </td>
								<td><?php echo $komentar['pesan']; ?></td>
							</tr>
						<?php } ?>
					</table>
				</div>
			</div>
			<div id="footer">Copyright &copy; 2017</div>
		</div>
	</body>
</html>