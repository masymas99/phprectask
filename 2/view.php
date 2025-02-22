<?php
include("../dbcon.php");
$query ="select * from students";
$stmt = $conn->prepare($query); 
$stmt->execute();
$students = $stmt->fetchAll(PDO::FETCH_OBJ);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($students as $student) {
              echo "<tr>";
              echo "<td>{$student->id}</td>";
              echo "<td>{$student->name}</td>";
              echo "<td>{$student->email}</td>";
              echo "<td><img src='upload/{$student->img}' width='50px' height='50px'></td>";
              echo "<td><a href='delete.php?id={$student->id}' class='btn btn-danger'>Delete</a></td>";
              echo "<td><a href='edit.php?id={$student->id}' class='btn btn-primary'>Edit</a></td>";
              echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>