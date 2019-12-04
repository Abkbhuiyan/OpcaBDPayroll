<?php  include_once 'dbConnection.php';
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
 $user_id = $_SESSION['id'];
 
 
   $employee_id = $_GET['employee_id'];
    
    if(isset($_POST['submit'])){
    extract($_REQUEST);
    $sql_query="UPDATE `employee_details` SET `employee_name`='$employeeName',`father_name`='$employeeFather',
                                        `mother_name`='$employeeMother',`address`='$address',
                                        `phone_no`=$phoneNo,`email`='$email',
                                        `highest_education_level`='$highestEdu'
                                         WHERE employee_id ='$employee_id'";
         echo $sql_query;

   $qeury_result = mysqli_query($connection ,$sql_query);
  $sql_query1="UPDATE `employee_job_details` SET `branch_code`='$branch_code',`join_date`='$join_date',
                                        `job_parmanent_date`='$job_parmanent_date',`job_status`='$job_status', `designation`='$designation',`employment_status`='$employment_status'
                                         WHERE employee_id ='$employee_id'";
         echo $sql_query1;
   $qeury_result1 = mysqli_query($connection ,$sql_query1);

   if($qeury_result ==1 && $qeury_result1==1) {
    $_SESSION['massage']='<div class="alert alert-success">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    You have just updated an employee info!
    </div>';
    header("Location: allEmployeeList.php");
     } else{
    $_SESSION['massage']='<div class="alert alert-warning">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    You  have  an error .Please try again....'.mysqli_error($connection).'
    </div>';
    
   header("Location: editEmployee.php?employee_id=".$employee_id); 
   }
    }
 
 
 
 
    
 
 ?>



