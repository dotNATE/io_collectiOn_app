<?php

require 'functions.php';

$db = new PDO("mysql:host=db; dbname=collection_app", "root", "password");
$db ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

if( (!empty($_POST['title'])) && (!empty($_POST['author'])) && (!empty($_POST['released'])) && (!empty($_POST['genre'])) && (!empty($_POST['page_count'])) ) {
    insertToDB($db, $_POST['title'], $_POST['author'], $_POST['genre'], $_POST['page_count'], $_POST['released']);
    header('Location: index.php');
} else {
    header('Location: index.php?error=Error - All fields are required!');
}