<?php 
$con = mysqli_connect("localhost", "root", "", "course");
 
if ($con == false) {
 die("ERROR: Could not connect. "
 .mysqli_connect_error());
}
require_once('tc-lib-pdf/src/Text.php');
$pdf = new Com\Tecnick\Pdf\ClassObjects\TCPDF();

$pdf = new TCPDF();
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('My PDF');

$pdf->AddPage();
$pdf->SetFont('times', 'I', 12);
$pdf->Cell(0, 10, 'Hello, World!', 0, 1, 'C');

$pdf->Output('output.pdf', 'I');


$sql = "SELECT * FROM Student";
if ($res = mysqli_query($con, $sql)) {
 if (mysqli_num_rows($res) > 0) {
 echo "<table>";
 echo "<tr>";
 echo "<th>Student Name</th>";
 echo "</tr>";
 while ($row = mysqli_fetch_array($res)) {
 echo "<tr>";
 echo "<td>".$row['Name']."</td>";
 echo "</tr>";
 }
 echo "</table>";
 }
 else {
 echo "No matching records are found.";
 }
}
else {
 echo "ERROR: Could not able to execute $sql. "
 .mysqli_error($con);
}
mysqli_close($con);

?>