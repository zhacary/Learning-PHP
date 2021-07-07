<?php

?>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <style>

.trans{
    opacity:0.9;
}


body {
    background-image:url("img/.jpg");
    background-position: fixed center;
    background-size: 100%;
    
    background-opacity:0.9;
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

/* .trans{
    opacity:0.9;
} */


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
        margin-left: 40%; 
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
        margin-top: 40%;
        margin-left:80;
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

<script>
$('#btn-one').click(function() {
  $('#btn-one').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...').addClass('disabled');
});
</script>

    </head>
    <body class=""  style="" >

    

    <div class="sidenav trans">
         <div class="login-main-text">
            <h2>Elearning<br>Halaman Login </h2>
            <p>Login atau register untuk Masuk aplikasi </p>
         </div>
      </div>

         <div class="main ">
     
     

         <div class="col-md-8 col-sm-12 ">
        
            <div class="login-form">
           
               <form method="POST" action="cek_login.php" class="" style="">
                  <div class="form-group ">
                     <label ><h5>User Name</h5></label>
                     <input type="text" class="form-control" name="Username" placeholder="User Name" required>
                  </div>
                  <div class="form-group">
                     <label><h5>Password</h5></label>
                     <input type="password" class="form-control" name="Password" placeholder="Password" required>
                  </div>
					 <?php 
       
                                                $user = @$_POST['Username'];
                                                $Pass = @$_POST['Password'];
                                                $login = @$_POST['LOGIN'];
                                        
                                                if(isset($_GET['pesan'])){
                                                    if($_GET['pesan']=="gagal"){
                                                        echo "<div class='alert alert-danger fade show alert-dismissible'>
                                                                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                                                Username atau Password Salah silakan coba lagi !
                                                            </div>";
                                                    }
                                                }
                                                
                                            ?>
                
                  <button type="submit" class="btn btn-outline-info "  data-toggle="modal" id="btn-one" value="LOGIN">Login</button>
                   
                             
                 
                  <a type="submit" class="btn btn-outline-secondary" href="register.php">Register</a>
                 
               
               </form>
            </div>
         </div>
      </div>
                                            
                                        
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                
            </div>



            
            

    </body>
</html>
