<?php
include("db.php");
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    try {
        $db = new Database();
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $name = htmlspecialchars($_POST["name"]);
        $email = htmlspecialchars($_POST["email"]);
        $gender = htmlspecialchars($_POST["gender"]);
        $phone = htmlspecialchars($_POST["phone"]);
        $department = htmlspecialchars($_POST["department"]);

        if ($id && $name && $email && $gender && $department && $phone) {
            $result = $db->updateEmployee($id, $name, $email, $gender, $department, $phone);
            if ($result) {
                header("Location: view.php");
                exit();
            } else {
                echo '<div class="alert alert-danger">Error updating employee!</div>';
            }
        } else {
            echo '<div class="alert alert-danger">All fields are required.</div>';
        }
    } catch (Exception $e) {
        echo '<div class="alert alert-danger">Error: ' . htmlspecialchars($e->getMessage()) . '</div>';
    }
} else {
    header("Location: view.php");
    exit();
}
?>