<?php 
require_once('inc/header.php'); 

$orders = show_orders();
?>

<!-- Section -->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-12">
                <!-- Page Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="mt-5 fw-bold text-primary"><i class="bi bi-list-check me-2"></i>Orders List</h4>
                    <a href="control_admin.php" class="btn btn-outline-primary btn-sm"><i class="bi bi-arrow-left me-2"></i>Back to Dashboard</a>
                </div>

                <?php if (!empty($orders)): ?>
                    <!-- Orders Table -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover shadow-sm">
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
                                        <td class="fw-bold text-muted"><?= $order['id']; ?></td>
                                        <td><?= htmlspecialchars($order['name']); ?></td>
                                        <td>
                                            <a href="mailto:<?= htmlspecialchars($order['email_ch']); ?>" class="text-decoration-none">
                                                <i class="bi bi-envelope-fill me-1 text-primary"></i><?= htmlspecialchars($order['email_ch']); ?>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="tel:<?= htmlspecialchars($order['phone']); ?>" class="text-decoration-none">
                                                <i class="bi bi-telephone-fill me-1 text-success"></i><?= htmlspecialchars($order['phone']); ?>
                                            </a>
                                        </td>
                                        <td><?= htmlspecialchars($order['address']); ?></td>
                                        <td>
                                            <?php if ($order['notes']): ?>
                                                <span class="text-muted"><?= htmlspecialchars($order['notes']); ?></span>
                                            <?php else: ?>
                                                <span class="text-muted fst-italic">No notes</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <ul class="list-unstyled mb-0">
                                                <?php foreach ($order['cart'] as $item): ?>
                                                    <li class="mb-1">
                                                        <strong class="text-primary"><?= htmlspecialchars($item['name']); ?></strong><br>
                                                        <small>ID: <?= htmlspecialchars($item['Product_id']); ?>, Price: $<?= number_format($item['price'], 2); ?>, Quantity: <?= htmlspecialchars($item['quantity']); ?></small>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </td>
                                        <td class="fw-bold text-success">$<?= number_format($order['total_price'], 2); ?></td>
                                        <td>
                                            <span class="badge fs-6 py-2 px-3 <?= $order['status'] === 'pending' ? 'bg-warning text-dark' : 'bg-success'; ?>">
                                                <?= htmlspecialchars($order['status']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <small><i class="bi bi-calendar-date me-1 text-muted"></i><?= htmlspecialchars($order['created_at']); ?></small>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <!-- No Orders Message -->
                    <div class="alert alert-warning d-flex align-items-center" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2 fs-4"></i>
                        <div>No orders available at the moment.</div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php require_once('inc/footer.php'); ?>