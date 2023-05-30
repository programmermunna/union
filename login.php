<?php include("include/functions.php");

if(isset($_SESSION['admin_id'])){
  $id = $_SESSION['admin_id'];
}elseif(isset($_COOKIE['admin_id'])){
  $id = $_COOKIE['admin_id'];  
}else{
  $id = 0;
}
if($id>0){
    header('location:index.php');
}

if(isset($_POST['submit'])){
    $union_id = $_POST['union_id'];
    $pass = md5($_POST['pass']);
    $row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM union_name WHERE admin_id='$union_id' AND pass='$pass'"));
    if($row>0){
    $id = $row['admin_id'];
    $_SESSION['admin_id'] = $id;
    setcookie('admin_id', $id , time()+2592000);
    header('location:index.php?msg=আপনাকে স্বাগতম');
    }else{
      $err = "দয়া করে আবার চেষ্টা করুন।";
      header("location:login.php?err=$err");
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="upload/mortgage.png">
  <title>
    mkiua
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="admin/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="admin/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="admin/assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
</head>

<body class="bg-gray-200">
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              </div>
              <div class="card-body">
                <br>
                <form role="form" class="text-start" action="" method="POST">
                  <div class="input-group input-group-outline my-3">
                    <select style="padding:8px 10px;border-radius:5px;outline:2px solid #D81B60" name="union_id" class="input-group input-group-outline mb-3">
                        <?php 
                        $union = mysqli_query($conn,"SELECT * FROM union_name");
                        while($data = mysqli_fetch_assoc($union)){ ?>
                        <option value="<?php echo $data['admin_id']?>"><?php echo $data['bn_name']?></option>
                       <?php }?>
                    </select>
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Password</label>
                    <input name="pass" type="password" class="form-control">
                  </div>
                  <div class="text-center">
                    <button name="submit" type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Login</button>
                  </div>
                  <div class="text-center">
                    <a href="home.php">Return Home</a>
                  </div>                 
                  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer position-absolute bottom-2 py-2 w-100">
      </footer>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="admin/assets/js/core/popper.min.js"></script>
  <script src="admin/assets/js/core/bootstrap.min.js"></script>
  <script src="admin/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="admin/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="admin/assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>