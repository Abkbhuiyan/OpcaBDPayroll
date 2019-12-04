<?php 
include_once 'dbConnection.php';
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
 $user_id = $_SESSION['id'];
   $successmassage='';
 $employee_id=$_GET['employee_id'];
   
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>OPCABD Employee Portfolio</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> OPCABDORG.
          <small class="pull-right"><?php echo date('Y/m/d') ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- Main content -->
    </section>
    <section class="content">
     
                   <?php
                    $sql_query4="SELECT ed.employee_id,ed.employee_name,ed.father_name,ed.mother_name,ed.email,ed.address,ed.highest_education_level,ed.image,ed.blood_group,ed.phone_no,br.branch_name,ejd.designation,ejd.join_date,ejd.job_status FROM `employee_details` AS ed,`employee_job_details` AS ejd, branches AS br Where ed.employee_id=ejd.employee_id AND ejd.branch_code=br.branch_code and ed.employee_id='opcabdemp3'";                    
                    $sql_view4= mysqli_query($connection ,$sql_query4);
                    $ord=mysqli_fetch_array($sql_view4);
                     
                    ?>
               
             <div class="row invoice-info">
               <div class="box-header">
              <h3 class="box-title">Professional Portfolio of = # <?php echo $ord['employee_name']; ?></h3>
            </div>
        <div class="col-sm-7 invoice-col">
          <h3>Personal Info</h3> <br>
          <address>
            <b>Name:  </b> <strong><?php echo $ord['employee_name']; ?></strong><br>
            <br>

            <b>Address:  </b><?php echo $ord['address']; ?><br><br>
            <b>Phone:  </b><?php echo $ord['phone_no']; ?>
           
            <br>
            <b>Email:  </b><?php echo $ord['email']; ?>
            <br>
            
          </address>
        </div>
        
        <!-- /.col -->
        <div class="col-sm-5 invoice-col">
          <address>
           <img  style="width: 240px; height: 270px; float: middle;" src="employeePhoto/<?php echo $ord['image']; ?>" />
         </address>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

     

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Details</p>
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Father's Name:</th>
                <td><?php echo $ord['father_name']; ?></td>
              </tr>
              <tr>
                <th>Mother's Name:</th>
                <td><?php echo $ord['mother_name']; ?></td>
              </tr>
              <tr>
                <th>Highest Education</th>
                <td><?php echo $ord['highest_education_level']; ?></td>
              </tr>
              <tr>
                <th>Blood Group:</th>
                <td><?php echo $ord['blood_group']; ?></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Job Info</p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Job Status:</th>
                <td><?php echo $ord['job_status']; ?></td>
              </tr>
              <tr>
                <th>Designation</th>
                <td><?php echo $ord['designation']; ?></td>
              </tr>
              <tr>
                <th>Join Date:</th>
                <td><?php echo $ord['join_date']; ?></td>
              </tr>
              <tr>
                <th>Branch Name</th>
                <td><?php echo $ord['branch_name']; ?></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      
    

    </section>


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


 
</body>
</html>

