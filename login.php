<?php
     include_once 'dbConnection.php';
    if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0);


?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login Page! </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>OPCABD </b>Protal</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"><h4>Sign In</h4></p>
<?php  echo $_SESSION['msg'];   unset($_SESSION['msg'])?>
    <form action="loginaction.php" method="post">
    
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Please Enter Your Email or Employee ID" required="">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="PLease Enter Your Password"  name="password" required="" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
             
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="signIn" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

     
    <!-- /.social-auth-links -->

     
     

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
<?php 

/////Finding available fp employees
$sql="SELECT ejd.employee_id FROM employee_job_details ejd WHERE ejd.employment_status='active' AND ejd.employee_id NOT IN (SELECT employee_id FROM provident_fund) AND DATEDIFF(NOW(),job_parmanent_date)/365>=5";

     $result=mysqli_query($connection ,$sql);
     
     
        if(mysqli_num_rows($result) >= 1){
         // echo mysqli_num_rows($result) ;
          while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
               $emp =$row['employee_id'];
               $sql1 = "INSERT INTO `provident_fund` (`employee_id`,`pf_start_date`,`pf_status`,`first_balance`) VALUES('$emp',NOW(),'Active',0)";
              
                $result1=mysqli_query($connection ,$sql1);

          }    
        }


      // inserting new gratuity details
      
      $sql="SELECT * FROM employee_job_details WHERE employee_id NOT IN (SELECT employee_id FROM gratuity_details)";

     $result=mysqli_query($connection ,$sql);
     
        if(mysqli_num_rows($result) >= 1){
         // echo mysqli_num_rows($result) ;
          while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
               $joindate=date($row['job_parmanent_date']);
               $mindate=date('2015/07/01');
               $today =date("Y/m/d");

               if ($joindate<$mindate){

                $crd = new DateTime();

                $old = new DateTime('2015/07/01');
                $diff =  $old->diff($crd)->y;
                // echo $diff."<br>"; 
                if ($diff>=5){
                     $emp =$row['employee_id'];
                     $sqls = "SELECT basic FROM salary WHERE employee_id='$emp' ORDER BY id DESC LIMIT 1 ";
                     $results=mysqli_query($connection ,$sqls);  
                      $data = mysqli_fetch_assoc($results);
                    
                      $gratuity_total = 12 * $data['basic'];
                      
                          $sql1 = "INSERT INTO `gratuity_details` (`employee_id`,`gratuity_approved_date`,`first_balance`) VALUES('$emp',NOW(),$gratuity_total)";
                           $result1=mysqli_query($connection ,$sql1);
                         
                          $last_id = mysqli_insert_id($connection);
                    
                          $sql2= "INSERT INTO employee_gratuity (`gratuity_details_id`,`deposite_type`,`gratuity_amount`) VALUES($last_id,'Main Gratuity',$gratuity_total)";
         
                           $result2=mysqli_query($connection ,$sql2);
       
                 }
               
               }else{
                         $crd = new DateTime();
                
                $old = new DateTime($row['job_parmanent_date']);
                $diff =  $old->diff($crd)->y;
                
                if ($diff>=5){
                     $emp =$row['employee_id'];
                     $sqls = "SELECT basic FROM salary WHERE employee_id='$emp' ORDER BY id DESC LIMIT 1 ";
                     $results=mysqli_query($connection ,$sqls);  
                      $data = mysqli_fetch_assoc($results);
                    
                      $gratuity_total = 12 * $data['basic'];
                      

                          $sql1 = "INSERT INTO `gratuity_details` (`employee_id`,`gratuity_approved_date`,`first_balance`) VALUES('$emp',NOW(),$gratuity_total)";
                           $result1=mysqli_query($connection ,$sql1);
                         
                          $last_id = mysqli_insert_id($connection);
                          $sql2= "INSERT INTO employee_gratuity (`gratuity_details_id`,`deposite_type`,`gratuity_amount`) VALUES($last_id,'Main Gratuity',$gratuity_total)";

                           $result2=mysqli_query($connection ,$sql2);  
                 }
               }              
          }    
        }  

?>