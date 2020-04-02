<html>    
    <head>    
        <title>ONGC Student Trainee Information System</title>  
		<style>
body {
  margin: 0;
}
.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 16px 40px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
  </style>
    </head>    
    <body>    
       <link href = "registration.css" type = "text/css" rel = "stylesheet" />     <img src="ongc_logo.png" alt="ONGC logo" style="float:left;width:75px;height:75px;"> 
        <h2>ONGC Student Trainee Information System</h2>    
      <div class="topnav">
  <!--<a href="main.php">Home</a>-->
  
  <a href="search.php">View</a>
  <a href="php_register.php">Insert</a>  
  <a href="date_disp.php">Report</a>
			</div>
			
			
	<?php
$conn=mysqli_connect('localhost', 'root', '','form1') or die(mysql_error());
$sql=mysqli_select_db($conn,"form1") or die(mysql_error());

$id = (int)$_GET['id'];
$query = mysqli_query($conn,"SELECT * FROM details WHERE id = '$id'") or die(mysql_error());

if(mysqli_num_rows($query)>=1){
    while($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
        $Name = $row['Name'];
        $Course = $row['Course'];
        $University = $row['University'];
        $Mentor_Name = $row['Mentor_Name'];
		$Section_of_Training = $row['Section_of_Training'];
		$Period_from = $row['Period_from']; 
		$Period_to = $row['Period_to'];
		
    }

?>



<form action="modify2.php" method="post">
<input type="hidden" name="id" value="<?=$id;?>">
            <div class = "container">    
                <div class = "form_group">    
                    <label>Name:</label>    
                    <input type = "text" name = "ud_Name" value = "<?=$Name?>"/>    
                </div>    
                <div class = "form_group">    
                    <label>Course:</label>  
					<input type = "text" name = "ud_Course" value = "<?=$Course?>"/>    			
                    <select>
					<option value="MBA(HR)">MBA (HR)</option>
					<option value="MBA(Finance)">MBA (Finance)</option>
					<option value="Geology">Geology</option>
					<option value="Chemistry">Chemistry</option>
					<option value="Petroleum Engineering">Petroleum Engineering</option>
					<option value="Chemical Engineering">Chemical Engineering</option>
					<option value="Computer Science and Engineering">Computer Science and Engineering</option>
					<option value="Information Technology">Information Technology</option>
					<option value="Electronics and Telecommunications Engineering">Electronics and Telecommunications Engineering</option>
					<option value="Law">Law</option>
					<option value="Environment Science">Environment Science</option>
					<option value="Logistics">Logistics</option>
					</select>    
                </div>    
                <div class = "form_group">    
                    <label>University:</label>    
                    <input type = "text" name = "ud_University" value = "<?=$University?>"/>    
                </div>    
                <div class = "form_group">    
                    <label>Mentor Name:</label>    
                    <input type = "text" name = "ud_Mentor_Name" value = "<?=$Mentor_Name?>"/>    
                </div>  
				<div class = "form_group">    
                    <label>Section of Training:</label>    
                    <input type = "text" name = "ud_Section_of_Training" value = "<?=$Section_of_Training?>"/>    
                </div> 	
				<div class = "form_group">    
                    <label>Period:</label>    
                    <input type = "date" name = "ud_Period_from" value = "<?=$Period_from?>"/>  to  <input type = "date" name = "ud_Period_to" value = "<?=$Period_to?>"/> 
                </div> 
			
				<input type="submit" value="Submit" name="submit" style="width= 250px; height: 50px"/>
            </div>    
        </form> 
		
<?php
}else{
    echo 'No entry found.';
}
?>		




	
	</body>		
	</html>