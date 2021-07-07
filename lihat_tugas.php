<?php include 'header_guru.php' ;?>
<div class="card-body">
 

<!-- css table -->
<style type="text/css">
    .table-container {
    overflow: auto;
}
</style>



    <div class="col-xs-12" id="widget-container-col-2">
											<div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-2">
												<div class="widget-header">
													<h5 class="widget-title bigger lighter">
														<i class="ace-icon fa fa-book"></i>
														Jawaban yang sudah di upload 
													</h5>

													<div class="widget-toolbar widget-toolbar-light no-border">
													
													</div>
												</div>

												<div class="widget-body widget-container-col">
													<div class="widget-main no-padding table-container">
														<table class="table table-striped table-bordered table-hover ">
															<thead class="thin-border-bottom">
																<tr>
																	
																	<th>Nama</th>
																	<th>Jurusan</th>
																	<th>Jawaban</th>
																	<th>Tanggal Upload</th>
																	<th><i class="ace-icon fa fa-cloud-download"></i>Download</th>
																	<th>Aksi</th>
																	<th>Nilai</th>
																	
																</thead>

															<tbody>
															 <?php 
        $tampil=mysqli_query($koneksi,"SELECT * FROM `jawab_essay` WHERE kode_essay='$_GET[id_essay]'");
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
																		<?= $m['j_essay']; ?>
																	</td>
																
																	<td>
																		<?= $m['tanggal_upload']; ?>
																	</td>

																	<td><a href="download_tugas.php?essay=<?=$m['j_essay']?>">Download</a></td>

																	<td><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#smallShoes<?= $m['id'] ?>">
																	nilai
																	</a>
																	<!-- The modal -->
																     	<div class="modal fade" id="smallShoes<?= $m['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabelSmall" aria-hidden="true">
																			<div class="modal-dialog modal-sm">
																				<div class="modal-content">

																					<div class="modal-header">
																						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																						<span aria-hidden="true">&times;</span>
																						</button>
																						<h4 class="modal-title text-center" id="modalLabelSmall">Isi Nilai</h4>
																					</div>

																					<div class="modal-body">
																						<form action="" method="post">
																							<?php
																								$sqledit=mysqli_query($koneksi,"SELECT * FROM jawab_essay WHERE id='$m[id]'");
																								$e=mysqli_fetch_array($sqledit);
																							?> 
																										<?php 
																										if($_SERVER["REQUEST_METHOD"]=="POST"){

																											$nilai = $_POST["nilai"];
																											$id   = $_POST['id_nilai'];
																										
																											$update =mysqli_query($koneksi,"UPDATE `jawab_essay` SET 
																											nilai='$nilai' WHERE id='$id'");	

																											if($update){
																												echo "<script>window.location.href='lihat_tugas.php?id_essay=$_GET[id_essay]'</script>";
																											}
																										}
																										?>
																										<div class="form-group">
																											<label for="">Nilai</label>
																											<input type="hidden" name="id_nilai" value="<?= $m['id']; ?>" class="form-control">
																											<input type="number" name="nilai" value="<?= $m['nilai'] ?>" class="form-control">
																										</div>
																										<br>
																										<input type="submit" class="btn- btn-success" name="Submit" value="Submit">
																										<input type="submit" class="btn- btn-danger" name="reset" value="Clear">
																										

																						</form>
																					</div>

																				</div>
																			</div>
																		</div>
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

     

</div>

										<div class="col-xs-12">

																 <?php 

																 	$query = mysqli_query($koneksi,"SELECT * FROM `tugas_essay` WHERE kode_essay='$_GET[id_essay]'");

																 	 if($ms = mysqli_fetch_array($query)){

										        
															    ?>

												<a href="lihat_nilai.php?id_jb=<?= $ms['kode_essay'] ?>" class="btn btn-sm btn-primary">
												Save Nilai</a>	


 											<?php  } ?>	

 											</div>	