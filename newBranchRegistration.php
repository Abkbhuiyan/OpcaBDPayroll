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
        echo $_SESSION['massage'];
      }
      
         if ($_SESSION['id']){
        echo $_SESSION['massagea'];
        unset($_SESSION['massagea']);
      }
      
      
      ?>
      <h1>
      
        Establish New Branch Of OPCA!
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
              <h3 class="box-title"> New Branch Opening Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="addBranch.php" method="post"  enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label   class="col-sm-4 control-label"> Branch Code</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="branchCode" required=""  name="branchCode" placeholder="Please Enter the Code for the New Branch!"  />
                  </div>
                </div>  
                 
                 <div class="form-group">
                  <label   class="col-sm-4 control-label"> Branch Name</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="branchName" required=""  name="branchName" placeholder="Please Enter the Name Of the New Branch!"  />
                  </div>
                </div> 
                  
                  <div class="form-group">
                  <label   class="col-sm-4 control-label"> Establish Dtae</label>

                  <div class="col-sm-8">
                    <input type="date" class="form-control" id="establishDtae" required=""  name="establishDtae" placeholder="Please Select The date of Establishment."  />
                  </div>
                </div> 

                  <div class="form-group">
                  <label  class="col-sm-4 control-label">Address</label>

                  <div class="col-sm-8">
                     
                    <textarea rows="4" cols="50" required="" class="form-control" name="address" placeholder="Eg: House no- 274, Road: DHaka-ctg Highway, District: Chittagong." id="indications"  ></textarea>
                  </div>
                </div>

                <div class="form-group">
                </div>
                
                </div> 

              <!-- /.box-body -->
              <div class="box-footer">
               
                <button type="submit" name="addBranch" class="btn btn-info pull-right">Establish New Branch</button>
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
