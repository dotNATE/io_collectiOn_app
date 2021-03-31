<?php

require 'functions.php';

$db = connectToDB();

if (!empty($_POST['delete_id'])) {
    $database_string = trim(htmlspecialchars($_POST['delete_id']));
    softDelete($db, $database_string);
    header('Location: index.php');
}

if (!empty($_POST['title'] && $_POST['author'] && $_POST['genre'] && $_POST['released'] && $_POST['page_count'])) {
    $result = [];
    foreach ($_POST as $value) {
        $result[] = trim(htmlspecialchars($value));
    }
    insertToDB($db, $result[0], $result[1], $result[2], $result[3], $result[4]);
    header('Location: index.php');
} else {
    header('Location: index.php?error=Error - All fields are required!');
}

if (!empty($_POST['update_title'] && $_POST['update_author'] && $_POST['update_genre'] && $_POST['update_released'] && $_POST['update_page_count'])) {

}