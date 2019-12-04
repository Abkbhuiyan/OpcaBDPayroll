<?php  include_once '..\dbConnection.php';
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
 
 
    $msg="";
    $item=$_GET['item'];
    $id = $_GET['id'];
    extract($_REQUEST);
    $sql_query ="";
    if($item == "user"){
      $sql_query .=" DELETE FROM `users`  WHERE userId ='$id'";
      $msg .= "User has been deleted!";
    }else if($item == "class"){
      $sql_query .=" DELETE FROM `medicineclass`  WHERE classId ='$id'";
      $msg .= "Medicine Class has been deleted!";
    }else if($item == "category"){
      $sql_query .=" DELETE FROM `medicinecategory`  WHERE categoryId ='$id'";
      $msg .= "Medicine Category has been deleted!";
    }else if($item == "group"){
      $sql_query .=" DELETE FROM `medicinegroup`  WHERE groupId ='$id'";
      $msg .= "Medicine Group has been deleted!";
    }else if($item == "medicine"){
      $sql_query .=" DELETE FROM `medicine`  WHERE medicineId ='$id'";
      $msg .= "Medicine  has been deleted!";
    }else if($item == "store"){
      $sql_query .=" DELETE FROM `storelocation`  WHERE storeId ='$id'";
      $msg .= "Store Point Location has been deleted!";
    }
    
                                         
                                       
         //echo $sql_query;
   $qeury_result = mysqli_query($connection ,$sql_query);
    if($qeury_result ==1) {
    $_SESSION['massage']='<div class="alert alert-success">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    '.$msg.'
    </div>';
		header("Location: index.php");
     } else{
    $_SESSION['massage']='<div class="alert alert-warning">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    Something went wrong .Please try again. '.mysqli_error($connection).'
    </div>';
    
   header("Location: index.php"); 
   }
    
 
 $connection->close();
 
 
    
 
 ?>



        