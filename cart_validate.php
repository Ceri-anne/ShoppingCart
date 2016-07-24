<?php
namespace Cart\App;

include 'cart_validation.php';



use function Cart\Db\delete_user,
			 Cart\Validation\postcode_valid;

foreach($users as $username => $user) {
	if(!postcode_valid($user['postcode'])) {
		delete_user($users, $username);
	}
}