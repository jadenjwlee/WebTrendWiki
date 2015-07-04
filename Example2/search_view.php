<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>MediaWiki API Search</title>
        <script type="text/javascript" src="js/libs/jquery-2.1.3.min.js"></script>
        <script type="text/javascript" src="js/libs/bootstrap.min.js"></script>
        <link href="css/style.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body>
        <!-- Start navigation bar -->
        <div class="navbar navbar-style navbar-fixed-top">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><img src="img/logo.png" /></a>
                <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
            </div>

            <div class="navbar-collapse collapse">
                <ul  class="nav navbar-nav" class=" nav navbar-nav">
                    <li >
                        <a href="../Example1/index.html" target="_top" >Example 1</a>
                    </li>
                    <li class="active">
                        <a href="../Example2/index.php"  target="_top" >Example 2</a>
                    </li>
                     <li>
                        <a href="../Example3/wiki.php"  target="_top" >Exampl 3</a>
                    </li>
                    <li >
                        <a href="../Example4/index.php"  target="_top" >Example 4</a>
                    </li>
                </ul>

            </div>
        </div>
            
        <div id="page">
            <div id="header"><h1>MediaWiki API Search (xml)</h1></div>
            <div id="main">

                <br /><br />
                <form action="." method="post">
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
    </body>
</html>
