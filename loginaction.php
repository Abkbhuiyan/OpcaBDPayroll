<?php 
  include_once 'dbConnection.php';
 if(session_id() == '' || !isset($_SESSION))
  {session_start();}
 
 $message ="";
 
 if(isset($_POST['signIn'])){ 
  extract($_REQUEST);
    if(strlen($email)>=5 && strpos($email,'@')>0 && strlen($password)>=3){

        $sql="SELECT * FROM employee_details WHERE (email='$email' or employee_id='$email') AND password='$password' AND(user_type=1 or user_type=2)  LIMIT 1";

         //print $sql;
        $result=mysqli_query($connection ,$sql);
        if(mysqli_num_rows($result) == 1){
              $data = mysqli_fetch_assoc($result);
              $_SESSION['userData'] = $data;
              $_SESSION['email'] = $email;
              $id=$data['employee_id'];
              $_SESSION['userType']=$data['user_type'];
              $_SESSION['id'] = $id;             
              $_SESSION['loggedIn']= true;

              $sql1="SELECT  designation,branch_code from employee_job_details WHERE employee_id='$id'";
       // echo $sql1;     
              $result1=mysqli_query($connection ,$sql1);
              //print_r($result1);
              
              if(mysqli_num_rows($result1) == 1){
                
                $data1 = mysqli_fetch_assoc($result1);
                
                     $_SESSION['designation'] = $data1['designation'];
                      $_SESSION['branch_code'] = $data1['branch_code'];

              }


                 $_SESSION['msg']='<div class="alert alert-success">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    You  have  Successfully Log In.
    </div>';
             header('location:index.php');
              
              
        }else{
            $_SESSION['msg']='<div class="alert alert-warning">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    Email or Password  is  wrong.Please try again....
    </div>';
        header('location:login.php');
            
        }
        
    }
     else{
        $_SESSION['msg']='<div class="alert alert-warning">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    Email or Password  is  wrong.Please try again....
    </div>';
        header('location:login.php');
        } 
}
?>
