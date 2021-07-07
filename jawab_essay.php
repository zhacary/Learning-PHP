<?php
include 'header_siswa.php';
$jawab=mysqli_query($koneksi,"SELECT * FROM tugas_essay  WHERE kode_jurusan='$mm[kode_jurusan]'");
$tgs=mysqli_fetch_array($jawab);
?>


 <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-pencil-square-o"></i>
                <a href="#">Tugas</a>
              </li>
              <li class="active">File Essay</li>
            </ul><!-- /.breadcrumb -->

            
          </div>

          <div class="page-content">



<!-- css table -->
<style type="text/css">
    .table-container {
    overflow: auto;
}
</style>

						<?php 
							if($tgs==null){ 
								echo "<div class='clearfix'>
									<div class='pull-left alert alert-danger no-margin alert-dismissable'>
										<button type='button' class='close' data-dismiss='alert'>
											<i class='ace-icon fa fa-times'></i>
										</button>

										<i class='ace-icon fa fa-info-circle bigger-120 red'></i>
										Belum ada tugas untuk saat ini ...
									</div>

									
								</div>";

							}
						?>

<div class="card-body">
    <?php 
        $tampil=mysqli_query($koneksi,"SELECT * FROM tugas_essay INNER JOIN guru ON guru.nip = tugas_essay.nip  WHERE kode_jurusan='$mm[kode_jurusan]' ORDER BY tanggal DESC");
        while($jwb=mysqli_fetch_array($tampil)){

        	// $lihat=mysqli_query($koneksi,"SELECT * FROM mapel WHERE nip='$jwb[nip]'");
        	// $lh=mysqli_fetch_array($lihat);
    ?>
    <div class="col-xs-12  widget-container-col ui-sortable" id="widget-container-col-2">
											<div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-2">
												<div class="widget-header">
													<h5 class="widget-title bigger lighter">
														<i class="ace-icon fa fa-table"></i>
														Tugas -GURU <?= $jwb['nama_guru']; ?>
													</h5>

													<div class="widget-toolbar widget-toolbar-light no-border">
														
													</div>
												</div>

												<div class="widget-body">
													<div class="widget-main no-padding table-container">
														<table class="table table-striped table-bordered table-hover">
															<thead class="thin-border-bottom">
																<tr>
																	<th>Kelas</th>
																	<th>Waktu</th>
																	<th>Hari</th>
																	<!-- <th>Mata Pelajaran</th> -->
																	<th>Kode Materi</th>
																	<th>Materi</th>
																	<th>Status</th>
																	<th>Upload Jawaban</th>
																</tr>
															</thead>


															<tbody>
																<tr>
																	<td class=""><?= $jwb['kode_jurusan']; ?></td>

																	<td>
																		<?= $jwb['jam']; ?>
																	</td>

																	<td class="hidden-480">
																		<span ><?= $jwb['hari']; ?></span>
																	</td>

																	<!--  -->
																	
																	<td>
																		<?= $jwb['kode_essay']; ?>
																	</td>
																	<td>
																		<?= $jwb['essay']; ?>
																	</td>
																	<td>
																		<a href="download_tugas.php?essay=<?=$jwb['essay']?>">Download</a>
																	</td>
																	
																	<td>
																		<a href="upload_jawaban.php?id_jawab=<?= $jwb['kode_essay']; ?>" class="btn btn-sm btn-block btn-primary">Jawab</a>
																	</td>
																</tr>

																
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>

        <?php  } ?>
		
		

        

</div>