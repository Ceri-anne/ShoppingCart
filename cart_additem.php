<?php
namespace Cart\App;

use function Cart\Db\create_item;

//CART APPLICATION

$new_id = create_item($cart, [
	'name' => 'HTC m8',
	'price' => 500
]);

$new_item = \Cart\Db\read_item_name($cart, 'HTC m8');

\Cart\Db\save_cart($cart,'saved_cart.db');