<!DOCTYPE html>
<?php include "koneksi.php"; ?>
<html>
<head>
<style>
div.gallery {
  border: 1px solid #0070e0 ;
  
}

div.gallery:hover {
  border: 3px solid #0070e0 ;
}

div.gallery img {
  width: 100%;

 
}

div.desc {
  padding: 10px;
  text-align: center;
}

* {
  box-sizing: border-box;
}

.responsive {
  padding: 0 6px;
  float: left;
  width: 24.99999%;
}


.img {
  width :200 ;
  height :350 ;
}

@media only screen and (max-width: 600px) {
  .responsive {
    width: 49.99999%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 500px) {
  .responsive {
    width: 100%;
  }
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

.btn-info{
  color: white;
background-color: #0070e0 ;

}
</style>
</head>
<body>




<?php 
        $galerry=mysqli_query($koneksi,"SELECT * FROM siswa ORDER BY nama_siswa ASC ");
        while($mhs=mysqli_fetch_array($galerry)){

        ?>





<div class="responsive">
  <div class="gallery  bg-info" >
    <a target="_blank" class=""  href="biodata_mhs.php?id_nim=<?= $mhs['nim'] ?>">
        

      <img src="img/<?php echo $mhs['gambar'] ?>" alt="Cinque Terre" height="240" >      

    </a>

    <div class="btn-info">
    <div class="desc"><?= $mhs['nama_siswa'] ?></div>
    <div class="desc"><?= $mhs['kode_jurusan'] ?></div>
    </div>

  </div>
</div>
<?php } ?>



<div class="clearfix"></div>


</body>
</html>
