<?php

define('SECURITY', true);

require_once __DIR__ . "/src/User.php";
//require_once "/src/User.php";

//var_dump(__DIR__);
//PHP_EOL = "\n"


$user1 = new User("Max1");
$user2 = new User("Max2");
// var_dump($user);
$user1->setName("Max1");
// $user->surname = "Pain";
// // print $user->name . " " . $user->surname;
// // print $user->getFullName();

// print $user->hello();
// print $user->getName();
print User::getCount();
print $user1->getCount();