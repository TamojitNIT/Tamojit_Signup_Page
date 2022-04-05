<?php
include("dbconnection.php");
?>
<?php
if(isset($_REQUEST['sub']))
{
if(($_REQUEST['name']=="")||($_REQUEST['phone']=="")||($_REQUEST['email']=="")||($_REQUEST['pass']=="")||($_REQUEST['conpass']=="")||empty($_FILES['image'])||empty($_FILES['syllabus'])||empty($_FILES['resume'])||empty($_FILES['schedule']))
{
$msg='<div class="alert alert-warning text-center mt-5">Fill All The Fields</div>';   
}
else
{    
$name=$_REQUEST['name'];
$phone=$_REQUEST['phone'];
$email=$_REQUEST['email'];
$pass=$_REQUEST['pass'];
$conpass=$_REQUEST['conpass'];
$image=$_FILES['image'];
$syllabus=$_FILES['syllabus'];
$resume=$_FILES['resume'];  
$schedule=$_FILES['schedule'];    
$sql="SELECT email FROM registration WHERE email='".$email."'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==1)
{
$msg='<div class="alert alert-warning text-center mt-5">Email Id Already Registered</div>';
}
else
{
if(strlen($phone)==10)
{
if(strlen($pass)<8 && strlen($conpass)<8)
{
$msg='<div class="alert alert-warning text-center mt-5">The Password Must Be At Least 8 Characters Long</div>';    
}
else
{    
if($pass==$conpass)
{
$iname=$_FILES['image']['name'];
$tmp_name=$_FILES['image']['tmp_name'];
$u_img=uniqid().$iname;
move_uploaded_file($tmp_name,"userid/".$u_img);     
$sql="INSERT INTO registration(name,phone,email,pass,conpass,image,syllabus,resume,schedule)VALUES('$name','$phone','$email','$pass','$conpass','$u_img','$syllabus','$resume','$schedule')";
if(mysqli_query($conn,$sql))
{
$msg='<div class="alert alert-success text-center mt-5">Registered</div>';
}
else
{
$msg='<div class="alert alert-warning text-center mt-5">Something Went Wrong</div>';
}
}
else
{
$msg='<div class="alert alert-warning text-center mt-5">Password And Confirm Password Must Be Same</div>';
}
}
}
else
{
$msg='<div class="alert alert-warning text-center mt-5">Phone Number Is Invailed</div>';
}
}
}    
}
?>
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<title>www.assigment.com</title>
<!-- font awesome--->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!----font awesome--->
<style>
body
{
background-image: url("images/registration.jpg");    
background-repeat:no-repeat;
background-position:center center;
background-size:cover;
height:100vh;
}    
</style>
</head>
<body>
<div class="container-fluid">
<div class="row">
<div class="col-sm-6 offset-sm-3">
<h2 class="text-center text-white">User_Registration</h2>
<form action="" class="shadow-lg p-4" method="post" enctype="multipart/form-data"  style="background-color: rgb(0,0,0,0.6);"> 
<div class="row">
<div class="col-sm-6">
<div class="form-group">
<i class="fa fa-user text-white"></i>
<label for="Name" class="text-white">Name</label>
<input type="text" class="form-control" placeholder="Type The Name Here"  name="name"> 
<small class="font-italic text-info">Please Write Your Full Name</small>  
</div>
</div> 
<div class="col-sm-6">
<div class="form-group">
<i class="fa fa-phone text-white"></i>
<label for="Phone" class="text-white">Phone</label>
<input type="text" placeholder="write Your Phone No" class="form-control" name="phone">
 <small class="font-italic text-info">We Will never Share Your Ph-No</small>    
</div>
</div>    
</div>
<div class="row">
<div class="col-sm-8 offset-sm-2">
<div class="form-group">
<i class="fa fa-keyboard-o text-white"></i>    
<h5 class="text-white"><lable for="Email">Email</lable></h5>
<input type="email" placeholder="Write Your Email" class="form-control" name="email">
<small class="font-italic text-info">We Will Never Share Your Email</small>    
</div>    
</div>    
</div>
<div class="row">
<div class="col-sm-6">
<div class="form-group">
<i class="fa fa-key text-white"></i>
<label for="Password" class="text-white">Password</label>
<input type="password" class="form-control" placeholder="Type Your Password"  name="pass"> 
<small class="font-italic text-info">We Will Never Share Your Password</small>   
</div>
</div> 
<div class="col-sm-6">
<div class="form-group">
<i class="fa fa-key text-white"></i>
<label for="Confirm_password" class="text-white">Confirm_password</label>
<input type="password" class="form-control" name="conpass" placeholder="type your confirm_Password">
<small class="font-italic text-info">Please Retype Your Password</small>     
</div>
</div>    
</div>
<div class="row mt-2">
<div class="col-sm-4">
<div class="form-group">
<h5 class="text-white"><lable for="Profie_Photo">Profile_Photo</lable></h5>
<input type="file" required name="image" class="text-info">    
</div>    
</div>
<div class="col-sm-4">
<div class="form-group">
<h5 class="text-white"><lable for="Syllabus">Syllabus</lable></h5>
<input type="file" required name="syllabus" class="text-info">    
</div>    
</div> 
<div class="col-sm-4">
<div class="form-group">
<h5 class="text-white"><lable for="Resume">Resume</lable></h5>
<input type="file" required name="resume" class="text-info">    
</div>    
</div>    
</div>
<div class="row mt-2">
<div class="col-sm-4 offset-sm-4">
<div class="form-group">
<h5 class="text-white"><lable for="Schedule">Schedule</lable></h5>
<input type="file" required name="schedule" class="text-info">    
</div>    
</div>
</div>
<div class="row mt-5">
<div class="col-sm-7 offset-sm-3">
<input type="submit" value="Registration" name="sub" class="text-white btn btn-dark" style="border-color: firebrick; border-bottom-width: thick;">
<a href="login.php"  class="text-white btn btn-dark ml-5" style="border-color: firebrick; border-bottom-width: thick;">login</a>
<a href="registration.php"  class="text-white btn btn-dark ml-5" style="border-color: firebrick; border-bottom-width: thick;">Refesh</a>     
</div>    
</div>   
</form>
<?php
if(isset($msg))
{
echo $msg;    
}
?>
</div>   
</div>      
</div>
<!-- Optional JavaScript; choose one of the two! -->
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>