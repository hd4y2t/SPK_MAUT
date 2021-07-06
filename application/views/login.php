<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SMA Negeri 14  Palembang</title>
         <link rel="Shortcut Icon" href="<?php echo base_url('assets');?>/logoku.JPG"/>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url('assets');?>/temp/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets');?>/temp/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url('assets');?>/temp/plugins/iCheck/square/gray.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="bg-white">
  
    <div class="login-box">
      <div class="login-logo">
      <img  height="280" width="260" src="<?php echo base_url('assets');?>/logoku.JPG" alt="">
    </div>
      <h3><span class="description-block text-red"><b>SMA Negeri 14 <br><h4>PALEMBANG SUMATERA SELATAN</b></h4></span></h3>            
                  
      <div class="box box-danger">
        <div class='box-header'> 
        </div>

        <?php if(!$this->session->flashdata('login')): ?>    
        <?php else: ?>
        <?php echo $this->session->flashdata('login'); ?>
        <?php endif; ?>
        <form action="<?php echo base_url('index.php/login');?>/autentication" method="post">         
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="NIK" name="nik" required/>
            <span class="glyphicon glyphicon-user form-control-feedback bg-red"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password" required/>
            <span class="glyphicon glyphicon-lock form-control-feedback bg-red"></span>
          </div>    
          <button type="submit" class="btn btn-danger btn-block">Login</button>
        </form>                    
      </div>
    </div>

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url('assets');?>/temp/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url('assets');?>/temp/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('assets');?>/temp/plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-gray',
          radioClass: 'iradio_square-gray',
          increaseArea: '20%' // optional
        });
      });
    </script>

  </body>
</html>
