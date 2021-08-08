<?php include("segment/header.php");?>
<?php include("classes/loginclass.php");

Session::checkSession();

 $ob=new login();
?>
  <?php 
           $email=Session::get('email') ;  
           $cate=$_GET['cate'];
           $model=$_GET['model'];   
                 if(isset($_POST['submit'])){
               error_reporting(0);
                  $optionS=$_POST['optionS'];
                 //  $date1=$_POST['date1'];
                   $SaveAnswer=$ob->SaveData($optionS,$cate,$model,$email);
                 }

                   ?>
<?php 
if(isset($_GET['logout'])&&$_GET['logout']=='logout'){
   Session::destroy();
   header('Location:index.php');
   
}
?>
<div class="container-fluid" >
  <div class="jumbotron">
  <h2 style="text-align:center;font-family:'Acme';color:#007a7e;"><a href="home.php" style="text-align: center;color: #208669;font-weight: 600; text-shadow: 0px 1px #152c44;text-decoration-line:none">Welcome To Govt. Study Group</a>  </h2> 
 
  <h3  style="text-align:center;font-family:'Acme';color:#007a7e;font-size: 30px">Subject:<?php 
    if(isset($_GET['cate'])){
        echo $_GET['cate'];
       
        $cate=$_GET['cate'];
        $model=$_GET['model']; 
    }
    ?></h3>

   <?php 
     $category=$_GET['cate'];
       $model=$_GET['model'];
       $total=$ob->GetTotalQuestion($category,$model);
       $row=$total->fetch_assoc();
   ?>
   <h4 class="btn btn-warning" style="text-align:left">Time:<?php echo$row['time1']; ?> minutes</h4>
   <h4 class="btn btn-info">Total Questions:<?php echo$row['questions']; ?></h4>
   <h4 class="btn btn-success" >Total Marks:1x<?php echo$row['mark1']; ?>=<?php echo$row['mark1']; ?></h4>
   <h4 class="btn btn-danger">Cut Mark:<?php echo$row['cutmark']; ?> </h4><br>

 <script type="text/javascript">
                       $(document).ready(function(){
                        var delay =<?php echo$row['time1']*60*1000; ?>;
var url = "https://examforjob.000webhostapp.com/check_score.php?cate=<?php echo$_GET['cate'];  ?> & model=<?php echo$_GET['model']; ?>";
var timeoutID = setTimeout(function() {
     window.location.href = url;
// $( "#button12" ).submit(function( event ) {
//   alert( "Handler for .submit() called." );
// });
}, delay);
                      });
                    </script>
   <!--time and date-->
   <!--<h4><span><iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=en&size=medium&timezone=Asia%2FDhaka" width="100%" height="115" frameborder="0" seamless></iframe></span></h4>-->
 <!--set time countdown start-->
 <h4 style="color:red">Time Count Down:</h4>
 <p id="demo"></p>
 <?php
 date_default_timezone_set("Asia/Dhaka");
 $add=$row['time1'];
 $date12= date('m d Y H:i', strtotime("+$add minutes"));
 ?>
<script>
// Set the date we're counting down to
// var countDownDate = new Date("Jan 5, 2022 15:37:25").getTime();
var countDownDate = new Date("<?php echo $date12 ?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
//   document.getElementById("demo").innerHTML = days + "d " + hours + "h "
//   + minutes + "m " + seconds + "s ";
  document.getElementById("demo").innerHTML =  hours + "h "
  + minutes + "m " + seconds + "s ";
  
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML =alert('Time is Over and you are redirect to Scoreboard very soon without score if you are not submit and send your answer');
  }
}, 1000);
</script>
 <!--set time countdown end-->
    <?php
    if(isset($SaveAnswer)){
        if($SaveAnswer=='error'){
         echo "<div style='text-align:center;margin-top:5px;' class='alert alert-danger alert-dismissible'>
           <button type='button' class='close' data-dismiss='alert'>&times;</button>Please 1 answer is required  to get the socre from following questions.
          </div>";
        }
        elseif($SaveAnswer=='DoneAlready'){
          echo "<div style='text-align:center;margin-top:5px;' class='alert alert-danger alert-dismissible'>
          <button type='button' class='close' data-dismiss='alert'>&times;</button>Previously You Have Attended this exam.
         <a href='check_score.php?cate=$cate & model=$model'>Check Your Previous result & wright answer</a> </div>";

        }
        else{
            // echo "<div style='text-align:center;margin-top:5px;' class='alert alert-success alert-dismissible'>
            //   <button type='button' class='close' data-dismiss='alert'>&times;</button>Your Exam is taken  Successfully
            //  </div>";
             
         echo"<script>window.location.href ='check_score.php?cate=$cate & model=$model';</script>";
        }
       
    }
    ?>
    
     <h3 class="btn " style="background-color: #821414;
border-color: #7b0e13;color:#fff"><b style="font-size:20px" >Scrutineer</b>: <?php 
             if(isset($_GET['model'])){
               $i=0;
                 $cate=$_GET['cate'];
                 $model=$_GET['model'];
                 $get_Questions=$ob->AllQuestions($cate,$model);
                 if($get_Questions){
                     while($row= $get_Questions->fetch_assoc()){
                       $i++;
                       if($i==2){
                           break;
                       }
            echo $row['email'];
                     }}}
                   
            ?></h3>
  </div>
 
</div>
<div class="container-fluid" >
	<div class="row">
	
			<div class="col-md-12">
        <form method="post" action="" id="button12" name="button12">
            <?php 
             if(isset($_GET['model'])){
               $i=0;
                 $cate=$_GET['cate'];
                 $model=$_GET['model'];
                 $get_Questions=$ob->AllQuestions($cate,$model);
                 if($get_Questions){
                     while($row= $get_Questions->fetch_assoc()){
                       $i++;

                   
            ?>
        <h4 style="font-size: 18px;background: #c2d0cc;padding: 9px 2px;"><?php echo $i ?>. <?php echo $row['question'] ?> </h4>
        <input  type="radio" name="optionS[<?php echo$row['ques_no'];?>]" value="<?php echo $row['option1'] ?>"><?php echo $row['option1'] ?><br>
        <input  type="radio" name="optionS[<?php echo$row['ques_no'];?>]" value="<?php echo $row['option2'] ?>"><?php echo $row['option2'] ?><br>
        <input  type="radio" name="optionS[<?php echo$row['ques_no'];?>]" value="<?php echo $row['option3'] ?>"><?php echo $row['option3'] ?><br>
        <input  type="radio" name="optionS[<?php echo$row['ques_no'];?>]" value="<?php echo $row['option4'] ?>"><?php echo $row['option4'] ?>

       <?php 
       
    }
}
}
?>
<input type="submit" name="submit" value="Submit " class="btn btn-success" style="float:right;margin-bottom:10px;
"> 
        </form>

      
      
			</div>
				
	</div>


</div>
</div>
</div>


<?php include("segment/footer.php");?>