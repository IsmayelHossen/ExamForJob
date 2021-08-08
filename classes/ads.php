
  

<?php include("/../database/Connection.php");?>

<?php include("/../database/Formet.php"); ?>
<?php 
class ads{
	private $fm;
	private $db;
	 public function __construct(){
	 	$this->db=new Database();
	 	$this->fm=new Format();
	 }
	  public function selectoptaion(){
	  	$query="SELECT*FROM catagory";
	  	$result=$this->db->select($query);
	  	return $result;
	  }
	   public function selectbrand(){

                	$query="SELECT*FROM brand";
	  	$result=$this->db->select($query);
	  	return $result;

	   }
	   public function selectcondition(){
	   	  	$query="SELECT*FROM Condition1";
	  	$result=$this->db->select($query);
	  	return $result;

	   }
	   public function selectdevice(){
	   	 $query="SELECT*FROM device";
	  	$result=$this->db->select($query);
	  	return $result;
	   }
	   //insert electronics 
	   

	     
	     //multiple image and select image



	     public function select_allbeauty_img($email,$device,$date2){
	     	$query="SELECT*FROM image WHERE email='$email' AND device='$device' AND date2='$date2'";
	     	$result=$this->db->select($query);
	     	return $result;

	     }



              
              //Vehicles

                 


              
              //healthy

              








               




              //education
              
    
	     public function getall_ads($start){
	     	  $query="SELECT ads.*,user.phone,user.address FROM ads INNER JOIN user ON ads.email=user.email WHERE catagory='Electronics' ORDER BY ads.device desc limit $start,2 ";
	     	  $result=$this->db->select( $query);
	     	  return $result;
	     }
              

	     public function getall_ads1($page1){
	     	  $query="SELECT ads.*,user.phone,user.address FROM ads INNER JOIN user ON ads.email=user.email WHERE catagory='Electronics' ORDER BY ads.device desc  limit $page1,2 ";
	     	  $result=$this->db->select( $query);
	     	  return $result;
	     }
	      public function getall_details($id){
	     	  $query="SELECT ads.*,user.phone,user.address FROM ads INNER JOIN user ON ads.email=user.email WHERE no='$id' ";
	     	  $result=$this->db->select( $query);
	     	  return $result;
	     }
	      public function getall_details2($id){
	      	  $query="SELECT ads.*,user.phone,user.address FROM ads INNER JOIN user ON ads.email=user.email WHERE no='$id' ";
	     	  $result=$this->db->select( $query);
	     	  return $result;

	      }
	      //education condition all data
	     public function getall_details3($id){
	     	 $query="SELECT ads.*,user.phone,user.address FROM ads INNER JOIN user ON ads.email=user.email WHERE no='$id' ";
	     	  $result=$this->db->select( $query);
	     	  return $result;

	     }
	      //vehicles  condition all data

	      public function  getall_details4($id){
	      	 $query="SELECT ads.*,user.phone,user.address FROM ads INNER JOIN user ON ads.email=user.email WHERE no='$id' ";
	     	  $result=$this->db->select( $query);
	     	  return $result;


	      }
	      //healthy

	        public function  getall_details5($id){
	      	 $query="SELECT ads.*,user.phone,user.address FROM ads INNER JOIN user ON ads.email=user.email WHERE no='$id' ";
	     	  $result=$this->db->select( $query);
	     	  return $result;


	      }


	        public function getall_beauty($start){
	        	 $query="SELECT ads.*,user.phone,user.address FROM ads INNER JOIN user ON ads.email=user.email WHERE catagory='Beauty' ORDER BY ads.device desc limit $start,2 ";
	     	  $result=$this->db->select( $query);
	     	  return $result;




	        }

	         public function getall_beauty1($page1){
	        	 $query="SELECT ads.*,user.phone,user.address FROM ads INNER JOIN user ON ads.email=user.email WHERE catagory='Beauty'ORDER BY ads.device desc limit $page1,2 ";
	     	  $result=$this->db->select( $query);
	     	  return $result;




	        }

	        //extra pagination
             public function limitpagination($start){
             		 $query="SELECT ads.*,user.phone,user.address FROM ads INNER JOIN user ON ads.email=user.email ORDER BY ads.device desc limit $start,10 ";
	     	  $result=$this->db->select( $query);
	     	  return $result;


             }



	        //education

              public function getall_education($start){
              	 $query="SELECT ads.*,user.phone,user.address FROM ads INNER JOIN user ON ads.email=user.email WHERE catagory='Education'ORDER BY ads.device desc limit $start,2 ";
	     	  $result=$this->db->select( $query);
	     	  return $result;

              }
               public function getall_education1($page1){
              	 $query="SELECT ads.*,user.phone,user.address FROM ads INNER JOIN user ON ads.email=user.email WHERE catagory='Education'ORDER BY ads.device desc limit $page1,2 ";
	     	  $result=$this->db->select( $query);
	     	  return $result;

              }
              //vehicles


