<?php include 'header_siswa.php' ;?>



<?php  
        
        $tampol=mysqli_query($koneksi,"SELECT * FROM jawab_essay  WHERE kode_essay='$_GET[id_jawab]'");
        $md=mysqli_fetch_array($tampol);
    ?>


   <?php  
        
        $tampil=mysqli_query($koneksi,"SELECT * FROM jawab_essay  WHERE kode_essay='$_GET[id_jawab]' AND ID_User='$mm[ID_User]'");
        $dd=mysqli_fetch_array($tampil);
        if($dd==null){
    ?>



<!-- The modal -->
<div class="modal fade" id="smallShoes" tabindex="-1" role="dialog" aria-labelledby="modalLabelSmall" aria-hidden="true">
<div class="modal-dialog modal-md">
<div class="modal-content">

<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
<h4 class="modal-title text-center" id="modalLabelSmall">Upload Jawaban</h4>
</div>

<div class="modal-body">
<form action="" class="form-horizontal" method="POST"  enctype="multipart/form-data"  role="form">
<?php
// $simpan=mysqli_query($koneksi,"SELECT * FROM jawab_essay");
if($_SERVER["REQUEST_METHOD"]=="POST"){

  function upload() {
              $namaFile = $_FILES['j_essay']['name'];
              $ukuranFile = $_FILES['j_essay']['size'];
              $error = $_FILES['j_essay']['error'];
              $tmpName = $_FILES['j_essay']['tmp_name'];

              // cek apakah tidak ada gambar yang diupload
              if( $error === 4) {
                echo "<script>
                    alert('Pilih file terlebih dahulu!');
                   </script>";
                   return false;
              };

              // cek apakah yang diupload adalah gambar/file
              $ekstensiGambarValid = ['pdf', 'docx', 'pptx','odt','jpg','jpeg','png'];
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
				// $namaFileBaru = uniqid();
				// $namaFileBaru .= '.';
				// $namaFileBaru .= $ekstensiGambar;


              move_uploaded_file($tmpName, 'tugas/'. $namaFile);


              return $namaFile;
                         }




$essay= upload();
$kjurusan=$_POST["kode_jurusan"];
$kmapel=$_POST["kode_mapel"];
$kessay=$_POST["kode_essay"];
$nama=$_POST["nama_siswa"];
$tanggal=$_POST["tanggal_upload"];
$ID_User=$_SESSION["ID_User"];

if( $essay=='' || $kjurusan=='' || $kmapel=='' || $kessay=='' || $nama=='' || $tanggal=='' || $ID_User=='' ){
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

	$simpan = mysqli_query($koneksi,"INSERT INTO `jawab_essay` (`nama_siswa`, `kode_essay`,`kode_mapel`, `kode_jurusan`, `j_essay`, `tanggal_upload`, `ID_User`, `nilai`) VALUES ('$nama', '$kessay','$kmapel', '$kjurusan', '$essay', '$tanggal', '$ID_User', '');");
	
	if($simpan){
		echo "<script>window.location.href='upload_jawaban.php</script>";
	}

}
}


$sqlm = mysqli_query($koneksi, "SELECT * FROM siswa INNER JOIN user on user.ID_User = siswa.ID_User WHERE Username = '$_SESSION[Username]'");
$m=mysqli_fetch_array($sqlm);


$essay=mysqli_query($koneksi,"SELECT * FROM tugas_essay WHERE kode_essay='$_GET[id_jawab]'");
$sy=mysqli_fetch_array($essay);

?>



<label for="">NAMA MAHASISWA</label>
<input type="text" name="nama_siswa" value="<?= $m['nama_siswa']; ?>" readonly class="form-control">

<label for="">TANGGAL</label>
<input type="date" readonly value="<?= date('Y-m-d') ?>" name="tanggal_upload" class="form-control">

<label for="">UPLOAD MATERI TUGAS</label>
<input type="file" name="j_essay"  class="form-control">


<label for="">KODE MATA PELAJARAN</label>
<?php 
$materi=mysqli_query($koneksi,"SELECT * FROM tugas_essay WHERE kode_essay='$_GET[id_jawab]'");
while ($qs=mysqli_fetch_array($materi)) {?>
<input type="text" readonly value="<?= $qs['kode_mapel'] ?>" name="kode_mapel" class="form-control">
<?php } ?>

<label for="" class="text-white">KODE JURUSAN</label>
<input type="text" name="kode_jurusan" value="<?= $m['kode_jurusan']; ?>" class="form-control" readonly>

<label for="" class="text-white">KODE ESSAY</label>
<input type="text" name="kode_essay" value="<?= $sy['kode_essay']; ?>" class="form-control" readonly>

<br>
       <input type="submit" class="btn btn-success" value="simpan">

</form>

</div>

</div>
</div>
</div>


 
    <div class="col-xs-12  widget-container-col ui-sortable mt-5" id="widget-container-col-2">
											<div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-2">
												<div class="widget-header">
													<h5 class="widget-title bigger lighter">
														<i class="ace-icon fa fa-book"></i>
														Jawaban yang sudah di upload
													</h5>
										
													<div class="widget-toolbar">
													<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#smallShoes">
													+
													</button>
													</div>
												</div>

												<div class="widget-body widget-container-col">
													<div class="widget-main no-padding">
														<table class="table table-striped table-bordered table-hover ">
															<thead class="thin-border-bottom">
																<tr>
																	<th>No</th>
																	
																	<th>
																		<i class="ace-icon fa fa-bell"></i>
																		Nama
																	</th>

																		<th>																
																	<i class="ace-icon fa fa-calendar"></i>
																		Kode Jurusan
																	</th>
																	
																	<th class="hidden-480">
																	<i class="ace-icon fa fa-envelope"></i>
																	Jawaban</th>
																	
																	<th class="hidden-480">
																	<i class="ace-icon fa fa-envelope"></i>
																	Tanggal Upload</th>
																	
																	
																	
															</thead>

															<tbody>
																	<?php 
																	$i=1;
																	$tampil=mysqli_query($koneksi,"SELECT * FROM jawab_essay WHERE kode_essay='$_GET[id_jawab]'");
																	while($m=mysqli_fetch_array($tampil)){
																	?>
																<tr>
																	<td><?= $i++ ?></td>

																	<td>
																		<a href="#"><?= $m['nama_siswa']; ?></a>
																	</td>
																	
																	<td>
																		<a href="#"><?= $m['kode_jurusan']; ?></a>
																	</td>
																				
																	<td>
																		<a href="#"><?= $m['j_essay']; ?></a>
																	</td>
																
																	<td>
																		<a href="#"><?= $m['tanggal_upload']; ?></a>
																	</td>
																	
																	
																</tr>
												<?php  } ?>
																
															</tbody>
														</table>
														
													</div>
												</div>
											</div>
										</div>

        
<?php }else{ ?>

    <div class='clearfix'>
                                        <div class='pull-left alert alert-info no-margin alert-dismissable col-xs-12'>
                                            <button type='button' class='close' data-dismiss='alert'>
                                                <i class='ace-icon fa fa-times'></i>
                                            </button>
                                            <i class='ace-icon fa fa-info-circle bigger-120 blue'></i>
                                            SOAL SUDAH DI ISI ...
                                        </div>
                                        </div>


    <?php } ?>










