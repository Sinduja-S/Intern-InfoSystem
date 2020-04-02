   	   <?php
require('mysql_table.php');


class PDF extends PDF_MySQL_Table
{
	function Header()
{
  
    $this->SetFont('Arial','',18);
    $this->Cell(0,6,'ONGC Student Trainee Details',0,1,'C');
    $this->Ln(10);

    parent::Header();
}
}


$link = mysqli_connect('localhost','root','','form1');
$sql= mysqli_select_db($link,"form1") or die(mysql_error());
 if (isset($_POST['print'])) {
	 $fromDate = $_POST['fromDate'];
$endDate = $_POST['endDate'];
$pdf = new PDF();
$pdf->AddPage();
$pdf->Cell(20);
$pdf->Cell(10, 7, 'Start date :' . $fromDate . '');
$pdf->Cell(80);

$pdf->Cell(10, 7, 'End date :' . $endDate . '');
$pdf->Ln();


$pdf->AddCol('Name',20,'','C');
$pdf->AddCol('Course',70,'','C');
//$pdf->AddCol('University',30,'','C');
$pdf->AddCol('Mentor_Name',35,'Mentor Name','C');
//$pdf->AddCol('Section_of_Training',50,'Section of Training','C');
$pdf->AddCol('Period_from',25,'Period from','C');
$pdf->AddCol('Period_to',25,'Period to','C');



 $datefilter="SELECT Name,Course, Mentor_Name, Period_from, Period_to FROM details WHERE Period_from between '".$fromDate."' and '".$endDate."'";}


$pdf->Table($link,$datefilter);
$pdf->AddPage();
$pdf->Output();
?>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	


       {
      function Header()
       {
       //Title
       $this->Image('eagle.png',10,6,30);
        $this->Image('eagle.png',170,6,30);
       $this->SetFont('Arial','',18);
       $this->Cell(0,6,'Range Report',0,1,'C');
       $this->Ln(20);
        //Ensure table header is output
        parent::Header();
        }
        } 

$host = "localhost"; 
$user = "root"; 
$password = ""; 
$dbname = "form1"; 

$con = mysqli_connect($host, $user, $password,$dbname);

if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}

 $pdf=new myPDF();
        $pdf->Open();
        $pdf->AddPage();
         //table: specify 4 columns
        $pdf->AddCol('Name',20,'Name','C');
        $pdf->AddCol('Course',30,'Course','L');
        $pdf->AddCol('University',40,'University','L');
         $pdf->AddCol('Mentor_Name',60,'Mentor_Name','L');
         $pdf->AddCol('Section_of_Training',20,'Section_of_Training','R');
         $pdf->AddCol('Period_from',20,'Period_from','R');
        $prop=array('HeaderColor'=>array(255,150,100),
        'color1'=>array(210,245,255),
        'color2'=>array(255,255,210),
        'padding'=>2);
        $fromDate=$_Post['fromDate'];
        $endDate=$_POST['endDate'];
         $pdf->Table("SELECT * FROM details WHERE Period_from between '" . $fromDate . "' AND '" . 
         $endDate . "' order by Period_from ASC",$prop);

        

           $pdf->Output();
            ?>
