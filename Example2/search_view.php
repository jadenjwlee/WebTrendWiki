        <div id="page">
<!--            <div id="header"><h1>MediaWiki API Search (xml)</h1></div>-->
            <div id="main">

                <br /><br />
                <form action="wiki.php" method="post">
                    <b>Search</b>
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
