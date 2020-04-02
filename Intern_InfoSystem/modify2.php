<?php
$conn=mysqli_connect('localhost', 'root', '','form1') or die(mysqli_error($conn));
$sql=mysqli_select_db($conn,"form1") or die(mysqli_error($conn));

    $ud_id = (int)$_POST["id"];

    $ud_Name = mysqli_real_escape_string($conn,$_POST["ud_Name"]);
    $ud_Course = mysqli_real_escape_string($conn,$_POST["ud_Course"]);
    $ud_University = mysqli_real_escape_string($conn,$_POST["ud_University"]);
    $ud_Mentor_Name = mysqli_real_escape_string($conn,$_POST["ud_Mentor_Name"]);
	$ud_Section_of_Training = mysqli_real_escape_string($conn,$_POST["ud_Section_of_Training"]);
	$ud_Period_from = mysqli_real_escape_string($conn,$_POST["ud_Period_from"]);
	$ud_Period_to = mysqli_real_escape_string($conn,$_POST["ud_Period_to"]);

    $query="UPDATE details
            SET Name = '$ud_Name', Course = '$ud_Course', University = '$ud_University', Mentor_Name = '$ud_Mentor_Name', Section_of_Training = '$ud_Section_of_Training', Period_from = '$ud_Period_from', Period_to = '$ud_Period_to'
            WHERE id='$ud_id'";


$query1=mysqli_query($conn,$query)or die(mysqli_error($conn));


if(mysqli_affected_rows($conn)>=1){
    header("Location:search.php");
}else{
	header("Location:search.php");
    echo "<p>($ud_id) Not Updated<p>";}
?>
			