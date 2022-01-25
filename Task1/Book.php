<?php

class Book
{
    private $id;
    private $author_id;
    private $title;
    private $published_at;

    public function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * Созздание книги
     *
     * @param $request
     * @return null
     */
    public function create($request)
    {
        // Валидация, запись в бд

        return $id ?? null;
    }

    /**
     * Поменять автора книги
     *
     * @param $request
     * @return null
     */
    public function changeAuthorName($request)
    {
        // Поиск книги по id, замена автора книги, сохранение в БД

        return $id ?? null;
    }

    /**
     * Получение книг по автору
     *
     * @param Author $author
     * @return null
     */
    public function getBookByAuthor(Author $author)
    {
        // Поиск книги по author_id, выдача результата

        return $books ?? null;
    }

    /**
     * Получениие автора по книге
     *
     * @param $request
     * @return ?object
     */
    public function getAuthor($request): ?object
    {
        // Поиск книги по id, получаем author_id,
        // поиск по author_id используя класс Author
        // Выдача результата

        // Если бы я использовала laravel, то написала бы конструкцию:
        // Book::find($request->id)->author->name->get();

        return $author ?? null;
    }
}