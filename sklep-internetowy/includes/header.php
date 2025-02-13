<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Sklep Internetowy</title>
    <link rel="stylesheet" href="/sklep-internetowy/css/styles.css">
</head>
<body>
    <header>
        <div class="header-left">
            <?php if (isset($_SESSION['user'])): ?>
                <span>Witaj, <?php echo htmlspecialchars($_SESSION['user']['username']); ?>!</span>
                <a href="/sklep-internetowy/logout.php">Wyloguj</a>
            <?php else: ?>
                <a href="/sklep-internetowy/login.php" id="login-link">Zaloguj</a>
                <a href="/sklep-internetowy/register.php">Zarejestruj</a>
            <?php endif; ?>
        </div>
        <h1>Witamy w Żabce Online!</h1>
        <div class="header-right">
            <!-- Możesz dodać dodatkowe linki lub elementy tutaj -->
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="/sklep-internetowy/index.php">Strona główna</a></li>
            <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'administrator'): ?>
                <li><a href="/sklep-internetowy/admin/index.php">Panel administracyjny</a></li>
            <?php elseif (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'moderator'): ?>
                <li><a href="/sklep-internetowy/admin/manage_products.php">Zarządzaj produktami</a></li>
            <?php endif; ?>
            <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'user'): ?>
                <?php
                $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
                $cartCount = count($cart);
                ?>
                <li><a class="shopping" href="/sklep-internetowy/user/cart.php">Koszyk <span class="quantity"><?php echo $cartCount; ?></span></a></li>
                <li><a href="/sklep-internetowy/user/index.php">Produkty</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</body>
</html>
