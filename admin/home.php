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
      
      if(isset($_POST['submit'])){
       // error_reporting(0);
        $modelNo=$_POST['modelNo'];
        $question=$_POST['question'];
        
       // $qusNo=$_POST['queNo'];
        $option1=$_POST['option1'];
        $option2=$_POST['option2'];
        $option3=$_POST['option3'];
        $option4=$_POST['option4'];
        $correctAns=$_POST['correctAns'];
        $subject=$_SESSION["subject"];
        $email=$_SESSION["email"];
        $topics=$_POST['topics'];
        $topics=str_replace("'", "\'", $topics);
         $question=str_replace("'", "\'", $question);
          $option1=str_replace("'", "\'", $option1);
           $option2=str_replace("'", "\'", $option2);
            $option3=str_replace("'", "\'", $option3);
             $option4=str_replace("'", "\'", $option4);
              $correctAns=str_replace("'", "\'", $correctAns);
        //  $query1="SELECT*FROM questions ORDER BY ques_no DESC";
        //   $result1=$db->select($query1);
        //   $row=$result1->fetch_assoc();
        //   $count2=$row['ques_no'];
           
          
          
        //  $query2="SELECT*FROM questions WHERE subject1='$subject' AND model=$modelNo AND ques_no=$count2 ";
        //   $result3=$db->select($query2);
         
           
        if(empty($question)||empty($modelNo)||empty($option1)||empty($option2)||empty($option3)||empty($option4)||empty($correctAns)||empty($topics)){
          $msg='<div class="alert alert-danger" id="success-alert">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <strong>Field Must Not Be Empty!</strong></div> ';
          echo'<script>toastr.error("Field Must Not Be empty")</script>';
        }
        //   elseif($result3){
        //       $msg="<span class='alert alert-danger'>Already Added</span>";   
        //   }
        else{
            $query0="SELECT*FROM timeMarks WHERE model=$modelNo AND subject1='$subject' ";
          $result0=$db->select($query0);
           $row0=$result0->fetch_assoc();
           $quesCheck=$row0['questions'];
           
          $query1="SELECT*FROM questions WHERE model=$modelNo AND subject1='$subject' ORDER BY ques_no DESC";
          $result1=$db->select($query1);
           $check=mysqli_num_rows($result1);
          $row=$result1->fetch_assoc();
           $number=$row['ques_no'];
           
           if($check=='0'){
             $count=1;  
           }
           else{
              $count=$number+1; 
           }
           if($check<$quesCheck){
                    $query="INSERT INTO questions(subject1,model,question,ques_no,option1,option2,option3,option4,ans,email,active1,topics)VALUES('$subject','$modelNo','$question','$count','$option1','$option2','$option3','$option4','$correctAns','$email',0,'$topics')";
          $result=$db->insert($query);
          if($result){
            $msg='<div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>'.$count.' Questions Added Successfully!</strong></div> ';
            echo'<script>toastr.error("Field Must Not Be empty")</script>';
         
           
          }
          else{
            $msg="<span class='alert alert-danger'>Something went wrong</span>";
          }
               
           }
           else{
                $msg='<div class="alert alert-danger" id="success-alert">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <strong>Total='.$quesCheck.' Questions Added Successfully.If you want add more questions please update total question number</strong></div> ';
          echo'<script>toastr.error("Field Must Not Be empty")</script>';  
           }
           

        }

      }
