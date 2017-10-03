<?php

namespace GoF\Collection;

use \ArrayObject;

class ArrayList extends ArrayObject
{
    /**
     * ArrayList constructor.
     * @param array $array
     */
    public function __construct($array = [])
    {
        parent::__construct($array, ArrayObject::ARRAY_AS_PROPS);
    }

    /**
     * @param mixed $element
     * @return ArrayList
     */
    public function add($element)
    {
        parent::append($element);
        return $this;
    }

    /**
     * @param ArrayList $collection
     * @return ArrayList
     */
    public function addAll(ArrayList $collection)
    {
        foreach ($collection as $v) {
            parent::append($v);
        }
        return $this;
    }

    /**
     * @return ArrayList
     */
    public function clear()
    {
        foreach ($this as $value) {
            parent::offsetUnset($value);
        }
        return $this;
    }


    /**
     * @param mixed $o
     * @return bool
     */
    public function contains($o)
    {
        foreach ($this as $v) {
            if ($o === $v) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param int $index
     * @return mixed
     */
    public function get($index)
    {
        return parent::offsetGet($index);
    }

    /**
     * @param  mixed $o
     * @return integer
     */
    public function indexOf($o)
    {
        foreach ($this as $k => $v) {
            if ($o === $v) {
                return $k;
            }
        }
        return -1;
    }

    /**
     * @param  mixed $o
     * @return integer
     */
    public function lastIndexOf($o)
    {
        $size = parent::count();
        for ($i = $size - 1; $i >= 0; $i--) {
            if ($o === parent::offsetGet($i)) {
                return $i;
            }
        }
        return -1;
    }

    /**
     * @return boolean
     */
    public function isEmpty()
    {
        if (parent::count() === 0) {
            return true;
        }
        return false;
    }

    /**
     * @param  integer|mixed $index
     * @return ArrayList
     */
    public function remove($index)
    {
        $i = is_integer($index) ? $index : $this->indexOf($index);
        parent::offsetUnset($i);

        return $this;
    }

    /**
     * @param  integer $index
     * @param  mixed   $element
     * @return ArrayList
     */
    public function set($index, $element = null)
    {
        if (!is_integer($index)) {
            throw new \InvalidArgumentException('invalid argument $index');
        }
        parent::offsetSet($index, $element);
        return $this;
    }

    /**
     * @return integer
     */
    public function size()
    {
        return parent::count();
    }

    /**
     * @return \Iterator
     */
    public function iterator()
    {
        return parent::getIterator();
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $it = parent::getIterator();
        return iterator_to_array($it);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $ret = [];
        $it = $this->iterator();
        while ($it->valid()) {
            $ret[] = $it->current();
            $it->next();
        }

        return implode(",", $ret);
    }
}
