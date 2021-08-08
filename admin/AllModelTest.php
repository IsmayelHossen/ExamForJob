<?php 
  session_start();
  if($_SESSION["login"]==false){
      echo"<script>window:location='index.php'</script>";
      
  }?>
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
                   if(isset($_GET["delete"]))
                   {
                      $model=$_GET["delete"];
                     // $subject=Session::get("subject");
                       $email=$_SESSION["email"];
                      $subject=$_SESSION["subject"];
                   
                      $query4="DELETE FROM questions WHERE model='$model'AND subject1='$subject' ";
                      $result4=$db->delete($query4);
                      $query5="DELETE FROM timeMarks WHERE model='$model'AND subject1='$subject' ";
                      $result5=$db->delete($query5);
                    
                     if($result5){
                     $msg3="<div class='alert alert-success'><span>Successfully Deleted!</span></div>";


                  }
                   else{
                   $msg3="<div class='alert alert-danger'><span>Please Try Again!</span></div>";

                 }
               }

?>
<?php 
if(isset($_POST['submitSwitch'])){
    $switch1=$_POST['switch1'];
   // $subject= Session::get("subject");
            $email=$_SESSION["email"];
             $subject=$_SESSION["subject"];
    $model=$_POST['model'];
    $query="UPDATE questions SET active1=$switch1 WHERE subject1='$subject' AND model=$model AND email='$email'";
    $result=$db->update($query);
}?>
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
       <div class="col-md-9" style="margin-bottom:5em">
      
            <h3 style="text-align: center;border-bottom: 2px solid #becfe0;padding: 3px 4px;text-shadow: 0px 1px #da4c4c;">
            All Model Test(<?php echo$_SESSION['subject']; ?>)</h3>
           <div class="table-responsive">
           <table class="table table-hover" style="margin-top: 34px;">
             <tr>
               <th>No</th>
               <th>Model Test</th>
               <th>Exam Starting/Ending Switch</th>
               <th>Model Test Result</th>
               <th>Edit Time And Marks</th>
               <th>Action</th>
             </tr>
             <?php
            // $email=Session::get('email');
              $email=$_SESSION["email"];
             $subject=$_SESSION["subject"];
                 $query="SELECT DISTINCT model,subject1,active1 FROM questions WHERE email='$email' AND subject1='$subject' ";
                 $result=$db->select($query);
                  if($result){
                    $i=1;
                    while($row=$result->fetch_assoc()){
                  
              ?>

              <tr>
                <td>
                  <?php echo $i++;?>
                </td>
                <td><a href="IndividualModelQ.php?model=<?php echo$row['model']; ?>">Model Test: <?php echo $row['model']; ?> <span>(<?php echo $row['subject1']; ?>-Details)</span></a></td>
                 <td><?php if($row['active1']==1)
                 {
                     echo"<h4 class='btn btn-success' style='margin-top: -1px;'>On</h4>";
                 }
                 else{
                    echo"<h4 class='btn btn-danger' style='margin-top: -1px;'>Off</h4>";
                 }
                 ?>
                <!-- Modal is begain here  -->
                 <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal<?php echo $row['model'].$row['subject1'] ?>">Switch(On/Off)</button>

<!-- Modal -->
<div class="modal fade" id="myModal<?php echo $row['model'].$row['subject1'] ?>" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Turn On/Off Switch</h4>
      </div>
      <div class="modal-body">
          <!-- Form start -->
      <form action="" method="post">
  <div class="form-group">
    <label for="email"></label>
    <input type="radio" name="switch1"  value="1"<?php if($row['active1']==1){   echo 'checked'; } ?>>On
    <input type="radio" name="switch1"  value="0"<?php if($row['active1']==0){   echo 'checked'; } ?>>Off
  </div>
  <div class="form-group">
    <label for="email"></label>
    <input type="hidden" name="model"  value="<?php echo$row['model'] ?>">
   
  </div>
 
  <button type="submit" class="btn btn-default" name="submitSwitch">Submit</button>
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
                
                </td>
                <td><a href="modelResult.php?model=<?php echo $row['model']; ?>">Model Test Result:<?php echo $row['model']; ?></a></td>
                <td><a class="btn btn-primary" href="editTimeMarks.php?sub=<?php echo $row['subject1']; ?> & model=<?php echo $row['model']; ?>">Edit:<?php echo $row['model']; ?></a></td>
               <td> <a class="btn btn-danger" onclick="return confirm('Are you sure want to Delete?')" href="AllModelTest.php?delete=<?php echo $row['model']; ?>">Delete</a></td>
              </tr>
              <?php }}?>
           </table>
           </div>
</div>


</body>
</html>


