<?php
include 'header_siswa.php'
?>



        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-calendar"></i>
                <a href="#">LIST</a>
              </li>
              <li class="active">Jadwal Materi</li>
            </ul><!-- /.breadcrumb -->

            
          </div>

          <div class="page-content">

<div class="col-xs-12  widget-container-col ui-sortable" id="widget-container-col-2">
											<div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-2">
												<div class="widget-header">
													<h5 class="widget-title bigger lighter">
														<i class="ace-icon fa fa-book"></i>
														JADWAL
													</h5>

													<div class="widget-toolbar">
													
													</div>
												</div>

												<div class="widget-body widget-container-col">
													<div class="widget-main no-padding">
														<table class="table table-striped table-bordered table-hover ">
															<thead class="thin-border-bottom">
																<tr>
																<th>No</th>
																<th>Nip</th>
                                                                <th>Guru</th>
                                                                <th>Mata Pelajaran</th>
																<th>Hari</th>
																<th>Jam Mulai</th>
																<th>Jama Selesai</th>
																<th>Kelas</th>
                                                                 															
																</tr>
															</thead>

															<tbody>
																  <?php 
																  $i = 1;
        $tampil=mysqli_query($koneksi,"SELECT * FROM jadwal INNER JOIN guru ON guru.nip=jadwal.nip WHERE kode_jurusan='$mm[kode_jurusan]' ORDER BY hari ASC");
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
																	
																	<td>
																		<?= $dm['kode_jurusan']; ?>
																	</td>

                                                                    
																	
																</tr>
																<?php  } ?>
																
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>

    