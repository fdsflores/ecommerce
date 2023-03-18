<?php
include_once "conn_db.php";

if(isset($_POST['order_id'])){
    $table = "flower_orders";
    
    $p_order_id = $_POST['order_id'];
    $p_delivery_date = $_POST['delivery_date'];

    // Retrieve order details
    $order_details = query($conn, "SELECT * FROM flower_orders WHERE order_id = '$p_order_id'");

    if($order_details){
        // Update delivery date in database
        $fields = array('delivery_date' => $p_delivery_date);
        $filter = array('order_id' => $p_order_id);

        if(update($conn, $table, $fields, $filter)){
            // Notify customer of successful update
            echo "<div class='alert alert-success'>Order delivery date updated successfully.</div>";
        }
        else{
            // Notify customer of failed update
            echo "<div class='alert alert-danger'>Failed to update delivery date.</div>";
        }
    }
    else{
        // Notify customer that order does not exist
        echo "<div class='alert alert-danger'>Order does not exist.</div>";
    }
}
?>