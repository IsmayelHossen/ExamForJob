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
  <h2 style="text-align:center;font-family:'Acme';color:#007a7e;"><a href="home.php" style="text-align: center;color: #208669;font-weight: 600; text-shadow: 0px 1px #152c44;text-decoration-line:none">Welcome To Govt. study group</a>  </h2> 
    <h3 style="text-align: center;color: #208669;font-weight: 600; text-shadow: 0px 1px #152c44;"><?php 
    if(isset($_GET['model']) && isset($_GET['cate'])){
        echo $_GET['cate'];
       

    }
    ?></h3>
  </div>
  
</div>
<div class="container-fluid" >
	<div class="row">
	
			<div class="col-md-12">
            <h1 style="text-align: center;color: #208669;font-weight: 600; text-shadow: 0px 1px #152c44;">Scorecard</h1>
            <h4 class="btn btn-info">Total Questions:
   <?php 
     $category=$_GET['cate'];
       $model=$_GET['model'];
       $total=$ob->GetTotalQuestion($category,$model);
       $row=$total->fetch_assoc();
       echo $row['questions']
   ?>
    </h4>
      <?php 
      $i=0;
         $category=$_GET['cate'];
        $model=$_GET['model'];
        $count_score=$ob->Get_score($category,$model);
        echo "<h4 class='btn btn-primary'>Selected Questions:".mysqli_num_rows($count_score)."</h4><br>";
       
         
        if($count_score){
      
            while($row=$count_score->fetch_assoc()){
           $i++;
           ?>
<div style="border-bottom: 1px solid #c3cece;">
<h4 style="font-size: 18px;
padding: 9px 2px;
color:#2f7b62;;"><?php echo $row['ques_no'] ?>. <?php echo $row['question'] ?> </h4>
       <ul>
           
               <?php 
              //  if($row['ans1']==$row['ans']){ 
              //  echo '<h5 style="color:red">'.$row['ans'].'</h5>'; 
              //  }
               if($row['ans1']==$row['ans']){
                echo '<b><h5 style="color:#346f6f">'.'<strong>Right Ans: </strong>'.$row['ans'].'</h5></b>';
                  echo '<b><h5 style="color:#346f6f">'.'<strong>Your Ans: </strong>'.$row['ans1'].'</h5></b>';
                
               }
               if($row['ans1']!=$row['ans']){
                echo '<b><h5 style="color:#346f6f">'.'<strong>Right Ans: </strong>'.$row['ans'].'</h5></b>'; 
                echo '<b><h5 style="color:#b03131">'.'<strong>Your Ans: </strong>'.$row['ans1'].'</h5></b>';  
               }
               ?>
          
           
            
           
          
       </ul>
       </div>
<?php }}?>
      <!-- Highest mark Calculation -->
      <h3 style="text-align: center;color: #208669;font-weight: 600; text-shadow: 0px 1px #152c44;">All Participators Result</h3>
      <?php
       $cate=$_GET['cate'];
       $model=$_GET['model'];
       $model=$_GET['model'];
      $get_heighest=$ob->HeighestMark($cate,$model);
      $table='<div class="table-responsive"><table class="table table-hover">
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
         
        while($rowParent=$get_heighest->fetch_assoc()){
          //again query start
          $GetForHeighestMark=$ob->AllIndividualScore($rowParent['email'],$cate,$model);
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

        </table></div>';
        echo $table;

      }

      ?>
     
			</div>
				
	</div>

    <!-- Questions & right answer -->
    <div class="container-fluid" >
	<div class="row">
	<h3 style="text-align: center;color: #208669;font-weight: 600; text-shadow: 0px 1px #152c44;">Questions & Right Answers</h3>
			<div class="col-md-12">
        <form method="post" action="">
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
        <h4 style="font-size: 18px;background: #c2d0cc;padding: 9px 2px;"><?php echo $row['ques_no'] ?>. <?php echo $row['question'] ?> </h4>
       <ul>
           <li>
               <?php 
              //  if($row['ans1']==$row['ans']){ 
              //  echo '<h5 style="color:red">'.$row['ans'].'</h5>'; 
              //  }
               if($row['option1']==$row['ans']){
                echo '<h4 style="color:green"><strong>'.$row['ans'].'</strong></h4>'; 
               }
               else{
                     echo '<h5>'.$row['option1'].'</h5>'; 
               }
               ?>
           </li>
           
            <li>
               <?php 
               if($row['option2']==$row['ans']){ 
                echo '<h4 style="color:green"><strong>'.$row['ans'].'</strong></h4>'; 
               }
               else{
                     echo '<h5>'.$row['option2'].'</h5>'; 
               }
               ?>
           </li>
           
            <li>
               <?php 
               if($row['option3']==$row['ans']){ 
                echo '<h4 style="color:green"><strong>'.$row['ans'].'</strong></h4>';
               }
               else{
                     echo '<h5>'.$row['option3'].'</h5>'; 
               }
               ?>
           </li>
            <li>
               <?php 
               if($row['option4']==$row['ans']){ 
                echo '<h4 style="color:green"><strong>'.$row['ans'].'</strong></h4>';
               }
               else{
                     echo '<h5>'.$row['option4'].'</h5>'; 
               }
               ?>
           </li>
          
       </ul>

       <?php 
       
    }
}
}
?>

        </form>

      
      
			</div>
				
	</div>



</div>
</div>
</div>


<?php include("segment/footer.php");?>