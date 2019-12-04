<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
       
      <!-- search form -->
       
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header"></li>
        
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Employee Info</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if ($_SESSION['userType']==1 || $_SESSION['designation']=="miso") { ?>
            <li class=""><a href="newEmployeeRegister.php"><i class="fa fa-circle-o"></i> New Employee Entry</a></li>          
            <li class=""><a href="allEmployeeList.php"><i class="fa fa-circle-o"></i> All Employee List</a></li>
            <?php } else{   ?>
             <li class=""><a href="branchWiseEmployeeList.php"><i class="fa fa-circle-o"></i> Employee List</a>
              <?php } ?>
          </ul>
        </li>
         <?php if ($_SESSION['userType']==1 || $_SESSION['designation']=="miso") { ?>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Branch Info</span>
            <span class="pull-right-container">
              
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="newBranchRegistration.php"><i class="fa fa-circle-o"></i>New Branch Opening</a></li>              
             <li><a href="allBrancheList.php"><i class="fa fa-circle-o"></i> Current Branches</a></li>
          </ul>
        </li>
        <?php } ?>

        <li class="treeview">
          <a href="addMedicineCLass.php">
            <i class="fa fa-files-o"></i>
            <span>Employee Salary Info</span>
            <span class="pull-right-container">
              
            </span>
          </a>
          <ul class="treeview-menu">
           <?php if($_SESSION['designation']=="bm" || $_SESSION['designation']=="am") { ?>  
          
            <li><a href="employeeSalary.php"><i class="fa fa-circle-o"></i>Give Salary</a></li>              
             <li><a href=""><i class="fa fa-circle-o"></i> Show Salary Details</a></li>
          
          <?php }
          if ($_SESSION['designation']=="miso" || $_SESSION['userType']==1) { ?>
            <li><a href=""><i class="fa fa-circle-o"></i> Show Salary Details</a></li>
         <?php } ?> 

          </ul>
        </li>
        
  
    </section>
    <!-- /.sidebar -->
  </aside>
  <?php //}elseif($_SESSION['user_cat_id']==2){ ?>
 

 