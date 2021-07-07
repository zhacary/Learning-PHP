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

</style>




<div class="card-body">
  
	
  


  


    <div class="col-xs-12  widget-container-col ui-sortable" id="widget-container-col-2" >

    	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari nama mahasiswa.." title="Type in a name">

    	<select id="">
    		<option></option>
    		<?php 
    		$query=mysqli_query($koneksi,"SELECT * FROM siswa GROUP BY jurusan");
    		while ($k=mysqli_fetch_array($query)) {	?>
    		
    			<option id="myInput1" onkeyup="myFunction1()"><?= $k['jurusan'] ?></option>
    		<?php } ?>
    	</select>



											<div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-2">
												<div class="widget-header" >
													<h5 class="widget-title bigger lighter">
														<i class="ace-icon fa fa-book"></i>
														Nilai Rata Mahasiswa
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
																<th>Nama</th>		
																<th>Kode Jurusan</th>
																<th>Nilai</th>
																
																		
															</tr>
															</thead>

															<tbody>
																  <?php 
																  $i=1;
																	$tampil=mysqli_query($koneksi,"SELECT * FROM jawab_essay   GROUP BY nama_siswa ASC");
																	while($dm=mysqli_fetch_array($tampil)){
																		
																?>
																<tr>
																<td class=""><?= $i++; ?></td>
																<td class=""><?= $dm['nama_siswa'] ?></td>
																<td class=""><?= $dm['kode_jurusan'] ?></td>
																<td class=""><?= $dm['nilai'] ?></td>
                                                                   																	
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