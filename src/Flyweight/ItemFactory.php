<?php

namespace GoF\Flyweight;

class ItemFactory
{
    private $pool;
    private static $instance = null;

    /**
     * ItemFactory constructor.
     * @param string $fileName
     */
    private function __construct($fileName)
    {
        $this->buildPool($fileName);
    }

    /**
     * @param string $fileName
     * @return ItemFactory
     */
    public static function getInstance($fileName)
    {
        if (is_null(self::$instance)) {
            self::$instance = new ItemFactory($fileName);
        }
        return self::$instance;
    }

    /**
     * ConcreteFlyweightを返す
     * @param string $code
     * @return null
     */
    public function getItem($code)
    {
        if (array_key_exists($code, $this->pool)) {
            return $this->pool[$code];
        }

        return null;
    }

    /**
     * データを読み込み、プールを初期化する
     * @param string $fileName
     */
    private function buildPool($fileName)
    {
        $this->pool = array();

        $fp = fopen($fileName, 'r');
        while ($buffer = fgets($fp, 4096)) {
            list($itemCode, $itemName, $price) = explode("\t", $buffer);
            $this->pool[$itemCode] = new Item($itemCode, $itemName, $price);
        }
        fclose($fp);
    }

    /**
     * このインスタンスの複製を許可しないようにする
     * @throws \RuntimeException
     */
    final public function __clone()
    {
        throw new \RuntimeException ('Clone is not allowed against ' . get_class($this));
    }
}
