<?php include("segment/header.php");?>
<?php include("classes/loginclass.php");
 $ob=new login();
?>
<?php
if(isset($_POST['submit'])){
  $email=$_POST['email'];
  $password=$_POST['password'];
  $remember=$_POST['remember'];
  
  $ab=$ob->checklogin( $email, $password,$remember);
 
}
  ?>
  <?php 
    // $count=$ob->count_visitor();
    // while($row=$count->fetch_assoc()){
    // 	 $count1=$row['count1'];
    // 	 $new=$count1+1;
    // 	 $con=$ob->update_count( $new);
    // }

    

  ?>





       <div class="log">
	<div class="container-fluid minimizecon ">
		<div class="panel" style="height: 700px">


			<div class="row">


		  		<div class="col-md-12 ">
		       <div class="well1 logincontainer">
		       	<div class="userlog"> 
		       	 
		       	  <span class="glyphicon glyphicon-user" aria-hidden="true"></span>Login 

		       	   
		       	       	<p style="font-size: 15px;padding-top: 20px;">
		       	       		<?php
		       	       if(isset( $ab)){
		       	     if($ab=='field'){
		       	         echo'<script>toastr.error("Field Must Not Be empty")</script>';
		       	     }
		       	     else{
		       	        echo'<script>toastr.warning("Password Or Email Wrong")</script>';  
		       	     
		       	     }
		       	     }
		       	       
		       	   ?>

		       	       	
		       	       </p>
		       	    
		       	</div>
		      <form method="post" action="" style="font-family:'Acme'">
			  <div class="form-group">
				<label>Email</label>
				<input type="email" name="email" class="form-control" id="email" value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>" >
			  </div>
			  <div class="form-group">
				<label>Password</label>
				<input type="password" name="password" id="password" class="form-control" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" >
			  </div>
		<!--	  <div class="form-group form-check animated rollIn">-->
  <!--  <label class="form-check-label">-->
  <!--<input name="remember" class="form-check-input" type="checkbox" <?php if(isset($_COOKIE["password"])) { ?> checked <?php } ?> /> Remember me-->
  <!--  </label>-->
  <!--</div>-->
			
				
			<input type="submit"  value="submit" name="submit" class="form-control sub" >
			 
			<div class="form-group">
				<a href="registration.php">Registration</a>
			  </div>
			 </div>
			
			

		      </form>
		    
            </div>
        </div>
    </div>
</div>
</div>




	            
	          
</body>
</html>