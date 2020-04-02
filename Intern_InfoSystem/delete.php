

<html>
<body>
<?php
        $conn=mysqli_connect('localhost','root','','form1');
        if($conn){
            if (isset($_GET["id"])) {
            $query = "DELETE FROM details WHERE id = " . $_GET["id"];
            $result = mysqli_query($conn, $query);
           
            if(!$result){
                echo 'error'.mysqli_error($conn);
            }
            else{
                echo 'success';
				header("Location:search.php");
            }

            }
        }

    ?>
	</body>
	</html>