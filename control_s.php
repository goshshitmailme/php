<?php

$hours = date("H");
 // var_dump($hours);
// $hours = 12;

if ($hours < "10") {
	echo "Good Morning";
} elseif ($hours < 16) {
	print "Good Afternoon";
} elseif ($hours <= 21) {
	print "Good Everning";	
} else {
	print "Hello";
}
