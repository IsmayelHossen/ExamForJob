<?php include("segment/header.php");?>
<?php include("classes/loginclass.php");

Session::checkSession();

 $ob=new login();
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
  
    <h3  style="text-align:center;font-family:'Acme';color:#007a7e;">MCQ Exam System</h3>
  </div>
  
</div>
<div class="container-fluid" >
	<div class="row">
	
			<div class="col-md-12  ">
        <!-- modal start  -->
        
        <!-- modal end -->
                <h2 style="text-align: center;
text-shadow: 1px 2px #88919b;
font-family: bold;
font-weight: 700;">Routine</h2>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                         <th>Model Test</th>
                        <th>Subject</th>
                        <th>Topics</th>
                        <th>Date(M/D/Y)</th>
                        <th>Count Down</th>

                      </tr>
                    </thead>
                    <tbody>
                    
                
                <?php 
              $i=0;
              
                 $get_routine=$ob->Routine();
                 if($get_routine){
                     while($row= $get_routine->fetch_assoc()){
                      $i++;

                   
            ?>
            <tr>
                <td><?php echo $i; ?></td>
              <td><?php echo $row["subject1"] ?></td>
              <td><?php echo $row["topics"] ?></td>
             <td><?php echo $row["date1"] ?>   </td> 
             <td>
               <!-- time count down -->
               <?php
 date_default_timezone_set("Asia/Dhaka");
//  $date12= date('m d Y h:i:sa', strtotime("$add"));
 $add=$row["date1"];
 $random=$row['id'];

 ?>
            <p id="demo<?php echo $random ?>" style=""></p>


<script>
// Set the date we're counting down to
// var countDownDate = new Date("8/06/2021 11:37:25").getTime();
var countDownDate<?php echo $random ?> = new Date("<?php echo $add ?>").getTime();

// Update the count down every 1 second
var x<?php echo $random ?> = setInterval(function() {

  // Get today's date and time
   var now = new Date().getTime();

    
  // Find the distance between now and the count down date
  var distance = countDownDate<?php echo $random ?> - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo<?php echo $random ?>").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x<?php echo $random ?>);
    document.getElementById("demo<?php echo $random ?>").innerHTML ='closed';

    
    //window.location.href = "http://localhost/examforjobF/email.php?id=<?php echo$random?>";
  }
}, 1000);
</script>

               <!-- time count down end -->

             </td>

            </tr>
         
           

            <?php }}?>
            </tbody>
                  </table>
                </div>
      </div>

    
				
	</div>


</div>
</div>
</div>


<?php include("segment/footer.php");?>