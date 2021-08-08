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
                    
                     if($result4){
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
    $query="UPDATE questions SET active1=$switch1 WHERE subject1='$subject' AND model=$model";
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
       <div class="col-md-9">
            <!-- Highest mark Calculation -->
      <h3 style="text-align: center;color: #208669;font-weight: 600; text-shadow: 0px 1px #152c44;">All Participators Result</h3>
      <?php
       $cate=$_SESSION['subject'];
      $model=$_GET['model'];
      $query="SELECT DISTINCT email FROM examinee_ans WHERE  subject1='$cate' AND model='$model' ";
		    $get_heighest=$db->select($query);
      $table='<table class="table table-dark">
      <thead>
        <tr>
        <th scope="col">Email</th>
          <th scope="col">Correct Answer</th>
          <th scope="col">Wrong Answer</th>
          <th scope="col">Score</th>
        </tr>
      </thead>
      <tbody>';
      if($get_heighest){
          $subject=$_SESSION['subject'];
          $model=$_GET['model'];
        while($rowParent=$get_heighest->fetch_assoc()){
          //again query start
          $email=$rowParent['email'];
          $query="SELECT DISTINCT examinee_ans.ques_no, examinee_ans.ans1,questions.ans FROM examinee_ans INNER JOIN questions
		ON examinee_ans.ques_no=questions.ques_no WHERE examinee_ans.email='$email'  AND examinee_ans.subject1='$subject' AND examinee_ans.model=$model AND questions.model=$model   ";
//$query="SELECT*FROM examinee_ans WHERE email='$email' AND subject1='$subject' AND model='$model' ";
		    $GetForHeighestMark=$db->select($query);
          
       if($GetForHeighestMark){
        $no=0;
        $right=0;
        $wrong=0;

        while($row=$GetForHeighestMark->fetch_assoc()){
          //  $no=1;
              if($row['ans']==$row['ans1']){
                  $right++;
                  $no++;
              }
              else{
                $wrong++;
                $no++;

              }

           }
          }

 //again query end

//print inividual result
$Score=$right*1-$wrong*.5;
//echo "Email:".$rowParent['email']."Wrong=".$wrong."Rright=".$right."<br>";
$table.=' <tr>
<td>'.$rowParent['email'].'</td>
<td>'.$right.'</td>
<td>'.$wrong.'</td>
<td>'.$Score.'</td>

</tr>';

        }
        $table.='</tbody>

        </table>';
        echo $table;

      }

      ?>
           
</div>


</body>
</html>


