<!doctype html>
<html lang="en">
<head>
    <title>HOME</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="ASSETS/CSS/signin&up.css">
    <link rel="stylesheet" href="ASSETS/CSS/main.css">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Sign Up</h5>
                    <?php if(!empty($_GET['created'])){
                            if( $_GET['created']== 'false' ){?>
                                <div class="alert alert-danger" role="alert" id="succ">
                                    Opss this email is already used
                                </div>
                    <?php } }?>
                    <form class="form-signin" method="post" action="Actions/Sign_up&in.php">
                        <div class="form-label-group">
                            <input type="text" name="txt_fullname" id="inputEmail" class="form-control" placeholder="Full Name" required autofocus>
                        </div> <br>
                        <div class="form-label-group">
                            <input type="email" name="txt_email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                        </div>
                        <br>
                        <div class="form-label-group">
                            <input type="password" name="txt_password" id="inputPassword" class="form-control" placeholder="Password" required>
                        </div> <br>
                        <div class="form-label-group">
                            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                        </div>
                        <br>
                        <button name="sign_up" class="btn btn-lg btn-primary btn-block text-uppercase">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
        <!--**********SIGN IN**********-->
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Sign In</h5>
                    <?php
                        if(!empty($_GET['created'])) {
                            if( $_GET['created']== 'true' ){?>
                                <div class="alert alert-success" role="alert" id="succ">
                                    Your account has been created successfully
                                </div>
                    <?php }}?>
                    <?php
                    if(!empty($_GET['failed'])) {
                        if( $_GET['failed']== 'true' ){?>
                            <div class="alert alert-danger" role="alert" id="succ">
                                Email or Password is incorrect
                            </div>
                        <?php }}?>
                    <form class="form-signin" method="post" action="Actions/Sign_up&in.php">
                        <div class="form-label-group">
                            <input type="email"  class="form-control" placeholder="Email address" id="email" name="email_in" required autofocus>
                        </div>
                        <br>
                        <div class="form-label-group">
                            <input type="password"  class="form-control" id="password" name="password_in" placeholder="Password" required>
                        </div>
                        <br>
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Remember Me</label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="sign_in">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
        <!--********************-->
    </div>
</div>


<?php include ('master/JSlinks.php');?>
<!-- Optional JavaScript -->


</body>
</html>