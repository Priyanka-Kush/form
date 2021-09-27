<?php
session_start();
$conn=mysqli_connect('localhost','root','','User');
$name=$_POST['name'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$about_yourself	 = $_POST['about_yourself'];
$captcha  = $_POST['captcha'];
if($_SESSION['CODE']==$captcha){
    $sql= "INSERT INTO user_details(name,email,dob,about_yourself) VALUES ('$name','$email','$dob','$about_yourself')";
    mysqli_query($conn,$sql);
    echo "Successfully inserted!";
}else{
    echo "Please enter valid captcha code";
}
