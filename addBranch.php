
<?php 
include_once 'dbConnection.php';
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
 $user_id = $_SESSION['id'];
 ?>






<?php 

if(isset($_POST['addBranch'])){
 
  extract($_REQUEST);
 
 echo $establishDtae;
    
   
    
    
     $sql_query1="INSERT INTO `branches`(`branch_code`, `branch_name`, `establish_date`, `address`) VALUES ('$branchCode','$branchName','$establishDtae','$address')";



 echo $sql_query1;

  $qeury_result1 = mysqli_query($connection ,$sql_query1);

   if(!$qeury_result1) {
    echo mysqlii_error($connection) ;
    $_SESSION['massagedd']='<div class="alert alert-warning">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    You  have  an error .Please try again'.mysqli_error($connection).'
    </div>';
    header('location: newBranchRegistration.php');
   
    } else{

     $_SESSION['massagea']='<div class="alert alert-success">
 
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    You Have Registered a new branch!
    </div>'; 
    header('location: newBranchRegistration.php');
     }
     $connection->close();
   }



   if(isset($_POST['cancel'])){
    header('location: index.php');
   }