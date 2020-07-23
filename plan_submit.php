<?php
require 'includes/common.php';
$user_id=$_SESSION['id'];
$title= mysqli_real_escape_string($con,$_POST['title']);
$from=$_POST['from'];
$to=$_POST['to'];
$num_of_people=$_POST['num_of_people'];
$initial_budget=$_POST['initial_budget'];
$insert_query="INSERT INTO users_plan (user_id ,title ,start_date ,end_date ,initial_budget ,no_of_people) VALUES('$user_id','$title','$from','$to','$initial_budget','$num_of_people')";
$insert_query_result=mysqli_query($con,$insert_query)or die(mysqli_error($con));
$plan_id=mysqli_insert_id($con);
for($i=1;$i<=$num_of_people;$i++){ // looping used to fetch variable values posted
    $person = $_POST["person"];
    $insert_query2="INSERT INTO users_group (plan_id, name, total_amount_spent) VALUES('$plan_id','$person[$i]', 0)";
    $insert_query_result2=mysqli_query($con,$insert_query2)or die(mysqli_error($con));
    }
header('location:home.php');
?>




