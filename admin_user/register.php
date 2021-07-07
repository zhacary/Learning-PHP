<?php session_start(); ?>
<!DOCTYPE html>
<html
 lang="en">
    <head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  
    </head>
    <body class="bg-lg">
    <?php 
   
    include("db.php");
    $action = (!isset($_POST["action"]) ? null : ($_POST["action"]));
if ($action == null){
    ?>
       
      <div class="main">
         <div class="col-md-6 col-sm-8">
            <div class="container p-5 ml-5">
        <h5>Silakan Isi Data Regis UNTUK DOSEN</h5>
               <form action="index_user.php" method="POST" class="">
                  <div class="form-group">
                     <label>User Name</label>
                     <input type="text" class="form-control" name="Username" placeholder="User Name" required>
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" class="form-control" name="Password" placeholder="Password" required>
                  </div>

                  <div class="form-group">
                  <label class="text-dark" for="inputPassword">Status</label>
                                                   <select name="Level" id="" class="form-control">
                                                       <option value="guru">GURU</option>
                                                                                                         </select>
                    </div>

                  <a type="submit" class="btn btn-outline-secondary" value="" href="datauser.php">Kembali</a>
                  <button type="submit" class="btn btn-outline-success" name="regis" >Register</button>
               </form>
            </div>
         </div>
      </div>
            <?php 
	}elseif($action == "regis"){
        $pass = md5($_POST['Password']);
      
        $d = new DB();
        $sql = "INSERT INTO `user` ( `Username`, `Password`, `Level`) VALUES ( '".$_REQUEST['Username']."', $pass, '".$_REQUEST['Level']."') ";
        $d->query($sql);
        echo "<script>alert('success membuat akses klik ok untuk ke beranda')</script>";
      
       
      
        header("location :datauser.php");
    }?>

<br>

<?php include 'koneksi.php' ?>
   <div class="container ml-5 p-5 widget-container-col ui-sortable ui-sortable-handle">
   
    <table class="table table-bordered col-md-8 ">
       <tr class="btn-info">
       <th>DAFTAR USER DOSEN</th>
       <th>LEVEL</th>
       </tr>

       
       <?php 
       $t=mysqli_query($koneksi,"SELECT Username,Level FROM `user` WHERE Level='dosen' ");
       while($r=mysqli_fetch_array($t)){
       ?>
       <tr>
       <td>
       <?= $r['Username'] ;?>
       </td>
      
       <td>
       <?= $r['Level'] ;?>
       </td>
       </tr>
      
      
       <?php } ?>
       </table>
    </div>


    <div class="container ml-5 p-5">
   
   <table class="table table-bordered col-md-8 ">
      <tr class="btn-info">
      <th>NIP</th>
      <th>NAMA DOSEN</th>
      <th>TANGGAL LAHIR</th>
      <th>TEMPAT</th>
      </tr>

      
      <?php 
      $t=mysqli_query($koneksi,"SELECT * FROM `dosen` ");
      while($ds=mysqli_fetch_array($t)){
      ?>
      <tr>
      <td>
      <?= $ds['nip'] ;?>
      </td>
     
      <td>
      <?= $ds['nama_dosen'] ;?>
      </td>

      <td>
      <?= $ds['ttl'] ;?>
      </td>
     
      <td>
      <?= $ds['tempat'] ;?>
      </td>
      </tr>
     
     
      <?php } ?>
      </table>
   </div>






        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
                            
    </body>
</html>
