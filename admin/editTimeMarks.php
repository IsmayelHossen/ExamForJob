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

       
           
      if(empty($model)||empty($ttime)||empty($tquestion)||empty($tmark)||empty($cmark)||empty($topics)){
          $msg='<div class="alert alert-danger" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>Field Must Not Be Empty!</strong></div> ';
            echo'<script>toastr.error("Field Must Not Be empty")</script>';
      }

      else{
           $subject=$_SESSION["subject"];
           $query="UPDATE timeMarks SET time1='$ttime',mark1='$tmark',questions='$tquestion',
           cutmark='$cmark',topics='$topics'
           WHERE subject1='$subject' AND model='$model' ";
       
              $result=$db->update($query);
          if($result){
        
           $msg='<div class="alert alert-success" id="success-alert">
           <button type="button" class="close" data-dismiss="alert">x</button>
           <strong>Time And Mark Updated Successfully!</strong></div> ';
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
  
        <h3 style="text-align:center;">Edit Time And Marks</h3>
        <?php 
          if(isset($msg)){
            echo $msg;
          }
        ?>
         <div style="max-width:650px;margin: 0 auto;display: block;background: #e0e0e0;">
         <form action="" method="post" style="padding-left:5px;padding-right:5px">
         <?php 
        $subject=$_SESSION["subject"];
        $model=$_GET['model'];
       $query1="SELECT*from timeMarks WHERE subject1='$subject' AND model='$model' ";
       $result1=$db->select($query1);
       $row1=$result1->fetch_assoc();
        ?>
             <div class="form-group">
				<label>Model Test Number</label>
				<input type="number" name="model" class="form-control" id="email" value="<?php echo $row1['model'] ?>" readonly >
			  </div>
        <div class="form-group">
				<label>Topics</label>
				<input type="text" name="topics" class="form-control" id="email" value="<?php echo $row1['topics'] ?>" placeholder="topics" >
			  </div>
            <div class="form-group">
				<label>Total Time</label>
				<input type="number" name="ttime" class="form-control" id="email" value="<?php echo $row1['time1'] ?>"  placeholder="time 20,30  ..." >
			  </div>
              <div class="form-group">
				<label>Total Question</label>
				<input type="number" name="tquestion" id="password" class="form-control" value="<?php echo $row1['questions'] ?>" placeholder="total question 25 ..." >
			  </div>
			  <div class="form-group">
				<label>Total Mark</label>
				<input type="number" name="tmark" class="form-control" id="email" value="<?php echo $row1['mark1'] ?>" placeholder="total  marks 20 ...">
			  </div>
              <div class="form-group">
				<label>Cut Mark</label>
				<input type="text" name="cmark" id="password" class="form-control" value="<?php echo $row1['cutmark'] ?>" placeholder="Like .5 ..." >
			  </div>
  <button type="submit" class="btn btn-success" name="submitTime">Submit</button>
</form> 

 <!-- Form ending -->
   
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


