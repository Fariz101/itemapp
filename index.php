<?php include_once("config.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Item List</title>
    <style>
        body { font-family: Arial; margin: 40px; background: #f9f9f9; }
        table { border-collapse: collapse; width: 100%; background: white; }
        th, td { border: 1px solid #ddd; padding: 10px; }
        th { background: #333; color: white; }
        img { width: 100px; border-radius: 5px; }
        a { padding: 6px 12px; color: white; border-radius: 4px; text-decoration: none; }
        .add { background: #007bff; }
        .edit { background: #ffc107; }
        .delete { background: #dc3545; }
    </style>
</head>
<body>

<h2>Item List</h2>
<a href="create.php" class="add">+ Add New Item</a><br><br>

<table>
<tr>
    <th>Item Name</th>
    <th>Item Code</th>
    <th>Category</th>
    <th>Photo</th>
    <th>Action</th>
</tr>

<?php
$result = $mysqli->query("SELECT * FROM items ORDER BY id DESC");

while ($row = $result->fetch_assoc()) {
    $photo_path = "uploads/" . htmlspecialchars($row['photo_filename']);

    echo "<tr>";
    echo "<td>{$row['item_name']}</td>";
    echo "<td>{$row['item_code']}</td>";
    echo "<td>{$row['category']}</td>";
    echo "<td>";

    if (!empty($row['photo_filename']) && file_exists($photo_path)) {
        echo "<img src='$photo_path'>";
    } else {
        echo "No Image";
    }

    echo "</td>";
    echo "<td>
            <a href='edit.php?id={$row['id']}' class='edit'>Edit</a>
            <a href='delete.php?id={$row['id']}' class='delete' onclick='return confirm(\"Delete this item?\")'>Delete</a>
          </td>";
    echo "</tr>";
}
?>

</table>

</body>
</html>