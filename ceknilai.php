<?php include 'header_siswa.php' ?>
 <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-book"></i>
                <a href="#">Cek Nilai</a>
              </li>
              <li class="active">File Essay</li>
            </ul><!-- /.breadcrumb -->

            
          </div>

          <div class="page-content">


<div class="col-xs-12" id="widget-container-col-2">
											<div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-2">
												<div class="widget-header">
													<h5 class="widget-title bigger lighter">
														<i class="ace-icon fa fa-book"></i>
														Nilai File Essay
													</h5>

													<div class="widget-toolbar widget-toolbar-light no-border">
													
													</div>
												</div>

												<div class="widget-body widget-container-col">
													<div class="widget-main no-padding">
														<table class="table table-striped table-bordered table-hover ">
															<thead class="thin-border-bottom">
																<tr>
																	
																	<th>Nama</th>
																	<th>Jurusan</th>
																	<th>Kode essay</th>
																	<th>Pertanyaan</th>													
																	<th>Jawaban</th>								
																	<th>Tanggal Upload</th>
																	<th>Nilai</th>
																		
															
																	
															</thead>

															<tbody>
															 <?php 
        $tampil=mysqli_query($koneksi,"SELECT * FROM `jawab_essay`INNER JOIN `tugas_essay` ON jawab_essay.kode_essay = tugas_essay.kode_essay WHERE ID_User='$_SESSION[ID_User]' ");
        while($m=mysqli_fetch_array($tampil)){
    ?>
																<tr>
																	

																	<td>
																		<?= $m['nama_siswa']; ?>
																	</td>
																	
																	<td>
																		<?= $m['kode_jurusan']; ?>
																	</td>

																	<td>
																		<?= $m['kode_essay']; ?>
																	</td>
																		
																	<td>
																		<?= $m['essay']; ?>
																	</td>

																	<td>
																		<?= $m['j_essay']; ?>
																	</td>
																
																	<td>
																		<?= $m['tanggal_upload']; ?>
																	</td>

																	

																	<td><?= $m['nilai']; ?></td>
																	
																	
																</tr>
															   <?php  } ?>
																
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>

     


