<?php
include("db.php");
$db = new Database();

if(isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id = intval($_GET["id"]); 
    $sql = $db->deleteEmployee($id);
    header("Location: view.php");
} else {
    // Handle invalid ID
    echo "Invalid ID provided";
    exit();
}
?>