<?php
include 'common.php';
include 'lib/Cart/Auth/cart_auth.php';
include 'lib/Cart/View/cart_view.php';
//include 'lib/Cart/Db/cart_db.php';

use function Cart\View\display;

?>

<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	\Cart\Auth\login($pdo, $_POST['username'], $_POST['password']);
}
?>
 
 
<!doctype html>
<html>
<head>
    <title>Shopping Cart</title>
     <?php  include 'header.php'; ?>
</head>
<body>
  <?= display('links');?>
   
<h1>Login</h1>
<?php if(isset($_SESSION['user'])): ?>	
    <?php echo '<p>You are logged in as ' . $_SESSION['user']['username'] . '</p><br>'; ?>
<?php else: ?>
    <?php echo \Cart\View\display('loginform'); ?>
<?php endif; ?>
</body>
</html>
