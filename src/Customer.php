<?php

class Customer extends User
{
    public function __construct($name)
    {
        parent::__construct($name);
        $this->surname = "Customer";
    }

}