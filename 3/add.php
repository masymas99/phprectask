<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container mt-4">
        <form action="add.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" name="phone" id="phone" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label>Gender:</label>
                <div class="form-check">
                    <input type="radio" name="gender" value="male" id="male" class="form-check-input" required>
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="gender" value="female" id="female" class="form-check-input">
                    <label class="form-check-label" for="female">Female</label>
                </div>
            </div>
            
            <div class="form-group">
                <label>Department:</label>
                <div class="form-check">
                    <input type="radio" name="department" value="backend" id="backend" class="form-check-input" required>
                    <label class="form-check-label" for="backend">Backend</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="department" value="frontend" id="frontend" class="form-check-input">
                    <label class="form-check-label" for="frontend">Frontend</label>
                </div>
            </div>
            
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
        <button  class="btn btn-primary"><a class="text-light" href="view.php">Back</a></button>
    </div>
</body>
</html>
<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    try {
        $db = new Database();
        $name=htmlspecialchars($_POST["name"]);
        $email=htmlspecialchars($_POST["email"]);
        $gender= htmlspecialchars($_POST["gender"]);
        $phone=htmlspecialchars($_POST["phone"]);
        $department=htmlspecialchars($_POST["department"]);
        
  

        if ($name && $email && $gender && $department && $phone) {
            $result = $db->addEmployee($name, $email, $gender, $department, $phone);
            if ($result) {
                echo '<div class="alert alert-success">Employee added successfully!</div>';
            } else {
                echo '<div class="alert alert-danger">Error adding employee!</div>';
            }
        } else {
            echo '<div class="alert alert-danger">Please fill all required fields!</div>';
        }
    } catch (Exception $e) {
        echo '<div class="alert alert-danger">' . htmlspecialchars($e->getMessage()) . '</div>';
    }
}
?>