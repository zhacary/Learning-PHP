<?php
include 'koneksi.php'
?>

<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container p-5">
<table class="table table-bordered">
<tr>
<thead>
<th>No</th>
<th>Nim</th>
<th>Nama</th>
<th>Kode Jurusan</th>
<th>Tanggal</th>
<th>Jam</th>
</thead>
<?php
$i=1;
$lihat=mysqli_query($koneksi,"SELECT * FROM absen WHERE kode_materi='$_GET[id_materi]'");
while($sql=mysqli_fetch_array($lihat)){
?>
</tr>

<tr>
<tbody>
<td><?= $i++ ?></td>
<td><?= $sql['nim'] ?></td>
<td><?= $sql['nama_siswa'] ?></td>
<td><?= $sql['kode_jurusan'] ?></td>
<td><?= $sql['tanggal_upload'] ?></td>
<td><?= $sql['jam'] ?></td>
</tbody>
</tr>
<?php } ?>
</table>


<tr>


<td ><a class="text-warning btn btn-outline-warning" onclick="window.print('klik ok untuk save file')">Print</a></td>

</tr>
</div>
</body>
</html>