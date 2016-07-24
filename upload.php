<?php
include 'common.php';
include 'lib/Cart/Upload/cart_upload.php';
include 'lib/Cart/View/cart_view.php';
require 'lib/Cart/Auth/cart_auth.php';

use function Cart\View\display;
use function Cart\Auth\require_login;

?>


<?php require_login();?>

<?php if($_SERVER['REQUEST_METHOD'] == 'POST') {
	Cart\Upload\upload_file();
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
<h1>Upload</h1>
 <p>You are logged in as <?= $_SESSION['username'] ?></p><br>
<?php echo Cart\View\display('uploadform'); ?>

</body>
</html>
