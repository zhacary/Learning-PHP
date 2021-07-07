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
<h4 class="modal-title text-center" id="modalLabelSmall">Buat Soal Ujian Pilihan Ganda</h4>
</div>

<div class="modal-body">
<form action="" class="form-horizontal" method="POST"   role="form">
	<?php
	
 $simpan=mysqli_query($koneksi,"SELECT * FROM ujian_pg");
	$materi = mysqli_fetch_array($simpan);
	if($_SERVER["REQUEST_METHOD"]=="POST"){
	$ujian=$_POST["ujian"];
	$semester=$_POST["semester"];
	$status=$_POST["status"];
	$tahun=$_POST["tahun"];
	$kode=$_POST["kode_pg"];
	$kmapel=$_POST["kode_mapel"];
	$judul=$_POST["judul_pg"];
	$kjurusan=$_POST["kode_jurusan"];
	$ttl=$_POST["tanggal"];
	$jam=$_POST["jam"];
	$jam_selesai=$_POST["jam_selesai"];
	$hari=$_POST["hari"];

	if($kode=='' || $judul=='' || $kmapel=='' || $kjurusan=='' || $ttl=='' || $jam=='' || $jam_selesai==''  || $ujian=='' || $semester=='' || $status=='' || $tahun=='' ){
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
		$simpan = mysqli_query($koneksi,"INSERT INTO `ujian_pg` (`kode_pg`, `kode_mapel`, `judul_pg`, `ujian`, `semester`,`status`, `kode_jurusan`, `nip`, `jam`, `jam_selesai`, `hari`, `tanggal`, `tahun`) VALUES ('$kode', '$kmapel', '$judul', '$ujian', '$semester','$status', '$kjurusan', '$dd[nip]', '$jam', '$jam_selesai', '$hari', '$ttl', '$tahun');");
		
		if($simpan){
			echo "<script>window.location.href='ujian_pg.php'</script>";
		}

	}
}

?>

<label for="">Judul soal</label>
<input type="text" name="judul_pg" class="form-control">

<label for="">Kode soal</label>
<input type="text" name="kode_pg" class="form-control">

 		<label for="">Kelas</label>
           <?php $kelas=mysqli_query($koneksi,"SELECT * FROM jurusan WHERE kode_jurusan='$_GET[id_ujian]'");
        while($k=mysqli_fetch_array($kelas)) {?>
       <input name="kode_jurusan" value="<?= $k['kode_jurusan'] ?>" class="form-control" readonly>
        <?php } ?>
       

<label for="">Tahun</label>
<input type="text" value="<?php echo date("Y"); ?>" name="tahun" class="form-control" readonly>

<label for="">Tanggal</label>
<input type="date" name="tanggal" class="form-control">

<label for="">Jam</label>
<input type="time" value="<?php echo date("H:i:s"); ?>" name="jam" class="form-control">

<label for="">Jam selesai</label>
<input type="time" value="" name="jam_selesai" class="form-control">

<label for="" class="text-white">HARI</label>
	<select  name="hari" id="" class="form-control">
	<option value="SENIN">SENIN</option>
		<option value="SELASA">SELASA</option>
			<option value="RABU">RABU</option>
				<option value="KAMIS">KAMIS</option>
					<option value="JUMAT">JUMAT</option>
						<option value="SABTU">SABTU</option>
</select>


					<label for="">Mata Pelajaran</label>
					<select name="kode_mapel" id="" class="form-control">
					<option value="">---</option>
					<?php $kelas=mysqli_query($koneksi,"SELECT * FROM mapel WHERE nip='$dd[nip]'");
					while($k=mysqli_fetch_array($kelas)) {?>
					 <option value="<?= $k['kode_mapel'] ?>"><?= $k['kode_mapel'] ?> -- <?= $k['nama_mapel'] ?></option>
					 <?php } ?>
					 </select>


	<label for="" class="text-white">Semester</label>
	<select  name="semester" id="" class="form-control">
	<option value="satu">1</option>
		<option value="dua">2</option>
			
	</select>


	<label for="" class="text-white">Ujian</label>
	<select  name="ujian" id="" class="form-control">
	<option value="UJIAN TENGAH SEMESTER">UTS</option>
		<option value="UJIAN AKHIR SEMESTER">UAS</option>
			
	</select>

	<label for="" class="text-white">Status</label>
	<select  name="status" id="" class="form-control">
	<option value="mulai">MULAI</option>
		<option value="selesai">SELESAI</option>
			
	</select>



<br>
       <input type="submit" class="btn btn-success" value="simpan">

</form>

</div>

</div>
</div>
</div>





  
    <div class="col-xs-12 " id="widget-container-col-2">
    								<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari judul soal ..." title="Type in a name">
											<div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-2">
												<div class="widget-header">
													<h5 class="widget-title bigger lighter">
														<i class="ace-icon fa fa-book"></i>
														SOAL PILIHAN GANDA
													</h5>

													<div class="widget-toolbar">
													<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#smallShoes">
													+
													</button>
													</div>
												</div>
												<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
 
 

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


