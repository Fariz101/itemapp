<?php
include_once("config.php");

$id = $_GET['id'];
$stmt = $mysqli->prepare("SELECT * FROM items WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title>
</head>

<body style="font-family:Poppins; background:#f4f6f9;">

<div style="width:40%; margin:50px auto; background:white; padding:30px; border-radius:10px;">

<h2>Edit Item</h2>

<form action="update.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $data['id']; ?>">
    <input type="hidden" name="old_photo" value="<?= $data['photo_filename']; ?>">

    <input type="text" name="item_name" value="<?= $data['item_name']; ?>"><br><br>
    <input type="text" name="item_code" value="<?= $data['item_code']; ?>"><br><br>
    <input type="text" name="category" value="<?= $data['category']; ?>"><br><br>

    <img src="uploads/<?= $data['photo_filename']; ?>" width="100"><br><br>

    <input type="file" name="photo"><br><br>

    <button type="submit" name="update">Update</button>
</form>

</div>

</body>
</html>