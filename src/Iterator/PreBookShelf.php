<?php

namespace GoF\Iterator;

use Traversable;

class PreBookShelf implements \IteratorAggregate
{
    /**
     * @var array $books
     */
    private $books = [];

    /**
     * BookShelf constructor.
     */
    public function __construct()
    {
        $this->books = [];
    }

    /**
     * @param int $index
     * @return Book
     */
    public function getBookAt($index)
    {
        return $this->books[$index];
    }

    /**
     * @param Book $book
     */
    public function appendBook(Book $book)
    {
        $this->books[] = $book;
    }

    /**
     * @return int
     */
    public function getLength()
    {
        return count($this->books);
    }

    /**
     * Retrieve an external iterator
     * @link  http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     * @since 5.0.0
     */
    public function getIterator()
    {
        return new PreBookShelfIterator($this);
    }
}
