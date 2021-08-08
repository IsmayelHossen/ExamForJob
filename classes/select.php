
<?php include_once("/../database/Session.php"); 
  
 
?>
<?php include("/../database/Connection.php");?>

<?php include("/../database/Formet.php"); ?>

<?php 
class select{
	private $fm;
	private $db;
	 public function __construct(){
	 	$this->db=new Database();
	 	$this->fm=new Format();
	 }
	 public function selectoptaion_dept(){
	 	$query="SELECT*FROM dept";
	 	$result=$this->db->select($query);
	 	return $result;
	 }
	 

}
?>