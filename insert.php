<?php
$servername = "sql201.rmhost.eu.org";
$username = "rmusr_36300017";
$password = "12345678";
$dbname = "rmusr_36300017_customerdata";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into Customers table
$customerName = $_POST['customerName'];
$email = $_POST['email'];
$city = $_POST['city'];
$country = $_POST['country'];

$sql = "INSERT INTO Customers (CustomerName, Email, City, Country) VALUES ('$customerName', '$email', '$city', '$country')";
if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully into Customers table!<br>";
} else {
    echo "Error inserting into Customers table: " . $conn->error;
}

// Insert data into Products table
$productName = $_POST['productName'];
$category = $_POST['category'];

$sql = "INSERT INTO Products (ProductName, Category) VALUES ('$productName', '$category')";
if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully into Products table!<br>";
} else {
    echo "Error inserting into Products table: " . $conn->error;
}

// Insert data into Orders table
$orderDate = date('Y-m-d');
$totalAmount = $_POST['quantity'] * $_POST['price'];

$sql = "INSERT INTO Orders (CustomerID, OrderDate, TotalAmount) VALUES (LAST_INSERT_ID(), '$orderDate', '$totalAmount')";
if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully into Orders table!<br>";
} else {
    echo "Error inserting into Orders table: " . $conn->error;
}

// Insert data into OrderDetails table
$quantity = $_POST['quantity'];
$price = $_POST['price'];

$sql = "INSERT INTO OrderDetails (OrderID, ProductID, Quantity, Price) VALUES (LAST_INSERT_ID(), LAST_INSERT_ID(), '$quantity', '$price')";
if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully into OrderDetails table!<br>";
} else {
    echo "Error inserting into OrderDetails table: " . $conn->error;
}

// Close connection
$conn->close();
?>
