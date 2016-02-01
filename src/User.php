<?php

if (!defined("SECURITY")) {
    die("Direct Access Restricted");
}

abstract class User implements RoleInterface
{
    use HelloTrait;
    const ROLE_ADMIN = 'ROLE_ADMIN';
    const ROLE_USER = 'ROLE_USER';

    private static $count = 0;
    private $name;
    protected $surname;

    public function __construct($name = "guest")
    {
        self::$count++;
        $this->name=$name;
    }
    public function __toString()
    {
        return $this->getFullName();
    }
    public function getRole(){

}
    public function setRole($role){

    }

    public static function getCount() {
        return self::$count;
    }
    public function getFullName()
    {
        return $this->name . " " . $this->surname;
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

