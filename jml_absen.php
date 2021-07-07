<?php
include 'header_guru.php';
?>


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



#myInput1[option]{
 background-color: white;
  background-image: url('searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  padding-left: 40px;
}

#myTable1 {
  border-collapse: collapse;
}

.table-container {
    overflow: auto;
}

</style>


<?php  
	$dos=mysqli_query($koneksi,"SELECT * FROM materi WHERE nip='$_GET[id_absen]'");
	$da=mysqli_fetch_array($dos);
?>

<div class="card-body">
  
	
  


  


    <div class="col-xs-12  widget-container-col ui-sortable" id="widget-container-col-2" >

    	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari nama mahasiswa.." title="Type in a name">

    	<select id="myInput1" onkeyup="myFunction1()">
    		<option></option>
    		<?php 
    		$query=mysqli_query($koneksi,"SELECT * FROM siswa GROUP BY jurusan");
    		while ($k=mysqli_fetch_array($query)) {	?>
    		
    			<option value="<?= $k['jurusan'] ?>"><?= $k['jurusan'] ?></option>
    		<?php } ?>
    	</select>



											<div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-2">
												<div class="widget-header" >
													<h5 class="widget-title bigger lighter">
														<i class="ace-icon fa fa-book"></i>
														ABSEN MAHASISWA
													</h5>
													
													<div class="widget-toolbar ">
													
													</div>
												</div>

												<div class="widget-body widget-container-col" id="myTable1">
													<div class="widget-main no-padding table-container" id="myTable">
														<table class="table table-striped table-bordered table-hover " >
															<thead class="thin-border-bottom">
																<tr>
																

																<th>No</th>
																<th>Nim</th>	
																<th>Nama</th>		
																<th>Kode Jursan</th>
																<th>Tanggal</th>
																<th>Jam</th>
																<th>Jumlah Hadir</th>
																<th>Jumlah Pertemuan</th>
																		
															</tr>
															</thead>

															<tbody>
																  <?php 
																  $i=1;
																	$tampil=mysqli_query($koneksi,"SELECT * FROM absen 
																		WHERE nip='N001' AND kode_jurusan ='$_GET[id_absen]' GROUP BY nama_siswa ASC ");
																	while($dm=mysqli_fetch_array($tampil)){


																		$queryGetJumlahHadir = mysqli_query($koneksi, "SELECT COUNT(ID_User) as total FROM absen WHERE ID_User='$dm[ID_User]' AND nip='$_GET[id_absen]'");
																		$getJumlahHadir = mysqli_fetch_array($queryGetJumlahHadir);


																		$queryGetPertemuan = mysqli_query($koneksi, "SELECT COUNT(materi) as pertemuan FROM materi  WHERE nip='$_GET[id_absen]' AND kode_jurusan='$dm[kode_jurusan]'");
																		$jmlPertemuan = mysqli_fetch_array($queryGetPertemuan);
																?>
																<tr>
																<td class=""><?= $i++; ?></td>
																	<td class=""><?= $dm['nim']; ?></td>

																	<td>
																		<a href="biodata_mhs.php?id_nim=<?= $dm['nim'] ?>"><?= $dm['nama_siswa']; ?></a>
																	</td>

																	<td class="hidden-480">
																		<span ><?= $dm['kode_jurusan']; ?></span>
																	</td>
																	
																	<td class="hidden-480">
																		<span ><?= $dm['tanggal_upload']; ?></span>
																	</td>

																	
																	
																	<td>
																		<?= $dm['jam']; ?>
																	</td>
																	
																                                                                 
                                                                   <td>
																		<a href="#"><?= $getJumlahHadir['total'];?></a>
																	</td>

																	<td>
																		<a href="#"><?= $jmlPertemuan['pertemuan'];?></a>
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



<script>
function myFunction1() {
  var option, filter, table, tr, td, i, txtValue;
  option = document.getElementsByTagName("myInput1");
  filter = option.value.toUpperCase();
  table = document.getElementById("myTable1");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[8];
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