<?php session_start();
if(isset($_SESSION["login"]) && $_SESSION["login"]==1){
   
}
else{
     echo"<script>window:location='index.php'</script>";
    
}
?>


       <?php  if(isset($_GET['action']) && $_GET['action']=="logout")
                            
                               echo"<script>window:location='index.php'</script>";
?>

<?php
    $msg=" ";
   
     include("database/Connection.php");
     include("database/Formet.php");
      $db = new Database();
      $fm=new Format();
      if(isset($_POST['submitTime'])){
       // error_reporting(0);
        $subject=$_POST['subject'];
        $ttime=$_POST['ttime'];
        $topics=$_POST['topics'];
        
        $topics=str_replace("'", "\'", $topics);
         $subject=str_replace("'", "\'", $subject);
          $ttime=str_replace("'", "\'", $ttime);
           
        //  $query1="SELECT*FROM questions ORDER BY ques_no DESC";
        //   $result1=$db->select($query1);
        //   $row=$result1->fetch_assoc();
        //   $count2=$row['ques_no'];
           
          
          
        //  $query2="SELECT*FROM questions WHERE subject1='$subject' AND model=$modelNo AND ques_no=$count2 ";
        //   $result3=$db->select($query2);
         
           
        if(empty($topics)||empty($subject)||empty($ttime)){
          $msg='<div class="alert alert-danger" id="success-alert">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <strong>Field Must Not Be Empty!</strong></div> ';
          echo'<script>toastr.error("Field Must Not Be empty")</script>';
        }
        //   elseif($result3){
        //       $msg="<span class='alert alert-danger'>Already Added</span>";   
        //   }
        else{
        
          $query="INSERT INTO routine(subject1,topics,date1)VALUES('$subject','$topics','$ttime')";
          $result=$db->insert($query);
          if($result){
            $msg='<div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>Questions Added Successfully!</strong></div> ';
            echo'<script>toastr.error("Field Must Not Be empty")</script>';
         
           
          }
          else{
            $msg="<span class='alert alert-danger'>Something went wrong</span>";
          }

        }

      }
?>

<!-- Header Included -->

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Exam For Job</title>
    <link rel="icon"  href="images/ictlogo.jpg">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="boot/css/bootstrap.css">

  <script src="boot/js/jquery.js"></script>

<script type="text/javascript" src="boot/js/bootstrap.js"></script>

  <link rel="stylesheet" type="text/css" href="style.css">
  
<style type="text/css">
  body{
    font-family:'Acme';

  }
  label{
      font-size:20px;
  }
  .side ul li a{
                    text-decoration: none;
                  }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
</head>
<body>

<div class="container-fluidh">
    <div class="Jumbotron">
          <h3> Welcome <?php echo $_SESSION["name"] ?> To Exam For Job(Admin Panel) </h3>
    </div>

  </div>
  <div class="container-fluidm">
      <div class="row">
        <div class="col-md-3">
          <div class="side">
               <ul>
               
                <li>
                 <a href="home.php" >Dashbord(<?php echo$_SESSION['subject']; ?>)</a>
                  </li>
            <li> <a href="AllModelTest.php" style="text-decoration: none;" >All Model Test </a></li>
             <!-- <li> <a href="message.php" style="text-decoration: none;" >Messages </a></li> -->
             <li> <a href="routine.php" style="text-decoration: none;" >Add Routine </a></li>
         <li><a href="?action=logout" >Logout</a></li>
        </ul>


    </div>
  </div>
       <div class="col-md-9">
  
        <h3 style="text-align:center;">Add Routine</h3>
        <a class="btn btn-success" href="allRoutine.php">All Routine</a>
        <?php 
          if(isset($msg)){
            echo $msg;
          }
        ?>
         <div style="max-width:650px;margin: 0 auto;display: block;background: #e0e0e0;">
         <form action="" method="post">
      <div class="form-group">
				<label>Subject </label>
				<input type="text" name="subject" id="password" class="form-control"  placeholder="subject ..." >
			  </div> 
        <div class="form-group">
				<label>Topics</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="topics" rows="3"></textarea>
				
			  </div>
            <div class="form-group">
				<label>Total Time</label>
				<input type="text" name="ttime" class="form-control" id="email"  placeholder="date 09/16/2021 23:59:59  ..." >
			  </div>
         
			 
  <button type="submit" class="btn btn-success" name="submitTime">Submit</button>
</form> 

   
  </div>
  
      
         </div>
       </div>
</div>

<div class="container-fluidf">
    <div class="panel panel-footer">
       <h3 style="text-align: center;">Developed By ShawpnobuzzBD</h3>
    </div>
  </div>
</body>
</html>


