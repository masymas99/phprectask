<?php
include("../dbcon.php");
$id = $_GET["id"];
$query = "select * from students where id = ?";
$stmt = $conn->prepare($query); 
$stmt->execute([$id]);
$student = $stmt->fetch(PDO::FETCH_OBJ);

if (!$student) {
    die("Student not found");
}
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
    <form action="update.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($student->name); ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($student->email); ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="img">Image</label>
            <input type="file" name="img" class="form-control">
            <?php if($student->img): ?>
                <small class="form-text text-muted">Current image: <?php echo htmlspecialchars($student->img); ?></small>
            <?php endif; ?>
        </div>

        <input type="hidden" name="id" value="<?php echo htmlspecialchars($student->id); ?>">
        <button type="submit" name="submit" class="btn btn-primary">Update</button>
    </form>
</body>
</html>