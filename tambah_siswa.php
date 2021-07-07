<?php 
    include 'header_siswa.php';
  
?>

<p>HAI..! <?php echo $_SESSION['Username'] ?> Mohon isi dengan lengkap ya</p>
<form class="form-horizontal" method="POST"  enctype="multipart/form-data"  role="form">

       <?php 
        if($_SERVER["REQUEST_METHOD"]=="POST"){
			
			 function uploads() {

              $namaFile = $_FILES['gambar']['name'];
              $ukuranFile = $_FILES['gambar']['size'];
              $error = $_FILES['gambar']['error'];
              $tmpName = $_FILES['gambar']['tmp_name'];

              // cek apakah tidak ada gambar yang diupload
              if( $error === 4) {
                echo "<script>
                    alert('Pilih gambar terlebih dahulu!');
                   </script>";
                   return false;
              };

              // cek apakah yang diupload adalah gambar
              $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
              $ekstensiGambar = explode('.', $namaFile);
              $ekstensiGambar = strtolower(end($ekstensiGambar));
              if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
                echo "<script>
                    alert('yang anda upload bukan gambar!');
                   </script>";
                   return false;
              }

              // cek ika ukurannya terlalu besar 
              if( $ukuranFile > 10000000 ) {
                echo "<script>
                    alert('ukuran gambar terlalu besar!');
                   </script>";
                return false;
              }


              // jika lolos pengecekan, gambar siap diupload
              // generate nama gambar baru
              $namaFileBaru = uniqid();
              $namaFileBaru .= '.';
              $namaFileBaru .= $ekstensiGambar;


              move_uploaded_file($tmpName, 'img/' . $namaFileBaru);


              return $namaFileBaru;

            }

	   			
            $nim        =   $_POST["nim"];
            $nama       =   $_POST["nama_siswa"];
            $ttl        =   $_POST["ttl"];
            $tempat     =   $_POST["tempat"];
			      $jk     	    =   $_POST["jk"];
            $jurusan    =   $_POST["jurusan"];
            $kode       =   $_POST["kode_jurusan"];
            $telp       =   $_POST["telp"];
            $email       =   $_POST["email"];
            $ID_User    =   $_SESSION["ID_User"];
			$gambar  	= 	uploads();
    
            if($nim=='' || $nama=='' || $ttl=='' || $tempat=='' || $jk=='' || $jurusan=='' || $kode=='' || $telp=='' || $email=='' || $gambar=='' ){
                echo "<div class='clearfix'>
									<div class='pull-left alert alert-danger no-margin alert-dismissable'>
										<button type='button' class=close data-dismiss='alert'>
											<i class='ace-icon fa fa-times'></i>
										</button>

										<i class='ace-icon fa  fa-exclamation-circle bigger-120 blue'></i>
										Data Belum Lengkap Silahkan Periksa Kembali...
									</div>

									
								</div>";
            }else{

                $simpan = mysqli_query($koneksi,"INSERT INTO `siswa` (`nim`, `nama_siswa`, `ttl`, `tempat`,`jk`,`jurusan`, `kode_jurusan`, `telp`,`email`, `ID_User`,`gambar`) 
                VALUES ('$nim', '$nama', '$ttl', '$tempat','$jk', '$jurusan', '$kode', '$telp','$email','$ID_User','$gambar');");
                
                if($simpan){
                    echo "<script>window.location.href='profile.php'</script>";
                }
            }
        }
        ?>
        <label for="">NIM</label>
        <input type="text" name="nim" class="form-control">

        <label for="">NAMA</label>
        <input type="text" name="nama_siswa" class="form-control">

        <label for="">TANGGAL LAHIR</label>
        <input type="date" name="ttl" class="form-control">

        <label for="">TEMPAT LAHIR</label>
        <input type="text" name="tempat" class="form-control">
		
		 <label for="">Jenis Kelamin</label>
       <select name="jk" id="" class="form-control">
        <option value="Perempuan">Perempuan</option>
        <option value="Laki-laki">Laki-laki</option>
       </select>

        <label for="">JURUSAN</label>
       <select name="jurusan" id="" class="form-control">
        <option value="">---</option>
      <?php $kelas=mysqli_query($koneksi,"SELECT * FROM jurusan GROUP BY jurusan ASC");
        while($k=mysqli_fetch_array($kelas)) {?>
       <option value="<?= $k['jurusan'] ?>"><?= $k['jurusan'] ?></option>
        <?php } ?>
       </select>


        <label for="">KODE KELAS</label>
       <select name="kode_jurusan" id="" class="form-control">
        <option value="">---</option>
      <?php $kelas=mysqli_query($koneksi,"SELECT * FROM jurusan GROUP BY kode_jurusan ASC");
        while($k=mysqli_fetch_array($kelas)) {?>
       <option value="<?= $k['kode_jurusan'] ?>"><?= $k['kode_jurusan'] ?></option>
        <?php } ?>
       </select>

       


         <label for="">NO TELP/WA</label>
        <input type="number" value="+62" name="telp" placeholder="Mohon gunakan nomor aktif" class="form-control">

        <label for="">E-MAILl</label>
        <input type="telp" name="email" placeholder="Mohon gunakan email aktif" class="form-control">
       
	
	<label for="">Foto Profile</label>
        <input type="file" name="gambar" class="form-control">
	
<br>
       <input type="submit" class="btn btn-success" value="simpan">
</form>