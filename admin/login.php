<?php
include('inc/header-login.php');
?>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="index.php"><b>Admin Sign</b>In</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <?php if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $email = $vd->validation($_POST['email']);
      $password = $vd->validation(md5($_POST['password']));
      $email = mysqli_real_escape_string($db->connect,$email);
      $password = mysqli_real_escape_string($db->connect,$password);
      $query = "SELECT * FROM admins WHERE email='$email' AND password='$password'";
      $select = $db->select($query);
      if($select != false){
      $value = mysqli_fetch_array($select);
      $row = mysqli_num_rows($select);
      if($row > 0){
      Session::set('login',true);
      Session::set('name',$value['name']);
      Session::set('email',$value['email']);
      Session::set('id',$value['id']);
      Session::set('image',$value['image']);
      Session::set('password',$value['password']);
      Session::set('username',$value['username']);
      header('Location:index.php');
      }else{
      echo "<p class='alert alert-danger'>Login Failed!</p>";
      }
      }else{
      echo "<p class='alert alert-danger'>Email or password is incorrect!</p>";
      }
      }?>
      <form action="" method="post">
        <div class="form-group has-feedback">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-xs-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Admin Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->
  <?php include('inc/footer-login.php');?>