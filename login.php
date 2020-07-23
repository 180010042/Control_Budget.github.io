<?php
require 'includes/common.php';
if (isset($_SESSION['email']))
  {   header('location: home.php'); } 
?>
<html>
    <head>
        <title>Ctrl Budget</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body class="background">
        <?php
            include 'includes/header.php';
         ?>
        <div class="container">
            <div class="row row_styling">
                <div class="col-sm-4"></div>
                <div class="col-sm-4 col-xs-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <center> <h3>Login</h3> </center>
                        </div> 
                        <div class="panel-body">
                            <form method="POST" action="login_submit.php">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control input-sm" placeholder="Email" name="email" required='true'>
                                </div> 
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control input-sm" placeholder="Password" name="password" required='true'>
                                </div> 
                                <button type="submit" class="btn btn-block">Login</button>
                            </form>
                        </div>
                        <div class="panel-footer">
                            <p>Don't have an account?<a href="signup.php"> Click here to Sign Up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include 'includes/footer.php';
         ?>
    </body>
</html>





