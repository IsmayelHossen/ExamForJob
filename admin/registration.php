<?php 
     include_once 'database/Session2.php';
     
    
    ?>
    <?php include("database/Formet.php");
      $fm=new Format();
     ?>

   
    <?php include_once 'database/Connection.php'; 
        $ob=new Database();
    ?>

    <?php 

      if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
         $password=$_POST['pass'];
         $repassword=$_POST['repass'];

         $name=$fm->validation($name);
         $email=$fm->validation($email);
         $password=$fm->validation($password);
         $repassword=$fm->validation($repassword);
         
        //  $query="SELECT*FROM admin WHERE email='$email' AND subject1='$subject' ";
        //       $result=$ob->select($query);
        //       $count=mysqli_num_rows($result);
         if(empty($name)||empty($email)||empty($password)||empty($password)||empty($repassword)){
            $msg="field";
         }

       
        // elseif($count>0){
        //     $msg="<span class='alert alert-danger'>Already data exists</span>";
        //     //$msg="<span>Already data exists</span>";
        // }
        else{
             
           $query="INSERT INTO admin(name,email,password) VALUES('$name','$email','$password')";
           $result=$ob->insert($query);
           if($result){
               
            $msg="success";
           }   
           else{
            $msg="<span class='alert alert-danger'>Something Went Wrong</span>";
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
<h3 class="adminlogin">Admin Registration</h3>
      <form action="" method="post">
       
	<?php
		       	       if(isset($msg)){
		       	     if($msg=='field'){
		       	         echo'<script>toastr.error("Field Must Not Be empty")</script>';
		       	     }
		       	  //   elseif($msg=='already'){
		       	  //      echo'<script>toastr.warning("Already this email is exists.Please try another one.Thanks")</script>';  
		       	     
		       	  //   }
		       	     else{
		       	        echo'<script>toastr.success("Registration have been done successfully")</script>';    
		       	     }
		       	     }
		       	       
		       	   ?>
 <div class="form-group">
    <label for="email">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Enter Name...........">
  </div>
  <div class="form-group">
    <label for="email">Email Address</label>
    <input type="email" class="form-control" name="email" placeholder="Enter Email...........">
  </div>
  <div class="form-group">
    <label for="pwd">Password</label>
    <input type="password" class="form-control" id="pwd" name="pass" placeholder="Enter Password........">
  </div>
  <div class="form-group">
    <label for="pwd">Re type Password</label>
    <input type="password" class="form-control" id="pwd" name="repass" placeholder="Enter re type Password........">
  </div>
  <button type="submit" class="btn btn-primary"  name="submit" style="margin-right: 10px;">Submit</button><br>
  <a href="index.php" class="pull-right">Login</a>
</form>
</div>
       
     </div>

   </div>.
  
 </div>

 
 </body>
 </html>