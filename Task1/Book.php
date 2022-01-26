<?php

class Book
{
    /**
     * Идентификатор книги
     *
     * @var int
     */
    private $id;

    /**
     * Идентификатор автора
     *
     * @var int
     */
    private $author_id;

    /**
     * Название книги
     *
     * @var string
     */
    private $title;

    /**
     * Дата публикации в unix timestamp
     *
     * @var int
     */
    private $published_at;

    /**
     * Создание книги
     *
     * @param $request
     * @return ?int
     */
    public function create($request): ?int
    {
        // Валидация, запись в бд

        return $id;
    }

    /**
     * Поменять автора книги
     *
     * @param $request
     * @return ?int
     */
    public function changeAuthorName($request): ?int
    {
        // Поиск книги по id, замена автора книги, сохранение в БД

        return $id;
    }

    /**
     * Получение книг по автору
     *
     * @param Author $author
     * @return ?array
     */
    public function getBookByAuthor(Author $author): ?array
    {
        // Поиск книги по author_id, выдача результата

        return $books;
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
        // Book::find($request->id)->author->name->first();

        return $author;
    }
}