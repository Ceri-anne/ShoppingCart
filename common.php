<?php

include 'lib/Cart/Db/cart_db.php';



// CART "DATABASE"


const DB_DSN = 'mysql:host=localhost;dbname=example_store';
const DB_USER = 'root';
const DB_PASS = '';

try {
      $pdo = new PDO(DB_DSN, DB_USER, DB_PASS);


$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$users = $pdo->query("SELECT * FROM users")->fetchAll();
$users = array_combine(array_column($users, 'username'), $users);



$cart = [
	'user' => 'sholmes',
	'items' => $pdo->query("SELECT items.* FROM items, cart, users
								WHERE cart.item_id = items.id
									AND cart.user_id = users.id")->fetchAll()
];

 $user_query = $pdo->prepare("SELECT * from users WHERE username=:username;");
 $item_query = $pdo->prepare("SELECT * from items WHERE name=:itemname;");
 



} catch (PDOException $e) {
	die($e->getMessage());
}
set_error_handler(function ($errorType, $errorMessage) {
    
   	echo \Cart\View\display('error', ['message' => $errorMessage]);
});
