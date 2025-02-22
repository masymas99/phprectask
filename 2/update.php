<?php
include("../dbcon.php");

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    
    // Initialize query parts
    $query = "UPDATE students SET name = :name, email = :email";
    $params = [
        ':name' => $name,
        ':email' => $email,
        ':id' => $id
    ];

    // Handle file upload if new file is selected
    if (!empty($_FILES['img']['name'])) {
        $img = $_FILES['img']['name'];
        $tmp_name = $_FILES['img']['tmp_name'];
        $upload_dir = "upload/";

        // Create directory if it doesn't exist
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        // Generate unique filename
        $file_extension = pathinfo($img, PATHINFO_EXTENSION);
        $new_filename = uniqid() . '.' . $file_extension;
        $path = $upload_dir . $new_filename;

        if (move_uploaded_file($tmp_name, $path)) {
            $query .= ", img = :img";
            $params[':img'] = $new_filename;
        } else {
            die("<div class='alert alert-danger'>Error uploading file!</div>");
        }
    }

    // Complete the query
    $query .= " WHERE id = :id";
    
    try {
        $stmt = $conn->prepare($query);
        $result = $stmt->execute($params);

        if ($result) {
            header("Location: view.php");
            exit();
        } else {
            echo "<div class='alert alert-danger'>Error updating student!</div>";
        }
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger'>Database error: " . htmlspecialchars($e->getMessage()) . "</div>";
    }
}