              public function getall_vehicle($start){
              	   $query="SELECT ads.*,user.phone,user.address FROM ads INNER JOIN user ON ads.email=user.email WHERE catagory='Vehicles'ORDER BY ads.device desc limit $start,2 ";
	     	  $result=$this->db->select( $query);
	     	  return $result;




              }
                public function getall_vehicle1($page1){
              	   $query="SELECT ads.*,user.phone,user.address FROM ads INNER JOIN user ON ads.email=user.email WHERE catagory='Vehicles'ORDER BY ads.device desc limit $page1,2 ";
	     	  $result=$this->db->select( $query);
	     	  return $result;




              }
              //helathy


              public function getall_healthy($start){
              	   $query="SELECT ads.*,user.phone,user.address FROM ads INNER JOIN user ON ads.email=user.email WHERE catagory='Healthy'ORDER BY ads.device desc limit $start,2 ";
	     	  $result=$this->db->select( $query);
	     	  return $result;




              }
                public function getall_healthy1($page1){
              	   $query="SELECT ads.*,user.phone,user.address FROM ads INNER JOIN user ON ads.email=user.email WHERE catagory='Healthy'ORDER BY ads.device desc limit $page1,2 ";
	     	  $result=$this->db->select( $query);
	     	  return $result;




              }

              



            //index ads Electronics
               public function getall_ads_elc(){
               	 $query="SELECT ads.*,user.phone,user.address FROM ads INNER JOIN user ON ads.email=user.email WHERE catagory='Electronics'";
	     	  $result=$this->db->select( $query);
	     	  return $result;

               }

               //index ads vehicles

               public function getall_ads_veh(){
               	  	 $query="SELECT ads.*,user.phone,user.address FROM ads INNER JOIN user ON ads.email=user.email WHERE catagory='Vehicles'";
	     	  $result=$this->db->select( $query);
	     	  return $result;

               }
               //index ads beauty
               public function getall_ads_bea(){
               	 $query="SELECT ads.*,user.phone,user.address FROM ads INNER JOIN user ON ads.email=user.email WHERE catagory='Beauty'";
	     	  $result=$this->db->select( $query);
	     	  return $result;

               }
               //index ads education
               public function getall_ads_edu(){
               		 $query="SELECT ads.*,user.phone,user.address FROM ads INNER JOIN user ON ads.email=user.email WHERE catagory='Education'";
	     	  $result=$this->db->select( $query);
	     	  return $result;

               }
               //healthy

                public function getall_ads_healthy(){
                	 $query="SELECT ads.*,user.phone,user.address FROM ads INNER JOIN user ON ads.email=user.email WHERE catagory='Healthy'";
	     	  $result=$this->db->select( $query);
	     	  return $result;



                }


	        public function getall_details_beauty($idb){
	        	 $query="SELECT beauty.*,user.phone,user.address FROM beauty INNER JOIN user ON beauty.email=user.email WHERE no='$idb' ";
	     	  $result=$this->db->select( $query);
	     	  return $result;



	        }
	     //message

	     public function insertmessage($name, $email, $comment, $mem_email){
	     	if(empty($name)||empty($email)||empty($comment)||empty($mem_email)){
	     		  $msg="<span class='btn btn-danger'>Field Must Not Be Empty</span>";
	     		  return $msg;
	     	}
	     	 else{
	     	 	 $date1=date('YYYY-MM-DD');
	     	 	 $query="INSERT INTO message(name,email,comment,mem_email,date1) VALUES('$name','$email','$comment','$mem_email',NOW());";
	     	 	 $result=$this->db->insert($query);
	     	 	  if( $result){
	     	 	  	$msg="<span class='btn btn-success'>Message Successfully Sent</span>";
	     		  return $msg;
	     	 	  }
	     	 	  else{
	     	 	  	 $msg="<span class='btn btn-danger'>Message Not Sent</span>";
	     		    return $msg;

	     	 	  }

	     	 }
	     }

	     public function delete_mes($delete){
          $query="DELETE FROM message WHERE id='$delete '";
           $result=$this->db->delete( $query);
            return  $result;
      }
	     public function useremail($id){
	     	  	$query="SELECT*FROM message WHERE id='$id'";
	  	$result=$this->db->select($query);
	  	return $result;

	     }

	     public function get_message( $email ){
	     	 $query="SELECT*FROM message WHERE mem_email='$email'";
	     	 $result=$this->db->select($query);
	     	  return $result;
	     }
	      public function count_mess($bd){
	      	$query="SELECT*FROM message WHERE mem_email='$bd'";
	      	  $result=$this->db->select($query);
	      	  $got=mysqli_num_rows($result);
	      	  return$got;
	      }
	      //checkpost
	        public function checkpost($bd ){
	        	$query="SELECT*FROM ads WHERE email='$bd'";
	        	$result=$this->db->select($query);

	        	if($result->num_rows>0){
	        		return $result;
	        	}

	        }


	        public function pagination_get(){
	        	$query="SELECT*FROM ads";
	        	$result=$this->db->select($query);
	        	return $result;
	        }
	}