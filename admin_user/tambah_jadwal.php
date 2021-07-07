<?php
include 'indexadmin.php'
?>


<!-- The modal -->
<div class="modal fade" id="smallShoes" tabindex="-1" role="dialog" aria-labelledby="modalLabelSmall" aria-hidden="true">
<div class="modal-dialog modal-md">
<div class="modal-content">

<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
<h4 class="modal-title" id="modalLabelSmall">Tambah Jadwal</h4>
</div>

<div class="modal-body">
<form class="form-horizontal" method="POST"  enctype="multipart/form-data"  role="form">

<?php 
 if($_SERVER["REQUEST_METHOD"]=="POST"){
     
     
            
    $nip        =   $_POST["nip"];
    $kmapel		= $_POST["kode_mapel"];
    $hari     	=   $_POST["hari"];
    $kode       =   $_POST["kode_jurusan"];
    $jam        =   $_POST["jam"];
    $jam_selesai =   $_POST["jam_selesai"];
    $Jurusan 	= $_POST['jurusan'];
   
    
     

     if($nip=='' || $kmapel=='' ||$hari=='' || $kode=='' || $jam=='' || $jam_selesai=='' || $Jurusan=='' ){
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

         $simpan = mysqli_query($koneksi,"INSERT INTO `jadwal` (`nip`,`kode_mapel`, `hari`, `jam`, `jam_selesai`, `kode_jurusan`,`jurusan`) VALUES ('$nip','$kmapel', '$hari', '$jam', '$jam_selesai', '$kode' , '$Jurusan');");
         
         if($simpan){
             echo "<script>window.location.href='#.php'</script>";
         }
     }
 }
 ?>

 
 <label for="">NIP</label>
<select name="nip" id="" class="form-control">
<?php
$dosen=mysqli_query($koneksi,"SELECT * FROM guru");
while($n=mysqli_fetch_array($dosen)){
?>
 <option value="<?= $n['nip'] ?>"><?= $n['nip'] ?>--<?= $n['nama_guru'] ?></option>
<?php } ?>
</select>


 

 <label for="">HARI</label>
<select name="hari" id="" class="form-control">

 <option value="SENIN">Senin</option>
 <option value="SELASA">Selasa</option>
 <option value="RABU">Rabu</option>
 <option value="KAMIS">Kamis</option>
 <option value="JUMAT">Jumat</option>
 <option value="SABTU">Sabtu</option>

</select>



<label for="">MATA PELAJARAN</label>
<select name="kode_mapel" id="" class="form-control">
<option value="">---</option>
<?php $kelas=mysqli_query($koneksi,"SELECT * FROM mapel ");
while($k=mysqli_fetch_array($kelas)) {?>
<option value="<?= $k['kode_mapel'] ?>"><?= $k['kode_mapel'] ?> -- <?= $k['nama_mapel'] ?></option>
<?php } ?>
</select>

 <label for="">JAM</label>
 <input type="time" name="jam" class="form-control">
 
 <label for="">JAM SELESAI</label>
 <input type="time" name="jam_selesai" class="form-control">
  

	<label>JURUSAN</label>
	<?php $kelas=mysqli_query($koneksi,"SELECT * FROM jurusan WHERE kode_jurusan='$_GET[id_jadwal]' GROUP BY jurusan ASC");
        while($k=mysqli_fetch_array($kelas)) {?>
	<input type="" name="jurusan" value="<?= $k['jurusan'] ?>" class="form-control" readonly>
	 <?php } ?>

	 <label>KELAS</label>
	<?php $kelas=mysqli_query($koneksi,"SELECT * FROM jurusan WHERE kode_jurusan='$_GET[id_jadwal]' GROUP BY jurusan ASC");
        while($k=mysqli_fetch_array($kelas)) {?>
	<input type="" name="kode_jurusan" value="<?= $k['kode_jurusan'] ?>" class="form-control" readonly>
	 <?php } ?>



<br>
<input type="submit" class="btn btn-info" value="SIMPAN">
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
					<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari judul Guru.." title="Type in a name">
											<div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-2">
												<div class="widget-header">
													<h5 class="widget-title bigger lighter">
														<i class="ace-icon fa fa-book"></i>
														Jadwal
													</h5>

													<div class="widget-toolbar">
													<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#smallShoes">
													+
													</button>
													</div>
												</div>

												<div class="widget-body widget-container-col">
													<div class="widget-main no-padding" id="myTable">
														<table class="table table-striped table-bordered table-hover ">
															<thead class="thin-border-bottom">
																<tr>
																<th>NO</th>
																<th>Nip</th>
                                                                <th>Guru</th>
                                                                <th>Kode Mata Pelajaran</th>
                                                                <th>Hari</th>
																<th>Jam Mulai</th>
																<th>Jama Selesai</th>
																<th>Jurusan</th>
																<th>Kelas</th>
                                                                <th>Aksi</th>
																	
																</tr>
															</thead>

															<tbody>
																  <?php 
																  $i = 1;
        $tampil=mysqli_query($koneksi,"SELECT * FROM jadwal INNER JOIN guru ON guru.nip=jadwal.nip WHERE kode_jurusan='$_GET[id_jadwal]' ORDER BY jam_selesai ASC");
        while($dm=mysqli_fetch_array($tampil)){
    ?>
																<tr>
																
																	<td class=""><?= $i++; ?></td>

																
																	<td class=""><?= $dm['nip']; ?></td>

                                                                    <td class=""><?= $dm['nama_guru']; ?></td>

                                                                    <td class=""><?= $dm['kode_mapel']; ?></td>

                                                                   	<td>
																		<?= $dm['hari']; ?>
																	</td>

																	<td class="hidden-480">
																		<span ><?= $dm['jam']; ?></span>
																	</td>
																	
																	<td class="hidden-480">
																		<span ><?= $dm['jam_selesai']; ?></span>
																	</td>

																	<td class="hidden-480">
																		<span ><?= $dm['jurusan']; ?></span>
																	</td>
																	
																	<td>
																		<?= $dm['kode_jurusan']; ?>
																	</td>

                                                                    <td><a class="" onclick="return confirm('yakin ingin menghapus jadwal')" href='hapus_jadwal.php?id=<?php echo $dm['id']; ?>'>Hapus</a></td>
																	
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
		    td = tr[i].getElementsByTagName("td")[2];
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