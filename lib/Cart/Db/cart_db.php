<?php

namespace Cart\Db;
use PDO;
	
//USER FUNCTIONS
function read_user($pdo, $username, $password) {
	
        $stmt = $pdo->prepare("SELECT * FROM users where username= :username and password = :password");
	$stmt->execute(['username' => $username, 'password' => $password]);
	$user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
   
}

// CART FUNCTIONS
function create_item($pdo, $item) {
    
        $stmt = $pdo->prepare("INSERT INTO items (name, price) values (:name, :price)");
       
	$stmt->execute($item);
	
	return  $count = $pdo->query("SELECT count(*) FROM items")->fetchColumn() - 1;
}

function read_item_id($pdo, $item_id) {
	$stmt = $pdo->prepare("SELECT * FROM items WHERE id = :id");
	$stmt->execute(['id' => $item_id]);
	return $stmt->fetch();
}


function read_item_name($pdo, $item_name) {
	$stmt = $pdo->prepare("SELECT * FROM items WHERE name = :item_name");
	$stmt->execute(['item_name' => $item_name]);
	return $stmt->fetch();
}

function delete_item($pdo, $item_id) {
        $stmt = $pdo->prepare("DELETE FROM items WHERE id = :id");
	$stmt->execute(['id' => $item_id]);	
}

function delete_user($pdo, $username) {
	$stmt = $pdo->prepare("DELETE FROM users WHERE username = :username");
	$stmt->execute(['username' => $username]);
}

function update_item($pdo, $item_id, $new_item) {
	$stmt = $pdo->prepare("UPDATE items SET name= :name, price = :price WHERE id = :id");
	$stmt->execute(['id' => $item_id, 'name' => $new_item['name'], 'price' => $new_item['price']]);
}
