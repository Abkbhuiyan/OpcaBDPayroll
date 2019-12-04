<?php 
include_once 'dbConnection.php';
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
 $user_id = $_SESSION['id'];
 $br = $_SESSION['branch_code'];
 ?>



<?php include_once 'head.php';
    function getEmployeeDesignation($des){
      switch ($des) {
        case 'ceo':
          return "Chief Executive Officer";
          break;
        case 'md':
          return "Managing Director";
          break;
        case 'ed':
          return "Executive Director";
          break;
        case 'bm':
          return "Branch Manager";
          break;
        case 'am':
          return "Assistant Manager";
          break;
        case 'ac':
          return "Accountant";
          break;
        case 'aac':
          return "Assistant Accountant";
          break;
        case 'fo':
          return "Finance Officer";
          break;
        case 'fo1':
          return "Finance Officer (FO1)";
          break;
         case 'fo2':
          return "Finance Officer(FO2)";
          break;
        case 'fo3':
          return "Finance Officer (FO3)";
          break;
        case 'miso':
          return "MIS Officer (Automation)";
          break;
        case 'mo':
          return "Monitoring Officer";
          break;
        case 'spv':
          return "Supervisor";
          break;
        case 'ng':
          return "Night Guard";
          break;
        case 'ck':
         return "Cook";
          break;
        case 'sp':
          return "Support Staff";
          break;
        default:
          return "N/A";
          break;
      }
      return "N/A";
    }



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
        echo $_SESSION['massage'];
        unset($_SESSION['massage']);
      }
      
        
      
      ?>
      
      
      
      <h1>
      
        Employee List
        <small> </small>
      </h1>
       
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Employees of OPCABD</h3>

               
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>EMployee ID</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Branch</th>
                  <th>Designation</th>
                  <th>View Detalis</th> 
                </tr>
                
                <?php
                    $id = $_SESSION['id'];
                    //$_SESSION['user_id'];
                    $sql_query="SELECT ed.employee_id,ed.employee_name,ed.phone_no,br.branch_name,ejd.designation FROM `employee_details` AS ed,`employee_job_details` AS ejd, branches AS br Where ed.employee_id=ejd.employee_id AND ejd.branch_code=br.branch_code and ed.user_type=2 and ejd.branch_code='$br'  and ejd.employment_status='active'";
                    
                    // echo $sql_query;
                    $sql_view= mysqli_query($connection ,$sql_query);
                    //var_dump($sql_view);
                     while($rows=mysqli_fetch_array($sql_view)){
                
                ?>
                <tr>
                   <td><?php echo $rows['employee_id']; ?></td>
                  <td><?php echo $rows['employee_name']; ?></td>
                  <td><?php echo $rows['phone_no']; ?></td>                  
                  <td><?php echo $rows['branch_name']; ?></td>
                  <td><?php echo getEmployeeDesignation($rows['designation']); ?></td>
                  
                 
                   
                 
                    
					<td> <a class="btn  btn-sm  btn-warning"  href="employeePersonalInfo.php?employee_id=<?php echo $rows['employee_id']; ?>"><i class="fa fa-list"></i></a></td>
                    
                   
                
                </tr>
                 <?php }?>
                 
                 
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include_once 'footer.php';?>

  <!-- Control Sidebar -->
 


</html>
