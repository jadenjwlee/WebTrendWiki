<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>MediaWiki API Search</title>
        <link rel="stylesheet" type="text/css" href="main.css"/>
    </head>
    <body>
        <div id="page">
            <div id="header"><h1>MediaWiki API Search (xml)</h1></div>
            <div id="main">

                <h2>Search</h2>
                <form action="." method="post">
                    <input type="text" name="query" value="<?php echo $query; ?>"/>
                    <input type="submit" value="Search"/>
                </form>
                <?php if (isset($api) && count($api) != 0) : ?>
                    <h2>Results</h2>
                    <table>
                    <?php 
                        foreach ($api->query as $qy) {
                            foreach ($qy->pages as $pgs) {
                                foreach ($pgs->page as $pg) {
                                    foreach ($pg->revisions as $revs) {
                                        echo '<li>' . htmlentities($revs->rev) . '</li>';
                                    }
                                }
                            }
                        }
                    ?>

                    </table>
                <?php endif; ?>

            </div><!-- end main -->
        </div><!-- end page -->
    </body>
</html>
