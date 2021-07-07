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
        <style>
body {
    background-image:url("img/.jpg");
    background-position: fixed center;
    background-size: 100%;
    font-family: "Lato", sans-serif;
}



.main-head{
    height: 150px;
    background: #FFF;
   
}

.sidenav {
    height: 100%;
    background-color: #6495ED;
    overflow-x: hidden;
    padding-top: 20px;
}


.main {
    padding: 0px 10px;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
}

@media screen and (max-width: 450px) {
    .login-form{
        margin-top: 10%;
    }

    .register-form{
        margin-top: 10%;
    }
}

@media screen and (min-width: 768px){
    .main{
        margin-left: 50%; 
    }

    .sidenav{
        width: 40%;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
    }

    .login-form{
        margin-top: 40%;
        margin-left:80;
    }

    .register-form{
        margin-top: 30%;
        margin-left:60;
    }
}


.login-main-text{
    margin-top: 20%;
    padding: 60px;
    color: #fff;
}

.login-main-text h2{
    font-weight: 300;
}

.btn-black{
    background-color: #000 !important;
    color: #fff;
}
    </style>
    </head>
    <body class="bg-lg">
    
    
       <div class="sidenav">
         <div class="login-main-text">
            <h2>Elearning<br>Halaman Register </h2>
            <p>Login atau register untuk Masuk aplikasi </p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-8 col-sm-12">
            <div class="register-form">
            <marquee behavior="" direction=""><h5>Silakan Isi Data Regis</h5></marquee>
               <form action="" method="POST">
                <?php 
                include 'koneksi.php';
                if($_SERVER["REQUEST_METHOD"]=='POST'){
                  $user=$_POST['Username'];
                  $pass=md5($_POST['Password']);
                  $level=$_POST['Level'];

                  if($user=='' || $pass=='' || $level==''){
                    echo "<div class='clearfix'>
                  <div class='pull-left alert alert-danger no-margin alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert'>
                      <i class='ace-icon fa fa-times'></i>
                    </button>
                    <i class='ace-icon fa fa-info-circle bigger-120 red'></i>
                    Data Belum lengkap silahkan isi data yg masih kosong ...
                  </div>
                  </div>";
                  }else{
                    $simpan=mysqli_query($koneksi,"INSERT INTO user (`Username`,`Password`,`Level`) VALUES ('$user','$pass','$level')");
                    echo "<script>alert('success membuat akses klik ok untuk ke beranda')</script>";
                    if($simpan){
                    echo "<script>window.location.href='login.php'</script>";
                  }
                }

              }

                ?>
                  <div class="form-group">
                     <label>User Name</label>
                     <input type="text" class="form-control" name="Username" placeholder="UserName" required>
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" class="form-control" name="Password" placeholder="Password" required>
                  </div>

                  <div class="form-group">
                  <label class="text-dark" for="inputPassword">Status</label>
                                                   <select name="Level" id="" class="form-control">
                                                       <option value="siswa">SISWA</option>
                                                   </select>
                    </div>

                  <a type="submit" class="btn btn-outline-secondary" value="" href="login.php">Kembali</a>
                  <input type="submit" class="btn btn-outline-success" value="Regis" name="regis" />
               </form>
            </div>
         </div>
      </div>
          
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
                            
    </body>
</html>
