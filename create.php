<!DOCTYPE html>
<html>
<head>
    <title>Add Item</title>

    <style>
        body { font-family: Poppins; background: #f4f6f9; }
        .container {
            width: 40%;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }
        button {
            background: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            width: 100%;
            border-radius: 5px;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>Add Item</h2>

    <form action="store.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="item_name" placeholder="Item Name" required>
        <input type="text" name="item_code" placeholder="Item Code" required>
        <input type="text" name="category" placeholder="Category" required>
        <input type="file" name="photo" required>
        <button type="submit" name="submit">Save</button>
    </form>
</div>

</body>
</html>