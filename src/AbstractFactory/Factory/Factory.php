<?php

namespace GoF\AbstractFactory\Factory;

abstract class Factory
{
    /**
     * @param string $className
     * @return Factory
     */
    public static function getFactory($className)
    {
        $factory = null;
        try {
            /**
             * @var Factory
             */
            $factory = new $className;
        } catch (\Exception $e) {
            echo "クラス {$className} が見つかりません。";
        }

        return $factory;
    }

    /**
     * @param string $caption
     * @param string $url
     * @return Link
     */
    abstract public function createLink($caption, $url);

    /**
     * @param string $caption
     * @return Tray
     */
    abstract public function createTray($caption);

    /**
     * @param string $title
     * @param string $author
     * @return Page
     */
    abstract public function createPage($title, $author);
}
