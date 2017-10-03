<?php

namespace GoF\Iterator;


use GoF\CommonTestCase;

class BookSelfIteratorTest extends CommonTestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function testIterate()
    {
        $expect = [
            0 => 'Around the World in 80 Days',
            1 => 'Bible',
            2 => 'Cinderella',
            3 => 'Daddy-Long-Legs',
            4 => 'East of Eden',
            5 => 'Frankenstein',
            6 => 'Gulliver\'s Travels',
            7 => 'Hamlet'
        ];
        $actual = [];

        $bookShelf = new BookShelf();
        $bookShelf->appendBook(new Book("Around the World in 80 Days"));
        $bookShelf->appendBook(new Book("Bible"));
        $bookShelf->appendBook(new Book("Cinderella"));
        $bookShelf->appendBook(new Book("Daddy-Long-Legs"));
        $bookShelf->appendBook(new Book("East of Eden"));
        $bookShelf->appendBook(new Book("Frankenstein"));
        $bookShelf->appendBook(new Book("Gulliver's Travels"));
        $bookShelf->appendBook(new Book("Hamlet"));
        /**
         * @var Iterator $it
         */
        $it = $bookShelf->getIterator();
        while ($it->hasNext()) {
            $book = $it->next();
            $actual[] = $book->getName();
        }
        $this->assertEquals($expect, $actual);
    }
}
