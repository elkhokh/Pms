<?php require_once('inc/header.php'); ?>

<?php 

$orders = show_orders();
?>

<!-- Section -->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-12">
                <h4 class="mt-5">Orders List</h4>
                <?php if (!empty($orders)): ?>
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Notes</th>
                                <th>Cart Items</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order): ?>
                                <tr>
                                    <td><?= $order['id']; ?></td>
                                    <td><?=$order['name']; ?></td>
                                    <td><?= $order['email_ch']; ?></td>
                                    <td><?=$order['phone']; ?></td>
                                    <td><?=$order['address']; ?></td>
                                    <td><?=$order['notes']; ?></td>
                                    <td>
                                    
                                        <ul class="list-unstyled">
                                            <?php foreach ($order['cart'] as $item): ?>
                                                <li>
                                                    <strong><?php echo htmlspecialchars($item['name']); ?></strong> 
                                                    (ID: <?php echo $item['Product_id']; ?>, 
                                                    Price: $<?php echo number_format($item['price'], 2); ?>, 
                                                    Quantity: <?php echo $item['quantity']; ?>)
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </td>
                                    <td>$<?php echo number_format($order['total_price'], 2); ?></td>
                                    <td>
                                        <span class="badge <?php echo $order['status'] === 'pending' ? 'bg-warning' : 'bg-success'; ?>">
                                            <?php echo htmlspecialchars($order['status']); ?>
                                        </span>
                                    </td>
                                    <td><?php echo htmlspecialchars($order['created_at']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="alert alert-warning" role="alert">
                        No orders available.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php require_once('inc/footer.php'); ?>

