<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("INSERT INTO inventory (name, quantity, price) VALUES (?, ?, ?)");
    $stmt->bind_param("sii", $name, $quantity, $price);

    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Add Inventory Item</h2>
    <form method="POST">
        <input type="text" name="name" placeholder="Item Name" required>
        <input type="number" name="quantity" placeholder="Quantity" required>
        <input type="text" name="price" placeholder="Price" required>
        <button type="submit">Add Item</button>
    </form>
</div>
</body>
</html>

