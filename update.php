<?php
include_once("config.php");

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['item_name'];
    $code = $_POST['item_code'];
    $category = $_POST['category'];
    $photo = $_POST['old_photo'];

    if ($_FILES['photo']['error'] == 0) {
        $new_photo = uniqid() . '-' . $_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/" . $new_photo);

        if (!empty($photo) && file_exists("uploads/" . $photo)) {
            unlink("uploads/" . $photo);
        }

        $photo = $new_photo;
    }

    $stmt = $mysqli->prepare("UPDATE items SET item_name=?, item_code=?, category=?, photo_filename=? WHERE id=?");
    $stmt->bind_param("ssssi", $name, $code, $category, $photo, $id);
    $stmt->execute();

    header("Location: index.php");
}
?>