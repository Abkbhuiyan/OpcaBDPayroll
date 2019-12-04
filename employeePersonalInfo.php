<?php 
include_once 'dbConnection.php';
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
 $user_id = $_SESSION['id'];
   $successmassage='';
 $employee_id=$_GET['employee_id'];
   
 ?>
<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">



<?php include_once 'head.php';



?>
  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>OPCABD</b>Protal</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>OPCABD</b>Protal</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <?php include_once 'header.php';?>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include_once 'sidebar.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <?php 
      if ($_SESSION['id']){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
      }
      
 
      ?>
      
      
      
     
       
    </section>

    <!-- Main content -->
    <section class="content">
     
                   <?php
                    $sql_query4="SELECT ed.employee_id,ed.employee_name,ed.father_name,ed.mother_name,ed.email,ed.address,ed.highest_education_level,ed.image,ed.blood_group,ed.phone_no,br.branch_name,ejd.designation,ejd.join_date,ejd.job_status FROM `employee_details` AS ed,`employee_job_details` AS ejd, branches AS br Where ed.employee_id=ejd.employee_id AND ejd.branch_code=br.branch_code and ed.employee_id='$employee_id'";                    
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
      <div class="row no-print">
        <div class="col-xs-12">
          <a style="margin-right: 2px;" href="invoicePrint.php" target="_blank" class="btn btn-success pull-right"><i class="fa fa-print"></i> Print</a> &nbsp;
           <a style="margin-left: 2px;" href="editEmployee.php?employee_id=<?php echo $ord['employee_id']; ?>"" class="btn btn-success pull-right"><i class="fa fa-edit"></i> Update Info</a>
        </div>
      </div>
    </section>

    </section>


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include_once 'footer.php';?>

 
</body>
</html>

