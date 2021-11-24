<?php
include("dbconnection.php");
?>
<?php
session_start();
if(!isset($_SESSION['islogin']))
{    
if(isset($_REQUEST['sub']))
{
if(($_REQUEST['email']=="")||($_REQUEST['pass']==""))
{
$msg='<div class="alert alert-warning text-center">Fill All The Fields</div>';
}
else
{
$email=$_REQUEST['email'];
$pass=$_REQUEST['pass'];
$sql="SELECT *FROM registration WHERE email='".$email."' AND pass='".$pass."'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==1)
{
$_SESSION['islogin']=true;  
$_SESSION['email']=$email;
echo'<script>location.href="profile.php"</script>';    
}
else
{
$msg='<div class="alert alert-warning text-center">Do Your Registration First</div>';    
}
}
}
}
else
{
echo'<script>location.href="profile.php"</script>';    
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
</head>
<link rel="stylesheet" href="style.css">
<style>
.login
{
background-image: url(images/test.jpg);
background-repeat: no-repeat;
background-position: center center;
background-size:cover;
height: 100vh;    
}
</style>
<body>
<div class="container-fluid login">
<div class="row">
<div class="col-sm-4 offset-sm-4 mt-5" style="background-color:rgb(0,0,0,0.6);">
<h1 class="text-center text-white">User_Login</h1>
<form action="" method="post" enctype="multipart/form-data">
<div class="row">
<div class="col-sm-10 offset-sm-1">
<div class="form-group">
<i class="fa fa-keyboard-o text-white"></i>
<label for="Email" class="text-white">Email</label>
<input type="email" class="form-control" placeholder="Write Your Email"  name="email"> 
<small class="font-italic text-info">Please Write your Email</small>  
</div>
</div>
</div> 
<div class="row">
<div class="col-sm-6 offset-sm-3">
<div class="form-group">
<i class="fa fa-phone text-white"></i>
<label for="Password" class="text-white">Password</label>
<input type="password" placeholder="write Your Password" class="form-control" name="pass">
 <small class="font-italic text-info">Your Password Is safe With Us</small>    
</div>
</div>
</div>
<div class="row mt-5">
<div class="col-sm-10 offset-sm-2" style="margin-bottom:20px;">
<input type="submit" value="Login" name="sub" class="text-white btn btn-dark" style="border-color: firebrick; border-bottom-width: thick;">
<a href="registration.php"  class="text-white btn btn-dark" style="border-color: firebrick; border-bottom-width: thick;">Back_To_Home</a>
<a href="login.php"  class="text-white btn btn-dark" style="border-color: firebrick; border-bottom-width: thick;">Refesh</a>     
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

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>
</html>