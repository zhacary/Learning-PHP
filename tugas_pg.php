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
<h4 class="modal-title text-center" id="modalLabelSmall">Buat Soal Pg</h4>
</div>

<div class="modal-body">
<form action="" class="form-horizontal" method="POST"   role="form">
	<?php
	
 $simpan=mysqli_query($koneksi,"SELECT * FROM pg");
	$materi = mysqli_fetch_array($simpan);
	if($_SERVER["REQUEST_METHOD"]=="POST"){

	$kode=$_POST["kode_pg"];
	$kmapel=$_POST["kode_mapel"];
	$judul=$_POST["judul_pg"];
	$kjurusan=$_POST["kode_jurusan"];
	$ttl=$_POST["tanggal"];
	$jam=$_POST["jam"];
	$hari=$_POST["hari"];

	if($kode=='' || $judul=='' || $kmapel=='' || $kjurusan=='' ){
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
		$simpan = mysqli_query($koneksi,"INSERT INTO `pg` (`nip`, `judul_pg`,`kode_mapel`, `kode_jurusan`,`kode_pg`,`tanggal`,`jam`,`hari`) 
		VALUES ('$dd[nip]', '$judul','$kmapel', '$kjurusan','$kode','$ttl','$jam','$hari');");
		
		if($simpan){
			echo "<script>window.location.href='tugas_pg.php'</script>";
		}

	}
}

?>

<label for="">Judul soal</label>
<input type="text" name="judul_pg" class="form-control">

<label for="">Kode soal</label>
<input type="text" name="kode_pg" class="form-control">

 		<label for="">KODE KELAS</label>
       <select name="kode_jurusan" id="" class="form-control">
        <option value="">---</option>
      <?php $kelas=mysqli_query($koneksi,"SELECT * FROM jurusan GROUP BY kode_jurusan ASC");
        while($k=mysqli_fetch_array($kelas)) {?>
       <option value="<?= $k['kode_jurusan'] ?>"><?= $k['kode_jurusan'] ?></option>
        <?php } ?>
       </select>

<label for="">TANGGAL</label>
<input type="date" name="tanggal" class="form-control">

<label for="">WAKTU</label>
<input type="text" value="<?php echo date("H:i:s"); ?>" name="jam" class="form-control">


					<label for="">MATA PELAJARAN</label>
					<select name="kode_mapel" id="" class="form-control">
					<option value="">---</option>
					<?php $kelas=mysqli_query($koneksi,"SELECT * FROM mapel WHERE nip='$dd[nip]'");
					while($k=mysqli_fetch_array($kelas)) {?>
					 <option value="<?= $k['kode_mapel'] ?>"><?= $k['kode_mapel'] ?> -- <?= $k['nama_mapel'] ?></option>
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





  
    <div class="col-xs-12  widget-container-col ui-sortable" id="widget-container-col-2">
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

 <script type="text/javascript" src="DataTables/datatables.min.js"></script>
												<div class="widget-body widget-container-col">
													<div class="widget-main no-padding table-container" id="myTable">
														<table class="table table-striped table-bordered table-hover ">
															<thead class="thin-border-bottom">
																<tr>
																<th>No</th>
																<th>Nip</th>
																<th>Judul</th>
																<!-- <th>Mata Pelajaran</th>	 -->
																<th>Kode Pg</th>
																<th>Kode jurusan</th>
																<th>Tanggal</th>
																<th>Jam</th>
																<th>Hari</th>

																<th>Isi Jawab</th>
																<th>Hasil Jawab</th>
																</tr>
															</thead>

															<tbody>
																  <?php 
																  $i = 1;

																
														        $tampil=mysqli_query($koneksi,"SELECT * FROM pg WHERE nip='$dd[nip]' ");
														        while($dm=mysqli_fetch_array($tampil)){


												        	// $lihat=mysqli_query($koneksi,"SELECT * FROM mapel WHERE nip='$dm[nip]'");
												        	// $lh=mysqli_fetch_array($lihat);
														        		

														        	//  $pesan=mysqli_query($koneksi,"SELECT COUNT(status) AS jumlah FROM `komentar_materi` WHERE status='Belum di baca' AND kode_materi='$dm[kode_materi]'");
														        	// $getJumlah = mysqli_fetch_array($pesan);

														    ?>
																<tr>
																
																	<td class=""><?= $i++; ?></td>
																	<td class=""><?= $dm['nip']; ?></td>
																	<td class=""><?= $dm['judul_pg']; ?></td>
																	<!--  -->
																	<td class=""><?= $dm['kode_pg']; ?></td>
																	<td class=""><?= $dm['kode_jurusan']; ?></td>
																	<td class=""><?= $dm['tanggal']; ?></td>
																	<td class=""><?= $dm['jam']; ?></td>
																	<td class=""><?= $dm['hari']; ?></td>

																	<td>
																		<a href="jawabpg.php?id_pg=<?= $dm['kode_pg'] ?>" class="btn btn-sm btn-primary">Buat Quiz</a>
																	</td>

																	<td>
																		<a href="lihat_pg.php?id_g=<?= $dm['kode_pg'] ?>" class="btn btn-sm btn-primary">Lihat</a>
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
    td = tr[i].getElementsByTagName("td")[3];
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
        

