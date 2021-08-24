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
         
           
        if(empty($question)||empty($modelNo)||empty($option1)||empty($option2)||empty($option3)||empty($option4)||empty($correctAns)){
          $msg='<div class="alert alert-danger" id="success-alert">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <strong>Field Must Not Be Empty!</strong></div> ';
          echo'<script>toastr.error("Field Must Not Be empty")</script>';
        }
        //   elseif($result3){
        //       $msg="<span class='alert alert-danger'>Already Added</span>";   
        //   }
        else{
           $quesNo=$_GET['edit'];
          $update="UPDATE questions SET question='$question',option1='$option1',option2='$option2',option3='$option3',option4='$option4',ans='$correctAns'
          WHERE ques_no=$quesNo AND model=$modelNo AND subject1='$subject' ";
          $result=$db->update($update);
          if($result){
            $msg='<div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>Question Updated Successfully!</strong></div> ';
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
         
        <h3 style="text-align:center;">Update Question</h3>
        <?php 
          if(isset($msg)){
            echo $msg;
          }
        ?>
         <div style="max-width:650px;margin: 0 auto;display: block;background: #e0e0e0;">
         <form action="" method="post" style="padding: 2px 28px">
         <?php 
        $subject=$_SESSION["subject"];
        $no=$_GET['edit'];
          $model=$_GET['model'];
       $query1="SELECT*from questions WHERE ques_no='$no' AND model=$model AND subject1='$subject' ";
       $result1=$db->select($query1);
       $row1=$result1->fetch_assoc();
        ?>
         <div class="form-group">
    <label for="exampleInputEmail1">Model Test No.</label><br>
    <input type="number" name="modelNo" class="form-control" id="exampleInputEmail1" 
     value="<?php echo $row1['model'] ?>" readonly>
   
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Question</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="question"  rows="3">
        <?php echo$row1['question'] ?></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Option 1</label>
    <input type="text" class="form-control" id="" name="option1" value="<?php echo $row1['option1'] ?>"  placeholder="Option 1">
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Option 2</label>
    <input type="text" class="form-control" id="" name="option2" value="<?php echo $row1['option2'] ?>"  placeholder="Option 2">
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Option 3</label>
    <input type="text" class="form-control" id="" name="option3"  value="<?php echo $row1['option3'] ?>" placeholder="Option 3">
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Option 4</label>
    <input type="text" class="form-control" id="" name="option4" value="<?php echo $row1['option4'] ?>" placeholder="Option 4">
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Correct Answer</label>
    <input type="text" class="form-control" id="" name="correctAns" value="<?php echo $row1['ans'] ?>"  placeholder="Correct Answer">
   
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


