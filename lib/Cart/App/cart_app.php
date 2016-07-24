<?php
namespace Cart\App;

use function Cart\Db\create_item, Cart\Db\read_item_id;


function add_item($pdo, $item) {
	$new_id = create_item($pdo, $item);
	return ['new_item' => $item];
}

function get_item($pdo, $id) {
	return ['new_item' => read_item_id($pdo, $id)];
}


function validate_cart(&$cart) {
	foreach($users as $username => $user) {
		if(!postcode_valid($user['postcode'])) {
			delete_user($pdo, $username);
		}
	}
}
