<?php
include_once("config.php");

if (isset($_POST['submit'])) {
    $name = $_POST['item_name'];
    $code = $_POST['item_code'];
    $category = $_POST['category'];
    $photo_name = '';

    if ($_FILES['photo']['error'] == 0) {
        $target_dir = "uploads/";
        $photo_name = uniqid() . '-' . basename($_FILES['photo']['name']);
        move_uploaded_file($_FILES['photo']['tmp_name'], $target_dir . $photo_name);
    }

    $stmt = $mysqli->prepare("INSERT INTO items(item_name, item_code, category, photo_filename) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $code, $category, $photo_name);

    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>