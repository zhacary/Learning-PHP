<?php include 'header_siswa.php' ?>



 <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-book"></i>
                <a href="#">Cek Nilai</a>
              </li>
              <li class="active">Quiz</li>
            </ul><!-- /.breadcrumb -->

            
          </div>

          <div class="page-content">

<div class="col-xs-12" id="widget-container-col-2">
											<div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-2">
												<div class="widget-header">
													<h5 class="widget-title bigger lighter">
														<i class="ace-icon fa fa-book"></i>
														Nilai Quiz
													</h5>

													<div class="widget-toolbar widget-toolbar-light no-border">
													
													</div>
												</div>

												<div class="widget-body widget-container-col">
													<div class="widget-main no-padding">
														<table class="table table-striped table-bordered table-hover ">
															<thead class="thin-border-bottom">
																<tr>
																	<th>No</th>
																	<th>Nama</th>
																	<th>Kode Pg</th>
																	<th>Nilai</th>
																	
																		
															
																	
															</thead>

															<tbody>
															 <?php 
															 $i = 1 ;
													        $tampil=mysqli_query($koneksi,"SELECT * FROM `jawab_pg` WHERE ID_User='$_SESSION[ID_User]'");
													        while($m=mysqli_fetch_array($tampil)){
													    ?>
																<tr>
																	
																	<td><?= $i++ ?></td>

																	<td>
																		<?= $m['nama_siswa']; ?>
																	</td>
																	
																	<td>
																		<?= $m['kode_pg']; ?>
																	</td>

																	<td><?= $m['nilai_pg']; ?></td>
																	
																	
																</tr>
															   <?php  } ?>
																
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>

     


