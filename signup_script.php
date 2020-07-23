<?php
require 'includes/common.php';
$name=mysqli_real_escape_string($con,$_POST['name']);
$email=mysqli_real_escape_string($con,$_POST['email']);
$password=mysqli_real_escape_string($con,$_POST['password']);
$password2=md5($password);
$contact=$_POST['phone'];
$select_query="SELECT * FROM users WHERE email='$email'";
$select_query_result=mysqli_query($con,$select_query) or die(mysqli_error($con));
$total_rows_fetched = mysqli_num_rows($select_query_result);
$regex_email="/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/";
$regex_contact="/^[7-9]{1}[0-9]{9}$/";
// backend validations
if ($total_rows_fetched >0){
    echo "<script>alert('Email address is already registered')</script>";
    echo ("<script>location.href='signup.php'</script>");
    } 
else if(!preg_match($regex_email, $email)){
    echo "<script>alert('Email entered is invalid')</script>";
    echo ("<script>location.href='signup.php'</script>");
}
else if(strlen($password)<6){
    echo "<script>alert('Password should have atleast 6 characters')</script>";
    echo ("<script>location.href='signup.php'</script>");
}
else if(!preg_match($regex_contact, $contact)){
    echo "<script>alert('Contact number is invalid')</script>";
    echo ("<script>location.href='signup.php'</script>");
}
else{
    $insert_query="INSERT INTO users (name ,email ,password ,contact) VALUES('$name','$email','$password2','$contact')";
    $insert_query_result=mysqli_query($con,$insert_query)or die(mysqli_error($con));
    $_SESSION['email']=$email;
    $_SESSION['id']=mysqli_insert_id($con);
    header('location:home.php');
    }
?>
                   
   



