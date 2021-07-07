<?php include 'header_siswa.php' ;?>




<div class="main-content-inner">
          <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-pencil-square-o"></i>
                <a href="#">Tugas</a>
              </li>
              <li class="active">Quiz</li>
            </ul><!-- /.breadcrumb -->

            
          </div>

          <div class="page-content">



<!-- css table -->
<style type="text/css">
    .table-container {
    overflow: auto;
}
</style>






  
    <div class="col-xs-12  widget-container-col ui-sortable" id="widget-container-col-2">
    								<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari judul pg.." title="Type in a name">
											<div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-2">
												<div class="widget-header">
													<h5 class="widget-title bigger lighter">
														<i class="ace-icon fa fa-book"></i>
														SOAL PILIHAN GANDA
													</h5>

													<div class="widget-toolbar">
													
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
  <?php 
																  $i = 1;

																
														        $tampil=mysqli_query($koneksi,"SELECT * FROM `ujian_pg` INNER JOIN guru ON guru.nip = ujian_pg.nip WHERE kode_jurusan='$mm[kode_jurusan]' AND status='mulai' ORDER BY tanggal ASC ");
														        while($dm=mysqli_fetch_array($tampil)){


														        	//  $pesan=mysqli_query($koneksi,"SELECT COUNT(status) AS jumlah FROM `komentar_materi` WHERE status='Belum di baca' AND kode_materi='$dm[kode_materi]'");
														        	// $getJumlah = mysqli_fetch_array($pesan);

														    ?>
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
																<th>Jawab Soal</th>
																</tr>
															</thead>

															<tbody>
																 
																<tr>
																
																	<td class=""><?= $i++; ?></td>
																	<td class=""><?= $dm['nip']; ?></td>
																	<td class=""><?= $dm['judul_pg']; ?></td>
																	<!-- <td class=""><?= $lh['nama_mapel']; ?></td> -->
																	<td class=""><?= $dm['kode_pg']; ?></td>
																	<td class=""><?= $dm['kode_jurusan']; ?></td>
																	<td class=""><?= $dm['tanggal']; ?></td>
																	<td class=""><?= $dm['jam']; ?></td>
																	<td class=""><?= $dm['hari']; ?></td>
																	<?php $jawab=mysqli_query($koneksi,"SELECT * FROM jawab_pg WHERE kode_pg='$_GET[kode_pg]' AND nilai_pg"); 
																	$tmp=mysqli_fetch_array($jawab); if($tmp==null) { ?>
																	<td>
																		<a href="jawab_ujian_pg.php?id_pg=<?=$dm['kode_pg']?>" class="btn btn-sm btn-primary">Jawab</a>
																	</td>
																	<?php }else{ ?>
																	<td>
																		<a href="#" class="btn btn-sm btn-primary">Sudah Jawab</a>
																	</td>
																	<?php } ?>
																</tr>
																
																
																
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
										<?php  } ?>
		
		

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
        

