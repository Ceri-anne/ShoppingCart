<?php
include 'common.php';

include 'lib/Cart/App/cart_app.php';
include 'lib/Cart/View/cart_view.php';
include 'lib/Cart/Auth/cart_auth.php';

use function Cart\View\display;
use function Cart\Auth\require_login;

require_login();



$view_vars = \Cart\App\get_item($pdo, $_GET['id'] ?? 1);
?>


<!doctype html>
<html>
<head>
    <title>Shopping Cart</title>
    <?php  include 'header.php'; ?>
</head>
<body>
<?= display('links');?>
<h1>Shopping Cart</h1>
 <p>You are logged in as <?= $_SESSION['username'] ?></p><br>
<?php echo display('item', $view_vars); ?>

</body>
</html>

