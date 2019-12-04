<?php 
include_once 'dbConnection.php';
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
 $user_id = $_SESSION['id'];
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
        echo $_SESSION['massage'];
      }
      
        // if ($_SESSION['id']){
        echo $_SESSION['massagedd'];
        unset($_SESSION['massagedd']);
      //}
      
      
      ?>
      <h1>
      
        Employee Job Details Of OPCA!
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
              <h3 class="box-title">Assigning Employee Into Job</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="jobDetails.php" method="post" >
              <div class="box-body">
                <div class="form-group">
                  <label   class="col-sm-3 control-label">Assign to Branch</label>

                  <div class="col-sm-9">
                    <select name="branch_code"  required=""  class="form-control">
                                    
                      <?php echo loadBranches(); ?>
                    </select>
                </div>
              </div> 

              <div class="form-group">
                  <label   class="col-sm-3 control-label">Assign Employee</label>

                  <div class="col-sm-9">
                    <select name="employee_id"  required=""  class="form-control">
                                    
                      <?php echo allEmployees(); ?>
                    </select>
                </div>
              </div> 
                
                  
                <div class="form-group">
                  <label   class="col-sm-3 control-label"> Join Date</label>

                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="join_date" required=""  name="join_date"  />
                  </div>
                </div> 

                <div class="form-group">
                <label   class="col-sm-3 control-label">Job Status</label>

                  <div class="col-sm-9">
                    <select name="job_status"  required=""  class="form-control">
                       <option value="Parmanent"> Parmanent Employee</option>
                       <option value="Part-Time"> Part-Time Employee</option>
                       <option value="Project-Basis">Project Basis Employee</option>
                    </select>
                </div>


              </div> 

               
              <div class="form-group">
                <label   class="col-sm-3 control-label">Designation</label>

                  <div class="col-sm-9">
                    <select name="designation"  class="form-control">
                       <option value="ceo">Chief Executive Officer</option>
                       <option value="md">Managing Director</option>
                        <option value="ed">Executive Director</option>
                       <option value="bm">Branch Manager</option>
                       <option value="am">Assistant Manager</option>
                       <option value="ac">Accountant</option>
                       <option value="aac">Assistant Accountant</option>
                       <option value="fo">Finance Officer</option>
                       <option value="fo1">Finance Officer(FO1)</option>
                       <option value="fo2">Finance Officer(FO2)</option>
                       <option value="fo3">Finance Officer(FO3)</option>
                       <option value="miso">MIS Officer (Automation)</option>
                       <option value="mo">Monitoring Officer</option>
                       <option value="spv">Supervisor</option>
                       <option value="ng">Night Guard</option>
                       <option value="ck">Cook</option>
                       <option value="sp">Support Staff</option>
                    </select>
                </div>


              </div> 
                </div> 

              <!-- /.box-body -->
              <div class="box-footer">
               
                <button type="submit" name="assignEmployee" class="btn btn-info pull-right">Assign to Job</button>
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
function loadBranches(){
    $con = mysqli_connect("localhost","root","","opcabd_org");
    $query = "select * from branches";
    $result= mysqli_query($con, $query);
    $output= '';

      while ($row= mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        $id = $row['branch_code'];
        $class =$row['branch_name'];
        //echo $eventName;
        $output .= '<option value="'.$id.'">'.$class.'</option>';
          //echo "<option value='$eventName'>".$eventName."</option>";
      }
    return $output;
  }

  function allEmployees(){
    $con = mysqli_connect("localhost","root","","opcabd_org");
    $query = "select employee_id, employee_name from employee_details WHERE employee_id NOT IN (SELECT employee_id FROM employee_job_details)";
    $result= mysqli_query($con, $query);
    $output= '';

    $selected='';



      while ($row= mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        $id = $row['employee_id'];
        $class =$row['employee_name'];
        if($class !="System Admin"){
        if(isset($_SESSION['emp_id'])){
          if($id==$_SESSION['emp_id']){
            $selected .='selected ="selected"';
           }
          }
       $output .= '<option '.$selected.' value="'.$id.'">'.$class.'</option>';
      }
    }
    return $output;
  }
  ?>