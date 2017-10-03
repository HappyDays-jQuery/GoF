<?php

namespace GoF\Adapter;

use Symfony\Component\Filesystem\Exception\IOException;

class FileProperties extends File implements FileIo
{

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
        $ret = array_filter(file($filename), function ($var) {
            return !preg_match("/^#.*$/", $var);
        });

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
        $this->writeProperties($filename);
        parent::writeToFile($filename);
    }

    /**
     * @param string $filename
     * @return void
     * @throws IOException
     */
    public function writeProperties($filename)
    {
        if (!$handle = fopen($filename, 'w+')) {
            throw new IOException("Cannot open file ({$filename}).");
        }

        $now = new \DateTime();
        fwrite($handle, "# written by FileProperties\n");
        fwrite($handle, "# {$now->format(\DateTime::COOKIE)}\n");
        fclose($handle);
    }
}
