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
 
 

#myiframe {width:600px; height:100%;} 




<!--

.topnav .search-container button:hover {
  background: #ccc;
}

-->
</style>
  
    </head>    
    <body>    
        <link href = "registration.css" type = "text/css" rel = "stylesheet" />    <img src="ongc_logo.png" alt="ONGC logo" style="float:left;width:75px;height:75px;">
        <h2>ONGC Student Trainee Information System</h2>    
      <div class="topnav">
 <!-- <a href="main.php">Home</a>-->
 
  <a href="search.php">View</a>
   <a href="php_register.php">Insert</a>
 <a href="date_disp.php">Report</a>
 <div class="search-container">
    <form action="search.php" method="post">
      <input type="text" placeholder="Search.." name="search_q">
      <button type="submit">Submit</button>
    </form>
  </div>
 
 
 
 
			</div>
		  

<?php
   $conn= mysqli_connect("localhost", "root", "","form1") or die("Error connecting to database: ".mysql_error());
 
     
    $sql= mysqli_select_db($conn,"form1") or die(mysql_error());
	
   if (isset($_POST['search_q'])) {

    
$query = $_POST['search_q']; 
     
    $min_length = 0;?>
	<div style="margin-left:0%;padding:5px 16px;height:1000px;"> <form method="post" action="">
	<table align="center" style="overflow-x:auto;"><tr>
         <th></th>
		 <th>Name</th>
		<th>Course</th>
		<th>University</th>
		<th>Mentor Name</th>
		<th>Section of Training</th>
		<th>Period from</th>
		<th>Period to</th>
		<th></th><th></th></tr>
<?php
   
    if(strlen($query) >= $min_length){ 
         
        $query = htmlspecialchars($query); 
         
        $query = mysqli_real_escape_string($conn,$query);

        $raw_results = mysqli_query($conn,("SELECT * FROM details
            WHERE (('Mentor_Name' LIKE '%".$query."%') OR (`Section_of_Training` LIKE '%".$query."%')OR (`Name` LIKE '%".$query."%')OR (`Mentor_Name` LIKE '%".$query."%')OR (`Course` LIKE '%".$query."%')OR (`University` LIKE '%".$query."%')OR (`Period_from` LIKE '%".$query."%')OR (`Period_to` LIKE '%".$query."%'))")) or die(mysql_error());
        
        if(mysqli_num_rows($raw_results) > 0){ 
 
            while($results = mysqli_fetch_array($raw_results,MYSQLI_ASSOC)){
         ?>         
				
  <tr>
    <td><input type="checkbox" name="num[]" value="<?php echo $row['id']?>"/></td>
    <td><?php echo $results['Name'] ?></td>
    <td><?php echo $results['Course'] ?></td> 
    <td><?php echo $results['University'] ?></td>
	<td><?php echo $results['Mentor_Name'] ?></td>
	<td><?php echo $results['Section_of_Training'] ?></td>
	<td><?php echo $results['Period_from'] ?></td>
	<td><?php echo $results['Period_to'] ?></td>
	<td><a href="modify.php?id=<?php echo $results['id']?>" >Edit</a></td>
	<td><a href="delete.php?id=<?php echo $results['id']?>" onclick="return confirm('Are you sure you want to delete?')">Delete</a></td>
	<?php $report=$results['id'];
	$report2="report/".$report.'.'.'pdf';
	
	$letter=$results['id'];
	$letter2="letter/".$letter.'.'.'pdf';
	?>
	<td><a onclick="window.open('<?php echo "$report2" ?>','_blank');self.close()"><span style="cursor:pointer"><u>Project Report</u></span></a></td>
	<td><a onclick="window.open('<?php echo "$letter2" ?>','_blank');self.close()"><span style="cursor:pointer"><u>Approval Letter</u></span></a></td>
	
	  </tr>
	  
	  
	<?php  

            }?>
			<tr>
<td colspan="4" align="center" ><div class="delete_btn"><input name="submit1" type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete?')"></div></td>
</tr>
             
    <?php    } 
        else{
            echo "No results";
        }
         
    }
    else{ 
        echo "Minimum length is ".$min_length;
    }}?>
	
	</table></form></div>
	
	
	
		
		<div style="margin-left:0%;padding:5px 16px;height:1000px;"> 
		<form method="post" action=""><table align="center" style="overflow-x:auto;">
 <tr>
  <th></th>
  <th>Name</th> 
  <th>Course</th>
  <th>University</th>
  <th>Mentor Name</th>
  <th>Section of Training</th>
  <th>Period(from)</th>
  <th>Period(to)</th><th></th><th></th>
 </tr>
 <?php
$conn = mysqli_connect("localhost", "root", "", "form1");
  
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 
  $sql = "SELECT id,Name,Course, University, Mentor_Name, Section_of_Training, Period_from, Period_to FROM details";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
	   
	   ?>
    <tr>
	<td><input type="checkbox" name="num[]" value="<?php echo $row['id']?>"/></td>
	<td><?php echo $row['Name'] ?></td>
	<td><?php echo $row['Course'] ?></td>
	<td><?php echo $row['University'] ?></td>
	<td><?php echo $row['Mentor_Name'] ?></td>
	<td><?php echo $row['Section_of_Training'] ?></td>
	<td><?php echo $row['Period_from'] ?></td>
	<td><?php echo $row['Period_to'] ?></td>
	<td><a href="modify.php?id=<?php echo $row['id']?>" >Edit</a></td>
	<td><a href="delete.php?id=<?php echo $row['id']?>" onclick="return confirm('Are you sure you want to delete?')">Delete</a></td>
	<?php $report=$row['id'];
	$report2="report/".$report.'.'.'pdf';
	
	$letter=$row['id'];
	$letter2="letter/".$letter.'.'.'pdf';
	?>
	<td><a onclick="window.open('<?php echo "$report2" ?>','_blank');self.close()"><span style="cursor:pointer"><u>Project Report</u></span></a></td>
	<td><a onclick="window.open('<?php echo "$letter2" ?>','_blank');self.close()"><span style="cursor:pointer"><u>Approval Letter</u></span></a></td>
	
	
	
	</tr><?php
}
echo "</table>";
} 

?>
<tr>
<td colspan="4" align="center" ><div class="delete_btn"><input name="submit1" type="submit" value="Delete"></td></td>
</tr>


</table></form>
</div>
		
	<?php
	if(isset($_POST["submit1"]))
	{
		$box=$_POST['num'];
		while(list($key,$val)=@each($box))
		{
			mysqli_query($conn,"delete from details where id=$val");
		}
		header("location:search.php");
	}
	
	
	
	
	
	

	?>

</body>
</html>
<!--// fetch records
$result = @mysqli_query($con, "SELECT * FROM users") or die("Error: " . mysqli_error($con));

// delete records
if(isset($_POST['chk_id']))
{
    $arr = $_POST['chk_id'];
    foreach ($arr as $id) {
        @mysqli_query($con,"DELETE FROM users WHERE id = " . $id);
    }
    $msg = "Deleted Successfully!";
    header("Location: index.php?msg=$msg");
}





if(isset($_POST['delete_all']))
{
    $checkbox = $_POST['checkbox'];

for($i=0;$i<count($checkbox);$i++){

$del_id = $checkbox[$i];
$del = "DELETE FROM details where id='$del_id'";
//$del.= "('".implode("','",array_values($_POST['checkbox']))."')";
$result_del = mysqli_query($conn,$del);
}
if($result_del)
{
	header("Location:view.php");
}
 }


-->




