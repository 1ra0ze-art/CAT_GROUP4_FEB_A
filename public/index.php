<?php
// IRAKOZE Fredy Reg No:25/30941s

/**
 * Main Controller - public/index.php
 * Handles POST requests to save data to MySQL
 * Handles GET requests to fetch and display all saved records
 */

// Include database connection
require_once __DIR__ . '/../config/db.php';

$success_message = '';
$records = [];

// Handle POST request - Save data to MySQL
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input
    $client = trim($_POST['client'] ?? '');
    $service = trim($_POST['service'] ?? '');
    $quantity = intval($_POST['quantity'] ?? 0);
    $price = floatval($_POST['price'] ?? 0);
    $total = floatval($_POST['total'] ?? 0);
    $date = date('Y-m-d');

    // Validate required fields
    if (!empty($client) && !empty($service) && $quantity > 0 && $price >= 0) {
        try {
            // Prepare and execute insert statement
            $stmt = $pdo->prepare("INSERT INTO records (client, service, quantity, price, total, date) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$client, $service, $quantity, $price, $total, $date]);
            
            $success_message = "Record saved successfully!";
        } catch (PDOException $e) {
            die("Error saving record: " . $e->getMessage());
        }
    }
}

// Handle GET request - Fetch all records
try {
    $stmt = $pdo->query("SELECT client, service, total, date FROM records ORDER BY id DESC");
    $records = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Error fetching records: " . $e->getMessage());
}

// Include the view file
require_once __DIR__ . '/../app/views/create.php';

