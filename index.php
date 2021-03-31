<!DOCTYPE html>
<html>
    <head lang="en-GB">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Collect-iO-n Application</title>
    </head>
    <body>

    <?php

    require 'functions.php';

    $db = connectToDB();
    $query = getAllFromDB($db);
    $output = prepareOutput($query);

    ?>

    <h2>NEW BOOK?</h2>

    <?php
    if (!empty($_GET['error'])) {
        echo '<p class="error">' . $_GET['error'] . '</p>';
    }
    ?>

    <form method="post" action="form.php">
        <label>Title: <input type="text" name="title" placeholder="required" /></label>
        <label>Author: <input type="text" name="author" placeholder="required" /></label>
        <label>Year Released: <input type="number" name="released" placeholder="required" /></label>
        <label>Genre: <input type="text" name="genre" placeholder="required" /></label>
        <label>Page Count: <input type="number" name="page_count" placeholder="required" /></label>
        <input type="submit" value="Add to Collection"/>
    </form>

    <h2>MADE A MISTAKE?</h2>
    <p>Enter the name of one book you're getting rid of below:</p>
    <form method="post" action="form.php">
        <label>Title to be Removed: <input type="text" name="delete_title" placeholder="proceed with caution!"/></label>
        <input type="submit" value="Remove from Collection!"/>
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