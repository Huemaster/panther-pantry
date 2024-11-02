<?php
$servername = "localhost"; // Your server name
$username = "hue"; // Your database username
$password = "xampp"; // Your database password
$dbname = "Inventory"; // Your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch food items
$sql = "SELECT name, quantity, restock_date FROM food_items";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Inventory</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; text-align: left; border: 1px solid #ddd; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <h1>Food Inventory</h1>
    <table>
        <tr>
            <th>Food Item</th>
            <th>Quantity in Stock</th>
            <th>Restock Date</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . htmlspecialchars($row["name"]) . "</td>
                    <td>" . htmlspecialchars($row["quantity"]) . "</td>
                    <td>" . ($row["restock_date"] ? htmlspecialchars($row["restock_date"]) : 'N/A') . "</td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No items found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>