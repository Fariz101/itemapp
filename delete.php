<?php
include_once("config.php");

$id = $_GET['id'];

$result = $mysqli->query("SELECT photo_filename FROM items WHERE id=$id");
$data = $result->fetch_assoc();

$stmt = $mysqli->prepare("DELETE FROM items WHERE id=?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    if (!empty($data['photo_filename']) && file_exists("uploads/" . $data['photo_filename'])) {
        unlink("uploads/" . $data['photo_filename']);
    }
    header("Location: index.php");
}
?>