<?php 
include_once 'head.php';
?>
  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>OPCABD</b>Portal</span>
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
      
        
      
      ?>
      <h1>
      
        Edit Employee Details
         
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
              <h3 class="box-title">Edit Employee Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
               <?php
                    
                    $sql_query="SELECT em.employee_name,em.father_name, em.mother_name, em.highest_education_level, em.phone_no, em.email,em.address, ejd.join_date, ejd.branch_code, ejd.job_status, ejd.job_parmanent_date, ejd.employment_status, ejd.designation from employee_details as em, employee_job_details as ejd WHERE em.employee_id=ejd.employee_id and em.employee_id='$employee_id'";
                    
                    // echo $sql_query;
                    $sql_view= mysqli_query($connection ,$sql_query);
                    //var_dump($sql_view);
                      $rows=mysqli_fetch_array($sql_view);
                
                ?>
                
               
             <form class="form-horizontal" action="" method="post" >
              <div class="box-body">
                 <div class="form-group">
                  <label   class="col-sm-3 control-label">Employee Name</label>

                  <div class="col-sm-9">
                     <input type="text"  class="form-control"  required=""  name="employeeName"  id="employeeName" value="<?php echo $rows['employee_name']; ?>" />
                  </div>
                </div>
               
               <div class="form-group">
                  <label   class="col-sm-3 control-label">Father's Name</label>

                  <div class="col-sm-9">
                     <input type="text" class="form-control"  required=""  name="employeeFather"  id="employeeFather" value="<?php echo $rows['father_name']; ?> "/>

                  </div>
                </div>


                 <div class="form-group">
                  <label   class="col-sm-3 control-label">Mother's Name</label>

                  <div class="col-sm-9">
                     <input type="text" class="form-control"  required=""  name="employeeMother"  id="employeeMother" value="<?php echo $rows['mother_name']; ?>" />
                 
                  </div>
                </div>

              <div class="form-group">
                  <label  class="col-sm-3 control-label">Address</label>

                  <div class="col-sm-9">
                     
                    <textarea rows="4" cols="50" required="" class="form-control" id="address" name="address" ><?php echo $rows['address']; ?></textarea>
                    
                  </div>
                </div>
          
                 <div class="form-group">
                  <label   class="col-sm-3 control-label">Phone No</label>

                  <div class="col-sm-9">
                     <input type="text" class="form-control"  required=""  name="phoneNo"  id="phoneNo" value="<?php echo $rows['phone_no']; ?>" />
                   
                  </div>
                </div>

                 <div class="form-group">
                  <label   class="col-sm-3 control-label">Email</label>

                  <div class="col-sm-9">
                     <input type="text" class="form-control"  required=""  name="email"  id="email" value="<?php echo $rows['email']; ?>" />
                  </div>
                </div>
              
                 <div class="form-group">
                  <label   class="col-sm-3 control-label">Highest Education Level</label>

                  <div class="col-sm-9">
                     <input type="text" class="form-control"  required=""  name="highestEdu"  id="highestEdu" value="<?php echo $rows['highest_education_level']; ?>" />
                  </div>
                </div>

            
                
                <div class="form-group">
                  <label   class="col-sm-3 control-label">Assign to Branch</label>

                  <div class="col-sm-9">
                    <select name="branch_code"  required=""  class="form-control">
                                    
                      <?php echo loadBranches($rows['branch_code']); ?>
                    </select>
                </div>
              </div> 

            
                
                  
                <div class="form-group">
                  <label   class="col-sm-3 control-label"> Join Date</label>

                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="join_date" required=""  name="join_date" value="<?php echo $rows['join_date']; ?>" />
                  </div>
                </div> 

                <div class="form-group">
                  <label   class="col-sm-3 control-label"> Job Parmanent Date</label>

                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="job_parmanent_date" required=""  name="job_parmanent_date" value="<?php echo $rows['job_parmanent_date']; ?>" />
                  </div>
                </div> 

                <div class="form-group">
                <label   class="col-sm-3 control-label">Job Type</label>

                  <div class="col-sm-9">
                    <select name="job_status"  required=""  class="form-control">
                       <option value="Parmanent"<?php if ($rows['job_status']=="Parmanent") echo'selected ="selected"'; ?> > Parmanent Employee</option>
                       <option value="Part-Time"<?php if ($rows['job_status']=="Part-Time") echo'selected ="selected"'; ?> > Part-Time Employee</option>
                       <option value="Project-Basis"<?php if ($rows['job_status']=="Project Basis") echo'selected ="selected"'; ?> >Project Basis Employee</option>
                    </select>
                </div>


              </div> 

               
              <div class="form-group">
                <label   class="col-sm-3 control-label">Designation</label>

                  <div class="col-sm-9">
                    <select name="designation"  class="form-control">
                       <option value="ceo" <?php if ($rows['designation']=="ceo") echo'selected ="selected"'; ?> >Chief Executive Officer</option>
                       <option value="md" <?php if ($rows['designation']=="md") echo'selected ="selected"'; ?> >Managing Director</option>
                       <option value="ed" <?php if ($rows['designation']=="ed") echo'selected ="selected"'; ?> >Executive Director</option>
                       <option value="bm" <?php if ($rows['designation']=="bm") echo'selected ="selected"'; ?> >Branch Manager</option>
                       <option value="am" <?php if ($rows['designation']=="am") echo'selected ="selected"'; ?> >Assistant Manager</option>
                       <option value="ac" <?php if ($rows['designation']=="ac") echo'selected ="selected"'; ?> >Accountant</option>
                       <option value="aac" <?php if ($rows['designation']=="aac") echo'selected ="selected"'; ?> >Assistant Accountant</option>
                       <option value="fo" <?php if ($rows['designation']=="fo") echo'selected ="selected"'; ?> >Finance Officer</option>
                       <option value="fo1" <?php if ($rows['designation']=="fo1") echo'selected ="selected"'; ?> >Finance Officer(FO1)</option>
                       <option value="fo2" <?php if ($rows['designation']=="fo2") echo'selected ="selected"'; ?> >Finance Officer(FO2)</option>
                       <option value="fo3" <?php if ($rows['designation']=="fo3") echo'selected ="selected"'; ?> >Finance Officer(FO3)</option>
                       <option value="miso" <?php if ($rows['designation']=="miso") echo'selected ="selected"'; ?> >MIS Officer (Automation)</option>
                       <option value="mo" <?php if ($rows['designation']=="mo") echo'selected ="selected"'; ?> >Monitoring Officer</option>
                       <option value="spv" <?php if ($rows['designation']=="spv") echo'selected ="selected"'; ?> >Supervisor</option>
                       <option value="ng" <?php if ($rows['designation']=="ng") echo'selected ="selected"'; ?> >Night Guard</option>
                       <option value="ck" <?php if ($rows['designation']=="ck") echo'selected ="selected"'; ?> >Cook</option>
                       <option value="sp" <?php if ($rows['designation']=="sp") echo'selected ="selected"'; ?> >Support Staff</option>
                    </select>
                </div>
              </div>

              <div class="form-group">
                <label   class="col-sm-3 control-label">Job Status</label>

                  <div class="col-sm-9">
                    <select name="employment_status"  required=""  class="form-control">
                       <option value="active"<?php if ($rows['employment_status']=="active") echo'selected ="selected"'; ?> > Active</option>
                       <option value="retired"<?php if ($rows['employment_status']=="retired") echo'selected ="selected"'; ?> > Retired</option>
                       <option value="fired"<?php if ($rows['employment_status']=="fired") echo'selected ="selected"'; ?> > Fired</option>
                       <option value="leave"<?php if ($rows['employment_status']=="leave") echo'selected ="selected"'; ?> > Leaved</option>
                    </select>
                </div>


              </div> 
               
              <!-- /.box-body -->
              <div class="box-footer">
                
                <button type="submit" name="submit" class="btn btn-info pull-right">Update Details</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          <!-- general form elements disabled -->
           
          <!-- /.box -->
        </div>
       
       
        <!-- ./col -->
         
        <!-- ./col -->
         
        <!-- ./col -->
         
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
       
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php 

function loadBranches($branch_code){
    $con = mysqli_connect("localhost","root","","opcabd_org");
    $query = "select * from branches";
    $result= mysqli_query($con, $query);
    $output= '';

      while ($row= mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        $id = $row['branch_code'];
        $class =$row['branch_name'];
        $selected ='';
         if ($classId == $id){
          $selected .='selected ="selected"';
        }
        $output .= '<option '.$selected.' value="'.$id.'">'.$class.'</option>';
          //echo "<option value='$eventName'>".$eventName."</option>";
      }
    return $output;
  }




  


  include_once 'footer.php';?>

  
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
