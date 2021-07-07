<?php include 'header_guru.php'; ?>
<div>
    <form action="" method="POST" enctype="multipart/form-data">
    <?php
  
  if($_SERVER['REQUEST_METHOD']=='POST'){
        function upload() {

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

	   
	   
	   
	   
	   
	   
        $nip=$_POST['nip'];
        $nama=$_POST['nama_guru'];
       
        $tempat=$_POST['tempat'];
		$jk    =   $_POST["jk"];
        $ttl=$_POST['ttl'];
        $ID_User=$_SESSION['ID_User'];
		$gambar  = upload();
		
   
        if($nip=='' || $nama=='' || $tempat==''  || $jk==''  || $ttl=='' || $gambar==''){
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
            $simpan=mysqli_query($koneksi,"INSERT INTO guru(nip,nama_guru,tempat,jk,ttl,ID_User,gambar) VALUES ('$nip','$nama','$tempat','$jk','$ttl','$ID_User','$gambar')");
            
            if($simpan){
               echo"<script>window.location.href='profile_guru.php'</script>";
            }
        
        }
    }
    ?>
    <br>
    <label for="">NIP</label>
    <input type="text" name="nip" class="form-control">

    <label for="">NAMA DOSEN</label>
    <input type="text" name="nama_guru" class="form-control">

   

    <label for="">TEMPAT LAHIR</label>
    <input type="text" name="tempat" class="form-control">

    <label for="">TANGGAL LAHIR</label>
    <input type="date" name="ttl" class="form-control">
	
	
		 <label for="">Jenis Kelamin</label>
       <select name="jk" id="" class="form-control">
        <option value="Perempuan">Perempuan</option>
        <option value="Laki-laki">Laki-laki</option>
       
       </select>
	
	 <label for="">Foto Profile</label>
    <input type="file" name="gambar" class="form-control">
    <br>
    <input type="submit" class="btn-violet sm" value="simpan">

    </form>


</div>
