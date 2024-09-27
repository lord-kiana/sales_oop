<?php
require_once('../actions/require_login.php');
require_once "../classes/Product.php";

$product = new Product();
$products = $product->displayProducts();

// Initialize cart if it's not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle adding a product to the cart
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Fetch product details
    $product_details = $product->displaySpecificProduct($product_id);
    
    // Check if the requested quantity exceeds available stock
    $current_cart_quantity = isset($_SESSION['cart'][$product_id]) ? $_SESSION['cart'][$product_id]['quantity'] : 0;
    $total_requested_quantity = $current_cart_quantity + $quantity;

    if ($product_details && $total_requested_quantity <= $product_details['quantity']) {
        // Add to cart with the selected quantity
        if (!isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] = ['name' => $product_details['product_name'], 'price' => $product_details['price'], 'quantity' => $quantity];
        } else {
            // Update quantity if product is already in the cart
            $_SESSION['cart'][$product_id]['quantity'] += $quantity;
        }
    } else {
        // Display an error message if requested quantity exceeds stock
        echo "<p class='text-danger'>Not enough stock available for this product.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cashiering Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">My Cashiering App</a>
        <div class="ms-auto">
            <a href="../actions/logout.php" class="btn btn-danger">Logout</a>
        </div>
        </div>
    </nav>

<body>
    <div class="container mt-5">
        <h1 class="display-4 text-center">Cashiering Dashboard</h1>

        <!-- Manage Inventory Button -->
        <div class="text-end mb-3">
            <a href="manage-inventory.php" class="btn btn-success">Manage Inventory</a>
        </div>

        <!-- Select Products and Add to Cart -->
        <h2>Select Products</h2>
        <form action="dashboard.php" method="post" class="mb-3">
            <div class="mb-3">
                <label for="product_id" class="form-label">Product</label>
                <select name="product_id" id="product_id" class="form-select" required>
                    <?php foreach ($products as $p): ?>
                        <option value="<?= $p['id']; ?>"><?= $p['product_name']; ?> (Stock: <?= $p['quantity']; ?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
            </div>
            <button type="submit" name="add_to_cart" class="btn btn-primary">Add to Cart</button>
        </form>

        <!-- View Cart / Checkout Button -->
        <div class="text-end mt-3">
            <a href="cart.php" class="btn btn-success">View Cart / Checkout</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
