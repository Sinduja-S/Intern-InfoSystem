<?php 
$host = "localhost"; 
$user = "root"; 
$password = ""; 
$dbname = "form1"; 

$con = mysqli_connect($host, $user, $password,$dbname);

if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}
?>
<!doctype html>
<html>
<head><title>ONGC Student Trainee Information System
</title>
</head>
 <body >
 <h2><center>ONGC Student Trainees</center></h2>
   <!-- CSS -->
   <link href='jquery-ui.min.css' rel='stylesheet' type='text/css'>

   <!-- Script -->
   <script src='jquery-3.3.1.js' type='text/javascript'></script>
   <script src='jquery-ui.min.js' type='text/javascript'></script>
   <script type='text/javascript'>
   $(document).ready(function(){
     $('.dateFilter').datepicker({
        dateFormat: "yy-mm-dd"
     });
   });
   </script>

   <!-- Search filter -->
  <center> <form method='post' action=''>
     Start Date <input type='date' class='dateFilter' name='fromDate' value='<?php if(isset($_POST['fromDate'])) echo $_POST['fromDate']; ?>'>
 
     End Date <input type='date' class='dateFilter' name='endDate' value='<?php if(isset($_POST['endDate'])) echo $_POST['endDate']; ?>'>

     <br/><br/><input type='submit' name='but_search' value='Search'></form>
	 <form method='post' action='date.php'><input type='hidden' name='fromDate' value='<?php echo $_POST['fromDate'];?>'>
	 <input type='hidden' name='endDate' value='<?php echo $_POST['endDate'];?>'><input type='submit' name='print' value='Print'></form>
	 
	 
	 </center>

   <!-- Employees List -->
   <div style='height: 80%; overflow: auto;' >
 
     <table border='1' width='100%' style='border-collapse: collapse;margin-top: 20px;'>
       <tr>
         <th>Name</th> 
  <th>Course</th>
  <th>University</th>
  <th>Mentor Name</th>
  <th>Section of Training</th>
  <th>Period(from)</th>
  <th>Period(to)</th>
       </tr>

       <?php
      $emp_query = "SELECT * FROM details WHERE 1 ";

       // Date filter
       if(isset($_POST['but_search'])){
          $fromDate = $_POST['fromDate'];
          $endDate = $_POST['endDate'];

          if(!empty($fromDate) && !empty($endDate)){
             $emp_query .= " and Period_from 
                          between '".$fromDate."' and '".$endDate."' ";
          }
        }

        // Sort
        $emp_query .= " ORDER BY Period_from DESC";
        $employeesRecords = mysqli_query($con,$emp_query);

        // Check records found or not
        if(mysqli_num_rows($employeesRecords) > 0){
          while($row = mysqli_fetch_assoc($employeesRecords)){
         
			$Name = $row['Name'];
            $Course = $row['Course'];
            $University = $row['University'];
            $Mentor_Name = $row['Mentor_Name'];
            $Section_of_Training = $row['Section_of_Training'];
			 $Period_from = $row['Period_from'];
			  $Period_to = $row['Period_to'];

           echo "<tr>";
            echo "<td>". $Name ."</td>";
            echo "<td>". $Course ."</td>";
            echo "<td>". $University ."</td>";
            echo "<td>". $Mentor_Name ."</td>";
			echo "<td>". $Section_of_Training ."</td>";
			echo "<td>". $Period_from ."</td>";
			echo "<td>". $Period_to ."</td>";
			
            echo "</tr>";
          }
        }else{
          echo "<tr>";
          echo "<td colspan='4'>No record found.</td>";
          echo "</tr>";
        }
        ?>
      </table>
 
    </div>
	
 </body>
</html>
  	   