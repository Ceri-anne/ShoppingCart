<?php
namespace Cart\Db;

// CART "DATABASE"
$users = ['sholmes' => [
			'id' => 1001,
			'email' => 'sherlock@example.com',
			'postcode' => 'AA10 1AA',
		],
		'watson' => [
			'id' => 1002,
			'email' => 'drwatson`@example.com',
			'postcode' => 'BB10 A1B',
		],
                'cjackson' => [
			'id' => 1003,
			'email' => 'ceri@example.com',
			'postcode' => 'WF5 0AF',
		],
	];

$camera = [
	'name' => 'Sony A7S',
	'price' => 1700
];

$lens = [
	'name' => 'Samyang 35mm',
	'price' => 400
];

$cart = [
	'user' => 'sholmes',
	'items' => [$camera, $lens]
];



// CART FUNCTIONS
function create_item(&$cart, $item) {
	array_push($cart['items'], $item);
	
	return count($cart) - 1;
}

function read_item_id($cart, $item_id) {
	return $cart[$item_id];
}

function read_item_name($cart, $item_name) {
	foreach($cart['items'] as $item) {
		if($item['name'] == $item_name) {
			return $item;
		}
	}
}

function delete_item(&$cart, $item_id) {
	unset($cart[$item_id]);
}

function delete_user(&$users, $username) {
	unset($users[$username]);
}


function update_item(&$cart, $item_id, $new_item) {
	$cart[$item_id] = $new_item;
}


function save_cart($cart,$filename) {
    file_put_contents($filename,serialize($cart));
}


function load_cart($filename) {
     return unserialize(file_get_contents($filename));
}


if (file_exists('saved_cart.db')) {
     $cart = load_cart('saved_cart.db');
}