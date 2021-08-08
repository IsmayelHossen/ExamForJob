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
    <h3  style="text-align:center;font-family:'Acme';color:#007a7e;font-size: 30px">Subject:<?php 
    if(isset($_GET['category'])){
        echo $_GET['category'];

    }
    ?></h3>
  </div>
  
</div>
<div class="container-fluid" >
	<div class="row">
  <?php 
      $i=0;
      $cate=$_GET['category'];
        $subjectwiseModel=$ob->GetsubWiseModel($cate);
        $count=mysqli_num_rows($subjectwiseModel);
       
        if($count>0){
            while($row=$subjectwiseModel->fetch_assoc()){
           ?>
     <div class="col-md-3">
       <div style="background: #007a7e;
padding-top: 10px;
padding-bottom: 10px;
margin-bottom: 2px;">
      <h4 style="font-size: 22px;text-align: center;padding: 4px 5px;" ><a href="omrPage.php?cate=<?php echo $row['subject1'] ?> & model=<?php echo $row['model'] ?>  " style="color: #fff;">
      Model Test(<?php echo $row['model'] ?>)
      :<?php echo $row['topics'] ?></a></h4>
      
			</div>
      </div>
      <?php }} else{ ?>
      <h3 style="color:red;text-align:center;margin:0 auto;margin-bottom:2em"><b>No Model Test Available</b</h3>
      <?php }?>
				
	</div>


</div>
</div>
</div>


<?php include("segment/footer.php");?>