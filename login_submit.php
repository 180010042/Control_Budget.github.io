<?php
require 'includes/common.php';
$email= mysqli_real_escape_string($con,$_POST['email']);
$password = mysqli_real_escape_string($con,$_POST['password']) ;
$password2=md5($password);
$select_query="SELECT * FROM users WHERE email='$email'";
$select_query_result=mysqli_query($con,$select_query) or die(mysqli_error($con));
$total_rows_fetched = mysqli_num_rows($select_query_result);
$row=mysqli_fetch_array($select_query_result);
// backend validations
if ($total_rows_fetched ==0){
    echo "<script>alert('No such email address registered')</script>";
    echo ("<script>location.href='login.php'</script>");
    } 
else if ($row['password'] != $password2){
    echo "<script>alert('Entered password is incorrect')</script>";
    echo ("<script>location.href='login.php'</script>");
    } 
else{
    $_SESSION['email']=$email;
    $_SESSION['id']=$row['id'];
    header('Location:home.php'); }
?>


