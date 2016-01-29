<?php

define('SECURITY', true);

require_once __DIR__ . "/src/User.php";
//require_once "/src/User.php";

//var_dump(__DIR__);
//PHP_EOL = "\n"


$user = new User();
// var_dump($user);
$user->setName("Max2");
// $user->surname = "Pain";
// // print $user->name . " " . $user->surname;
// // print $user->getFullName();

// print $user->hello();
 print $user->getName();
