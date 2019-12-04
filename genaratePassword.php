<?php 
include_once 'dbConnection.php';
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
 //$user_id = $_SESSION['id'];


    if(isset($_POST['save'])){
 
  extract($_REQUEST);
 
  
     $sql_query1="UPDATE employee_details SET `password`='$password' WHERE `employee_id`='$employee_id'";



 

  $qeury_result1 = mysqli_query($connection ,$sql_query1);

   if(!$qeury_result1) {
   
    $_SESSION['massagea']='<div class="alert alert-warning">
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    You  have  an error .Please try again'.mysqlii_error($connection).'
    </div>';
    header('location: genaratePassword.php');
   
    } else{

     $_SESSION['massagea']='<div class="alert alert-success">
 
    <a class="close" href="#" data-dismiss="alert">
    <i class="fa fa-times-circle"></i>
    </a>
    Password is setted!!!!
    </div>'; 
    header('location: genaratePassword.php');
     }
     $connection->close();
     
   }


 ?>



<?php include_once 'head.php';




?>
  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>OPCA BD </b>Protal</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>OPCA BD </b>Portal</span>
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
        unset($_SESSION['massagea']);
      }
      
      
      ?>
      <h1>
      
        EMployee Password Genaration!!
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
              <h3 class="box-title"> Employee Password Genaration</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="" method="post"  >
              <div class="box-body">
               
                 
                  <div class="form-group">
                  <label   class="col-sm-3 control-label">Select Employee ID</label>

                  <div class="col-sm-9">
                     <select name="employee_id"  required=""  class="form-control">
                                    
                      <?php echo allEmployees(); ?>
                    </select>
                </div>
              </div> 

               <div class="form-group">
                  <label   class="col-sm-4 control-label"> Give New Password</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="password" required=""  name="password" placeholder="Please Enter a password!!"  />
                  </div>
                </div> 
                  
                
                </div> 

              <!-- /.box-body -->
              <div class="box-footer">
               
                <button type="submit" name="save" class="btn btn-info pull-right">Save Password</button>
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


</html>

<?php 
    function allEmployees(){
    $con = mysqli_connect("localhost","root","","opcabd_org");
    $query = "select employee_id, employee_name from employee_details WHERE user_type=2";
    $result= mysqli_query($con, $query);
    $output= '';

    $selected='';



      while ($row= mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        $id = $row['employee_id'];
        $class =$row['employee_name'];

        if(isset($_SESSION['emp_id'])){
          if($id==$_SESSION['emp_id']){
            $selected .='selected ="selected"';
           }
          }
       $output .= '<option '.$selected.' value="'.$id.'">'.$class.'</option>';
      }
    return $output;
  }

 ?>