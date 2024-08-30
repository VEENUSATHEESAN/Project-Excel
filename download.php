<?php
require 'vendor/autoload.php'; // If using Composer

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Database connection
$conn = new mysqli('localhost', 'root', '', 'student_db');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all student records from the database
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

// Create a new Spreadsheet object
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Adding headers to the Excel sheet
$sheet->setCellValue('A1', 'Name');
$sheet->setCellValue('B1', 'Email');
$sheet->setCellValue('C1', 'Phone');
$sheet->setCellValue('D1', 'Address');

$rowCount = 2; // Row to start adding data

// Loop through the database result set and add data to the sheet
while ($row = $result->fetch_assoc()) {
    $sheet->setCellValue('A' . $rowCount, $row['name']);
    $sheet->setCellValue('B' . $rowCount, $row['email']);
    $sheet->setCellValue('C' . $rowCount, $row['phone']);
    $sheet->setCellValue('D' . $rowCount, $row['address']);
    $rowCount++;
}

// Set the headers to force download of the file
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="student_data.xlsx"');
header('Cache-Control: max-age=0');

// Create the Excel file and output it to the browser for download
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

// Close the database connection
$conn->close();
?>
