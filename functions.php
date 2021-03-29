<?php

/**
 * @params $db - a database object returned from the PDO at the top of the page
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
 * @param array $query - generated from getAllFromDB()
 *
 * @return array - an array filled with HTML strings ready to be output
 */
function prepareOutput(array $query): array
{
    $result = [];
    foreach ($query as $el) {
        array_push($result, '<pre><span class="class"><h2>' . $el['book_title'] . '</h2>' . '<p><em>' . $el['author'] . '</em></p><br>' . 'Released in ' . $el['year_released'] . '. ' . $el['genre']. '. ' . $el['page_count'] . ' pages.</span></pre>');
    }
    return $result;
}