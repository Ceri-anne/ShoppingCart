<?php

namespace Cart\Auth;

session_start();

function login($pdo, $username, $password) {
	$user= \Cart\Db\read_user($pdo, $username, $password);
        
	//if($user && password_verify($password, $user['password'])) {
	if ($user && $password == $user['password']) {
            $_SESSION['username'] = $username;
            $_SESSION['user']=$user;
             header('Location: ' . $_SESSION['redirectURL']);
             exit();
        }
	else {
		trigger_error('ERROR: login failed');
	}
}

function logout() {
	session_destroy();
}

function require_login() {
 if (!isset($_SESSION['username'])) {
        $_SESSION['redirectURL'] = $_SERVER['REQUEST_URI'];
        header('Location: login.php');
        exit();
    }
}