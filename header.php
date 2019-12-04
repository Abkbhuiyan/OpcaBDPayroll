<?php //$user_id = $_SESSION['id']; ?>
<nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
             
            <ul class="dropdown-menu">
               
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                   
                  <!-- end message -->
                  <li>
                     
                  </li>
                   
                   
                   
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
             
            <ul class="dropdown-menu">
               
               
               
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
           
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               
              <span class="hidden-xs">
              <?php 
              $sql_view = "SELECT * FROM `employee_details` where employee_id ='$user_id'";
              //echo $sql_view;
              $sql_result=mysqli_query($connection ,$sql_view);
              
              $user_name=mysqli_fetch_assoc($sql_result);
             // mysql_fetch_assoc('');
              echo $user_name['employee_name'];          
              
              ?>
              
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
               
              <!-- Menu Body -->
               
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
           
        </ul>
      </div>
    </nav>