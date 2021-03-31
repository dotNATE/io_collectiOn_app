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
    $query = $db->prepare('SELECT * FROM `books` WHERE NOT `deleted` = \'1\';');
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
function softDelete(object $db, string $id): void
{
    $query = $db->prepare('UPDATE `books` SET `deleted` = \'1\' WHERE `id` = :id;');
    $query->execute(['id' => $id]);
}

/**
 * @param string $column - desired column in database table, decided by form on index.php
 * @param string $value - desired new value for the above specified column
 * @param $id - the database id of the record to be amended
 *
 * @return array - contains [0]-> an UPDATE SQL query, [1]-> $value, [2]-> $id
 */
function createUpdateQuery(string $column, string $value, string $id):array
{
    $column = trim(htmlspecialchars($column));
    $result[] = 'UPDATE `books` SET `' . $column . '` = :val WHERE `id` = :id;';
    $result[] = trim(htmlspecialchars($value));
    $result[] = trim(htmlspecialchars($id));
    return $result;
}

/**
 * @param object $db - a database object returned from the PDO at the top of index
 * @param array $sqlArray - an array returned from createUpdateQuery()
 */
function updateDBItem(object $db, array $sqlArray): void
{
    $query = $db->prepare("$sqlArray[0]");
    $query->execute(['val' => $sqlArray[1], 'id' => $sqlArray[2]]);
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
        $result[] = '<span class="gallery_item"><h2>' . $el['book_title'] . '</h2>' . '<p><em>' . $el['author'] . '</em></p><br>' . 'Released in ' . $el['year_released'] . '. ' . $el['genre']. '. ' . $el['page_count'] . ' pages.' . ' <em>ID: ' . $el['id'] . '</em></span>';
    }
    return $result;
}