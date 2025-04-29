<?php
session_start();
if(!isset($_SESSION['admin'])){
    header('Location: index.html');
    exit();
}

include 'db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $roll_no = $_POST['roll_no'];
    $name = $_POST['name'];
    $class = $_POST['class'];

    $sql = "INSERT INTO students (roll_no, name, class) VALUES ('$roll_no','$name','$class')";

    if($conn->query($sql) === TRUE){
        echo "<script>alert('Student added successfully'); window.location='dashboard.php'; </script>";
    }else{
        echo "<script>alert('Error: " . $conn->error ."'); </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Student</title>
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

        input[type="text"] {
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
    <h2>Add Student</h2>

    <form method="POST" action="">
        <label>Roll Number:</label>
        <input type="text" name="roll_no" required>

        <label>Name:</label>
        <input type="text" name="name" required>

        <label>Class:</label>
        <input type="text" name="class" required>

        <button type="submit">Add Student</button>
    </form>

    <a href="dashboard.php" class="back-link">← Back to Dashboard</a>
</div>

</body>
</html>