
<?php //include("database/Session.php"); 
  
 
?>
<?php include("database/Connection.php");?>

<?php include("database/Formet.php"); ?>

<?php 
class login{
	private $fm;
	private $db;
	public $email1;
	public $name1;
	public $password1;
	 public function __construct(){
	 	$this->db=new Database();
	 	$this->fm=new Format();
	 }
	 public function checkregistration($email1, $password1,$name1){
		  $email1=$email1;
		 $name1=$name1;
		 $password1=$password1;
		$query="SELECT*FROM user WHERE email='$email1' ";
		$result=$this->db->select($query);
	//$row=$result->fetch_assoc();
	$count=mysqli_num_rows($result);
		//$count=mysqli_num_rows($result);
		if(empty($email1)||empty($password1)||empty($name1)){
			 $msg="field";
			 return $msg;
			 
		}
		elseif($count>0){
		 return	$msg="already";

		}
		 else{

				$query="INSERT INTO user(name,email,password) VALUES('$name1','$email1','$password1')";
				$result1=$this->db->insert($query);
				
				  
				if($result1){
					  
				
				return	$msg="success";


				}
				 else{
					  $msg="<span class='alert alert-danger'>Something Went Wrong</span>";
					 return $msg;

				 }
		 }

	}
	  public function checklogin( $email1, $password1,$remember){
	  	if(empty($email1)||empty($password1)){
	  		// $msg1="<span class='alert alert-danger'>Filed Must Not Be Empty</span>";
	  		  $msg1="field";
	  		 return $msg1;
	  		 
	  	}
	  	 else{
	  	 	   $query="SELECT*FROM user WHERE email='$email1' AND password='$password1'";
	  	 	   $result=$this->db->select($query);
	  	 	     $row=$result->fetch_assoc();
	  	 	     
	  	 	   if( $row){
	  	 	   	  
	  	 	       Session::set('login',true);
					  Session::set('email',$email1);
					   Session::set('name',$row['name']);
					   // if(!empty($remember)) {
        //       setcookie ("email",$email1,time()+ (10 * 365 * 24 * 60 * 60));
        //         setcookie ("password",$password1,time()+ (10 * 365 * 24 * 60 * 60));
        //       } 
        //       else {
            
        //      setcookie ("email","");
        //       setcookie ("password","");
        //   }
					   echo"<script>window:location='home.php'</script>";
	  	 	   	     // header("Location:home.php");

	  	 	   }
	  	 	    else{
	  	 	    	 $msg="<span class='alert alert-danger'>Email Or Password Not Matched</span>";
	  		         return $msg;

	  	 	    }
	  	 }

	  }

	   public function get_answer($id){
	   	 $query="SELECT*FROM answer WHERE no='$id'";
	   	 $result=$this->db->select($query);
	   	 return $result;
	   }

	    public function get_question($id){
	    	 $query="SELECT*FROM question WHERE id='$id'";
	   	 $result=$this->db->select($query);
	   	 return $result;

	    }

