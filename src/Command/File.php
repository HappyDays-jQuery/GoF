<?php

namespace GoF\Command;

class File
{
    /**
     * @var string
     */
    private $name;

    /**
     * File constructor.
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return void
     */
    public function decompress()
    {
        echo "{$this->name}を展開しました\n";
    }

    /**
     * @return void
     */
    public function compress()
    {
        echo "{$this->name}を圧縮しました\n";
    }

    /**
     * @return void
     */
    public function create()
    {
        echo "{$this->name}を作成しました\n";
    }
}
