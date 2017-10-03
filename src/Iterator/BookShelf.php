<?php

namespace GoF\Iterator;

class BookShelf implements Aggregate
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
     * @return BookShelfIterator
     */
    public function getIterator()
    {
        return new BookShelfIterator($this);
    }
}
