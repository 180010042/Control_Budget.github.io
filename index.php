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
    <body>
        <?php
            include 'includes/header.php';
         ?>
        <div id="banner_image">
            <center>
                    <div id="banner_content">
                        <h2>We help you control your budget</h2>
                        <a href="login.php" class="btn btn-lg active">Start Today</a>
                    </div>
            </center>
        </div>
        <?php
        include 'includes/footer.php';
         ?>
    </body>
</html>


