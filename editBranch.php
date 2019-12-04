<?php  include_once 'dbConnection.php';

if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
  $user_id = $_SESSION['id'];
 
   $branch_code = $_GET['branch_code'];
    
    if(isset($_POST['submit'])){
    extract($_REQUEST);
    $sql_query="UPDATE `branches` SET `branch_name`='$branchName',`establish_date`='$establishDate',
                                        `address`='$address'
                                         WHERE branch_code ='$branch_code'";
        // echo $sql_query;

   $qeury_result = mysqli_query($connection ,$sql_query);


   if($qeury_result ==1) {
    
    $_SESSION['massage']='<div class="alert alert-success">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    You have just updated a branch details!
    </div>';
    header("Location: allBrancheList.php");
     } else{
      
    $_SESSION['massage']='<div class="alert alert-warning">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    You  have  an error .Please try again....'.mysqli_error($connection).'
    </div>';
    
 //  header("Location: editBranch.php?branch_code=".$branch_code); 

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
        unset($_SESSION['massage']);
      }
      
        
      
      ?>
      <h1>
      
        Updating an existing branch info!
         
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
              <h3 class="box-title">Branch info updatation</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
               <?php
                    
                    $sql_query="SELECT   * from `branches` WHERE branch_code='$branch_code' ";
                    
                    // echo $sql_query;
                    $sql_view= mysqli_query($connection ,$sql_query);
                    //var_dump($sql_view);
                      $rows=mysqli_fetch_array($sql_view);
                
                ?>
                
               
             <form class="form-horizontal" action="" method="post" >
              <div class="box-body">
                 <div class="form-group">
                  <label   class="col-sm-3 control-label">Branch Name</label>

                  <div class="col-sm-9">
                     <input type="text"  class="form-control"  required=""  name="branchName"  id="branchName" value="<?php echo $rows['branch_name']; ?>" />
                  </div>
                </div>
               
               <div class="form-group">
                  <label   class="col-sm-3 control-label">Establish Date</label>

                  <div class="col-sm-9">
                     <input type="date" class="form-control" id="join_date" required=""  name="join_date" value="<?php echo $rows['establish_date']; ?>" />

                  </div>
                </div>

                 <div class="form-group">
                  <label  class="col-sm-3 control-label">Address</label>

                  <div class="col-sm-9">
                     
                    <textarea rows="4" cols="50" required="" class="form-control" id="address" name="address" ><?php echo $rows['address']; ?></textarea>
                    
                  </div>
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
        $output .= '<option'.$selected.' value="'.$id.'">'.$class.'</option>';
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
