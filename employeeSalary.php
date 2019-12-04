<?php 
include_once 'dbConnection.php';
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
 $user_id = $_SESSION['id'];

 $br = $_SESSION['branch_code'];
 ?>



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
        echo $_SESSION['massagea'];
      }
      
        // if ($_SESSION['id']){
        echo $_SESSION['massagedd'];
        unset($_SESSION['massagedd']);
      //}
      
      
      ?>
      <h1>
      
        Employee Salary Payment!
      </h1>
       
    </section>
    
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row"> 
         
       <div class="col-md-8 col-md-offset-2">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Giving Salary For Employee</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="salaryInvoice.php" method="post" >
              <div class="box-body">

              <div class="form-group">
                  <label   class="col-sm-3 control-label">Select An Employee</label>

                  <div class="col-sm-9">
                    <select name="employee_id"  required=""  class="form-control">
                                    
                      <?php echo loadEmployees($br); ?>
                    </select>
                </div>
              </div> 
               
               <div class="form-group">
                  <label   class="col-sm-3 control-label">Please Enter Basic Salary Amount</label>

                  <div class="col-sm-9">
                    <input type="number" name="basic" class="form-control" />
                </div>
              </div> 
	            <div class="form-group">
	                  <label   class="col-sm-3 control-label">Please Enter Travelling Allowance</label>

	                  <div class="col-sm-9">
	                    <input type="number" name="travelling" class="form-control" />
	                </div>
	              </div> 
	            <div class="form-group">
                  <label   class="col-sm-3 control-label">Please Enter Mobile Cost Amount</label>

                  <div class="col-sm-9">
                    <input type="number" name="mobile" class="form-control" />
                </div>
              </div> 
              	<div class="form-group">
                  <label   class="col-sm-3 control-label">Please Enter Basic H/A</label>

                  <div class="col-sm-9">
                    <input type="number" name="ha" class="form-control" />
                </div>
              </div> 
              	<div class="form-group">
                  <label   class="col-sm-3 control-label">Please Enter Fuel Cost</label>

                  <div class="col-sm-9">
                    <input type="number" name="fuel" class="form-control" />
                </div>
              </div> 
              	<div class="form-group">
                  <label   class="col-sm-3 control-label">Please Enter M/C Maintance</label>

                  <div class="col-sm-9">
                    <input type="number" name="maintanance" class="form-control" />
                </div>
              </div> 
              	<div class="form-group">
                  <label   class="col-sm-3 control-label">Please Enter Hardship Allowance</label>

                  <div class="col-sm-9">
                    <input type="number" name="hardship" class="form-control" />
                </div>
              </div> 


              </div> 
                </div> 

              <!-- /.box-body -->
              <div class="box-footer">
               
                <button type="submit" name="check" class="btn btn-info pull-right">Continue To Next</button>
              </div>

            </form>
          </div>
          
        </div>
     
      </div>

    </section>

    <section class="content">
    </section>
  </div>

  <?php include_once 'footer.php';?>
  
</body>

<script src="bootstrap/js/bootstrap.min.js"></script>
</html>

<?php



function loadEmployees($br){
    $con = mysqli_connect("localhost","root","","opcabd_org");
    $query = "select ed.employee_id, ed.employee_name from employee_details ed, employee_job_details ejd WHERE ed.employee_id=ejd.employee_id and branch_code='$br'";
    $result= mysqli_query($con, $query);
    $output= '';

      while ($row= mysqli_fetch_array($result,MYSQLI_ASSOC)) {
       $id = $row['employee_id'];
        $class =$row['employee_name'];
        //echo $eventName;
        $output .= '<option value="'.$id.'">'.$class.'</option>';
          //echo "<option value='$eventName'>".$eventName."</option>";
      }
    return $output;
  }
  ?>