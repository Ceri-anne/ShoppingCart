<?php
include 'common.php';
include 'lib/Cart/App/cart_app.php';
include 'lib/Cart/View/cart_view.php';
require 'lib/Cart/Auth/cart_auth.php';
use function Cart\View\display;
$username= $_SESSION['username'] ?? $_GET['username'] ?? 'Guest';

$user = $_SESSION['user'] ?? 'Guest';

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
 <p>Welcome <?= $username ?></p><br>
 
<?php if ($user != 'Guest'): ?>
    <?php echo display('user', ['users' => $user, 'cart' => $cart]); ?>
<?php endif;?>

<?php echo display('items', ['cart' => $cart]); ?>

<h1>All Users</h1>
<?php foreach($users as $username => $user) {
	printf("<li>%s</li>\n", $username);
}
?>

<?php if($_SERVER['REQUEST_METHOD'] == 'GET'): ?>
	<?= display('newitem');?>
<?php else: ?>

<?php
	echo display('item', \Cart\App\add_item($pdo, $_POST) + ['heading' => 'New Item']);
	?>

<?php endif;  ?>

</body>
</html>
