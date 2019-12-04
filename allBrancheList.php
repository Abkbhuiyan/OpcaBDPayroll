<?php 
include_once 'dbConnection.php';
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
 //$user_id = $_SESSION['id'];
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
        unset($_SESSION['massage']);
      }
      
        
      
      ?>
      
      
      
      <h1>
      
        Branches List
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
              <h3 class="box-title">All Branches of OPCABD</h3>

               
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Branch Code</th>
                  <th>Branch Name</th>
                  <th>Address </th>
                  <th>Branch</th>
                  <th>Edit</th> 
                  <th>View Detalis</th> 
                </tr>
                
                <?php
                    
                    $sql_query="SELECT * FROM branches";
                    
                    // echo $sql_query;
                    $sql_view= mysqli_query($connection ,$sql_query);
                    //var_dump($sql_view);
                     while($rows=mysqli_fetch_array($sql_view)){
                
                ?>
                <tr>
                   <td><?php echo $rows['branch_code']; ?></td>
                  <td><?php echo $rows['branch_name']; ?></td>
                  <td><?php echo $rows['address']; ?></td>                  
                  
                  
                 
                   
                 <td> <a class="btn  btn-sm  btn-warning"  href="editBranch.php?branch_code=<?php echo $rows['branch_code']; ?>"><i class="fa fa-edit"></i></a></td>
                    
					<td> <a class="btn  btn-sm  btn-warning"  href="viewBranchDetails.php?branch_code=<?php echo $rows['branch_code']; ?>"><i class="fa fa-list"></i></a></td>
                    
                   
                
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
