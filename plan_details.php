<?php
require 'includes/common.php';
if (!isset($_SESSION['email']))
    {header('location: home.php'); } 
$initial_budget= $_POST['initial_budget'];
$num_of_people= $_POST['num_of_people'];
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
        <div class='container'>
            <div class="row row_styling">
                <div class="col-md-4 col-sm-3"></div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="panel row_styling">
                        <div class="panel-body">
                            <form action="plan_submit.php" method="POST" >
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control input-sm" placeholder="Enter Title (Ex: Trip to Goa)" name="title" required="true">
                                </div> 
                                <div class="form-group">
                                    <div class='row'>
                                        <div class='col-xs-6'>
                                            <label for="from">From</label>
                                            <input type="date" class="form-control input-sm" placeholder="dd-mm-yyyy" name="from" required="true">
                                        </div>            
                                        <div class='col-xs-6'>    
                                            <label for="to">To</label>
                                            <input type="date" class="form-control input-sm" placeholder="dd-mm-yyyy" name="to" required="true">
                                        </div> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class='row'>
                                        <div class='col-xs-7'><label for="initial_budget">Initial Budget</label>
                                            <input type="text" class="form-control input-sm" value="<?php echo $initial_budget; ?>" name="initial_budget" required='true' disabled>
                                            <input type="hidden"  value="<?php echo $initial_budget; ?>" name="initial_budget" required='true'><?php // This input is used to post the disabled values ?>
                                        </div>
                                        <div class='col-xs-5'>
                                            <label for="num_of_people">No. of people</label>
                                            <input type="text" class="form-control input-sm" value="<?php echo $num_of_people; ?>" name="num_of_people" required='true' disabled>
                                            <input type="hidden"  value="<?php echo $num_of_people; ?>" name="num_of_people" required='true'><?php // This input is used to post the disabled values ?>
                                        </div>
                                    </div>         
                                </div>
                                <?php 
                                for($i = 1; $i <= $_POST['num_of_people']; $i++){ ?>
                                <div class="form-group">
                                    <label for="person[<?php $i ?>]">Person <?php echo $i; ?></label><?php // array used for posting variable values ?>
                                    <input type="text" class="form-control input-sm" placeholder="Person <?php echo $i;?> Name" name="person[<?php echo $i ?>]" required="true">
                                </div>
                                <?php } ?>
                                <button type='submit' class="btn btn-block active" style='background-color:transparent; color:#87CEFA; border-color: #87CEFA; '>Submit</button>
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