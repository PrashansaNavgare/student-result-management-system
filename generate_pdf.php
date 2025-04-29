<?php
require 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $roll_no = $_POST['roll_no'];

    // Fetch student info
    $student_info_query = "SELECT * FROM students WHERE roll_no = '$roll_no'";
    $student_result = $conn->query($student_info_query);
    $student_info = $student_result->fetch_assoc();

    // Fetch marks
    $student_id = $student_info['id'];
    $marks_query = "SELECT subject, marks FROM marks WHERE student_id = $student_id";
    $marks_result = $conn->query($marks_query);

    $html = "
        <h2>Student Result</h2>
        <p><strong>Name:</strong> {$student_info['name']}</p>
        <p><strong>Class:</strong> {$student_info['class']}</p>
        <p><strong>Roll No:</strong> {$student_info['roll_no']}</p>
        <h3>Marks:</h3>
        <table border='1' cellpadding='10' cellspacing='0'>
            <tr><th>Subject</th><th>Marks</th></tr>
    ";

    while ($row = $marks_result->fetch_assoc()) {
        $html .= "<tr><td>{$row['subject']}</td><td>{$row['marks']}</td></tr>";
    }

    $html .= "</table>";

    // Initialize DomPDF
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    // Output PDF
    $dompdf->stream("result_{$roll_no}.pdf", array("Attachment" => true));
}
?>