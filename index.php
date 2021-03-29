<?php

$db = new PDO("mysql:host=db; dbname=collection_app", "root", "password");
$db ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

require 'functions.php';

$query = getAllFromDB($db);
$output = prepareOutput($query);

?>

    <h2>NEW BOOK?</h2>

<form method="post">
    <label>Book Title: <input type="text" name="book_title"/></label><br>
    <label>Author: <input type="text" name="author"/></label><br>
    <label>Released: <input type="number" name="year_released"/></label><br>
    <label>Genre: <input type="text" name="genre"/></label><br>
    <label>Page Count: <input type="number" name="page_count"/></label><br>
    <input type="submit" value="Add to collection" />
</form>

<h2>BOOK COLLECTION</h2>

<?php

// foreach statement outputs all db entries to HTML in formatted state
foreach ($output as $key => $value) {
    echo $value;
}