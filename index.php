<?php require 'functions.php'; ?>

<h2>BOOK COLLECTION</h2>

<?php

$query = getAllFromDB($db);
$output = prepareOutput($query);

foreach ($output as $key => $value) {
    echo $value;
}