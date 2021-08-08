<?php 
  session_start();
  if($_SESSION["login"]==false){
      echo"<script>window:location='index.php'</script>";
      
  }
  
?>
<?php
    $msg=" ";
   
     include("database/Connection.php");
     include("database/Formet.php");
      $db = new Database();
      $fm=new Format();
?>
         <?php
                   if(isset($_GET["delete"]))
                   {
                      $quesNo=$_GET["delete"];
                      $model=$_GET["model"];

                   
                      $query4="DELETE FROM questions WHERE ques_no=$quesNo AND model=$model";
                      $result4=$db->delete($query4);
                     if($result4){
                     $msg3="<div class='alert alert-success'><span>Successfully Deleted!</span></div>";


                  }
                   else{
                   $msg3="<div class='alert alert-danger'><span>Please Try Again!</span></div>";

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
  <link rel="stylesheet" href="boot/css/bootstrap.css">

<script src="boot/js/jquery.js"></script>
<script type="text/javascript" src="boot/js/bootstrap.js"></script>
 
<script type="text/javascript" src="boot/js/main2.js"></script>

  <link rel="stylesheet" type="text/css" href="style.css">
 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
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
</head>
<body>

       <?php  if(isset($_GET['action']) && $_GET['action']=="logout")
                             // session_destroy(); 
                             // session_unset();
                               echo"<script>window:location='index.php'</script>";
?>
<div class="container-fluidh">
    <div class="Jumbotron">
          <h3> Welcome <?php echo $_SESSION["name"]; ?> To Exam For Job(Admin Panel) </h3>
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
      
            <h3 style="text-align: center;border-bottom: 2px solid #becfe0;padding: 3px 4px;text-shadow: 0px 1px #da4c4c;">
            Individual Model Test All Questions(<?php 
             $model=$_GET['model'];
            echo$_SESSION['subject']."-Model-" .$model ?>)</h3>
            <div class="table-responsive">
           <table class="table table-hover" style="margin-top: 34px;">
             <tr>
               <th>No</th>
               <th>Question</th>
               <th>Option 1</th>
               <th>Option 2</th>
               <th>Option 3</th>
               <th>Option 4</th>
               <th>Correct Answer</th>
               <th>Edit</th>
               <th>Delete</th>
             </tr>
             <?php
             $email=$_SESSION["email"];
             $subject=$_SESSION["subject"];
             $model=$_GET['model'];

                 $query="SELECT* FROM questions WHERE subject1='$subject' AND model='$model' AND email='$email' ";
                 $result=$db->select($query);
                  if($result){
                    $i=1;
                    while($row=$result->fetch_assoc()){
                  
              ?>

              <tr>
                <td>
                  <?php echo $i++;?>
                </td>
                <td><?php echo $row['question']; ?></td>
                 <td><?php echo $row['option1']; ?></td>
               <td><?php echo $row['option2']; ?></td>
               <td><?php echo $row['option3']; ?></td>
               <td><?php echo $row['option4']; ?></td>
               <td><?php echo $row['ans']; ?></td>
               <td> <a class="btn btn-primary"  href="edit.php?edit=<?php echo $row['ques_no']; ?> &model=<?php echo $row['model'];?>">Edit</a></td>
               <td> <a class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')" href="?delete=<?php echo $row['ques_no']; ?> & model=<?php echo $row['model'];?>">Delete</a>
                    </td>
              </tr>
              <?php }}?>
           </table>
            </div>
</div>


</body>
</html>


