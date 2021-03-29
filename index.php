<?php

$db = new PDO("mysql:host=db; dbname=collection_app", "root", "password");
$db ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

require 'functions.php';

$query = getAllFromDB($db);
$output = prepareOutput($query);

?>

    <h2>NEW BOOK?</h2>

<h2>BOOK COLLECTION</h2>

<?php

// foreach statement outputs all db entries to HTML in formatted state
foreach ($output as $key => $value) {
    echo $value;
}