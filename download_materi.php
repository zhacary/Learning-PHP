<?php
// Baca lokasi file sementar dan nama file dari form (fupload)
$lokasi_file = $_FILES['materi']['tmp_name'];
$nama_file   = $_FILES['materi']['name'];
// Tentukan folder untuk menyimpan file
$folder = "files/$nama_file";
// tanggal sekarang
$tgl_upload = date("Ymd");
// Apabila file berhasil di upload
if (move_uploaded_file($lokasi_file,"$folder")){
  echo "Nama File : <b>$nama_file</b> sukses di upload";
  
  // Masukkan informasi file ke database
  $konek = mysqli_connect("localhost","root","","elearning");

  $query = "INSERT INTO materi (materi)
            VALUES( '$_POST[materi]')";
            
  mysqli_query($konek, $query);
}
else{
  echo "File gagal di upload";
}
?>