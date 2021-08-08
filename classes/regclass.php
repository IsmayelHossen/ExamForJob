<?php $email1="";?>
<?php include("/../database/Connection.php");?>

<?php include("/../database/Formet.php"); ?>

<?php 
class Reg{
	private $fm;
	private $db;
	 public function __construct(){
	 	$this->db=new Database();
	 	$this->fm=new Format();
	 }
	  public function checkreg($name, $email, $password, $cpassword){

	  	   $name=$this->fm->validation($name);
	  	 	$email=$this->fm->validation($email);
	  	 	$password=$this->fm->validation($password);
	  	 	 $cpassword=$this->fm->validation($cpassword);
	 
	 	$name=mysqli_real_escape_string($this->db->link,$name);
	 	$email=mysqli_real_escape_string($this->db->link,$email);

	 	$password=mysqli_real_escape_string($this->db->link,$password);
	 	$cpassword=mysqli_real_escape_string($this->db->link,$cpassword);

	 	
	 	  	    
	 	  if(empty($name)||empty($email)||empty($password)||empty($cpassword)){
	 	  	 $msg="<span class='alert alert-danger'>Filed Must Not Be Empty</span>";
	  		 return $msg;
	 	  }
	 	

	 	    else{
	 	    	 $query="SELECT*FROM user WHERE email='$email'";
	 	    	 $result=$this->db->select($query);
	 	    	 $row=$result->fetch_assoc();
	 	    	 if($row){
	 	    	 	  $msg="<span class='alert alert-danger'>Email Already Exists</span>";
	  		      return $msg;

	 	    	 }
	 	  	   
	 	  	        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                       	 $msg="<span class='alert alert-danger'>Invalid Email </span>";
	  		                 return $msg;
                             }
	 	  	  
	 	  	     elseif($password!=$cpassword){
	 	  	     	 $msg="<span class='alert alert-danger'>Password Not Matched</span>";
	  		      return $msg;

	 	  	  

	 	  	     }
	 	  	    
	 	  	     else{
	 	  	     	   $query="INSERT INTO user(name,email,password) VALUES('$name','$email','$password')";
	 	  	     	   $result=$this->db->insert($query);
	 	  	     	   if( $result){
	 	  	     	   		 $msg="<span class='alert alert-success'>Data Successfully Inserted</span>";
	  		             return $msg;

	 	  	     	   }
	 	  	     	   else{
	 	  	     	   	    	 $msg="<span class='alert alert-danger'></span>";
	  		      return $msg;
	 	  	     	   }
	 	  	     
	    }
	 	}
	  }
	}