<?php include_once("database/Session.php"); 
  Session::init();
 
?>
<?php

   $bd =Session::get("email");
    $name =Session::get("name");


?>




<!DOCTYPE html>
<html>
<head>
	<title>Exam For Job</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
 <!-- search and show-->


    <!-- search and show end -->




<link rel="stylesheet" type="text/css" href="css/main.css">

 
<script type="text/javascript" src="boot/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>

</head>
	
<body >
<?php 
if(isset($_GET['logout'])&&$_GET['logout']=='logout'){
   Session::destroy();
   header('Location:index.php');
   
}
?>
<?php
$checkNav=Session::get('login');
if($checkNav==true){ ?>
<nav class="navbar navbar-expand-lg navbar-light " style="box-shadow: 0px 1px 2px #bec4ca;background-color: #f9f9f9 !important;">
  <a class="navbar-brand" href="home.php"> <img src="img/logo.JPG" alt="Girl in a jacket" style="width: 100px;
height: 100px;
border: 2px solid #fff;
border-radius: 50px;"> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="routine.php">Routine</a>
      </li>
      <!--<li class="nav-item dropdown">-->
      <!--  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
      <!--    Dropdown-->
      <!--  </a>-->
      <!--  <div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
      <!--    <a class="dropdown-item" href="#">Action</a>-->
      <!--    <a class="dropdown-item" href="#">Another action</a>-->
      <!--    <div class="dropdown-divider"></div>-->
      <!--    <a class="dropdown-item" href="#">Something else here</a>-->
      <!--  </div>-->
      <!--</li>-->
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="margin-right:2em">Welcome <?php echo Session::get('name');?></button>
    <a href="home.php?logout=logout" class="btn btn-danger pull-right">Logout</a>
     
    </form>
  </div>
</nav>
<?php }?>