<?php

require 'functions.php';

$db = connectToDB();

if (count($_POST) === 5) {
    $result = [];
    foreach ($_POST as $value) {
        $result[] = trim(htmlspecialchars($value));
    }
    insertToDB($db, $result[0], $result[1], $result[2], $result[3], $result[4]);
    header('Location: index.php');
} else {
    header('Location: index.php?error=Error - All fields are required!');
}