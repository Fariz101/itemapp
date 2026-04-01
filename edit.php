<?php
include_once("config.php");

$id = $_GET['id'];

$stmt = $mysqli->prepare("SELECT * FROM items WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();
?>

<h2>Edit Item</h2>

<form action="update.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $data['id']; ?>">
    <input type="hidden" name="old_photo" value="<?= $data['photo_filename']; ?>">

    Item Name: <input type="text" name="item_name" value="<?= $data['item_name']; ?>"><br><br>
    Item Code: <input type="text" name="item_code" value="<?= $data['item_code']; ?>"><br><br>
    Category: <input type="text" name="category" value="<?= $data['category']; ?>"><br><br>

    <img src="uploads/<?= $data['photo_filename']; ?>" width="120"><br>
    Change Photo: <input type="file" name="photo"><br><br>

    <button type="submit" name="update">Update</button>
</form>