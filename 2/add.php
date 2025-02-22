<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="text" class="form-control" name="name" placeholder="Enter name" required>
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" name="email" placeholder="Enter email" required>
            </div>
            <div class="mb-3">
                <input type="file" class="form-control" name="img" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

<?php
include("../dbcon.php");
$query = "SELECT * FROM students";
$stmt = $conn->prepare($query);
$stmt->execute();
$students = $stmt->fetchAll(PDO::FETCH_OBJ);

foreach($students as $student) {
    echo "<p>" . htmlspecialchars($student->name) . "</p>";
    echo"<p>". htmlspecialchars($student->email) . "</p>";
    echo "<p>". htmlspecialchars($student->img) . "</p>";
}
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
include("../dbcon.php");

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];

    $img = $_FILES['img']['name'];
    $tmp_name = $_FILES['img']['tmp_name'];
    $upload_dir = "upload/";
    
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }
    
    $path = $upload_dir . $img;
    
    if(move_uploaded_file($tmp_name, $path)) {
        $query = "INSERT INTO `students`(`name`, `email`, `img`) VALUES (:name, :email, :img)";
        $run = $conn->prepare($query);
        $result = $run->execute([
            ':name' => $name,
            ':email' => $email,
            ':img' => $img
        ]);
        
        if($result) {
            echo "<div class='alert alert-success'>Student added successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'>Error adding student!</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Error uploading file!</div>";
    }
}
?>