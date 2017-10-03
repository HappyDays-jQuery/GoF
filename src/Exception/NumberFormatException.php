<?php

namespace GoF\Exception;

class NumberFormatException extends \Exception
{
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