<!-- The modal -->
																     	


 <script type="text/javascript" src="DataTables/datatables.min.js"></script>
												<div class="widget-body widget-container-col">
													<div class="widget-main no-padding table-container" id="myTable">
														<table class="table table-striped table-bordered table-hover ">
															<thead class="thin-border-bottom">
																<tr>
																<th>No</th>
																
																<th>Judul</th>
																<th>Semester</th>
																<th>Ujian</th>
																<th>Mata Pelajaran</th>
																
																
																<th>Tanggal</th>
																<th>Jam mulai</th>
																<th>Jam Selesai</th>
																<th>Hari</th>
																<th>Status</th>

																<th>Isi Jawab</th>
																<th>Hasil Jawab</th>
																</tr>
															</thead>

															<tbody>
																  <?php 
																  $i = 1;

																
														        $tampil=mysqli_query($koneksi,"SELECT * FROM ujian_pg  WHERE nip='$dd[nip]' AND kode_jurusan='$_GET[id_ujian]' ");
														        while($dm=mysqli_fetch_array($tampil)){
														        	$mapel=mysqli_query($koneksi,"SELECT * FROM mapel WHERE kode_mapel='$dm[kode_mapel]'");
														        	$mp=mysqli_fetch_array($mapel);


												        	// $lihat=mysqli_query($koneksi,"SELECT * FROM mapel WHERE nip='$dm[nip]'");
												        	// $lh=mysqli_fetch_array($lihat);
														        		

														        	//  $pesan=mysqli_query($koneksi,"SELECT COUNT(status) AS jumlah FROM `komentar_materi` WHERE status='Belum di baca' AND kode_materi='$dm[kode_materi]'");
														        	// $getJumlah = mysqli_fetch_array($pesan);

														    ?>
																<tr>
																
																	<td class=""><?= $i++; ?></td>
																	
																	<td class=""><?= $dm['judul_pg']; ?></td>
																	<td class=""><?= $dm['semester']; ?></td>
																	<td class=""><?= $dm['ujian']; ?></td>
																	
																	
																	<td class=""><?= $mp['nama_mapel']; ?></td>
																	<td class=""><?= $dm['tanggal']; ?></td>
																	<td class=""><?= $dm['jam']; ?></td>
																	<td class=""><?= $dm['jam_selesai']; ?></td>
																	<td class=""><?= $dm['hari']; ?></td>
																	<td class=""><a href="" data-toggle="modal" data-target="#smallShoes1<?= $dm['id'] ?>"><i class="fa fa-info"></i> <?= $dm['status']; ?></a>

																	</td>


																	<td>
																		<a href="soal_ujian_pg.php?id_upg=<?= $dm['kode_pg'] ?>" class="btn btn-sm btn-primary">Buat Soal</a>
																	</td>

																	<td>
																		<a href="hasil_pg.php?id_ujian=<?= $dm['kode_pg'] ?>" class="btn btn-sm btn-primary">Lihat</a>
																	</td>
																	
																</tr>
																<div class="modal fade" id="smallShoes1<?= $dm['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabelSmall" aria-hidden="true">
																			<div class="modal-dialog modal-sm">
																				<div class="modal-content">

																					<div class="modal-header">
																						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																						<span aria-hidden="true">&times;</span>
																						</button>
																						<h4 class="modal-title text-center" id="modalLabelSmall">Ubah status</h4>
																					</div>

																					<div class="modal-body">
																						<form action="" method="post">
																							<?php
																								$sqledit=mysqli_query($koneksi,"SELECT * FROM ujian_pg WHERE kode_pg='$_GET[id_ujian]'");
																								$e=mysqli_fetch_array($sqledit);
																							?> 
																										<?php 
																										if($_SERVER["REQUEST_METHOD"]=="POST"){

																											$status = $_POST["status"];
																											$id   = $_POST['kode_pg'];
																										
																											$update =mysqli_query($koneksi,"UPDATE `ujian_pg` SET 
																											status='$status' WHERE kode_pg='$id'");	

																											if($update){
																												echo "<script>window.location.href='ujian_pg.php?id_ujian=$_GET[id_ujian]'</script>";
																											}
																										}
																										?>
																										<div class="form-group">
																											<label for="">Status</label>
																											<input type="hidden" name="kode_pg" value="<?= $dm['kode_pg']; ?>" class="form-control">
																											
																											<select name="status">
																												<option value="mulai">Mulai</option>
																												<option value="selesai">Selesai</option>
																											</select>

																											
																										</div>
																										<br>
																										<input type="submit" class="btn- btn-success" name="Submit" value="Submit">
																										
																										

																						</form>
																					</div>

																				</div>
																			</div>
																		</div>
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
    td = tr[i].getElementsByTagName("td")[1];
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
        

