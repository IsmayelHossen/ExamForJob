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
                 <a href="home.php" >Dashbord</a>
                  </li>
            <li> <a href="AllModelTest.php" style="text-decoration: none;" >All Model Test </a></li>
             <!-- <li> <a href="message.php" style="text-decoration: none;" >Messages </a></li> -->
        
         <li><a href="?action=logout" >Logout</a></li>
        </ul>


    </div>
  </div>