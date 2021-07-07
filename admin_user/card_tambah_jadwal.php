<?php
include 'indexadmin.php';
?>
       <div class="row"><!-- Card -->
         <?php 
              $data=mysqli_query($koneksi,"SELECT * FROM jurusan GROUP BY kode_jurusan asc");
              while($d=mysqli_fetch_array($data)){

              ?>
      <div class="box">
      <div class="card">
      <div class="container ">
         <a href="tambah_jadwal.php?id_jadwal=<?= $d['kode_jurusan'] ?>">
          <h4><b>  <?= $d['kode_jurusan'] ?></b></h4> 
          <p><?= $d['jurusan'] ?></p> 
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
  padding: 5px 16px;
}
    
</style>
