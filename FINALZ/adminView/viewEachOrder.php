<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>S.N.</th>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
            </tr>
        </thead>
        <?php
        include_once "../config/dbconnect.php";
        $orderID = $_GET['orderID'];
        $sql = "SELECT * FROM order_details AS d
                INNER JOIN product_size_variation AS v ON v.variation_id = d.variation_id
                INNER JOIN product AS p ON p.product_id = v.product_id
                WHERE d.order_id = $orderID";
        $result = $conn->query($sql);
        $count = 1;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?= $count ?></td>
                    <td><img height="80px" src="<?= $row["product_image"] ?>"></td>
                    <td><?= $row["product_name"] ?></td>
                    <td><?= $row["quantity"] ?></td>
                    <td><?= $row["price"] ?></td>
                </tr>
                <?php
                $count++;
            }
        } else {
            echo "<tr><td colspan='5'>No items found for this order.</td></tr>";
        }
        ?>
    </table>
</div>
