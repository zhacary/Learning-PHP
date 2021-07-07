<?php include 'header_guru.php' ;?>

<?php  
$data=mysqli_query($koneksi,"SELECT * FROM siswa WHERE kode_jurusan='$_GET[id_data]'");
 $d=mysqli_fetch_array($data);
?>

<!-- css table -->
<style type="text/css">
    .table-container {
    overflow: auto;
}
</style>

<!-- The modal -->
<div class="modal fade" id="smallShoes" tabindex="-1" role="dialog" aria-labelledby="modalLabelSmall" aria-hidden="true">
<div class="modal-dialog modal-md">
<div class="modal-content">

<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
<h4 class="modal-title text-center" id="modalLabelSmall">Buat Materi</h4>
</div>

<div class="modal-body">
<form action="" class="form-horizontal" method="POST"  enctype="multipart/form-data"  role="form">
	<?php
	$simpan=mysqli_query($koneksi,"SELECT * FROM materi");
	$materi = mysqli_fetch_array($simpan);
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
              $ekstensiGambarValid = ['pdf', 'docx', 'pptx','odt'];
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
			  // $namaFileBaru .= $_SESSION["materi"];
     //          $namaFileBaru .= '.';
     //          $namaFileBaru .= $ekstensiGambar;


              move_uploaded_file($tmpName, 'file/' . $namaFile);


              return $namaFile;
                         }


	$kode=$_POST["kode_materi"];
	$materi= upload();
	$kmapel=$_POST['kode_mapel'];
	$jurusan=$_POST['jurusan'];
	$kjurusan=$_POST["kode_jurusan"];
	$ttl=$_POST["tanggal"];
	$jam=$_POST["jam"];
	$hari=$_POST["hari"];

	if($kode=='' ||  $materi=='' || $kmapel=='' || $jurusan=='' || $kjurusan=='' || $ttl=='' ||$jam=='' || $hari==''){
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
		 date_default_timezone_set('Asia/Jakarta');
		$simpan = mysqli_query($koneksi,"INSERT INTO `materi` (`nip`, `materi`,`kode_mapel`, `kode_materi`,`jurusan`,`kode_jurusan`,`tanggal`,`jam`,`hari`) 
		VALUES ('$dd[nip]', '$materi','$kmapel', '$kode','$jurusan','$kjurusan','$ttl','$jam','$hari');");
		
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
<input type="text" value="<?php echo date("H:i:s"); ?>" name="jam" class="form-control">

<label for="">MATERI</label>
<input type="file" name="materi"  class="form-control">


<label for="">MATA PELAJARAN</label>
<select name="kode_mapel" id="" class="form-control">
<option value="">---</option>
<?php $kelas=mysqli_query($koneksi,"SELECT * FROM mapel WHERE nip='$dd[nip]'");
while($k=mysqli_fetch_array($kelas)) {?>
 <option value="<?= $k['kode_mapel'] ?>"><?= $k['kode_mapel'] ?> -- <?= $k['nama_mapel'] ?></option>
 <?php } ?>
 </select>


	<label>JURUSAN</label>
	<?php $kelas=mysqli_query($koneksi,"SELECT * FROM jurusan WHERE kode_jurusan='$_GET[id_data]' GROUP BY jurusan ASC");
        while($k=mysqli_fetch_array($kelas)) {?>
	<input type="" name="jurusan" value="<?= $k['jurusan'] ?>" class="form-control" readonly>
	 <?php } ?>

	 <label>KELAS</label>
	<?php $kelas=mysqli_query($koneksi,"SELECT * FROM jurusan WHERE kode_jurusan='$_GET[id_data]' GROUP BY jurusan ASC");
        while($k=mysqli_fetch_array($kelas)) {?>
	<input type="" name="kode_jurusan" value="<?= $k['kode_jurusan'] ?>" class="form-control" readonly>
	 <?php } ?>

 		
					
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

</div>
</div>
</div>




<style>
* {
  box-sizing: border-box;
}

#myInput[type=text] {
 background-color: white;
  background-image: url('searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  padding-left: 40px;
}

#myTable {
  border-collapse: collapse;
}


</style>

  
    <div class="col-xs-12  widget-container-col ui-sortable" id="widget-container-col-2">
    								<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari judul materi.." title="Type in a name">
											<div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-2">
												<div class="widget-header">
													<h5 class="widget-title bigger lighter">
														<i class="ace-icon fa fa-book"></i>
														Materi
													</h5>

													<div class="widget-toolbar">
													<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#smallShoes">
													+
													</button>
													</div>
												</div>
												<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
 
 <script type="text/javascript" src="DataTables/datatables.min.js"></script>
												<div class="widget-body widget-container-col">
													<div class="widget-main no-padding table-container" id="myTable">
														<table class="table table-striped table-bordered table-hover ">
															<thead class="thin-border-bottom">
																<tr>
																<th>NO</th>
																<th>Kode Mata Pelajaran</th>
																<th>Kelas</th>
																<th>Waktu</th>
																<th>Hari</th>
																<th>Tanggal</th>
																<th>Kode Materi</th>
																<th>Materi</th>
																<th>Status</th>
																<th>Komentar</th>
																<th>Lihat Absen</th>
																</tr>
															</thead>

															<tbody>
																  <?php 
																  $i = 1;

																
														        $tampil=mysqli_query($koneksi,"SELECT * FROM materi WHERE nip='$dd[nip]' AND kode_jurusan='$_GET[id_data]' ORDER BY tanggal DESC");
														        while($dm=mysqli_fetch_array($tampil)){

														        		

														        	//  $pesan=mysqli_query($koneksi,"SELECT COUNT(status) AS jumlah FROM `komentar_materi` WHERE status='Belum di baca' AND kode_materi='$dm[kode_materi]'");
														        	// $getJumlah = mysqli_fetch_array($pesan);

														    ?>
																<tr>
																
																	<td class=""><?= $i++; ?></td>

																	<td class=""><?= $dm['kode_mapel']; ?></td>

																	<td class=""><?= $dm['kode_jurusan']; ?></td>

																	<td>
																		<?= $dm['jam']; ?>
																	</td>

																	<td class="hidden-480">
																		<?= $dm['hari']; ?>
																	</td>
																	
																	<td class="hidden-480">
																		<?= $dm['tanggal']; ?>
																	</td>
																	
																	<td>
																		<?= $dm['kode_materi']; ?>
																	</td>
																	<td>
																		<?= $dm['materi']; ?>
																	</td>
																	<td>
																		<a href="download_file.php?materi=<?=$dm['materi']?>"><i class="fa fa-download bigger"> Download</i></a>
																	</td>
																	
																	<td>
																		<a href="lihat_materi.php?id_materi=<?= $dm['kode_materi'] ?>" class="btn btn-sm btn-primary">Lihat</a>
																	</td>
																	<td>
																		<a href="lihat_absen.php?id_materi=<?= $dm['kode_materi'] ?>" class="btn btn-sm btn-primary">Absen</a>
																	</td>
																</tr>
																<?php  } ?>
																
																
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>

        
		
		

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[7];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
        

