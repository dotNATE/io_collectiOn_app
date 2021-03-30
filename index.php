<!DOCTYPE html>
<html>
    <head lang="en-GB">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Collect-iO-n Application</title>
    </head>
    <body>

    <?php

    $db = new PDO("mysql:host=db; dbname=collection_app", "root", "password");
    $db ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    require 'functions.php';

    $query = getAllFromDB($db);
    $output = prepareOutput($query);

    ?>

    <h2>NEW BOOK?</h2>

    <?php
    if (!empty($_GET['error'])) {
        echo $_GET['error'];
    }
    ?>

    <form method="post" action="form.php">
        <label>Title: <input type="text" name="title" placeholder="required" /></label><br>
        <label>Author: <input type="text" name="author" placeholder="required" /></label><br>
        <label>Year Released: <input type="number" name="released" placeholder="required" /></label><br>
        <label>Genre: <input type="text" name="genre" placeholder="required" /></label><br>
        <label>Page Count: <input type="number" name="page_count" placeholder="required" /></label><br>
        <input type="submit" value="Add to Collection"/>
    </form>

    <h2>BOOK COLLECTION</h2>

    <?php

    // foreach statement outputs all db entries to HTML in formatted state
    foreach ($output as $value) {
        echo $value;
    }
    ?>

    </body>
</html>