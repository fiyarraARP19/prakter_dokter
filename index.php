<?php 
include("config/conn.php");
session_start();
 ?>
 
<!doctype html>=
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prakter Dokter</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<?php if (isset($_SESSION['password'])) : ?>
    <script type="text/javascript">
    alert('password anda salah');</script> 
      <?php unset($_SESSION['password']) ?>
  <?php endif ?>
<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <!-- <img class="align-content" src="images/logo.png" alt=""> -->
                    </a>
                </div>
                <div class="login-form">
                    <div class="d-flex justify-content-center mb-4">
                        <h1>Prakter Dokter</h1>
                    </div>
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="input" class="form-control" name="username" placeholder="username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <!-- <div class="checkbox">                          
                            <label class="pull-right">
                                <a href="#">Forgotten Password?</a>
                            </label>
                        </div> -->
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="signin" value="signin">Sign in</button>
                        <div class="register-link m-t-15 text-center">
                            <p>Don't have account ? <a href="daftar.php"> Sign Up Here</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>

<?php 
        $username=@$_POST['username'];
        $password=@$_POST['password'];
        $login=@$_POST['signin'];
          if($login){
                if($username==""||$password==""){
                 ?> <script type="text/javascript">alert("username/password tidak boleh kosong");</script> <?php 
                } else {
                  $sql = mysqli_query($conn,"select * from login where username = '$username' and password = '$password'") or die (mysqli_error());   
                  $data=mysqli_fetch_array($sql);
                  $date=date('y-m-d');
            if($data['status']=="1" || $data['status']=="2" || $data['status']=="3" || $data['status']=="4"){
             
              @$_SESSION['updateLogin']=$data['updateLogin'];
               $input=mysqli_query($conn,"UPDATE login set updateLogin='$date' where id_user='$data[id_user]'");
              @$_SESSION['status']=$data['status'];
              @$_SESSION['username']=$data['username'];
              @$_SESSION['cabang']=$data['cabang'];
              @$_SESSION['nama']=$data['nama'];
              @$_SESSION['id_pasien']=$data['id_pasien'];
              header("location:dashboard.php");
            }else {
                    echo "<script>alert('username/password salah!')</script>" ;

                    header("index.php");
                }
            }
       }

        ?>
