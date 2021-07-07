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


<?php 
$lih=mysqli_query($koneksi,"SELECT * FROM  tugas_essay WHERE kode_essay='$_GET[id_jb]'");
$l1=mysqli_fetch_array($lih);
 ?>



<table class="table table-bordered">
<tr>
<thead>
<th>No</th>
<th>Nama</th>
<th>Kode Jurusan</th>
<th>Pelajaran</th>
<th>Jawaban</th>
<th>Nilai</th>
<th>Tanggal</th>

</thead>
<?php
$i=1;
$lihat=mysqli_query($koneksi,"SELECT * FROM jawab_essay WHERE kode_essay='$_GET[id_jb]'");
while($sql=mysqli_fetch_array($lihat)){
	$mapel=mysqli_query($koneksi,"SELECT * FROM mapel WHERE kode_mapel='$sql[kode_mapel]'");
	$mp=mysqli_fetch_array($mapel);
?>
</tr>

<tr>
<tbody>
<td><?= $i++ ?></td>
<td><?= $sql['nama_siswa'] ?></td>
<td><?= $sql['kode_jurusan'] ?></td>
<td><?= $mp['nama_mapel'] ?></td>
<td><?= $sql['j_essay'] ?></td>
<td><?= $sql['nilai'] ?></td>
<td><?= $sql['tanggal_upload'] ?></td>

</tbody>
</tr>
<?php } ?>
</table>


<tr>
<td ><a class="btn btn-outline-info" href="tugas.php">Kembali</a></td>

<td ><a class="text-warning btn btn-outline-warning" onclick="window.print('klik ok untuk save file')">Print</a></td>

</tr>
</div>
</body>
</html>