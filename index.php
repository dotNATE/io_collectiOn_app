<?php

$db = new PDO("mysql:host=db; dbname=collection_app", "root", "password");
$db ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

require 'functions.php';

$query = getAllFromDB($db);
$output = prepareOutput($query);

?>

<h2>NEW BOOK?</h2>

<form>
    <input type="text" name="title" placeholder="Title" /><br>
    <input type="text" name="author" placeholder="Author" /><br>
    <input type="text" name="released" placeholder="Released" /><br>
    <input type="text" name="genre" placeholder="Genre" /><br>
    <input type="text" name="page_count" placeholder="Page Count" /><br>
    <input type="submit" value="Add to Collection"/>
</form>

<h2>BOOK COLLECTION</h2>

<?php

// foreach statement outputs all db entries to HTML in formatted state
foreach ($output as $value) {
    echo $value;
}