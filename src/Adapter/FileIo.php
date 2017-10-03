<?php

namespace GoF\Adapter;

use Symfony\Component\Filesystem\Exception\IOException;

interface FileIo
{
    /**
     * @param string $filename
     * @return void
     * @throws IOException
     */
    public function readFromFile($filename);

    /**
     * @param string $filename
     * @return void
     * @throws IOException
     */
    public function writeToFile($filename);

    /**
     * @param string $key
     * @param string $value
     * @return void
     */
    public function setValue($key, $value);

    /**
     * @param string $key
     * @return string
     */
    public function getValue($key);
}
