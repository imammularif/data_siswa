<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title;?></title>

    <link href="<?= base_url() ?>asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>asset/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?= base_url() ?>asset/css/animate.css" rel="stylesheet">
    <link href="<?= base_url() ?>asset/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="container">
     <!-- Outer Row -->
    <div class="row justify-content-center">
    <div class="col-xl-5 col-lg-12 col-md-9">
    <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
    <div class="row">
    <div class="col-lg-12">
    <div class="p-5">


    <div class="middle-box text-center loginscreen animated fadeInDown" style="margin-top: 160px;">
        <div>
            
            <h3>LOGIN ADMIN<br>SMK NEGERI 1 GODEAN</br></h3>
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
    
                <?= $this->session->flashdata('message'); ?>
            <form class="m-t" role="form" action="<?= base_url('login') ?>" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username" 
                    value="<?= set_value('username') ?>">
                    <?= form_error('username','<small class="text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" 
                    value="<?= set_value('password') ?>">
                    <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

            </form>
    
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
    <!-- Mainly scripts -->
    <script src="<?= base_url() ?>asset/js/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url() ?>asset/js/bootstrap.min.js"></script>

</body>

</html>
<!--  -->