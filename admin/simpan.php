<?php
	include "../class/crud.php";
	$db = new crud();
	$db->koneksi();
	if(empty($_POST['tabel'])){
		$tabel = $_GET['tabel'];
	}else{
		$tabel = $_POST['tabel'];
	}
	if($_GET['aksi']=="input"){
		if($tabel == "tbJenisTopik"){
			$nilai = $_POST['idJnsTopik'].", '$_POST[jnsTopik]'";
			$header = "jenisTopik.php";
		}elseif ($tabel == "tbAdmin") {
			$nilai = "NULL, '$_POST[username]', '$_POST[pass]', '$_POST[email]'";
			$header = "admin.php";
		}elseif($tabel == "tbTopik"){
			if(!empty($_FILES['gambar']['name'])){
				$target = $db->pindahGambar($_FILES['gambar']['name'], $_FILES['gambar']['tmp_name']);
			}else{
				$target = NULL;
			}
			$nilai = "NULL, $_POST[jenis], $_POST[idAdmin], '$_POST[judul]', '$target', '$_POST[berita]'";
			$header = "topik.php";
		}elseif($tabel == "tbForum"){
			$nilai = "NULL, $_POST[id], '$_POST[pesan]', '$_POST[nama]'";
			$header = "../detail.php?id=$_POST[id]";
		}
		$db->input($_POST['tabel'], $nilai);
	}else{
		if($tabel == "tbJenisTopik"){
			$id = "idJenisTopik";
			$header = "jenisTopik.php";
		}elseif ($tabel == "tbAdmin") {
			$id = "idAdmin";
			$header = "admin.php";
		}elseif($tabel == "tbTopik"){
			$id = "idTopik";
			$header = "topik.php";
		}
		if($_GET['aksi']=="edit"){
			if($tabel == "tbJenisTopik"){
				$nilai = array("jenisTopik"=>"$_POST[jnsTopik]");
			}elseif ($tabel == "tbAdmin") {
				$nilai = array("username"=>"$_POST[username]", "pass"=>"$_POST[pass]", "email"=>"$_POST[email]");
			}elseif($tabel == "tbTopik"){
				if(!empty($_FILES['gambar']['name'])){
					$target = $db->pindahGambar($_FILES['gambar']['name'], $_FILES['gambar']['tmp_name']);
					$nilai = array("idJenisTopik"=>"$_POST[jenis]", "idAdmin"=>"$_POST[idAdmin]", "judul"=>"$_POST[judul]", "img"=>"$target", "berita"=>"$_POST[berita]");
				}else{
					$nilai = array("idJenisTopik"=>"$_POST[jenis]", "idAdmin"=>"$_POST[idAdmin]", "judul"=>"$_POST[judul]", "berita"=>"$_POST[berita]");
				}
			}
			$param = $id."=".$_POST['id'];
			$db->edit($_POST['tabel'], $nilai, $param);
		}else{
			$tabel = $_GET['tabel'];
			$param = $id."=".$_GET['id'];
			$db->hapus($tabel, $param);
		}
	}
	header("location: $header");
?>