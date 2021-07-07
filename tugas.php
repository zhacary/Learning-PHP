<?php include 'header_guru.php' ;?>

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
			<h4 class="modal-title text-center" id="modalLabelSmall">BUAT TUGAS</h4>
			</div>

			<div class="modal-body">
			<form action="" class="form-horizontal" method="POST"  enctype="multipart/form-data"  role="form">
					<?php
					$simpan=mysqli_query($koneksi,"SELECT * FROM tugas_essay");
					if($_SERVER["REQUEST_METHOD"]=="POST"){

					function upload() {

								$namaFile = $_FILES['essay']['name'];
								$ukuranFile = $_FILES['essay']['size'];
								$error = $_FILES['essay']['error'];
								$tmpName = $_FILES['essay']['tmp_name'];

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
								// 	$namaFileBaru .= uniqid();
								// $namaFileBaru .= '.';
								// $namaFileBaru .= $ekstensiGambar;


								move_uploaded_file($tmpName, 'tugas/' . $namaFile);


								return $namaFile;
											}


					$kodes=$_POST["kode_essay"];
					$kmapel=$_POST["kode_mapel"];
					$essay= upload();
					$kjurusan=$_POST["kode_jurusan"];
					$ttl=$_POST["tanggal"];
					$jam=$_POST["jam"];
					$hari=$_POST["hari"];

					if($kodes=='' || $kmapel=='' || $essay=='' || $kjurusan=='' || $ttl=='' ||$jam=='' || $hari==''){
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

						$simpan = mysqli_query($koneksi,"INSERT INTO `tugas_essay` (`nip`, `essay`,`kode_mapel`, `kode_essay`,`kode_jurusan`,`tanggal`,`jam`,`hari`) 
						VALUES ('$dd[nip]', '$essay','$kmapel', '$kodes','$kjurusan','$ttl','$jam','$hari');");
						
						if($simpan){
							echo "<script>window.location.href='tugas.php'</script>";
						}

					}
					}

					?>

					<label for="">ID TUGAS</label>
					<input type="text" name="kode_essay" class="form-control">

					<label for="">TANGGAL</label>
					<input type="date" name="tanggal" class="form-control">

					<label for="">WAKTU</label>
					<input type="text" value="<?php echo date("H:i:s"); ?>" name="jam" class="form-control">

					<label for="">UPLOAD MATERI TUGAS</label>
					<input type="file" name="essay"  class="form-control">


					<label for="">MATA PELAJARAN</label>
					<select name="kode_mapel" id="" class="form-control">
					<option value="">---</option>
					<?php $kelas=mysqli_query($koneksi,"SELECT * FROM mapel WHERE nip='$dd[nip]'");
					while($k=mysqli_fetch_array($kelas)) {?>
					 <option value="<?= $k['kode_mapel'] ?>"><?= $k['kode_mapel'] ?> -- <?= $k['nama_mapel'] ?></option>
					 <?php } ?>
					 </select>


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
    	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari judul tugas.." title="Type in a name">
											<div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-2">
												<div class="widget-header">
													<h5 class="widget-title bigger lighter">
														<i class="ace-icon fa fa-table"></i>
														Tugas
													</h5>

													<div class="widget-toolbar  ">
													<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#smallShoes">
													<strong>+</strong>
													</button>
													</div>

													
												</div>

												<div class="widget-body">
													<div class="widget-main no-padding table-container" id="myTable">
														<table class="table table-striped table-bordered table-hover">
															<thead class="thin-border-bottom">
																<tr>
																	<th>No</th>
																	<th>Kelas</th>
																	<th>Waktu</th>
																	<th>Hari</th>
																	<th class="hidden-480">Kode tugas</th>
																	<th class="hidden-480">Tugas</th>
																	<th class="hidden-480">Status</th>
																	<th class="hidden-480">Jawaban</th>
																</tr>
															</thead>

															<tbody>
															<?php 
																	$i=1;
																	$tampil=mysqli_query($koneksi,"SELECT * FROM tugas_essay WHERE nip='$dd[nip]' ORDER BY tanggal DESC");
																	while($dm=mysqli_fetch_array($tampil)){
																?>
																<tr>
																<td class=""><?= $i++; ?></td>

																	<td class=""><?= $dm['kode_jurusan']; ?></td>

																	<td>
																		<?= $dm['jam']; ?>
																	</td>

																	<td class="hidden-480">
																		<span ><?= $dm['hari']; ?></span>
																	</td>
																	
																	<td>
																		<?= $dm['kode_essay']; ?>
																	</td>
																	<td>
																		<?= $dm['essay']; ?>
																	</td>
																	
																																		
																	<td>
																		<a href="download_tugas.php?essay=<?=$dm['essay']?>"><i class="fa fa-download bigger"> Download</i></a>
																	</td>
																	
																	<td>
																		<a href="lihat_tugas.php?id_essay=<?= $dm['kode_essay'] ?>" class="btn btn-sm btn-primary">Lihat</a>
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
	    td = tr[i].getElementsByTagName("td")[5];
	    
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
        