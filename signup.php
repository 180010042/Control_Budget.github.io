<?php
require 'includes/common.php';
if (isset($_SESSION['email']))
    {header('location: home.php'); } 
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
                            <center><h3>Sign Up</h3> </center>
                        </div>
                        <div class="panel-body">
                            <form action="signup_script.php" method="POST" >
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control input-sm" placeholder="Name" name="name" required="true">
                                </div> 
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control input-sm" placeholder="Enter Valid Email" name="email" required="true">
                                </div> 
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control input-sm" placeholder="Password (Min. 6 characters)" name="password" required="true" >
                                </div> 
                                <div class="form-group">
                                    <label for="phone">Phone Number:</label>
                                    <input type="text" class="form-control input-sm" placeholder="Enter Valid Phone Number (Ex: 8488352619)" name="phone" required="true" >
                                </div> 
                                <button type='submit' class="btn btn-block active">Sign Up</button>
                            </form>
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


