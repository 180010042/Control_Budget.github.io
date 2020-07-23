<?php
require 'includes/common.php';
if (!isset($_SESSION['email']))
  {   header('location: login.php'); }
$user_id = $_SESSION['id'];
$plan_id = $_GET['plan_id'];
include 'includes/duration.php';
 function date_of_payment($date){ // This funtion is created to change the format of a given date
    $months=array('01'=> 'Jan', '02'=> 'Feb', '03'=> 'Mar', '04'=>'Apr', '05'=> 'May', '06'=>'Jun', '07'=> 'Jul', '08'=>'Aug', '09'=> 'Sep', '10'=> 'Oct', '11'=>'Nov', '12'=>'Dec');
    $ord=array('0'=>'th', '1'=>'st', '2'=>'nd', '3'=>'rd', '4'=>'th', '5'=>'th', '6'=>'th', '7'=>'th', '8'=>'th', '9'=>'th');
    if("$date[8]" == '1'){
        $date="$date[8]"."$date[9]"."{$ord["0"]}"." "."{$months["$date[5]"."$date[6]"]}"."-"."$date[0]"."$date[1]"."$date[2]"."$date[3]";
    } 
    else{
        $date="$date[8]"."$date[9]"."{$ord["$date[9]"]}"." "."{$months["$date[5]"."$date[6]"]}"."-"."$date[0]"."$date[1]"."$date[2]"."$date[3]";
    }
    return $date;}
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
            $select_query="SELECT * FROM users_group WHERE plan_id = $plan_id";
            $select_query_result=mysqli_query($con,$select_query) or die(mysqli_error($con));
            $select_query2="SELECT * FROM users_plan WHERE user_id= $user_id and id= $plan_id";
            $select_query_result2=mysqli_query($con,$select_query2) or die(mysqli_error($con));
            $row2 = mysqli_fetch_array($select_query_result2);
            $total_expense=0;
            while($row = mysqli_fetch_array($select_query_result)){
                $total_expense += $row['total_amount_spent'];  
            }
        ?>
        <div class="container row_styling">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="panel">
                        <div class="panel-heading" style='background-color:#2E8B57; color:#ffffff;'>
                            <div class='row'> 
                                <div class='col-xs-7' style='text-align:right;'>
                                    <h4><?php echo $row2['title']; ?></h4>
                                </div>
                                <div class='col-xs-5' style='text-align:right;'>
                                    <h4><span class='glyphicon glyphicon-user'></span><?php echo $row2['no_of_people']; ?></h4>
                                </div> 
                            </div>
                        </div>
                        <div class='panel-body'>
                            <div class='row'>
                                <div class='col-xs-5'>
                                    <b>Budget</b><br/><br/>
                                    <b>Remaining Amount</b><br/><br/>
                                    <b>Date</b>
                                </div>
                                <div class='col-xs-7' style='text-align:right;'>
                                    ₹<?php echo $row2['initial_budget']; ?><br/><br/>
                                    <a style="color:#2E8B57;">₹<?php echo $row2['initial_budget']-$total_expense; ?></a><br/><br/>
                                    <?php echo duration($row2['start_date'],$row2['end_date']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div style="height:70px"></div>
                    <center>
                        <a href='expense_distribution.php?plan_id= <?php echo $plan_id; ?>' class="btn btn-lg" style='background-color:#ffffff; color:#2E8B57; border-color: #2E8B57;'>Expense Distribution</a>
                    </center>
                </div>
            </div><br/>
            <div class="row">
                <div class="col-sm-8 col-xs-12">
                    <div class="row">
                        <?php
                            $select_query4="SELECT * FROM expense";
                            $select_query_result4=mysqli_query($con,$select_query4) or die(mysqli_error($con));
                            while( $row4 = mysqli_fetch_array($select_query_result4)){
                                $select_query3="SELECT * FROM users_group WHERE id = {$row4['person_id']} and plan_id= $plan_id";
                                $select_query_result3=mysqli_query($con,$select_query3) or die(mysqli_error($con));
                                $total_rows_fetched= mysqli_num_rows($select_query_result3);
                                $row3 = mysqli_fetch_array($select_query_result3);
                                if($total_rows_fetched != 0){
                                ?>
                                    <div class="col-sm-4 col-xs-12">
                                        <div class="panel">
                                            <div class="panel-heading" style='background-color:#2E8B57; color:#ffffff;'>
                                                <center><h4><?php echo $row4['title'] ?></h4></center>
                                            </div>
                                            <div class='panel-body'>
                                                <div class='row'>
                                                    <div class='col-xs-5'>
                                                        <b>Amount</b><br/><br/>
                                                        <b>Paid by</b><br/><br/>
                                                        <b>Paid on</b>
                                                    </div>
                                                    <div class='col-xs-7' style='text-align:right;'>
                                                        ₹<?php echo $row4['amount_spent']; ?><br/><br/>
                                                        <?php echo $row3['name'] ?><br/><br/>
                                                        <?php echo date_of_payment($row4['date']); ?>
                                                    </div>
                                                </div><br>
                                                <?php if($row4['bill']!= NULL){ ?>
                                                    <center><p><a href='bill.php?bill=<?php echo $row4['bill']; ?>&plan_id=<?php echo $plan_id; ?>'>Show Bill</a></p></center> <?php }else { ?>
                                                    <center><p><a href='#'>You Don't Have Bill</a></p></center><?php } ?>
                                            </div>
                                        </div>
                                    </div>
                        <?php }  } ?>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <form action="view_plan_submit.php?plan_id=<?php echo $plan_id; ?>" method="POST" enctype="multipart/form-data">
                        <div class="panel">
                            <div class="panel-heading" style='background-color:#2E8B57; color:#ffffff; text-align: center;'>
                                <h4>Add New Expense</h4>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control input-sm" placeholder="Expense Name" name="title" required="true">
                                </div> 
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" min='<?php echo $row2['start_date']; ?>' max='<?php echo $row2['end_date']; ?>' class="form-control input-sm" placeholder="dd-mm-yyyy" name="date" required="true">
                                </div>           
                                <div class="form-group">
                                    <label for="amount_spent">Amount Spent</label>
                                    <input type="text" class="form-control input-sm" placeholder="Amount Spent" name="amount_spent" required="true" pattern='[0-9]*'>
                                </div>
                                <div class="form-group">
                                    <select name='person_name'class="form-control input-sm" required="true">
                                        <option value="">Choose</option> 
                                        <?php
                                        $select_query_result5=mysqli_query($con,$select_query) or die(mysqli_error($con));
                                        while($row5 = mysqli_fetch_array($select_query_result5)){?>
                                            <option value='<?php echo $row5['name'];?>'><?php echo $row5['name']; ?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="uploadedimage">Upload Bill</label>
                                    <input type="file" class="form-control input-sm" name="uploadedimage">
                                </div>
                                <button type="submit" class="btn btn-block" style=' background-color:transparent; color:#2E8B57; border-color: #2E8B57;'>Submit</button>
                           </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        include 'includes/footer.php';
        ?>
    </body>
</html>
