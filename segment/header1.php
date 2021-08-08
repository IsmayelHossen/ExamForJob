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
	<title></title>
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="viewport" content="width=device-width, initial-scale=1.0,  minimum-scale=1.0">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
 <!-- search and show-->
  
   

    <!-- search and show end -->




<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="boot/js/jquery-ui.css">
 <script src="boot/js/jquery.js"></script>
<script type="text/javascript" src="boot/js/bootstrap.js"></script>
<script type="text/javascript" src="boot/js/main.js"></script>
<script type="text/javascript" src="boot/js/jquery-ui.js"></script>
 
</head>
	
<body >

<nav class="navbar navbar-default  navhead">

  <div class="container-fluid">
     <div class="navbar-header">

        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
       
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
         <span class="icon-bar"></span>
      </button>
        <a class="navbar-brand" href="index.php"><strong style="font-size: 60px;color: #b3d0ed;">B</strong>echakena.com</a>
   

     </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
 <?php 
        
        $login=Session::get("login");
        if($login=='true'){
          ?>
        
      <ul class="nav navbar-nav" style="font-family:'Sofia'">
      
       
     
        <li><a href="home.php" class="allads">Home</a></li>
          <li><a href="useraccount.php" class="allads">Back</a></li>
         

       
      
      </ul>
        <?php }else{?>
      <ul class="nav navbar-nav navbar-right" style="font-family: 'Sofia'">
            
           <li style="padding-right: 300px; width:500px;" ><a href="Tv.php" class="allads">TV SERVER</a></li>
                
          <li><a href="home.php" class="allads">Home</a></li>
        <li><a href="registration.php">  Post</a></li>
        <li><a href="login.php"> Login</a></li>

        
      </ul>
       <?php }?>
    </div>
  
</nav>
