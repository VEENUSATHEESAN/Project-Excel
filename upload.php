<?php
require 'vendor/autoload.php'; // If using Composer

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

// Database connection
$conn = new mysqli('localhost', 'root', '', 'student_db');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['upload'])) {
    // Check if the file was uploaded without errors
    if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $fileName = $_FILES['file']['tmp_name'];

        // Check if the file is not empty
        if ($_FILES['file']['size'] > 0) {
            try {
                // Load the Excel file
                $spreadsheet = IOFactory::load($fileName);
                $sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

                // Insert each row into the database, skipping the header row
                $isFirstRow = true;
                foreach ($sheet as $row) {
                    if ($isFirstRow) {
                        $isFirstRow = false;
                        continue; // Skip header row
                    }

                    $name = $row['A'];
                    $email = $row['B'];
                    $phone = $row['C'];
                    $address = $row['D'];

                    // Check if the record already exists
                    $checkQuery = "SELECT * FROM students WHERE email = ? AND phone = ?";
                    $stmtCheck = $conn->prepare($checkQuery);
                    $stmtCheck->bind_param("ss", $email, $phone);
                    $stmtCheck->execute();
                    $resultCheck = $stmtCheck->get_result();

                    if ($resultCheck->num_rows == 0) {
                        // If no existing record found, insert new data
                        $insertQuery = "INSERT INTO students (name, email, phone, address) VALUES (?, ?, ?, ?)";
                        $stmtInsert = $conn->prepare($insertQuery);
                        $stmtInsert->bind_param("ssss", $name, $email, $phone, $address);
                        $stmtInsert->execute();
                    }
                }

                echo "Data Imported Successfully!";
            } catch (Exception $e) {
                echo "Error loading file: " . $e->getMessage();
            }
        } else {
            echo "Please upload a valid Excel file.";
        }
    } else {
        echo "Error during file upload. Error code: " . $_FILES['file']['error'];
    }
}
?>
