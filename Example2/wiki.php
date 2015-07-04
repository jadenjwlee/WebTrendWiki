<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="http://getbootstrap.com/dist/js/bootstrap.js"></script>
<link type="text/css" rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.css"/>
<title>Categories example</title>
</head>
<body>
    <nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="../index.html">Home</a>
          <a href="../Example1/index.html" target="_top" class="navbar-brand" href="#">Example 1</a>
          <a href="../Example2/wiki.php" target="_top" class="navbar-brand" href="#">Example 2</a>
          <a href="../Example3/wiki.php" target="_top" class="navbar-brand" href="#">Example 3</a>
          <a href="../Example4/index.php" target="_top" class="navbar-brand" href="#">Example 4</a>
        </div>  
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
    <div class="container">
        <div class="row">
<h2>The MediaWiki web API is a web service that provides convenient access to wiki features, data, and meta-data over HTTP.</h2>
<p>This URL tells English Wikipedia's web service API to send you the content of the main page:</p>
  <p>The result will be:</p><pre>https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=xml</pre>
  <p>Let's break down this query:<br />
     This URL is the base URL for English Wikipedia's API. Every query should start from this URL:
    <pre>https://en.wikipedia.org/w/api.php?</pre>  
    The MediaWiki web service API implements dozens of actions and extensions implement many more. The full list of actions - <a href="https://en.wikipedia.org/w/api.php">Here</a> 
    <pre>action=query</pre>
    Get a list of all categories for specific keyword:
    <pre>list=allcategories</pre>  
    Very often, you will not get all the data you want in one request. To get more data, you use the query-continue value in the response:
    <pre>rawcontinue=</pre>
    Search for all category titles that begin with this value:
    <pre>acprefix=bread</pre>
    The format of output values. Can be json,xml and many more:
    <pre>format=xml</pre>  
  </p><br />
  <p>You can play wil different variations of query in wikiAPI <a href="https://en.wikipedia.org/wiki/Special:ApiSandbox">Sandbox</a></p>
  <p>Next, for this example I used CURL request to get data from Wikipedia</p>
  <pre>function search_wiki($query) {
    // Set up the URL for the query
    $query = urlencode($query);
    $base_url = 'https://en.wikipedia.org/w/api.php';
    $params = 'action=query&prop=revisions&rvprop=content&format=xml&titles=' . $query;
    $url = $base_url . '?' . $params;
    
    // Use cURL to get data in JSON format
    $api = simplexml_load_file($url);

    return $api;
    }
  </pre>
  <p>So we call the function, $api is our query</p>
  <pre>
    //call function
    //Next we transfer result into php array with json_decode function
    $api = search_wiki($query);</pre>
  <p>Finally we just loop through array to get all articalls that starts with bread</p>
  <pre><code>
        foreach ($api->query as $qy) {
            foreach ($qy->pages as $pgs) {
                foreach ($pgs->page as $pg) {
                    foreach ($pg->revisions as $revs) {
                        echo  htmlentities($revs->rev) ;
                    }
                }
            }
        }
</code></pre> 
  <div class="text-center">
      <h4>The result:</h4>
      <pre>
<?php 
    include 'index.php';
?>
</pre>
      <h3><a href="index.php" download>Download index.php</a></h3>
      <h3><a href="search_view.php" download>Download search_view.php</a></h3>
  </div>
  <div>
  </div>
</body>
</html>       