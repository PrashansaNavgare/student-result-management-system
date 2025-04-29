<?php
session_start();
if(!isset($_SESSION['admin'])){
    header('Location: index.html');
    exit();
}

include 'db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $student_id = $_POST['student_id'];
    $subject = $_POST['subject'];
    $marks = $_POST['marks'];

    $sql = "INSERT INTO marks (student_id, subject, marks) VALUES ('$student_id','$subject','$marks')";

    if($conn->query($sql) === TRUE){
        echo "<script>alert('Marks added successfully'); windows.location='dashboard.php'; </script>";
    }else{
        echo "<script>alert('Error: " . $conn->error . "'); </script>";
    }
}
$students = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enter Marks</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .container {
            max-width: 500px;
            margin: 80px auto;
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 6px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        select {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button {
            padding: 12px;
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
    </style>
</head>
<body>

<div class="container">
    <h2>Enter Student Marks</h2>

    <form method="POST" action="">
        <label>Select Student:</label>
        <select name="student_id" required>
            <option value="">--Select Student--</option>
            <?php
            if ($students->num_rows > 0) {
                while ($row = $students->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['roll_no'] . " - " . $row['name'] . "<option>";
                }
            }
            ?>
        </select>

        <label>Subject:</label>
        <input type="text" name="subject" required>

        <label>Marks:</label>
        <input type="number" name="marks" required>

        <button type="submit">Add Marks</button>
    </form>

    <a href="dashboard.php" class="back-link">← Back to Dashboard</a>
</div>

</body>
</html>