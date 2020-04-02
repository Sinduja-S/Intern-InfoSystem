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
        <form name = "form1" action="php_register.php" method = "post" enctype = "multipart/form-data" >    
            <div class = "container">    
                <div class = "form_group">    
                    <label>Name:</label>    
                    <input type = "text" name = "Name" value = "" required/>    
                </div>    
                <div class = "form_group">    
                    <label>Course:</label>  
					<!--<input type = "text" name = "course" value = "" required/>    	-->				
                    <select name="Course">
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
                    <input type = "text" name = "University" value = "" required/>    
                </div>    
                <div class = "form_group">    
                    <label>Mentor Name:</label>    
                    <input type = "text" name = "Mentor_Name" value = "" required/>    
                </div>  
				<div class = "form_group">    
                    <label>Section of Training:</label>    
                    <input type = "text" name = "Section_of_Training" value = "" required/>    
                </div> 	
				<div class = "form_group">    
                    <label>Period:</label>    
                    <input type = "date" name = "Period_from" value = "" required/>  to  <input type = "date" name = "Period_to" value = "" required/> 
                </div> 
				
    
<?php  
      $servername = "localhost";  
       $username = "root";  
       $password = "";  
       $conn = mysqli_connect ($servername , $username , $password) or die("unable to connect to host");  
       $sql = mysqli_select_db ($conn,'form1') or die("unable to connect to database"); 
	   
	   $Name="";
	    $Course="";
		 $University="";
		  $Mentor_Name="";
		   $Section_of_Training="";
		    $Period_from=""; 
			 $Period_to="";
      
	   
	   if(isset($_POST['submit'])){
		   $Name = $_POST['Name'];
		    $Course = $_POST['Course'];
			 $University = $_POST['University'];
			  $Mentor_Name = $_POST['Mentor_Name'];
			   $Section_of_Training = $_POST['Section_of_Training'];
			    $Period_from = $_POST['Period_from'];
				 $Period_to = $_POST['Period_to'];
	   }
		 if($Name!=null && $Course!=null && $University!=null &&$Mentor_Name!=null &&$Section_of_Training!=null &&$Period_from!=null &&$Period_to!=null)
		{
		$query1 = mysqli_query($conn,"insert into details(Name,Course, University, Mentor_Name, Section_of_Training, Period_from, Period_to) values ('$Name','$Course','$University','$Mentor_Name','$Section_of_Training','$Period_from','$Period_to')");
		
		}

		?>
		<div class = "form_group">    
                    <label>Project Report:</label> 
					<!--<input type="hidden" name="id" value="">-->
				<input type="file" name="report" value="fileupload" id="fileupload" accept="application/pdf"> 
				<label for="fileupload"><div class= "file"> Select a file to upload (PDF)</div></label> 
				<!--<input type="submit" name= "submit1" value="Submit"> -->
				</div>
				<div class = "form_group">    
                    <label>Approval Letter:</label> 
				<!--	<input type="hidden" name="id" value="">-->
				<input type="file" name="letter" value="fileupload" id="fileupload" accept="application/pdf">
				<label for="fileupload"><div class= "file">Select a file to upload (PDF)</div></label> 
				<!--<input type="submit" name="submit2" value="Submit"> -->
				</div>
				
		
	
		<?php
		
$conn=mysqli_connect('localhost', 'root', '','form1') or die(mysql_error());
$sql=mysqli_select_db($conn,"form1") or die(mysql_error());


$query = mysqli_query($conn,"SELECT * FROM details WHERE Name = '$Name'") or die(mysql_error());
    while($row = mysqli_fetch_array($query,MYSQLI_ASSOC)){
	$id = $row['id'];
	$Name=$row['Name'];}
		
   if(isset($_FILES['report'])){
      $errors= array();
	  
      $file_name = $_FILES['report']['name'];
      $file_size =$_FILES['report']['size'];
      $file_tmp =$_FILES['report']['tmp_name'];
      $file_type=$_FILES['report']['type'];
      $temp1=explode(".",$file_name);

	   $new_filename=$id.'.'.end($temp1);
      
        if(end($temp1)!="pdf")
		{
			echo "Only PDF files are accepted";
		}
        else
		{
    
         move_uploaded_file($file_tmp,"report/".$new_filename);
	  
		}
         
   }
   
   if(isset($_FILES['letter'])){
      $errors= array();
	  
      $file_name = $_FILES['letter']['name'];
      $file_size =$_FILES['letter']['size'];
      $file_tmp =$_FILES['letter']['tmp_name'];
      $file_type=$_FILES['letter']['type'];
      $temp2=explode(".",$file_name);
	 
	   
	   $new_filename= $id.'.'.end($temp2);
  
     if(end($temp2)!="pdf")
		{
			echo "Only PDF files are accepted";
		}
        else
		{
         move_uploaded_file($file_tmp,"letter/".$new_filename);
		 
		}

	  
         
   }
   
   
  
?><input type="submit" value="Submit" name="submit" style="width= 250px; height: 50px"/>
            </div>    
        </form>    
  
		
		  </body>    
</html>    








 <!-- if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a PDF file.";
      }
      
      if($file_size > 209715200){
         $errors[]='File size exceeded';
      }
      
      if(empty($errors)==true){   
		  ////
		   echo "Success";
      }else{
         print_r($errors);
      }
		 
		/////
		if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a PDF file.";
      }
      
      if($file_size > 209715200){
         $errors[]='File size exceeded]';
      }
      
      if(empty($errors)==true){ 
		  //////
	  
	  echo "Success";
      }else{
         print_r($errors);
      }
	   
		  
		  
		  
		  
		  
		  -->