?>
<?php
if(isset($_POST['submitTime'])){
    $model=$_POST['model'];
     $ttime=$_POST['ttime'];
      $tquestion=$_POST['tquestion'];
      $tmark=$_POST['tmark'];
      $cmark=$_POST['cmark'];
       $subject=$_SESSION["subject"];
       $topics=$_POST['topics'];
       $topics=str_replace("'", "\'", $topics);

       $query1="SELECT*from timeMarks WHERE subject1='$subject' AND model='$model'";
          $result1=$db->select($query1);
          $count=mysqli_num_rows($result1);
           
      if(empty($model)||empty($ttime)||empty($tquestion)||empty($tmark)||empty($cmark)||empty($topics)){
          $msg='<div class="alert alert-danger" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>Field Must Not Be Empty!</strong></div> ';
            echo'<script>toastr.error("Field Must Not Be empty")</script>';
      }
      elseif($count>0){
          
           $msg='<div class="alert alert-danger" id="success-alert">
           <button type="button" class="close" data-dismiss="alert">x</button>
           <strong>Data Already Added!</strong></div> ';
           echo'<script>toastr.error("Field Must Not Be empty")</script>';
      }
      else{
           $subject=$_SESSION["subject"];
          $query="INSERT INTO timeMarks(subject1,model,time1,mark1,questions,cutmark,topics) VALUES('$subject','$model','$ttime','$tmark','$tquestion','$cmark','$topics')";
              $result=$db->insert($query);
          if($result){
        
           $msg='<div class="alert alert-success" id="success-alert">
           <button type="button" class="close" data-dismiss="alert">x</button>
           <strong>Time And Mark Added Successfully!</strong></div> ';
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
            <li> <a href="routine.php" style="text-decoration: none;" >Routine </a></li>
             <!-- <li> <a href="message.php" style="text-decoration: none;" >Messages </a></li> -->
        
         <li><a href="?action=logout" >Logout</a></li>
        </ul>


    </div>
  </div>
       <div class="col-md-9">
            <!-- Modal is begain here  -->
                 <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-success" style="margin-top: 10px;" data-toggle="modal" data-target="#myModal">Add time & marks</button>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Totall Time and Question </h4>
      </div>
      <div class="modal-body">
          <!-- Form start -->
      <form action="" method="post">
             <div class="form-group">
				<label>Model Test Number</label>
				<input type="number" name="model" class="form-control" id="email" 
        <?php 
        $subject=$_SESSION["subject"];
       $query1="SELECT*from timeMarks WHERE subject1='$subject' ORDER BY model DESC ";
       $result1=$db->select($query1);
       $row1=$result1->fetch_assoc();
        ?>
        placeholder=" New Model Test No. Will Be <?php echo $row1['model']+1 ?> .Please Input <?php echo $row1['model']+1 ?>" >
			  </div>
        <div class="form-group">
				<label>Topics</label>
				<input type="text" name="topics" class="form-control" id="email"  placeholder="topics" >
			  </div>
            <div class="form-group">
				<label>Total Time</label>
				<input type="number" name="ttime" class="form-control" id="email"  placeholder="time 20,30  ..." >
			  </div>
              <div class="form-group">
				<label>Total Question</label>
				<input type="number" name="tquestion" id="password" class="form-control"  placeholder="total question 25 ..." >
			  </div>
			  <div class="form-group">
				<label>Total Mark</label>
				<input type="number" name="tmark" class="form-control" id="email"  placeholder="total  marks 20 ...">
			  </div>
              <div class="form-group">
				<label>Cut Mark</label>
				<input type="text" name="cmark" id="password" class="form-control"  placeholder="Like .5 ..." >
			  </div>
  <button type="submit" class="btn btn-success" name="submitTime">Submit</button>
</form> 

 <!-- Form ending -->
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
                <!-- modal is ending here -->
        <h3 style="text-align:center;">Add Question</h3>
        <?php 
          if(isset($msg)){
            echo $msg;
          }
        ?>
         <div style="max-width:650px;margin: 0 auto;display: block;background: #e0e0e0;">
         <form action="" method="post" style="padding: 2px 28px">
         <div class="form-group">
    <label for="exampleInputEmail1">Model Test No.</label><br>
    <span><span style="color:red">*</span>Please before add questions (add time and marks)where included also model number .</span>
    <input type="number" name="modelNo" class="form-control" id="exampleInputEmail1" 
    
    <?php 
        $subject=$_SESSION["subject"];
       $query1="SELECT*from timeMarks WHERE subject1='$subject' ORDER BY model DESC ";
       $result1=$db->select($query1);
       $row1=$result1->fetch_assoc();
        ?>
    value="<?php echo $row1['model'] ?>" readonly>
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Topics</label>
    <input type="text" class="form-control" id="" name="topics"   value="<?php echo $row1['topics'] ?>" readonly>
   
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Question</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="question" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Option 1</label>
    <input type="text" class="form-control" id="" name="option1"  placeholder="Option 1">
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Option 2</label>
    <input type="text" class="form-control" id="" name="option2"  placeholder="Option 2">
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Option 3</label>
    <input type="text" class="form-control" id="" name="option3"  placeholder="Option 3">
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Option 4</label>
    <input type="text" class="form-control" id="" name="option4"  placeholder="Option 4">
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Correct Answer</label>
    <input type="text" class="form-control" id="" name="correctAns"  placeholder="Correct Answer">
   
  </div>
  
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
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


