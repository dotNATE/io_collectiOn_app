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

    <form method="post">
        <label>Title: <input type="text" name="title" placeholder="enter text here" /></label><br>
        <label>Author: <input type="text" name="author" placeholder="enter text here" /></label><br>
        <label>Year Released: <input type="number" name="released" placeholder="enter number here" /></label><br>
        <label>Genre: <input type="text" name="genre" placeholder="enter text here" /></label><br>
        <label>Page Count: <input type="number" name="page_count" placeholder="enter number here" /></label><br>
        <input type="submit" value="Add to Collection"/>
    </form>

    <?php

    if( (!empty($_POST['title'])) && (!empty($_POST['author'])) && (!empty($_POST['released'])) && (!empty($_POST['genre'])) && (!empty($_POST['page_count'])) ) {
        insertToDB($db, $_POST['title'], $_POST['author'], $_POST['genre'], $_POST['page_count'], $_POST['released']);
    }

    ?>

    <h2>BOOK COLLECTION</h2>

    <?php

    // foreach statement outputs all db entries to HTML in formatted state
    foreach ($output as $value) {
        echo $value;
    }
    ?>

    </body>
</html>