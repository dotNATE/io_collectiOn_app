<?php

/**
 * @param object $db - a database object returned from the PDO at the top of index
 *
 * @returns - an assoc array containing all of the data from the database
 **/
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
function insertToDB(object $db, string $title, string $author, string $genre, string $pg_count, string $release_year): void
{
    $query = $db->prepare('INSERT INTO `books` (`book_title`, `author`, `genre`, `page_count`, `year_released`) VALUES (:title, :author, :genre, :pg_count, :release_year);');
    $query->execute(['title' => $title, 'author' => $author, 'genre' => $genre, 'pg_count' => $pg_count, 'release_year' => $release_year]);
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
        $result[] = '<pre><span class="class"><h2>' . $el['book_title'] . '</h2>' . '<p><em>' . $el['author'] . '</em></p><br>' . 'Released in ' . $el['year_released'] . '. ' . $el['genre']. '. ' . $el['page_count'] . ' pages.</span></pre>';
    }
    return $result;
}