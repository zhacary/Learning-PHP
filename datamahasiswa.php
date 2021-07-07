<?php
include 'header_guru.php';
?>




<?php  
$data=mysqli_query($koneksi,"SELECT * FROM siswa WHERE kode_jurusan='$_GET[id_data]'");
              $d=mysqli_fetch_array($data);
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

</style>




<div class="card-body">
  
	
  


  


    <div class="col-xs-12  widget-container-col ui-sortable" id="widget-container-col-2" >

    	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari nama mahasiswa.." title="Type in a name">

    	



											<div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-2">
												<div class="widget-header" >
													<h5 class="widget-title bigger lighter">
														<i class="ace-icon fa fa-book"></i>
														DATA MAHASISWA
													</h5>
													
													<div class="widget-toolbar ">
													<!-- <a href="galerry_mhs.php"><button>Galerry</button></a> -->
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
																<th>Telepon</th>
																<th>Email</th>
																<th>Tempat</th>
																<th>Jurusan</th>
																		
															</tr>
															</thead>

															<tbody>
																  <?php 
																  $i=1;
																	$tampil=mysqli_query($koneksi,"SELECT * FROM siswa WHERE kode_jurusan='$d[kode_jurusan]'");
																	while($dm=mysqli_fetch_array($tampil)){
																		$queryGetJumlahHadir = mysqli_query($koneksi, "SELECT COUNT(ID_User) as total FROM absen WHERE ID_User='$dm[ID_User]'");
																		$getJumlahHadir = mysqli_fetch_array($queryGetJumlahHadir);
																?>
																<tr>
																<td class=""><?= $i++; ?></td>
																	<td class=""><?= $dm['nim']; ?></td>

																	<td>
																		<?= $dm['nama_siswa']; ?>
																	</td>

																	<td class="hidden-480">
																		<span ><?= $dm['kode_jurusan']; ?></span>
																	</td>
																	
																	<td class="hidden-480">
																		<span ><?= $dm['ttl']; ?></span>
																	</td>

																	<td>
																		<?= $dm['telp']; ?>
																	</td>
																	
																	<td>
																		<?= $dm['email']; ?>
																	</td>
																	
																	<td>
																		<?= $dm['tempat']; ?>
																	</td>
																	
																	<td>
																		<?= $dm['jurusan']; ?>
																	</td>
                                                                   

                                                                   <!--  <td>
																		<a href="#"><?= $getJumlahHadir['total'];?></a>
																	</td> --> 
                                                                   																	
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



