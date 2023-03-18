<!DOCTYPE html>
<html>
<head>
    <title>Order Now</title>
</head>
<body>
    <h1>Available Items:</h1>
    <table>
        <thead>
            <tr>
                <th>Item ID</th>
                <th>Item Name</th>
                <th>Item Price</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //connect to database
            $db = mysqli_connect('localhost', 'username', 'password', 'database_name');
            //retrieve items from products table
            $query = "SELECT * FROM products";
            $result = mysqli_query($db, $query);
            //display items in a table
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['price']."</td>";
                echo "<td><input type='number' name='quantity' value='1' min='1'></td>";
                echo "<td><a href='checkout.php?id=".$row['id']."&name=".$row['name']."&price=".$row['price']."'>Buy Now</a></td>";
                echo "</tr>";
            }
            mysqli_close($db);
            ?>
        </tbody>
    </table>
</body>
</html>