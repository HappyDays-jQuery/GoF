<?php

namespace GoF\Iterator;

class BookShelfIterator implements Iterator
{
    /**
     * @var BookShelf
     */
    private $bookShelf;
    /**
     * @var int
     */
    private $index;

    /**
     * BookShelfIterator constructor.
     * @param BookShelf $bookShelf
     */
    public function __construct(BookShelf $bookShelf)
    {
        $this->bookShelf = $bookShelf;
        $this->index = 0;
    }

    /**
     * @return bool
     */
    public function hasNext()
    {
        return $this->index < $this->bookShelf->getLength();
    }

    /**
     * @return Book
     */
    public function next()
    {
        $book = $this->bookShelf->getBookAt($this->index);
        $this->index++;
        return $book;
    }
}
