<?php
require_once("db.php"); // Using require_once for better error handling
$db = new Database();
$employees = $db->getAllEmployees();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Employees List</title>
</head>
<body>
    <div class="container mt-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Department</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (is_array($employees) && !empty($employees)) {
                    foreach ($employees as $employee) {
                        echo "<tr>";
                        echo "<td>" . $employee['id'] . "</td>";
                        echo "<td>" . $employee['name'] . "</td>";
                        echo "<td>" . $employee['email'] . "</td>";
                        echo "<td>" . $employee['phone'] . "</td>";
                        echo "<td>" . $employee['gender'] . "</td>";
                        echo "<td>" . $employee['department'] . "</td>";
                        echo "<td>
                            <a href='update.php?id=" . $employee['id'] . "' class='btn btn-sm btn-primary'>Edit</a>
                            <a href='delete.php?id=" . $employee['id'] . "' class='btn btn-sm btn-danger'>Delete</a>
                        </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>No employees found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
