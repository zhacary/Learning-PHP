<?php include 'header_guru.php' ;?>


					<?php 
					$quiz=mysqli_query($koneksi,"SELECT * FROM pg WHERE kode_pg='$_GET[id_g]'");
					$q=mysqli_fetch_array($quiz);
					?>


											<div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-2">
												<div class="widget-header" >
													<h5 class="widget-title bigger lighter">
														<i class="ace-icon fa fa-book"></i>
														NILAI PILIHAN GANDA SISWA
													</h5>
													
													<div class="widget-toolbar ">
													<!-- <a href="galerry_mhs.php"><button>Galerry</button></a> -->
													</div>
												</div>


												<div class="widget-body widget-container-col">
													<div class="widget-main no-padding table-container" id="myTable">
														<table class="table table-striped table-bordered table-hover ">
															<thead class="thin-border-bottom">
																<tr>
																<th>No</th>
																<th>Nama Siswa</th>
																<th>kode PG</th>
																<th>Nilai</th>
																</tr>
															</thead>

															<tbody>
																  <?php 
																  $i = 1;

																
														        $tampil=mysqli_query($koneksi,"SELECT * FROM jawab_pg WHERE kode_pg='$_GET[id_g]' ");
														        while($dm=mysqli_fetch_array($tampil)){

														        		

														        	//  $pesan=mysqli_query($koneksi,"SELECT COUNT(status) AS jumlah FROM `komentar_materi` WHERE status='Belum di baca' AND kode_materi='$dm[kode_materi]'");
														        	// $getJumlah = mysqli_fetch_array($pesan);

														    ?>
																<tr>
																
																	<td class=""><?= $i++; ?></td>
																	<td class=""><?= $dm['nama_siswa']; ?></td>
																	<td class=""><?= $dm['kode_pg']; ?></td>
																	<td class=""><?= $dm['nilai_pg']; ?></td>
																</tr>
																<?php  } ?>
																
																
															</tbody>
														</table>
													</div>
												</div>