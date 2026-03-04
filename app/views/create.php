<?php
// UMUBYEYI Angel Reg No:25/30495

/**
 * Create Record Form View
 * Contains the HTML form with service dropdown, client input, quantity, price, and live total
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Records</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Service Records</h1>
            
            <!-- Success Message -->
            <?php if (isset($success_message)): ?>
                <div class="alert success"><?php echo htmlspecialchars($success_message); ?></div>
            <?php endif; ?>

            <!-- Record Form -->
            <form id="recordForm" method="POST" action="../public/index.php">
                <div class="form-group">
                    <label for="client">Client Name</label>
                    <input type="text" id="client" name="client" required placeholder="Enter client name">
                </div>

                <div class="form-group">
                    <label for="service">Service</label>
                    <select id="service" name="service" required>
                        <option value="">Select a service</option>
                        <option value="Potato Order">Potato Order</option>
                        <option value="Event Ticket">Event Ticket</option>
                        <option value="Home-stay Booking">Home-stay Booking</option>
                    </select>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" id="quantity" name="quantity" required min="1" value="1">
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" id="price" name="price" required min="0" step="0.01" value="0.00">
                    </div>
                </div>

                <div class="form-group total-display">
                    <label for="total">Total</label>
                    <input type="text" id="total" name="total" readonly value="0.00">
                </div>

                <button type="submit" class="btn-submit">Save Record</button>
            </form>
        </div>

        <!-- Records Table -->
        <?php if (!empty($records)): ?>
        <div class="card table-card">
            <h2>Saved Records</h2>
            <table class="records-table">
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Service</th>
                        <th>Total</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($records as $record): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($record['client']); ?></td>
                            <td><?php echo htmlspecialchars($record['service']); ?></td>
                            <td>$<?php echo number_format($record['total'], 2); ?></td>
                            <td><?php echo htmlspecialchars($record['date']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>
    </div>

    <script src="../assets/js/app.js"></script>
</body>
</html>

