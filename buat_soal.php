<?php include 'konek.php'; ?>
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
    
    <form action="" method="post" class="col-md-4">
    <?php  
    if($_SERVER["REQUEST_METHOD"]=="POST"){
      
        $idl=$_POST["id_soal"];
        $soal=$_POST["soal"];
        $a=$_POST["a"];
        $b=$_POST["b"];
        $c=$_POST["c"];
        $d=$_POST["d"];
        $jawaban=$_POST["knc_jawaban"];
      
        $tanggal=$_POST["tanggal"];
        $aktiv=$_POST["aktif"];
      

        if($idl==''|$soal==''|$a==''|$b==''|$c=='' |$d=='' |$jawaban=='' |$tanggal=='' |$aktiv==''){
            echo"<div>SILAHKAN LENGKAPI DATA</div>";
        }else{
            $submit=mysqli_query($konek,"INSERT INTO tbl_soal(`id_soal`,`soal`,`a`,`b`,`c`,`d`,`knc_jawaban`,`tanggal`,`aktif`) VALUES('$idl','$soal','$a','$b','$c','$d','$jawaban','$tanggal','$aktiv')");
      if($submit){
        header("location:soal.php");
    }   
    
    }
    }
    ?>
    <label for="">ID</label>
    <input type="text" name="id_soal" class="form-control"/>

    <label for="">SOAL</label>
    <input type="text" name="soal" class="form-control"/>

    <label for="">A</label>
    <input type="text" name="a" class="form-control"/>

    <label for="">B</label>
    <input type="text" name="b" class="form-control"/>

    <label for="">C</label>
    <input type="text" name="c" class="form-control"/>

    <label for="">D</label>
    <input type="text" name="d" class="form-control"/>

    <label for="">KUNCI JAWABAN</label>
   <select name="knc_jawaban" id="" class="form-control">
   <option value="a">A</option>
   <option value="b">B</option>
   <option value="c">C</option>
   <option value="d">D</option>
   </select>

   <label for="">TANGGAL</label>
    <input type="date" name="tanggal" class="form-control"/>

    <label for="">STATUS AKTIF</label>
   <select name="aktif" id="" class="form-control">
   <option value="Y">Y</option>
   <option value="N">N</option>
   </select>

   <input type="submit" class="btn- btn-success" name="Submit" value="Submit">
    <input type="submit" class="btn- btn-danger" name="reset" value="Clear">

      </form>



</body>
</html>