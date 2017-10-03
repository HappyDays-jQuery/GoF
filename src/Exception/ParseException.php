<?php

namespace GoF\Exception;

class ParseException extends \Exception
{
    /**
     * ParseException constructor.
     * @param string $message
     */
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
