<?php
	class crud{
		private $dbHost = "localhost";
		private $dbUser = "root";
		private $dbPass = "";
		private $dbName = "dbForum";

		private $hasil = array();
		private $kolom = array();
		private $jmlBaris = "";
		private $pesan = "";

		public function koneksi(){  // Fungsi yang digunakan untuk melakukan koneksi dengan server
			$koneksi = mysql_connect($this->dbHost, $this->dbUser, $this->dbPass);		// Menyambungkan ke server
			$database = mysql_select_db($this->dbName, $koneksi);	// Memilih database
		}

		public function tampil($sql){ //Fungsi yang digunakan untuk menampilkan data dengan query dan memasukkan data kedalam array
			$query = mysql_query($sql);
			if($query){
				$this->jmlBaris = mysql_num_rows($query);	// Menghitung jumlah baris
				for ($i=0; $i<$this->jmlBaris; $i++) {
					$r = mysql_fetch_array($query);		// Memasukkan data tiap baris kedalam variabel 'r'
					$kunci = array_keys($r);	// Memasukkan nama field kedalam variabel 'kunci'
					for($x=0; $x<count($kunci); $x++){
						if(!is_int($kunci[$x])){
							$this->hasil[$i][$kunci[$x]] = $r[$kunci[$x]];	// Memasukkan data kedalam variabel 'hasil'
						}
					}
				}
				$this->pesan = "Proses Berhasil";
				return true;
			}else{
				$this->pesan = "Proses Gagal";
				return false;
			}
		}
		public function select($tabel, $kolom="*", $kondisi=null, $urut=null, $batas=null){		// Menampilkan data dengan menuliskan nama tabel, kolom dam parameter tambahan
			$q = 'SELECT '.$kolom.' FROM '.$tabel;
			if($kondisi != null){
				$q .= ' WHERE '.$kondisi;	// Menambahkan kondisi kedalam query
			}
			if($urut != null){
				$q .= ' ORDER BY '.$urut;	// Menambahakan pengurutan data
			}
			if($batas != null){
				$q .= ' LIMIT '.$batas;		// Menambahkan batas data yang akan ditampilkan
			}
			$query = mysql_query($q);
			if($query){
				$this->jmlBaris = mysql_num_rows($query);	// Menghitung jumlah baris
				for ($i=0; $i<$this->jmlBaris; $i++) {
					$r = mysql_fetch_array($query);		// Memasukkan data tiap baris kedalam variabel 'r'
					$kunci = array_keys($r);	// Memasukkan nama field kedalam variabel 'kunci'
					for($x=0; $x<count($kunci); $x++){
						if(!is_int($kunci[$x])){
							$this->hasil[$i][$kunci[$x]] = $r[$kunci[$x]];	// Memasukkan data kedalam variabel 'hasil'
						}
					}
				}
				$this->pesan = "Proses Berhasil";
				return true;
			}else{
				$this->pesan = "Proses Gagal";
				return false;
			}
		}
		public function input($tabel, $nilai){	// Fungsi yang digunakan untuk melakukan input data
			$q = 'INSERT INTO '.$tabel.' VALUES ('.$nilai.')';
			$query = mysql_query($q);
			if($query){
				$this->pesan = "Proses Berhasil";
				return true;
			}else{
				$this->pesan = "Proses Gagal";
				return false;
			}
		}

		public function edit($tabel, $nilai=array(), $id){ // Fungsi ini digunakan untuk melakukan edit data
			$val = array();
			foreach ($nilai as $kunci => $isi) {
				$val[] = $kunci.='="'.$isi.'"';
			}
			$q = 'UPDATE '.$tabel.' SET '.implode(",", $val).' WHERE '.$id;
			if(mysql_query($q)){
				return true;
			}else{
				return false;
			}
		}

		public function hapus($tabel, $id){ // Fungsi ini digunakan untuk meghapus data
			$q = 'DELETE FROM '.$tabel.' WHERE '.$id;
			if(mysql_query($q)){
				return true;
			}else{
				return false;
			}
		}

		public function hasil(){ // Fungsi yang digunakan untuk mengambil data
			$val = $this->hasil;
			$this->hasil = array();
			return $val;
		}

		public function pindahGambar($namaGambar, $tmp){ // Fungsi yang digunakan untuk meng-upload gambar
			$target = 'upload/'.$namaGambar;
			move_uploaded_file($tmp, '../'.$target);
			return $target;
		}

		public function login($username, $pass){
			$q = "SELECT * FROM tbAdmin WHERE username='$username' and pass='$pass'";
			$query = mysql_query($q);
			$hasil = mysql_num_rows($query);
			if($hasil>0){
				return true;
			}else{
				return false;
			}
		}
	}
?>