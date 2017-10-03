<?php

namespace GoF\Interpreter;

use GoF\Collection\StringTokenizer;
use GoF\Exception\NumberFormatException;
use GoF\Exception\ParseException;

class Context
{
    /**
     * @var StringTokenizer $tokenizer
     */
    private $tokenizer;
    /**
     * @var string
     */
    private $currentToken;

    /**
     * Context constructor.
     * @param string $text
     */
    public function __construct($text)
    {
        $this->tokenizer = new StringTokenizer($text);
        $this->nextToken();
    }

    /**
     * @return string
     */
    public function nextToken()
    {
        return $this->currentToken = $this->tokenizer->hasMoreTokens() ? $this->tokenizer->nextToken() : null;
    }

    /**
     * @return string
     */
    public function getCurrentToken()
    {
        return $this->currentToken;
    }

    /**
     * @param string $token
     * @throws ParseException
     */
    public function skipToken($token)
    {
        if ($token != $this->currentToken) {
            throw new ParseException("Warning: {$token} is expected, but {$this->currentToken} is found.");
        }

        $this->nextToken();
    }

    /**
     * @return int
     * @throws ParseException
     */
    public function currentNumber()
    {
        try {
            $number = intval($this->currentToken);
        } catch (NumberFormatException $e) {
            throw new ParseException("Warning: " . $e->getMessage());
        }
        return $number;
    }
}
