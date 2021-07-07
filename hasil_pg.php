<?php include 'header_guru.php' ;?>


					<?php 
					$quiz=mysqli_query($koneksi,"SELECT * FROM jawaban_pg WHERE kode_pg='$_GET[id_ujian]'");
					$q=mysqli_fetch_array($quiz);
					?>


											<div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-2">
												<div class="widget-header" >
													<h5 class="widget-title bigger lighter">
														<i class="ace-icon fa fa-book"></i>
														NILAI UJIAN PILIHAN GANDA 
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
																<th>Kelas</th>
																<th>Mata Pelajaran</th>
																<th>Nilai</th>
																</tr>
															</thead>

															<tbody>
																  <?php 
																  $i = 1;

																
														        $tampil=mysqli_query($koneksi,"SELECT * FROM jawaban_pg WHERE kode_pg='$_GET[id_ujian]' ");
														        while($dm=mysqli_fetch_array($tampil)){

														        	$mapel=mysqli_query($koneksi,"SELECT * FROM mapel WHERE kode_mapel='$dm[kode_mapel]'");
														        	$m=mysqli_fetch_array($mapel);

														        		

														        	//  $pesan=mysqli_query($koneksi,"SELECT COUNT(status) AS jumlah FROM `komentar_materi` WHERE status='Belum di baca' AND kode_materi='$dm[kode_materi]'");
														        	// $getJumlah = mysqli_fetch_array($pesan);

														    		?>
																<tr>
																
																	<td class=""><?= $i++; ?></td>
																	<td class=""><?= $dm['nama_siswa']; ?></td>
																	<td class=""><?= $dm['kode_jurusan']; ?></td>
																	<td class=""><?= $m['nama_mapel']; ?></td>
																	<td class=""><?= $dm['nilai_pg']; ?></td>
																</tr>
																<?php  } ?>
																
																
															</tbody>
														</table>
													</div>
												</div>