<?php

$db = new PDO("mysql:host=db; dbname=collection_app", "root", "password");
$db ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

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

$query = getAllFromDB($db);