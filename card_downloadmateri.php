<?php
include 'header_siswa.php';
?>

        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-list-alt"></i>
                <a href="#">LIST</a>
              </li>
              <li class="active">Download Materi</li>
            </ul><!-- /.breadcrumb -->

            
          </div>

          <div class="page-content">




       <div class="row"><!-- Card -->
         <?php 
              $galerry=mysqli_query($koneksi,"SELECT * FROM guru INNER JOIN materi ON materi.nip=guru.nip WHERE kode_jurusan='$mm[kode_jurusan]' GROUP BY kode_mapel asc");
              while($mhs=mysqli_fetch_array($galerry)){
               
              $mapel=mysqli_query($koneksi,"SELECT * FROM mapel INNER JOIN guru ON guru.nip=mapel.nip  WHERE kode_mapel='$mhs[kode_mapel]'  ");
              $mp=mysqli_fetch_array($mapel);

                $mll=mysqli_query($koneksi,"SELECT * FROM guru INNER JOIN materi ON materi.nip=guru.nip WHERE kode_jurusan='$mm[kode_jurusan]'  GROUP BY nama_mapel  ");
              $ml=mysqli_fetch_array($mapel);


 

              ?>
      <div class="box ">
      <div class="card">
      <div class="container ">
         <a href="downloadmateri1.php?id_m=<?= $mhs['kode_mapel'] ?>">
          <h4><b> Guru <?= $mhs['nama_guru'] ?></b></h4> 
          <p><?= $mp['nama_mapel'] ?></p> 
          </a>    
      </div>
      </div>
      </div>
      <?php } ?> 
      </div>



<style type="text/css">
  
.box{
  display: inline-table;
}

      .card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 300px;
  border-radius: 5px;

}

.card:hover {
  box-shadow: 0 8px 16px  #3366ff;
}

.container {
  padding: 2px 16px;
}
    
</style>
