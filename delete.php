<?php
$host = 'localhost';
$dbname = 'my_database';
$user = 'my_username';
$password = 'my_password';
try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}
if(isset($_POST['delete_button'])) {
    $item_id = $_POST['item_id'];
    $stmt = $db->prepare("DELETE FROM items WHERE id = ?");
    $stmt->execute([$item_id]);
    header("Location: display_items.php");
    exit;
}
?>