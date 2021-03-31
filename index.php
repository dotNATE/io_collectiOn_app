<!DOCTYPE html>
<html>
    <head lang="en-GB">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/normalize.css">
        <link rel="stylesheet" href="styles/style.css">
        <title>Collect-iO-n Application</title>
    </head>
    <body>
        <?php

        require 'functions.php';

        $db = connectToDB();
        $query = getAllFromDB($db);
        $output = prepareOutput($query);

        ?>
        <section class="new_book_section">
            <h2>NEW BOOK?</h2>
            <?php
            if (!empty($_GET['error'])) {
                echo '<p class="error">' . $_GET['error'] . '</p>';
            }
            ?>

            <form method="post" action="form.php">
                <div class="form_input_container"><label>Title: </label><input type="text" name="title" placeholder="required" /></div>
                <div class="form_input_container"><label>Author: </label><input type="text" name="author" placeholder="required" /></div>
                <div class="form_input_container"><label>Year Released: </label><input type="number" name="released" placeholder="required" /></div>
                <div class="form_input_container"><label>Genre: </label><input type="text" name="genre" placeholder="required" /></div>
                <div class="form_input_container"><label>Page Count: </label><input type="number" name="page_count" placeholder="required" /></div>
                <input type="submit" value="Add to Collection"/>
            </form>
        </section>
        <section class="delete_section">
            <h2>MADE A MISTAKE?</h2>
            <form method="post" action="form.php">
                <div class="form_input_container"><label>ID of Title to be Removed: </label><input type="number" name="delete_id" placeholder="proceed with caution!"/></div>
                <input type="submit" value="Remove from Collection!"/>
            </form>
        </section>
        <section class="gallery_section">
            <h2>BOOK COLLECTION</h2>
            <div class="gallery_actual">
                <?php

                // foreach statement outputs all db entries to HTML in formatted state
                foreach ($output as $value) {
                    echo $value;
                }
                ?>
            </div>
        </section>
    </body>
</html>