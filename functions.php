<?php

/**
 * @return object - database connection object/pdo
 */
function connectToDB(): object
{
    $db = new PDO("mysql:host=db; dbname=collection_app", "root", "password");
    $db ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
}

/**
 * @param object $db - a database object returned from the PDO at the top of index
 *
 * @returns array - an assoc array containing all of the data from the database
 */
function getAllFromDB(object $db): array
{
    $query = $db->prepare('SELECT * FROM `books`;');
    $query->execute();
    return $query->fetchAll();
}

/**
 * @param object $db - a database object returned from the PDO at the top of index
 * @param string $title - user entered from the form in index.php
 * @param string $author - user entered from the form in index.php
 * @param string $genre - user entered from the form in index.php
 * @param string $pg_count - user entered from the form in index.php
 * @param string $release_year - user entered from the form in index.php
 *
 * @returns void
 */
function insertToDB(object $db, string $title, string $author, string $release_year, string $genre, string $pg_count): void
{
    $query = $db->prepare('INSERT INTO `books` (`book_title`, `author`, `year_released`, `genre`, `page_count`) VALUES (:title, :author, :release_year, :genre, :pg_count);');
    $query->execute(['title' => $title, 'author' => $author, 'release_year' => $release_year, 'genre' => $genre, 'pg_count' => $pg_count]);
}

/**
 * @param object $db - a database object returned from the PDO at the top of index
 * @param string $title - user entered from the form in index.php
 *
 * @returns void
 */
function updateDB(object $db, string $title): void
{
    $query = $db->prepare("UPDATE `books` SET `deleted` = '1' WHERE `book_title` = :title;");
    $query->execute(['title' => $title]);
}

/**
 * @param array $query - generated from getAllFromDB()
 *
 * @return array - an array filled with HTML strings ready to be output
 */
function prepareOutput(array $query): array
{
    $result = [];
    foreach ($query as $el) {
        if ($el['deleted']) {
            continue;
        }
        $result[] = '<pre><span class="class"><h2>' . $el['book_title'] . '</h2>' . '<p><em>' . $el['author'] . '</em></p><br>' . 'Released in ' . $el['year_released'] . '. ' . $el['genre']. '. ' . $el['page_count'] . ' pages.</span></pre>';
    }
    return $result;
}