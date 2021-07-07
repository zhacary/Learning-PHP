<?php include 'koneksi.php' ;?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

   
    <style>
      body {
        background: ;
        background-image: 100%;
      }
      .kartu {
        width: 950px;
        margin: 0 auto;
        margin-top: 70px;
            box-shadow: 0 0.25rem 0.75rem rgba(0,0,0,.03);
    transition: all .5s;
      } 
      .foto {
        padding: 40px;
        
      }
      tbody {
    font-size: 25px;
    font-weight: 350;
    font-width: 650;
}
.biodata {
    margin-top: 30px;
}
    </style>
    <?php 
        $galerry=mysqli_query($koneksi,"SELECT * FROM mahasiswa WHERE nim='$_GET[id_nim]' ");
       $lm=mysqli_fetch_array($galerry);

        ?>
  </head>
  <body>





        

        <!-- Isi Biodata Paling Keren di HTML disini -->
<div class="container ">
  <div class="card kartu bg-primary text-white" style="  ">
    <div class="row">


<?php 
        $query=mysqli_query($koneksi,"SELECT * FROM siswa WHERE nim='$_GET[id_nim]' ");
        while ($k=mysqli_fetch_array($query)){ 
          ?>

      <div class="col-md-4">
      <div class="foto">
        <img src="img/<?php echo $k['gambar'] ?>" alt="" width="240" height="300">
      </div>
      </div>
      <div class="col-md-8 kertas-biodata">
        <div class="biodata">
        <table width="100%" border="0">
    <tbody><tr>
        <td valign="top">
        <table border="0" width="100%" style="padding-left: 2px; padding-right: 13px;">
          <tbody>
            <tr>
              <td width="25%" valign="top" class="textt ">Nama</td>
                <td width="2%">:</td>
                <td style="color: white; font-weight:bold"><?= $k['nama_siswa']; ?></td>
            </tr>
            <tr>
              <td class="textt">Nim</td>
                <td>:</td>
                <td><?= $k['nim']; ?></td>
            </tr>

          <tr>
              <td class="textt">Gender</td>
                <td>:</td>
                <td><?= $k['jk']; ?></td>
            </tr>

          <tr>
              <td class="textt">Tempat Lahir</td>
                <td>:</td>
                <td><?= $k['tempat']; ?></td>
            </tr>

          <tr>
              <td class="textt">Tanggal Lahir</td>
                <td>:</td>
                <td><?= $k['ttl']; ?></td>
            </tr>
          
          <tr>
              <td valign="top" class="textt">Prodi</td>
                <td valign="top">:</td>
                <td><?= $k['jurusan']; ?></td>
            </tr>

            <tr>
              <td valign="top" class="textt">Telepon/Wa</td>
                <td valign="top">:</td>
                <td><?= $k['telp']; ?></td>
            </tr>

            <tr >
              <td class="textt">Email</td>
                <td>:</td>
                <td><?= $k['email']; ?></td>
            </tr>
        </tbody></table>
        </td>
    </tr>
    </tbody></table>
  </div>
      </div>
    </div>

<?php } ?>


  </div>
</div>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>