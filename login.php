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
    header('location:index.php');
    }else{
      $msg = "Soemthing is error!";
      header("location:login.php?msg=$msg");
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="dist/css/login.css" />
    <link rel="stylesheet" href="dist/css/styles.css" />
    <link rel="stylesheet" href="dist/css/custom.css" />
</head>

<body class="bg-gray-100">
    <section class="login">
        <div class="login_box">
            <div class="left">
                <div class="contact">
                    <form action="" method="POST" >
                        <h3>LOGIN</h3>
                        <select name="union_id" class="input" style="width:100%;">
                        <?php 
                        $union = mysqli_query($conn,"SELECT * FROM union_name");
                        while($data = mysqli_fetch_assoc($union)){ ?>
                        <option value="<?php echo $data['admin_id']?>"><?php echo $data['union_name']?></option>
                       <?php }?>
                        </select>
                        <input name="pass" type="password" placeholder="PASSWORD">
                        <button style="background:#EB75A4" name="submit" type="submit" class="submit">LOGIN</button>
                    </form>
                </div>
            </div>
            <div class="right">
                <div class="right-text">
                    <h2>Store Management</h2>
                    <h5>Sell Product With Digital System</h5>
                    <a href='order.php' style="background:#fff;color:#000;margin-top:20px;" target="_blank" name="submit">Purchase Now</a>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>
