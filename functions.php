<?php

function hello($name = "guest", $count = null) {
    if ($count ==+ null) {
        $count = rand(1, 10);
    }

    return "Hell" . str_repeat("o", $count) . " " . $name;
}

$message = hello("fdssd", 0);
print $message ;