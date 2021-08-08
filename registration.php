<?php include("segment/header.php");?>
<?php include("classes/loginclass.php");
 $ob=new login();
?>
<?php
if(isset($_POST['submit'])){
  $email=$_POST['email'];
  $name=$_POST['name'];
  $password=$_POST['password'];
  
  $ab=$ob->checkregistration( $email, $password,$name);
 
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
		       <div class="well1 logincontainer1">
              	<?php
		       	       if(isset( $ab)){
		       	     if($ab=='field'){
		       	         echo'<script>toastr.error("Field Must Not Be empty")</script>';
		       	     }
		       	     elseif($ab=='already'){
		       	        echo'<script>toastr.warning("Already this email is exists.Please try another one.Thanks")</script>';  
		       	     
		       	     }
		       	     else{
		       	        echo'<script>toastr.success("Registration have been done successfully")</script>';    
		       	     }
		       	     }
		       	       
		       	   ?>

		       	<div class="userlog"> 
		       	       <span class="glyphicon glyphicon-user" aria-hidden="true"></span>Registration

		       	   
		       	       	<p style="">
		       	       		

		       	       	
		       	       </p>
		       	    
		       	</div>
		      <form method="post" action="" style="font-family:'Acme'">
			  <div class="form-group">
				<label>Username</label>
				<input type="text" name="name" class="form-control" id="email" >
			  </div>
              <div class="form-group">
				<label>Email</label>
				<input type="email" name="email" id="password" class="form-control" >
			  </div>
			  <div class="form-group">
				<label>Password</label>
				<input type="password" name="password" id="password" class="form-control" >
			  </div>
			
			
				
			<input type="submit"  value="submit" name="submit" class="form-control sub" >
            <a href="index.php" style="font-size:20px">Login</a>
			 </div>
			
			

		      </form>
		    
            </div>
        </div>
    </div>
</div>
</div>




	            
	          
</body>
</html>