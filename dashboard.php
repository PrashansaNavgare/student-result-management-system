<?php
session_start();
if(!isset($_SESSION['admin'])){
    header('Location: index.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .dashboard-container {
            max-width: 600px;
            margin: 80px auto;
            background-color: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .dashboard-container h2 {
            margin-bottom: 10px;
        }

        .dashboard-container p {
            font-size: 18px;
            margin-bottom: 25px;
        }

        .dashboard-buttons {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .dashboard-buttons a button {
            padding: 12px;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
        }

        .dashboard-buttons a button:hover {
            background-color: #0056b3;
        }

        .dashboard-buttons a.logout button {
            background-color: #dc3545;
        }

        .dashboard-buttons a.logout button:hover {
            background-color: #b02a37;
        }
    </style>
</head>
<body>

<div class="dashboard-container">
    <h2>Welcome to Admin Dashboard</h2>
    <p>Hello, <?= $_SESSION['admin']; ?>!</p>

    <div class="dashboard-buttons">
        <a href="add_student.php"><button>Add Student</button></a>
        <a href="enter_marks.php"><button>Enter Marks</button></a>
        <a href="view_result.php"><button>View Result</button></a>
        <a href="logout.php" class="logout"><button>Logout</button></a>
    </div>
</div>

</body>
</html>