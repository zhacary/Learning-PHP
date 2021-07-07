<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include "koneksi.php";

// menangkap data yang dikirim dari form login
$username = $_POST['Username'];
$password = md5($_POST['Password']);


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from user where Username='$username' and Password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);
	$ID_User = $data['ID_User'];
	$Username = $data['Username'];
	

	// cek jika user login sebagai mahasiswa
	if($data['Level']=="siswa"){

		// buat session login dan mahasiswa
		
		$_SESSION['ID_User'] = $ID_User;
		$_SESSION['Username'] = $Username;
		$_SESSION['Level'] = "siswa";

		
		// alihkan ke halaman dashboard Panitia
		header("location:../E-Learning/header_siswa.php");

	// cek jika user login sebagai Calon siswa
	

	}else if($data['Level']=="guru"){

		// buat session login dan username
		$_SESSION['ID_User'] = $ID_User;
		$_SESSION['Username'] = $username;
		$_SESSION['Level'] = "guru";
		// alihkan ke halaman dashboard Panitia
		header("location:../E-Learning/header_guru.php");

	// cek jika user login sebagai Calon siswa
	

	}else if($data['Level']=="admin"){

		// buat session login dan username
		$_SESSION['ID_User'] = $ID_User;
		$_SESSION['Username'] = $username;
		$_SESSION['Level'] = "admin";
		// alihkan ke halaman dashboard Panitia
		header("location:../E-Learning/admin_user/indexadmin.php");

	// cek jika user login sebagai Calon siswa
	

	
	
	}else{
		// alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");
	}	
}else{
	header("location:login.php?pesan=gagal");
}

?>
 