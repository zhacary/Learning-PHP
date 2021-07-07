<?php
include 'header_siswa.php';
?>



<?php $hg=mysqli_query($koneksi,"SELECT * FROM guru WHERE nip='$_GET[id_m]'");
$g=mysqli_fetch_array($hg);

 $jyl=mysqli_query($koneksi,"SELECT * FROM mapel WHERE kode_mapel='$_GET[id_m]'");
$j=mysqli_fetch_array($jyl);


 ?>


  <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-list-alt"></i>
                <a href="#">Download Materi</a>
              </li>
              <li class="active"><?= $g['nama_guru'] ?></li>
            </ul><!-- /.breadcrumb -->

            
          </div>

          <div class="page-content">


<!-- css table -->
<style type="text/css">
    .table-container {
    overflow: auto;
}
</style>

<div class="card-body">
   <?php 
        $tampil=mysqli_query($koneksi,"SELECT * FROM materi WHERE kode_jurusan='$mm[kode_jurusan]' AND kode_mapel='$j[kode_mapel]'  ORDER BY tanggal DESC");
        while($m=mysqli_fetch_array($tampil)){
    ?>
										<div class="col-xs-12  widget-container-col ui-sortable" id="widget-container-col-2">
											<div class="widget-box widget-color-blue ui-sortable-handle" id="widget-box-2">
												<div class="widget-header">
													<h5 class="widget-title bigger lighter">
														<i class="ace-icon fa fa-book"></i>
														Download Materi - <?= $m['nama_mapel']; ?>
													</h5>

													<div class="widget-toolbar widget-toolbar-light no-border">
														
													</div>
												</div>

												<div class="widget-body widget-container-col">
													<div class="widget-main no-padding table-container">
														<table class="table table-striped table-bordered table-hover ">
															<thead class="thin-border-bottom">
																<tr>
																	<th>
																		<i class="ace-icon fa fa-users"></i>
																		Kelas
																	</th>
																	
																	<th>
																		<i class="ace-icon fa fa-calendar"></i>
																		Tanggal
																	</th>
																	<th>
																		<i class="ace-icon fa fa-bell"></i>
																		Waktu
																	</th>

																	<th>		
																			<i class="ace-icon fa fa-calendar"></i>
																		Hari
																	</th>
																	<th class="hidden-480">
																	<i class="ace-icon fa fa-bookmark"></i>
																	Kode Materi</th>
																	<th class="hidden-480">
																	<i class="ace-icon fa fa-envelope"></i>
																	Materi</th>
																	<th class="hidden-480">
																	<i class="ace-icon fa fa-cloud-download"></i>
																	Status</th>
																	
																	<th class="hidden-480">
																	<i class="ace-icon fa fa-comments"></i>
																	Komentar</th>

																	<th class="hidden-480">
																	<i class="ace-icon fa fa-pancil"></i>
																	Absensi</th>
																</tr>
															</thead>

															<tbody>
																<tr>
																	<td class=""><?= $m['kode_jurusan']; ?></td>
																	
																	<td>
																		<?= $m['tanggal']; ?>
																	</td>

																	<td>
																		<?= $m['jam']; ?>
																	</td>

																	<td class="hidden-480">
																		<span ><?= $m['hari']; ?></span>
																	</td>
																	
																	<td>
																		<?= $m['kode_materi']; ?>
																	</td>
																	<td>
																		<?= $m['materi']; ?>
																	</td>
																	<td>
																		<a href="download_file.php?materi=<?=$m['materi']?>"><i class="fa fa-download bigger"> Download</i></a>
																	</td>
																	
																	<td>
																		<a href="lihat_materi_mahasiswa.php?id_materi=<?= $m['kode_materi'] ?>" class="btn btn-sm btn-primary">Lihat</a>
																	</td>

																	<td>
																		<a href="absen_mhs.php?id_materi=<?= $m['kode_materi'] ?>" class="btn btn-sm btn-primary">Absen</a>
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