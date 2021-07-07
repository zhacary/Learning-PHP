<?php
	include 'datauser.php';
	include("db.php");
	if(isset($_POST["regis"])){
		$Username = $_POST["Username"];
		$Level = $_POST["Level"];
		$Pass = md5($_POST["Password"]);
		$sql = "INSERT INTO `user` (`Username`,`Level`, `Password`) VALUES ('$Username','$Level', '$Pass')";
		$d = new DB();
		$d->query($sql);
		echo "<script>alert('success membuat akses klik ok untuk ke beranda')</script>";
	}
?>