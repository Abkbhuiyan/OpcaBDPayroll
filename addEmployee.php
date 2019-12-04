
<?php 
include_once 'dbConnection.php';
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
 $user_id = $_SESSION['id'];
 ?>






<?php 

if(isset($_POST['addEmployee'])){
 
  extract($_REQUEST);
 
 
    
   $target = "employeePhoto/";
  $tmp_file = $_FILES['employeePhoto']['tmp_name'];
  $ext = pathinfo($_FILES["employeePhoto"]["name"], PATHINFO_EXTENSION);
  $rand = md5(uniqid().rand());
  $post_image = $rand.".".$ext;
   

if( move_uploaded_file($tmp_file,"employeePhoto/".$post_image)){
    
    
     $sql_query1="INSERT INTO `employee_details`(`employee_id`, `employee_name`, `father_name`, `mother_name`, `address`, `phone_no`, `email`, `highest_education_level`, `image`, `blood_group`,`user_type`) VALUES ('$employeeId','$employeeName','$employeeFather','$employeeMother','$address','$phoneNo','$email','$highestEdu','$post_image','$bloodGroup', 2)";

}

 

  $qeury_result1 = mysqli_query($connection ,$sql_query1);

   if(!$qeury_result1) {
    echo mysqlii_error($connection) ;
    $_SESSION['massagedd']='<div class="alert alert-warning">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    You  have  an error .Please try again'.mysqlii_error($connection).'
    </div>';
    header('location: newEmployeeRegister.php');
   
    } else{

      $_SESSION['massagedd'] ='<div class="alert alert-success">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    You  have  Successfully Insert a New Employee Information Plese Assign Him/Her On Job!.
    </div>'; 
    $_SESSION['emp_id']=$employee_id;
    header('location: employeeJobDetails.php');
     }
     $connection->close();
   }



   if(isset($_POST['cancel'])){
    header('location: index.php');
   }