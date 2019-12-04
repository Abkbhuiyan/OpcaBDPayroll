
<?php 
include_once 'dbConnection.php';
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
 $user_id = $_SESSION['id'];
 ?>






<?php 

if(isset($_POST['assignEmployee'])){
 
  extract($_REQUEST);
 
     $sql_query1="INSERT INTO `employee_job_details`(`branch_code`, `employee_id`, `join_date`, `job_status`,`designation`,`employment_status`) VALUES ('$branch_code','$employee_id','$join_date','$job_status','$designation','active')";



 echo $sql_query1;

  $qeury_result1 = mysqli_query($connection ,$sql_query1);

   if($qeury_result1 !=1) {
    echo mysqlii_error($connection) ;
    $_SESSION['massagedd']='<div class="alert alert-warning">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    You  have  an error .Please try again'.mysqlii_error($connection).'
    </div>';
    header('location: employeeJobDetails.php');
   
    } else{

     
    if($designation=="ceo" || $designation=="miso" || $designation=="bm" || $designation=="ed" || $designation=="md"){
      $_SESSION['massagea']='<div class="alert alert-success">
 
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    You  have  Successfully Assign An Employee to Job! Please generate a password for him!.
    </div>'; 
    $_SESSION['emp_id']=$employee_id;
      header('location: genaratePassword.php');
    }else{
       $_SESSION['massagea']='<div class="alert alert-success">
 
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    You  have  Successfully Assign An Employee to Job!!.
    </div>'; 

      header('location: allEmployeeList.php');

    }

    
     }
     $connection->close();
   }



   if(isset($_POST['cancel'])){
    header('location: index.php');
   }