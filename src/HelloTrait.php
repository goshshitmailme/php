<?php

trait HelloTrait
{
    public function hello($count = null)
    {
        if ($count === null) {
            $count = rand(1, 10);
        }
        return "Hell" . str_repeat("o", $count) . " " . $this->getFullName();
    }
}