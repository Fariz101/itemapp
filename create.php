<!DOCTYPE html>
<html>
<head>
    <title>Add Item</title>
</head>
<body>

<h2>Add New Item</h2>
<a href="index.php">← Back</a>

<form action="store.php" method="POST" enctype="multipart/form-data">
    Item Name: <input type="text" name="item_name" required><br><br>
    Item Code: <input type="text" name="item_code" required><br><br>
    Category: <input type="text" name="category" required><br><br>
    Photo: <input type="file" name="photo" required><br><br>
    <button type="submit" name="submit">Save</button>
</form>

</body>
</html>