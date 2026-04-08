<?php include_once("config.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>ItemApp Dashboard</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f4f6f9;
            margin: 0;
        }

        .navbar {
            background: #1e1e2f;
            padding: 15px 30px;
            color: white;
            font-size: 20px;
            font-weight: bold;
        }

        .container {
            padding: 30px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
        }

        .btn {
            padding: 8px 15px;
            border-radius: 6px;
            text-decoration: none;
            color: white;
            font-size: 14px;
        }

        .btn-add { background: #4CAF50; }
        .btn-edit { background: #ffc107; }
        .btn-delete { background: #dc3545; }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background: #2c3e50;
            color: white;
            padding: 12px;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background: #f1f1f1;
        }

        img {
            width: 80px;
            border-radius: 8px;
        }
    </style>
</head>

<body>

<div class="navbar">📦 ItemApp Dashboard</div>

<div class="container">
    <div class="card">

        <a href="create.php" class="btn btn-add">+ Add Item</a>

        <table>
            <tr>
                <th>Item</th>
                <th>Code</th>
                <th>Category</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>

            <?php
            $result = $mysqli->query("SELECT * FROM items ORDER BY id DESC");
            while ($row = $result->fetch_assoc()) {
                $photo = "uploads/" . $row['photo_filename'];

                echo "<tr>";
                echo "<td>{$row['item_name']}</td>";
                echo "<td>{$row['item_code']}</td>";
                echo "<td>{$row['category']}</td>";
                echo "<td>";

                if (!empty($row['photo_filename']) && file_exists($photo)) {
                    echo "<img src='$photo'>";
                } else {
                    echo "No Image";
                }

                echo "</td>";
                echo "<td>
                        <a href='edit.php?id={$row['id']}' class='btn btn-edit'>Edit</a>
                        <a href='delete.php?id={$row['id']}' class='btn btn-delete' onclick='return confirm(\"Delete?\")'>Delete</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </table>

    </div>
</div>

</body>
</html>