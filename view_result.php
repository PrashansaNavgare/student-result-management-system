<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: index.html');
    exit();
}

include 'db.php';

$student_info = null;
$student_marks = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $roll_no = $_POST['roll_no'];

    $sql = "SELECT * FROM students WHERE roll_no = '$roll_no'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $student_info = $result->fetch_assoc();

        $id = $student_info['id'];
        $marks_sql = "SELECT subject, marks FROM marks WHERE student_id = $id";
        $marks_result = $conn->query($marks_sql);

        if ($marks_result->num_rows > 0) {
            while ($row = $marks_result->fetch_assoc()) {
                $student_marks[] = $row;
            }
        }
    } else {
        echo "<script>alert('Roll number not found');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Result</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .container {
            max-width: 600px;
            margin: 80px auto;
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input[type="text"] {
            padding: 10px;
            margin-bottom: 20px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button {
            padding: 12px 20px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .result-box {
            margin-top: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>View Student Result</h2>

    <form method="POST" action="">
        <label>Enter Roll Number:</label>
        <input type="text" name="roll_no" required>
        <button type="submit">Search</button>
    </form>

    <a href="dashboard.php" class="back-link">← Back to Dashboard</a>

    <?php if ($student_info): ?>
    <div class="result-box">
        <h3>Student Info</h3>
        <p><strong>Name:</strong> <?= $student_info['name']; ?></p>
        <p><strong>Class:</strong> <?= $student_info['class']; ?></p>
        <p><strong>Roll No:</strong> <?= $student_info['roll_no']; ?></p>

        <?php if (!empty($student_marks)): ?>
            <h3>Marks</h3>
            <table>
                <tr><th>Subject</th><th>Marks</th></tr>
                <?php foreach ($student_marks as $mark): ?>
                    <tr>
                        <td><?= $mark['subject']; ?></td>
                        <td><?= $mark['marks']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table><br>
            <form action="generate_pdf.php" method="POST" target="_blank">
                <input type="hidden" name="roll_no" value="<?= $student_info['roll_no']; ?>">
                <button type="submit">Download PDF</button>
            </form>
        <?php else: ?>
            <p>No marks found for this student.</p>
        <?php endif; ?>
    </div>
    <?php endif; ?>
</div>

</body>
</html>