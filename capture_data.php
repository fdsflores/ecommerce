<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];
    if (empty($item_name) || empty($item_price)) {
        echo "Please fill in all required fields.";
    } else {
        $db_host = "localhost";
        $db_user = "username";
        $db_pass = "password";
        $db_name = "database_name";
        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO products (item_name, item_price) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "si", $item_name, $item_price);
        mysqli_stmt_execute($stmt);
        if (mysqli_stmt_error($stmt)) {
            echo "Error: " . mysqli_stmt_error($stmt);
        } else {
            echo "Product added successfully!";
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
}
?>