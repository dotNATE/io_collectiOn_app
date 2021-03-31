<?php

require 'functions.php';

$db = connectToDB();

if (isset($_POST['update_title'])) {
    $result = createUpdateQuery('book_title', $_POST['update_title'], $_POST['update_id']);
    updateDBItem($db, $result);
}

if (isset($_POST['update_author'])) {
    $result = createUpdateQuery('author', $_POST['update_author'], $_POST['update_id']);
    updateDBItem($db, $result);
}

if (isset($_POST['update_released'])) {
    $result = createUpdateQuery('year_released', $_POST['update_released'], $_POST['update_id']);
    updateDBItem($db, $result);
}

if (isset($_POST['update_genre'])) {
    $result = createUpdateQuery('genre', $_POST['update_genre'], $_POST['update_id']);
    updateDBItem($db, $result);
}

if (isset($_POST['update_page_count'])) {
    $result = createUpdateQuery('page_count', $_POST['update_page_count'], $_POST['update_id']);
    updateDBItem($db, $result);
}

header('Location: index.php');