		public function GetsubWiseModel($cate){
			$query="SELECT distinct model ,subject1 ,topics FROM questions WHERE subject1='$cate' AND active1=1";
	   	 $result=$this->db->select($query);
	   	 return $result;
		}
		public function AllQuestions($cate,$model){
			$query="SELECT*FROM questions WHERE subject1='$cate' AND model=$model AND active1=1 ORDER BY ques_no ASC";
	   	 $result=$this->db->select($query);
	   	 return $result;
         
			// $email=Session::get('email');
			// $subject=$cate;
			// $model=$model;
			// $query="SELECT DISTINCT examinee_ans.ques_no, examinee_ans.ans1,questions.* FROM examinee_ans RIGHT JOIN questions
			//  ON examinee_ans.ques_no=questions.ques_no WHERE examinee_ans.email='$email'  AND questions.subject1='$subject' AND questions.model=$model   ";
			//   $result=$this->db->select($query);
			  return $result;
	   		

		}
		//delete routine
		public function deleteRoutin($del){
			$query="DELETE FROM routine WHERE id=$del";
	   	 $result=$this->db->delete($query);
	   	 return $result;
		}
		//Routine
		public function Routine(){
			$query="SELECT*FROM routine ORDER BY id ASC";
	   	 $result=$this->db->select($query);
	   	 return $result;
         

		}
       //save answer
	   public function SaveData($optionS,$cate,$model,$email){

		$optionS=$optionS;
		$cate=$cate;
		$model=$model;
		$email=$email;
		$query="SELECT*FROM examinee_ans WHERE subject1='$cate' AND model=$model AND email='$email'";
		$result=$this->db->select($query);
		$count=mysqli_num_rows($result);
		if(empty($optionS)){
			return	$msg="error";
	// 		return	$msg="<div style='text-align:center;margin-top:5px;' class='alert alert-danger alert-dismissible'>
	//   <button type='button' class='close' data-dismiss='alert'>&times;</button>Please 1 answer is required  to get the socre from following questions.
	// </div>";
				 

		}
		elseif($count){
			return $msg="DoneAlready";

		}
		else{

		
		foreach ($optionS as $key1 => $value) {
		     $value=str_replace("'", "\'", $value);
			
				$query="INSERT INTO examinee_ans(subject1,model,email,ques_no,ans1) VALUES('$cate','$model','$email','$key1','$value')";
				$result=$this->db->insert($query);

			
		}
		if($result){
		return	$msg="success";
	// 	return	$msg="<div style='text-align:center;margin-top:5px;' class='alert alert-success alert-dismissible'>
	//   <button type='button' class='close' data-dismiss='alert'>&times;</button>Your Exam is taken  Successfully
	// </div>";
			  
				
					 
			}
			else{
				return   $msg="<div style='text-align:center;margin-top:5px;' class='alert alert-danger alert-dismissible'>
	  <button type='button' class='close' data-dismiss='alert'>&times;</button>Please Try Again
	</div>";
				 
					  
			}
       
	   }
	}
//get all total question and time
public function GetTotalQuestion($category,$model){
	$query="SELECT*FROM  timeMarks WHERE  subject1='$category' AND model='$model' ";
	$result=$this->db->select($query);
			
	return $result;
}
	   //count individual score
	   public function Get_score($category,$model){
		   $email=Session::get('email');
		   $subject=$category;
		   $model=$model;
		   $query="SELECT DISTINCT examinee_ans.ques_no, examinee_ans.ans1,questions.* FROM examinee_ans INNER JOIN questions
		    ON examinee_ans.ques_no=questions.ques_no WHERE examinee_ans.email='$email'  AND examinee_ans.subject1='$subject' AND examinee_ans.model=$model AND questions.model=$model AND questions.subject1='$subject'";
	//$query="SELECT*FROM examinee_ans WHERE email='$email' AND subject1='$subject' AND model='$model' ";
		   	$result=$this->db->select($query);
			
			   return $result;


	   }
	   //Total Participants
	   public function HeighestMark($cate,$model){
	//	$query="SELECT DISTINCT examinee_ans.email, examinee_ans.ques_no, examinee_ans.ans1,questions.ans FROM examinee_ans INNER JOIN questions
		//ON examinee_ans.ques_no=questions.ques_no WHERE  examinee_ans.subject1='$cate' AND examinee_ans.model=$model   ";
$query="SELECT DISTINCT email FROM examinee_ans WHERE  subject1='$cate' AND model='$model' ";
		   $result=$this->db->select($query);
		
		   return $result;

	   }
	    //Total Participants result individually
	   public function AllIndividualScore($email,$subject,$model){
		$query="SELECT DISTINCT examinee_ans.ques_no, examinee_ans.ans1,questions.ans FROM examinee_ans INNER JOIN questions
		ON examinee_ans.ques_no=questions.ques_no WHERE examinee_ans.email='$email'  AND examinee_ans.subject1='$subject' AND examinee_ans.model=$model AND questions.model=$model  AND questions.subject1='$subject'   ";
//$query="SELECT*FROM examinee_ans WHERE email='$email' AND subject1='$subject' AND model='$model' ";
		   $result=$this->db->select($query);
		
		   return $result;


	   }
	     public function count_visitor(){

	     	 $query="SELECT*FROM user";
	     	 $result=$this->db->select($query);
	     	 return $result;
	     }
	     public function update_count( $new){
	     	 $query="UPDATE user SET count1='$new'";
	     	 $result=$this->db->insert( $query);
	     }

}
?>