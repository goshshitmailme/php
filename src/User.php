<?php

/**
 * Created by PhpStorm.
 * User: INTELLEKT_001
 * Date: 29.01.2016
 * Time: 17:36
 */

if (!defined("SECURITY")) {
    die("Direct Access Restricted");
}

class User
{
    const ROLE_ADMIN = 'ROLE_ADMIN';
    const ROLE_USER = 'ROLE_USER';

    private static $count = 0;
    private $name;
    public $surname;

    public function __construct($name = "guest")
    {
        self::$count++;
        $this->name=$name;
    }

    public static function getCount() {
        return self::$count;
    }
    public function getFullName()
    {
        return $this->name . " " . $this->surname;
    }

    public function hello($count = null)
    {
        if ($count === null) {
            $count = rand(1, 10);
        }
        return "Hell" . str_repeat("o", $count) . " " . $this->getFullName();
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
}

