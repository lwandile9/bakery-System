<?php
require_once "dbh.inc.php";

if (isset($_POST['action'])) {
    if ($_POST['action'] === 'addToCart') {
        $productName = $_POST['productName'];

        // Check if the product already exists in the cart
        $stmt = $conn->prepare("SELECT * FROM cart WHERE productName = ?");
        $stmt->bind_param("s", $productName);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if ($result->num_rows > 0) {
            // Product exists, update cart quantity
            $row = $result->fetch_assoc();
            $cartQuantity = $row['cartQuantity'] + 1;
            $stmt = $conn->prepare("UPDATE cart SET cartQuantity = ? WHERE productName = ?");
            $stmt->bind_param("is", $cartQuantity, $productName);
            $stmt->execute();
            $stmt->close();
        } else {
            // Product does not exist, insert into cart
            $cartQuantity = 1;
            $stmt = $conn->prepare("INSERT INTO cart (productName, cartQuantity) VALUES (?, ?)");
            $stmt->bind_param("si", $productName, $cartQuantity);
            $stmt->execute();
            $stmt->close();
        }
    } elseif ($_POST['action'] === 'getCart') {
        // Retrieve cart data
        $cart = [];
        $result = $conn->query("SELECT * FROM cart");
        while ($row = $result->fetch_assoc()) {
            $cart[] = $row;
        }
        echo json_encode($cart);
    }
}
