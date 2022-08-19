

<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{

function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
include 'conn/config.php';

$query1 = "SELECT * FROM exclusion_tab";
$data1=mysqli_query($conn,$query1);

$trip_id=$_GET['trip_id'];
$sql="SELECT add_clients.client_name,add_clients.trip_id,add_clients.client_phone,
add_clients.client_email,add_clients.date_from,add_clients.transfer,add_clients.travel_insur,add_clients.visa,
add_clients.date_to,add_clients.place_from,add_clients.adult,
add_clients.child,add_clients.price,add_clients.visa,
add_clients.flight_detail,add_clients.hotel_detail,itinry_day.itinray_day
            FROM add_clients
            INNER JOIN itinry_day
            ON add_clients.user_id=itinry_day.user_id WHERE add_clients.trip_id='$trip_id'";
$data=mysqli_query($conn,$sql);

// if(isset($_POST['btn_pdf']))
// {
while($row=mysqli_fetch_assoc($data)){ 
// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();


$pdf->Image('logo.png',53,6,100,);
    // Arial bold 15
    $pdf->SetFont('Arial','B',25);
    // Move to the right
    $pdf->Cell(80);
    // Title
    
    $pdf->Cell(60,10,"","","1","C");
    $pdf->Cell(60,10,"","","1","C");
    $pdf->Cell(60,10,"","","0","C");
    // $this->SetDrawColor(255,0,0);
    $pdf->SetTextColor(243, 36, 36);
    $pdf->SetFillColor(255, 255, 127);
    $pdf->Cell(65,10,''.$row['visa'].' Trip Quote',0,1,'C');
    $pdf->Ln(2);
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(1,1,"","3","","");
    $pdf->SetTextColor(250, 194, 19);
    
    $pdf->Cell(190,10,'No. Of Pax :'.$row['adult'].'A + '.$row['child'].'C | Dates :'.$row['date_from'].' , '.$row['date_to'].'',0,1,'C');
    $pdf->Ln(-1);
    $pdf->SetFont('Arial', 'B', 16);
    
    $pdf->SetTextColor(118, 74, 241);
    $pdf->Cell(190,10,'Package Cost : '.$row['price'].' For '.$row['adult'].' Adults + '.$row['child'].' Child',0,1,'C');
    $pdf->SetFont('','B',120);
    $pdf->Line(10,65,200,65);
    $pdf->Ln(10);












$pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(1,1,"","3","","");
    $pdf->SetTextColor(243, 36, 36);
    $pdf->Cell(0,10,'Flight :',0,1);
   // $pdf->SetFont('Times','',12);
   $pdf->Ln(-1);
   $pdf->SetFont('Arial', '', 11);
   $pdf->Cell(1,1,"","3","","");
   $pdf->SetTextColor(27, 26, 23);
   $pdf->Cell(0,10,''.$row['flight_detail'].'',0,1);
   $pdf->Ln(-3);
//    $pdf->Cell(1,1,"","3","","");
//    $pdf->Cell(0,10,''.$row['flight_detail'].'',0,1);
//    $pdf->Ln(-3);
//    $pdf->Cell(1,1,"","3","","");
//    $pdf->Cell(0,10,''.$row['flight_detail'].'',0,1);


   $pdf->Ln(1);
   $pdf->Cell(1,1,"","3","","");
   $pdf->Cell(0,10,'Flight Fare : '.$row['price'].' For '.$row['adult'].' Adults + '.$row['child'].' Child',0,1);
   $pdf->Ln(6);
   $pdf->SetFont('Arial', 'B',14);
   $pdf->Cell(1,1,"","3","","");
   $pdf->SetTextColor(243, 36, 36);
   $pdf->Cell(0,10,'Hotel :',0,1);
  // $pdf->SetFont('Times','',12);
  $pdf->Ln(-2);
  $pdf->SetFont('Arial', '', 11);
  $pdf->Cell(1,1,"","3","","");
  $pdf->SetTextColor(27, 26, 23);
  $pdf->Cell(0,10,''.$row['hotel_detail'].'',0,1);
  $pdf->Ln(-3);
//   $pdf->Cell(1,1,"","3","","");
//   $pdf->Cell(0,10,'04 - 07 Jun | Pacific Regency Hotel Suites (5*) | Premier Deluxe Suite with Breakfast ',0,1);



  $pdf->Ln(6);
   $pdf->SetFont('Arial', 'B', 14);
   $pdf->Cell(1,1,"","3","","");
   $pdf->SetTextColor(243, 36, 36);
   $pdf->Cell(0,10,'Itinerary: ',0,1);
  // $pdf->SetFont('Times','',12);
  $pdf->Ln(-1);
  $pdf->SetFont('Arial', '', 11);
  $pdf->Cell(1,1,"","3","","");
  $pdf->SetTextColor(27, 26, 23);
//   $pdf->Cell(0,10,'Day 1',0,1);
  $pdf->Ln(-2);
  $pdf->Cell(1,1,"","3","","");
  $pdf->Cell(0,10,''.$row['client_name'].' AT '.$row['visa'].':',0,1);
  $pdf->Ln(-4);
  $pdf->Cell(1,1,"","2","","");
  $pdf->Write(4,'
'.$row['itinray_day'].'');
 $pdf->Ln(15);
   $pdf->SetFont('Arial', 'B', 14);
   $pdf->Cell(1,1,"","3","","");
   $pdf->SetTextColor(243, 36, 36);
   $pdf->Cell(0,10,'Transfers :',0,1);
  // $pdf->SetFont('Times','',12);
  $pdf->Ln(-2);
  $pdf->SetFont('Arial', '', 11);
  $pdf->Cell(1,1,"","3","","");
  $pdf->SetTextColor(27, 26, 23);

  $pdf->Write(5,'
  '.$row['transfer'].'');
  
  $pdf->Ln(30);
  $pdf->SetFont('Arial', 'B', 14);
  $pdf->Cell(1,1,"","3","","");
  $pdf->SetTextColor(243, 36, 36);
  $pdf->Cell(0,10,'Travel Insurance :',0,1);

 $pdf->Ln(1);
 $pdf->SetFont('Arial', '', 11);
 $pdf->Cell(1,1,"","3","","");
 $pdf->SetTextColor(27, 26, 23);
 $pdf->Cell(0,10,''.$row['travel_insur'].'',0,1);


 $pdf->Ln(4);
  $pdf->SetFont('Arial', 'B', 14);
  $pdf->Cell(1,1,"","3","","");
  $pdf->SetTextColor(243, 36, 36);
  $pdf->Cell(0,10,'Visa :',0,1);

 $pdf->Ln(-1);
 $pdf->SetFont('Arial', '', 11);
 $pdf->Cell(1,1,"","3","","");
 $pdf->SetTextColor(27, 26, 23);
 $pdf->Cell(0,10,''.$row['visa'].'',0,1);

 $pdf->Ln(4);
  $pdf->SetFont('Arial', 'B', 14);
  $pdf->Cell(1,1,"","3","","");
  $pdf->SetTextColor(243, 36, 36);
  $pdf->Cell(0,10,'Exclusion :',0,1);
  $query1 = "SELECT * FROM exclusion_tab";
  $data1=mysqli_query($conn,$query1);
  
  while($row=mysqli_fetch_assoc($data1)){
 $pdf->Ln(-9);
 $pdf->SetFont('Arial', '', 11);
 $pdf->Cell(1,1,"","3","","");
 $pdf->SetTextColor(27, 26, 23);
 $pdf->Write(5,'
 '.$row['exclusion'].'');
  }

 

  
     

$pdf->Output();
}
// }
?>











