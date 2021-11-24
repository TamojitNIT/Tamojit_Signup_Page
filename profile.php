<?php
include("dbconnection.php");
?>
<?php
session_start();
if(isset($_SESSION['islogin']))
{
$email=$_SESSION['email'];  
}
else
{
echo'<script>location.href="login.php"</script>'; 
}
?>
<?php
$sql='SELECT *FROM registration WHERE email="'.$email.'" ';
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$img=$row['image'];
$name=$row['name'];
?>
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<title>www.assigment</title>
<!-- font awesome--->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!----font awesome--->
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container-fluid">
<div class="row">
<div class="col-sm-4 offset-sm-4">
<img src="<?php echo"userid/".$img;?>" class="rounded-circle" style="height:300px; width:300px; margin-left:90px;"> 
<form action="" method="post" class="shadow-lg p-4">
<div class="form-group">
<i class="fa fa-keyboard-o"></i>
<lable for="Email">Email</lable>
<input type="email" class="form-control" value="<?php echo $email; ?>" readonly>  
</div>
<a href="logout.php"class="text-white btn btn-dark mt-3" style="border-color: firebrick; border-bottom-width: thick;">logout</a> 
<a href="profile.php" class="text-white btn btn-dark mt-3" style="border-color: firebrick; border-bottom-width: thick;">Refresh</a>     
</form>  
</div>    
</div>    
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>