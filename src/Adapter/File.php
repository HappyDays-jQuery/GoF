<?php

namespace GoF\Adapter;

use Symfony\Component\Filesystem\Exception\IOException;

class File implements FileIo
{
    /**
     * @var array $contents
     */
    protected $contents;

    /**
     * @param string $filename
     * @return void
     * @throws IOException
     */
    public function readFromFile($filename)
    {
        if (!file_exists($filename)) {
            throw new IOException("Cannot open file ({$filename}).");
        }
        $ret = file($filename);
        foreach ($ret as $recode) {
            list($key, $value) = explode('=', $recode);
            $this->setValue($key, $value);
        }
    }

    /**
     * @param string $filename
     * @return void
     * @throws IOException
     */
    public function writeToFile($filename)
    {
        if (!$handle = fopen($filename, 'a+')) {
            throw new IOException("Cannot open file ({$filename}).");
        }
        foreach ($this->contents as $key => $value) {
            if (fwrite($handle, "{$key}={$value}\n") === false) {
                throw new IOException('Cannot write to file.');
            }
        }
        fclose($handle);
    }

    /**
     * @param string $key
     * @param string $value
     * @return void
     */
    public function setValue($key, $value)
    {
        $this->contents[$key] = $value;
    }

    /**
     * @param string $key
     * @return string
     */
    public function getValue($key)
    {
        return trim($this->contents[$key]);
    }
}
