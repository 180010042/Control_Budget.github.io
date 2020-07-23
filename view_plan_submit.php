<?php
require 'includes/common.php';
$plan_id=$_GET['plan_id'];
$title=$_POST['title'];
$date=$_POST['date'];
$amount_spent=$_POST['amount_spent'];
$person_name=$_POST['person_name'];
$select_query="SELECT * FROM users_group WHERE name='$person_name'and plan_id=$plan_id";
$select_query_result=mysqli_query($con,$select_query) or die(mysqli_error($con));
$row = mysqli_fetch_array($select_query_result);
$update_query="UPDATE users_group SET total_amount_spent={$row['total_amount_spent']}+$amount_spent WHERE name='$person_name'and plan_id=$plan_id";
$update_query_result=mysqli_query($con,$update_query) or die(mysqli_error($con));
function GetImageExtension($imagetype){
if(empty($imagetype)){ return false;}
switch($imagetype){
case 'image/bmp': return '.bmp';
case 'image/gif': return '.gif';
case 'image/jpeg': return '.jpg';
case 'image/png': return '.png';
default: return false;
}
}
if (!empty($_FILES["uploadedimage"]["name"])) {
    $file_name=$_FILES["uploadedimage"]["name"];
    $temp_name=$_FILES["uploadedimage"]["tmp_name"];
    $imgtype=$_FILES["uploadedimage"]["type"];
    $ext= GetImageExtension($imgtype);
    $imagename=date("d-m-Y")."-".time().$ext;
    $target_path = "css/".$imagename;
    if(move_uploaded_file($temp_name, $target_path)){
        $insert_query = "INSERT INTO expense (person_id, title, date, amount_spent, bill) VALUES ({$row['id']}, '$title', '$date', $amount_spent, '$target_path')";
        $insert_query_result = mysqli_query($con, $insert_query) or die(mysqli_error($con));
    }
    }
else{
    $insert_query = "INSERT INTO expense (person_id, title, date, amount_spent, bill) VALUES ({$row['id']}, '$title', '$date', $amount_spent, NULL)";
    $insert_query_result = mysqli_query($con, $insert_query) or die(mysqli_error($con));
    }
header("location:view_plan.php?plan_id=$plan_id;")
?>