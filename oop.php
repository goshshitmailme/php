<?php

class User
{
    private $name = "Guest";
    public $surname;
    
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

$user = new User();
// var_dump($user);
$user->setName("Max");
// $user->surname = "Pain";
// // print $user->name . " " . $user->surname;
// // print $user->getFullName();

// print $user->hello();
 print $user->getName();