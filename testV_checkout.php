<?php
//connect to database
$db = mysqli_connect('localhost', 'username', 'password', 'database_name');

//retrieve item details from URL parameters
$item_id = $_GET['id'];
$item_name = $_GET['name'];
$item_price = $_GET['price'];
$item_qty = $_POST['quantity'];

//retrieve user details from form
$username = $_POST['username'];
$contact_number = $_POST['contact_number'];
$address = $_POST['address'];
$recipient_name = $_POST['recipient_name'];

//check if user already exists
$query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($db, $query);
if (mysqli_num_rows($result) == 0) {
    //insert new user if not yet existing
    $query = "INSERT INTO users (username, contact_number, address) VALUES ('$username', '$contact_number', '$address')";
    mysqli_query($db, $query);
}

//retrieve user ID
$query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);
$user_id = $row['id'];

//insert new order
$query = "INSERT INTO orders (item_id, user_id, item_qty) VALUES ('$item_id', '$user_id', '$item_qty')";
mysqli_query($db, $query);

//close database connection
mysqli_close($db);
?>