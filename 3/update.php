<?php 
include("db.php");

// Get employee data first
$db = new Database();
if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    header("Location: view.php");
    exit();
}

$id = $_GET["id"];
$emp = $db->getEmployeeById($id);

if (!$emp) {
    header("Location: view.php");
    exit();
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
<div class="container mt-4">
        <form action="edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($emp['id']); ?>">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" 
                    value="<?php echo htmlspecialchars($emp['name']); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" 
                    value="<?php echo htmlspecialchars($emp['email']); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" name="phone" id="phone" class="form-control" 
                    value="<?php echo htmlspecialchars($emp['phone']); ?>" required>
            </div>
            
            <div class="form-group">
                <label>Gender:</label>
                <div class="form-check">
                    <input type="radio" name="gender" value="male" id="male" class="form-check-input" 
                        <?php echo ($emp['gender'] === 'male') ? 'checked' : ''; ?> required>
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="gender" value="female" id="female" class="form-check-input"
                        <?php echo ($emp['gender'] === 'female') ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="female">Female</label>
                </div>
            </div>
            
            <div class="form-group">
                <label>Department:</label>
                <div class="form-check">
                    <input type="radio" name="department" value="backend" id="backend" class="form-check-input"
                        <?php echo ($emp['department'] === 'backend') ? 'checked' : ''; ?> required>
                    <label class="form-check-label" for="backend">Backend</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="department" value="frontend" id="frontend" class="form-check-input"
                        <?php echo ($emp['department'] === 'frontend') ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="frontend">Frontend</label>
                </div>
            </div>
            
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
            <a href="view.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>
