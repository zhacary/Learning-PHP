<html>

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>


<div class="card container p-5">
         
	<?php 
	$ls=mysql_query($koneksi,"SELECT * FROM guru WHERE ID_User='$_GET[id_name]'");
		while($qs=mysqli_fetch_array($ls)){

	 ?> 

  <h5>Nama	:</h5>
  <h5>Nip 	:</h5>
  		
<?php } ?>

</body>
</html>