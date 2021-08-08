<?php session_start();?>
    <?php include("database/Formet.php");
      $fm=new Format();
     ?>

   
    <?php include_once 'database/Connection.php'; 
        $ob=new Database();
      error_reporting(0);
    ?>
<?php   $msg="";?>
    <?php 

      if(isset($_POST['submit'])){

        $email=$_POST['email'];
         $password=$_POST['userpass'];
          $subject=$_POST['subject'];

        $email=$fm->validation($email);
        $password=$fm->validation($password);
         $subject=$fm->validation($subject);
        
       
   
    
  
        if(empty($email)||empty($password)||empty($subject)){
           $msg="field";

        }
        else{
             $query="SELECT*FROM admin WHERE email='$email' AND password='$password' ";
              $result=$ob->select($query);
              if( $row=$result->fetch_assoc()){
             

           
             $_SESSION["name"] =$row['name'];
             $_SESSION["email"] =$row['email'];
            $_SESSION["subject"] =$_POST['subject'];
             $_SESSION["login"]=true;
             echo"<script>window:location='home.php'</script>";
              }
              else{
                 $msg="wrong";

              }

        }

      }



    ?>
    

 <!DOCTYPE html>
 <html>
 <head>
   <title>Admin Login</title>
   <link rel="stylesheet" type="text/css" href="boot/css/bootstrap.css">
  
    <link rel="icon"  href="img/mbstu2.png">
    <meta name="description" content="Mbstu Admission Test">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <script src="boot/js/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
  
   <style type="text/css">
   body{
     
     font-family:'Acme';
      font-size: 20px;
   }
   .login {
	max-width: 480px;
	margin: 0 auto;
	display: block;
	border: 1px solid #eef0f0;
	padding: 27px 7px;
	top: 10%;
	margin-top: 20px;
	box-shadow: 0px 0px 1px 2px #fff;
}
.adminlogin {
  text-align: center;
font-size: 28px;
text-shadow: 0px 1px #62bfbf;
}

    

   </style>
   
 </head>
 <body>
  
 <div class="container-fluid" >
   <div class="main img-responsive" >
     <div class="container">
      <div class="login" >
<h3 class="adminlogin">Admin Login</h3>
      <form action="" method="post">
       
	<?php
		       	       if(isset($msg)){
		       	     if($msg=='field'){
		       	         echo'<script>toastr.error("Field Must Not Be empty")</script>';
		       	     }
		       	     elseif($msg=='wrong'){
		       	        echo'<script>toastr.warning("Password Or Email Wrong")</script>';  
		       	     
		       	     
		       	     }
		       	     else{
		       	         echo"";
		       	     }
		       	       }
		       	       
		       	   ?>

  <div class="form-group">
    <label for="email">Email Address</label>
    <input type="email" class="form-control" name="email" placeholder="Enter Email...........">
  </div>
  <div class="form-group">
    <label for="pwd">Password</label>
    <input type="password" class="form-control" id="pwd" name="userpass" placeholder="Enter Password........">
  </div>
    <div class="form-group">
  <label for="sel1">Select one which subject you want to take exam</label>
  <select class="form-control" id="sel1" name="subject">
    <option value="Mathematics">Mathematics</option>
    <option value="Bangla">Bangla</option>
    <option value="English">English</option>
    <option value="GK">General Knowledge</option>
  </select>
</div>
  <button type="submit" class="btn btn-primary"  name="submit" style="margin-right: 10px;">Submit</button><br>
  <a href="registration.php" class="pull-right">Registration</a>
</form>
</div>
       
     </div>

   </div>.
  
 </div>

 
 </body>
 </html>