<?php 

if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
 $user_id = $_SESSION['id'];

 $br = $_SESSION['branch_code'];
 include_once 'dbConnection.php';
 ?>

<?php 

  
  if (isset($_POST['pay'])) {

    extract($_REQUEST);

  
    $sql = "INSERT INTO  salary (`employee_id`,`payment_date`,`basic`,`hr`,`ma`,`travelling`,`mobile`,`ha`,`fuel`,`maintanace`,`hardship`,`total`) VALUES ('$employee_id',NOW(), $basic,$hr,$ma,$travelling,$mobile,$ha,$fuel,$maintanance,$hardship,$total)";
    $qeury_result1 = mysqli_query($connection ,$sql);

   if(!$qeury_result1) {
    echo mysqlii_error($con) ;
    $_SESSION['massagedd']='<div class="alert alert-warning">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    You  have  an error .Please try again'.mysqli_error($connection).'
    </div>';
    header('location: employeeSalary.php');
   
    } else{

     $_SESSION['massagea']='<div class="alert alert-success">
 
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    Salary Given for this month!
    </div>'; 
    if(checkPF($employee_id)==1){
      $pf = checkPfID($employee_id);  
      $amount = calculatefp($basic); 
      $sql1 = "INSERT INTO employee_pf (`pf_id`,`deposit_date`,`deposited_amount`,`deposit_type`) VALUES($pf, NOW(),$amount,'PF own')"; 
      $result = mysqli_query($connection,$sql1);
      $sql2 = "INSERT INTO employee_pf (`pf_id`,`deposit_date`,`deposited_amount`,`deposit_type`) VALUES($pf, NOW(),$amount,'PF OPCA')";
      $result = mysqli_query($connection,$sql2);

    }

    header('location: index.php');
     }

  }
?>

<?php include_once 'head.php';?>
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
        echo $_SESSION['massagea'];
        unset($_SESSION['massagea']);
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
            <?php if(isset($_POST['check'])){

            extract($_REQUEST); ?>
            <form class="form-horizontal" action="salaryInvoice.php" method="post" >
              <div class="box-body">

              <div class="form-group">
                  <label   class="col-sm-3 control-label">Employee ID</label>

                  <div class="col-sm-9">
                    <input type="text" name="employee_id" class="form-control" value="<?php echo $employee_id; ?>"/>
                </div>
              </div> 
               
               <div class="form-group">
                  <label   class="col-sm-3 control-label">Basic Salary</label>

                  <div class="col-sm-9">
                    <input type="number" name="basic"  value="<?php echo $basic; ?>" class="form-control" />
                </div>
              </div>
                <div class="form-group">
                  <label   class="col-sm-3 control-label">H/R</label>

                  <div class="col-sm-9">
                    <input type="number" name="hr"  value="<?php echo calculateha($basic); ?>" class="form-control" />
                </div>
                </div>
                <div class="form-group">
                  <label   class="col-sm-3 control-label">M/A</label>

                  <div class="col-sm-9">
                    <input type="number" name="ma"  value="<?php echo calculatema($basic); ?>" class="form-control" />
                </div>

              </div> 
	            <div class="form-group">
	                  <label   class="col-sm-3 control-label">Travelling Allowance</label>

	                  <div class="col-sm-9">
	                    <input type="number" name="travelling" class="form-control" value="<?php echo $travelling; ?>" />
	                </div>
	              </div> 
	            <div class="form-group">
                  <label   class="col-sm-3 control-label">Mobile Cost Amount</label>

                  <div class="col-sm-9">
                    <input type="number" name="mobile" class="form-control" value="<?php echo $mobile; ?>" />
                </div>
              </div> 
              	<div class="form-group">
                  <label   class="col-sm-3 control-label">H/A Amount</label>

                  <div class="col-sm-9">
                    <input type="number" name="ha" class="form-control" value="<?php echo $ha; ?>" />
                </div>
              </div> 
              	<div class="form-group">
                  <label   class="col-sm-3 control-label">Fuel Cost</label>

                  <div class="col-sm-9">
                    <input type="number" name="fuel" class="form-control" value="<?php echo $fuel; ?>" />
                </div>
              </div> 
              	<div class="form-group">
                  <label   class="col-sm-3 control-label">M/C Maintance Cost</label>

                  <div class="col-sm-9">
                    <input type="number" name="maintanance" class="form-control" value="<?php echo $maintanance; ?>" />
                </div>
              </div> 
              	<div class="form-group">
                  <label   class="col-sm-3 control-label">Hardship Allowance</label>

                  <div class="col-sm-9">
                    <input type="number" name="hardship" class="form-control" value="<?php echo $hardship; ?>" />
                </div>
              </div> 
              <?php 

             
              if (checkPF($employee_id)==1){ ?>
              <div class="form-group">
                  <label   class="col-sm-3 control-label">Provident Fund</label>

                  <div class="col-sm-9">
                    <input type="number" name="pf" class="form-control" value="<?php echo "-".calculatefp($basic); ?>" />
                </div>
              </div> 
              <?php } ?>
              <div class="form-group">
                  <label   class="col-sm-3 control-label">Total Salary</label>

                  <div class="col-sm-9">
                    <?php echo calculateTotal($_REQUEST); ?>
                    <input type="hidden" name="total" class="form-control" value="<?php echo calculateTotal($_REQUEST); ?>" />
                </div>
              </div> 

              </div> 
                </div> 

              <!-- /.box-body -->
              <div class="box-footer">
               
                <button type="submit" name="pay" class="btn btn-info pull-right">Give Payment</button>
              </div>

            </form>
            <?php } ?>
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


    function calculateha($basic){
        return $basic * 0.5;
    }
    function calculatema($basic){
      return $basic * 0.1;
    }
    function calculatefp($basic){
      return $basic * 0.1;
    }

    function calculateTotal($post){
      extract($_REQUEST);
      $hr = calculateha($basic);
      $ma = calculatema($basic);
      $pf = calculatefp($basic);

      $total=0;

      if (checkPF($employee_id)==1) {
        $total =$basic+$hr+$ma+$travelling+$mobile+$ha+$fuel+$maintanance+$hardship-$pf;
      }else{
        $total = $basic+$hr+$ma+$travelling+$mobile+$ha+$fuel+$maintanance+$hardship;
      }
      return $total;
      }

      function checkPF($id){
      $con = mysqli_connect("localhost","root","","opcabd_org");
        $sql = "select * from provident_fund where employee_id='$id'";
        //echo $sql;
        $result1=mysqli_query($con ,$sql);
        
              if(mysqli_num_rows($result1) == 1){
                return 1;
              }else{
                return 0;
              }
      }

        function checkPfID($id){
      $con = mysqli_connect("localhost","root","","opcabd_org");
        $sql = "select pf_id from provident_fund where employee_id='$id'";
        //echo $sql;
        $result1=mysqli_query($con ,$sql);
        
              if(mysqli_num_rows($result1) == 1){
                $data = mysqli_fetch_assoc($result1);
                return $data['pf_id'];
              }
      }
  ?>