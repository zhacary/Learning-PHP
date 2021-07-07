<?php include 'header_guru.php' ;?>
<div class="card-body">
<form action="" class="form-horizontal" method="POST"  enctype="multipart/form-data"  role="form">
<?php
$simpan=mysqli_query($koneksi,"SELECT * FROM materi");
if($_SERVER["REQUEST_METHOD"]=="POST"){

  function upload() {

              $namaFile = $_FILES['materi']['name'];
              $ukuranFile = $_FILES['materi']['size'];
              $error = $_FILES['materi']['error'];
              $tmpName = $_FILES['materi']['tmp_name'];

              // cek apakah tidak ada gambar yang diupload
              if( $error === 4) {
                echo "<script>
                    alert('Pilih file terlebih dahulu!');
                   </script>";
                   return false;
              };

              // cek apakah yang diupload adalah gambar
              $ekstensiGambarValid = ['pdf', 'docx', 'pptx'];
              $ekstensiGambar = explode('.', $namaFile);
              $ekstensiGambar = strtolower(end($ekstensiGambar));
              if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
                echo "<script>
                    alert('yang anda upload bukan file pdf!');
                   </script>";
                   return false;
              }

              // cek ika ukurannya terlalu besar 
              if( $ukuranFile > 10000000 ) {
                echo "<script>
                    alert('ukuran File terlalu besar!');
                   </script>";
                return false;
              }
				$namaFileBaru .= uniqid();
              $namaFileBaru .= '.';
              $namaFileBaru .= $ekstensiGambar;


              move_uploaded_file($tmpName, 'file/' . $namaFileBaru);


              return $namaFileBaru;
                         }


$kode=$_POST["kode_materi"];
$materi= upload();
$kjurusan=$_POST["kode_jurusan"];
$ttl=$_POST["tanggal"];
$jam=$_POST["jam"];
$hari=$_POST["hari"];

if($kode=='' || $materi=='' || $kjurusan=='' || $ttl=='' ||$jam=='' || $hari==''){
	echo "<div class='clearfix'>
									<div class='pull-left alert alert-danger no-margin alert-dismissable'>
										<button type='button' class='close' data-dismiss='alert'>
											<i class='ace-icon fa fa-times'></i>
										</button>
										<i class='ace-icon fa fa-info-circle bigger-120 red'></i>
										Data Belum lengkap silahkan isi data yg masih kosong ...
									</div>
									</div>";
}else{

	$simpan = mysqli_query($koneksi,"INSERT INTO `materi` (`nip`, `materi`, `kode_materi`,`kode_jurusan`,`tanggal`,`jam`,`hari`) 
	VALUES ('$dd[nip]', '$materi', '$kode','$kjurusan','$ttl','$jam','$hari');");
	
	if($simpan){
		echo "<script>window.location.href='materi.php'</script>";
	}

}
}

?>

<label for="">ID MATERI</label>
<input type="text" name="kode_materi" class="form-control">

<label for="">TANGGAL</label>
<input type="date" name="tanggal" class="form-control">

<label for="">WAKTU</label>
<input type="time" name="jam" class="form-control">

<label for="">MATERI</label>
<input type="file" name="materi"  class="form-control">


					<label for="" class="text-white">KELAS JURUSAN</label>
                    <select name="kode_jurusan" id="" class="form-control">
                    <?php 
                        $tampil1=mysqli_query($koneksi,"SELECT * FROM siswa");
                        while($d=mysqli_fetch_array($tampil1)){
                    
                        ?>
                    <option value="<?=$d["kode_jurusan"]?>"><?= $d['kode_jurusan'] ?></option>
                        <?php } ?>
                    </select>
					
	<label for="" class="text-white">HARI</label>
	<select  name="hari" id="" class="form-control">
	<option value="SENIN">SENIN</option>
		<option value="SELASA">SELASA</option>
			<option value="RABU">RABU</option>
				<option value="KAMIS">KAMIS</option>
					<option value="JUMAT">JUMAT</option>
						<option value="SABTU">SABTU</option>
	</select>

<br>
       <input type="submit" class="btn btn-success" value="simpan">

</form>

</div>