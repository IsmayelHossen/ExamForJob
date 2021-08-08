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
	
			<div class="col-md-3  ">
        <div class="subBackground1">
      <h5><a href="subWiseHome.php?category=Bangla">Bangla</a></h5>
			</div>
      </div>

      <div class="col-md-3  ">
      <div class="subBackground2">
      <h5><a href="subWiseHome.php?category=English">English</a></h5>
      </div>
			</div>

      <div class="col-md-3 ">
      <div class="subBackground3">
      <h5><a href="subWiseHome.php?category=Mathematics">Mathematics</a></h5>
      </div>
			</div>

      <div class="col-md-3 ">
      <div class="subBackground4">
      <h5><a href="subWiseHome.php?category=General Knowledge">General Knowledge</a></h5>
      </div>
			</div>
				
	</div>


</div>
</div>
</div>


<?php include("segment/footer.php");?>