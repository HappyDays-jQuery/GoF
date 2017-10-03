<?php

namespace GoF\Exception;

class FileTreatmentException extends \RuntimeException
{
    /**
     * FileTreatmentException constructor.
     * @param string $message
     */
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
