<?php 
include_once 'dbConnection.php';
if(session_id() == '' || !isset($_SESSION))
 {session_start();} 
 error_reporting(0); 
echo $_SESSION['designation'];
echo $_SESSION['branch_code'];
	/*function checkPFAvailability(){
		$sql="SELECT ejd.employee_id FROM employee_job_details ejd WHERE ejd.employee_id NOT IN (SELECT employee_id FROM provident_fund) AND DATEDIFF(NOW(),job_parmanent_date)/365>=5";

		 $result=mysqli_query($connection ,$sql);
        if(mysqli_num_rows($result) => 1){
        	$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
        	foreach ($row as $emp) {
        		$employee_id = $emp->employee_id;

        		$sql1 = "INSERT INTO `provident_fund` (`employee_id`,`pf_start_date`,`pf_status`,`first_balance`) VALUES('$employee_id',NOW(),'Active',0");
        	}

        }

        $sql="SELECT * FROM employee_job_details WHERE employee_id NOT IN (SELECT employee_id FROM gratuity_details)";


     $result=mysqli_query($connection ,$sql);
     
     
        if(mysqli_num_rows($result) >= 1){
         // echo mysqli_num_rows($result) ;
          while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
               $joindate=date($row['job_parmanent_date']);
               $mindate=date('2015/07/01');
               $today =date("Y/m/d");

               if ($joindate<$mindate){

                $crd = new DateTime();

                $old = new DateTime('2015/07/01');
                $diff =  $old->diff($crd)->y;
                // echo $diff."<br>"; 
                if ($diff>=5){
                     $emp =$row['employee_id'];
                     $sqls = "SELECT basic FROM salary WHERE employee_id='$emp' ORDER BY id DESC LIMIT 1 ";
                     $results=mysqli_query($connection ,$sqls);  
                      $data = mysqli_fetch_assoc($results);
                    
                      $gratuity_total = 12 * $data['basic'];
                      

                          $sql1 = "INSERT INTO `gratuity_details` (`employee_id`,`gratuity_approved_date`,`first_balance`) VALUES('$emp',NOW(),$gratuity_total)";
                           $result1=mysqli_query($connection ,$sql1);
                         
                          $last_id = mysqli_insert_id($connection);
                          echo $last_id;
                          $sql2= "INSERT INTO employee_gratuity (`gratuity_details_id`,`deposite_type`,`gratuity_amount`) VALUES($last_id,'Main Gratuity',$gratuity_total)";

                          echo $sql2;
                           $result2=mysqli_query($connection ,$sql2);

                         

                          
                 }
               
               }else{
                         $crd = new DateTime();
                
                $old = new DateTime($row['job_parmanent_date']);
                $diff =  $old->diff($crd)->y;
                
                if ($diff>=5){
                     $emp =$row['employee_id'];
                     $sqls = "SELECT basic FROM salary WHERE employee_id='$emp' ORDER BY id DESC LIMIT 1 ";
                     $results=mysqli_query($connection ,$sqls);  
                      $data = mysqli_fetch_assoc($results);
                    
                      $gratuity_total = 12 * $data['basic'];
                      

                          $sql1 = "INSERT INTO `gratuity_details` (`employee_id`,`gratuity_approved_date`,`first_balance`) VALUES('$emp',NOW(),$gratuity_total)";
                           $result1=mysqli_query($connection ,$sql1);
                         
                          $last_id = mysqli_insert_id($connection);
                          $sql2= "INSERT INTO employee_gratuity (`gratuity_details_id`,`deposite_type`,`gratuity_amount`) VALUES($last_id,'Main Gratuity',$gratuity_total)";

                           $result2=mysqli_query($connection ,$sql2);  
                 }
               }
               

          }    
        }*/

 ?>