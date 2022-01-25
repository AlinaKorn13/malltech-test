<?php

class Author
{
    private $id;
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Получение имени автора
     *
     * @return mixed
     */
    public function getAuthorName()
    {
        return $this->name;
    }
}