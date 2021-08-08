<?php include("/../database/Connection.php");?>

<?php include("/../database/Formet.php"); ?>

<?php 
class student{
	private $fm;
	private $db;
	 public function __construct(){
	 	$this->db=new Database();
	 	$this->fm=new Format();
	 }
	 public function selectstudent(){
	 	$query="SELECT * from student  ";
	 	$result=$this->db->select($query);
	 	return $result;

	 }


	   public function insertattendance($attend,$date,$email){
    $query="SELECT DISTINCT date1, email from student1 WHERE date1='$date' AND email='$email'";
    $outattendance=$this->db->select($query);
    $row=$outattendance->fetch_assoc();
   
    
          
           if($date==$row['date1'] && $email==$row['email']){
              $msg="<div class='alert alert-danger'><span>Attendance Already Taken</span></div>";
              return $msg;



           }
           else{
      
    
        
        
    
      
       foreach ($attend as $key1 => $value) {
        if($value=="Present")
        {
          $query="INSERT INTO student1(roll,attendance,date1,email) VALUES(' $key1',' Present',now(),'$email')";
          $result=$this->db->insert($query);
          
        }

        elseif($value=="Absent")
        {
          $query="INSERT INTO student1(roll,attendance,date1,email) VALUES(' $key1',' Absent',now(),'$email')";
          $result=$this->db->insert($query);
          
        }



       
       }

        if($result){
              $msg="<div class='alert alert-success'><span>Data Successfully inserted</span></div>";
                    return $msg;
          }
          else{
              $msg="<div class='alert alert-danger'><span>Not inserted</span></div>";
                    return $msg;
          }


   
   }
	}

   public function viewdata( $email){
      $query="SELECT DISTINCT date1 FROM student1 WHERE email='$email' AND NOT date1 ='0'  "; 
      $view11result=$this->db->select( $query);
     
        return $view11result;
    
    }

     public function  indiview11_result( $id, $email){

     $query="SELECT student.name,student1.* FROM student INNER JOIN student1 ON student.roll=student1.roll WHERE date1='$id' AND email='$email' ";
     $result=$this->db->select($query);
     return $result;
  

  
}
public function selectstudentupdate($date){

 
 $query="SELECT student1.*,student.name,student.code FROM student1 INNER JOIN student ON student1.roll=student.roll WHERE date1='$date'";
  $indiviewresult=$this->db->select( $query);
 
     return $indiviewresult;

}

 public function insert_ict_add_11($name,$roll,$code){
            $name1=$name;
            $rule1=$roll;
            if(empty(  $name1)||empty(  $rule1)|| empty($code))
            {
              $msg="<div class='alert alert-danger'><span>Filed must not be empty</span></div>";
              return $msg;
            }
            else{
       $query="INSERT INTO student(name,roll,code) VALUES('$name1','$rule1','$code')";
       $result4=$this->db->insert($query);
        $query="INSERT INTO student1(roll) VALUES('$rule1')";
       $result4=$this->db->insert($query);
       

       if($result4)
       {
          $msg="<div class='alert alert-success'><span>Data Inserted Successfully</span></div>";
              return $msg;
       }
       else{
          $msg="<div class='alert alert-danger'><span>Data Not Inserted</span></div>";
              return $msg;

       }
     }
  }
    public function deletepresentdate($del,$email){
      $query="DELETE FROM student1 WHERE date1='$del' AND email='$email'";
      $result=$this->db->delete($query);
      return $result;
    }
    public function upadteattendance(  $attend, $date){
       foreach ($attend as $key1 => $value) {
        if($value=='Present')
        {
          $query="UPDATE student1 SET attendance='Present' WHERE date1='$date' AND roll='$key1'";
          $result=$this->db->update($query);
          
        }

        else
        {
          $query="UPDATE student1 SET attendance='Absent' WHERE date1='$date' AND roll='$key1'";
          $result=$this->db->update($query);
          
        }
       
       }
       if($result){
              $msg="<div class='alert alert-success'><span>Data Successfully Update</span></div>";
                    return $msg;
          }
          else{
              $msg="<div class='alert alert-danger'><span>Not Update</span></div>";
                    return $msg;
          }
        }
}



    