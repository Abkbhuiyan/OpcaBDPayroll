<?php 
include 'dbConnection.php';
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
 $user_id = $_SESSION['id'];
 ?>



<?php 

function getNewEmployeeId(){
  $connection = mysqli_connect("localhost", "root","", "opcabd_org");
    $query="SELECT `employee_id` from `employee_details` ORDER BY `employee_id` DESC LIMIT 1";

   if( $result = mysqli_query($connection,$query)){
   $row = mysqli_fetch_assoc($result);

  
      $abc= $row['employee_id'];
$numbers = preg_replace('/[^0-9]/', '', $abc);
return "opcabdemp".($numbers+1);
    }

}
include_once 'head.php';
  
?>

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Admin</b>Protal</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>Protal</span>
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
     
     // if ($_SESSION['id']){
        echo $_SESSION['massage'];
    //  }
        echo $_SESSION['massagedd'];
        unset($_SESSION['massagedd']);
    
      
      ?>
      <h1>
      New Employee Assigning
      </h1>
       
    </section>

     <script>
    function ajaxnew(feild){
      
      
      var nvalue = $("#"+feild).val();
         
        //alert(nvalue);
        var postForm = { //Fetch form data
            [feild]    : nvalue //Store name fields value
        };
  
       $.ajax({

                type: "POST",
                url: "classvalidator.php",
                dataType: "json",
                data: postForm,
                success : function(data){
                   if(typeof data["error_"+feild] !== 'undefined') {
             
                    $("."+feild+"Error").html("<span>"+data["error_"+feild]+"</span>");
                    $("."+feild+"Error").css("display","block");
                       $("."+feild+"Error").css("color","red");
                        
                   }
                     else{
                       $("."+feild+"Error").css("display","none");
                      
                     }
                          
                }

            });


    }
    </script>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row"> 
         
       <div class="col-md-8 col-md-offset-2">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Create new Employee Portal</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="addEmployee.php" method="post"  enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label   class="col-sm-3 control-label">Employee ID</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control"  required=""  name="employeeId"  id="employeeId" value="<?php echo getNewEmployeeId();?>" readonly="true" />
                    <div class="employeeIdError" style="display: none"></div>
                  </div>
                </div>

                <div class="form-group">
                  <label   class="col-sm-3 control-label">Employee Name</label>

                  <div class="col-sm-9">
                     <input type="text" class="form-control"  required=""  name="employeeName"  id="employeeName")" />
                    <div class="employeeNameError" style="display: none"></div>
                  </div>
                </div>
               
               <div class="form-group">
                  <label   class="col-sm-3 control-label">Father's Name</label>

                  <div class="col-sm-9">
                     <input type="text" class="form-control"  required=""  name="employeeFather"  id="employeeFather" />
                    <div class="employeeFatherError" style="display: none"></div>
                  </div>
                </div>


                 <div class="form-group">
                  <label   class="col-sm-3 control-label">Mother's Name</label>

                  <div class="col-sm-9">
                     <input type="text" class="form-control"  required=""  name="employeeMother"  id="employeeMother")" />
                    <div class="employeeIMotherError" style="display: none"></div>
                  </div>
                </div>

              <div class="form-group">
                  <label  class="col-sm-3 control-label">Address</label>

                  <div class="col-sm-9">
                     
                    <textarea rows="4" cols="50" required="" class="form-control" id="address" name="address" ></textarea>
                    
                  </div>
                </div>
          
                 <div class="form-group">
                  <label   class="col-sm-3 control-label">Phone No</label>

                  <div class="col-sm-9">
                     <input type="text" class="form-control"  required=""  name="phoneNo"  id="phoneNo")" />
                    <div class="phoneNoError" style="display: none"></div>
                  </div>
                </div>

                 <div class="form-group">
                  <label   class="col-sm-3 control-label">Email</label>

                  <div class="col-sm-9">
                     <input type="text" class="form-control"  required=""  name="email"  id="email")" />
                    <div class="emailError" style="display: none"></div>
                  </div>
                </div>
              
                 <div class="form-group">
                  <label   class="col-sm-3 control-label">Highest Education Level</label>

                  <div class="col-sm-9">
                     <input type="text" class="form-control"  required=""  name="highestEdu"  id="highestEdu")" />
                  </div>
                </div>

       
                
                <div class="form-group">
                  <label for="exampleInputFile" class="col-sm-3 control-label" >Employee Photo</label>
                   <div class="col-sm-9">
                  <input type="file" class="form-control"  required="" name="employeePhoto">
                    </div>
                   
                </div>


                <div class="form-group">
                  <label   class="col-sm-3 control-label">Blood Group</label>

                  <div class="col-sm-9">
                    <select name="bloodGroup"  required=""  class="form-control">
                      <option value="">Select One</option>             
                      <option value="A+">A+</option>
                      <option value="A-">A-</option>
                      <option value="B+">B+</option>
                      <option value="B-">B-</option>
                      <option value="AB+">AB+</option>
                      <option value="AB-">AB-</option>
                      <option value="O+">O+</option>
                      <option value="O-">O-</option>
                    </select>
                </div>
                </div>

              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default" name="cancell">Cancel</button>
                <button type="submit" name="addEmployee" class="btn btn-info pull-right">Assign New Employee</button>
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

    <section class="content">
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include_once 'footer.php';?>

  
</body>
</html>


