<?php
session_start();
include '../includes/db.php';
include '../includes/functions.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'user') {
    header('Location: /sklep-internetowy/login.php');
    exit();
}

if (isset($_GET['id'])) {
    $productId = intval($_GET['id']);
    $product = getProductById($productId);

    if ($product) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        $_SESSION['cart'][] = $product;
    }

    header('Location: /sklep-internetowy/user/cart.php');
    exit();
} else {
    echo "Brak podanego identyfikatora produktu.";
}
?>
