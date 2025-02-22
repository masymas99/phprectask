<?php
$title = ($_POST['gender'] === 'male' ? 'Mr.' : 'Miss');
$fullName = $_POST['firstName'] . ' ' . $_POST['lastName'];

$skills = isset($_POST['skills']) ? implode(", ", $_POST['skills']) : 'None';
$data = "\n-------------------\nDate: " . date('Y-m-d H:i:s') .
    "\nName: $fullName\n" .
    "Address: {$_POST['address']}\n" .
    "Skills: $skills\n" .
    "Department: {$_POST['department']}\n";

file_put_contents('dataread.txt', $data, FILE_APPEND);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submission Review</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Thanks <?php echo $title . ' ' . $fullName; ?>!</h2>
        
        <div class="mt-4">
            <h4>Please Review Your Information:</h4>
            <div class="card">
                <div class="card-body">
                    <p><strong>Name:</strong> <?php echo ($fullName); ?></p>
                    <p><strong>Address:</strong> <?php echo ($_POST['address']); ?></p>
                    <p><strong>Your Skills:</strong> <?php echo ($skills); ?></p>
                    <p><strong>Department:</strong> <?php echo ($_POST['department']); ?></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>