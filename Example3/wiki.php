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
          <a class="navbar-brand" href="#">Home</a>
        </div>  
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
    <div class="container">
        <div class="row">
<h2>Wikipedia API. This example will demonstrate you how get categories from Wikipedia on particular keyword. I will be using "bread" keyword for this tutorial.</h2>
<p>Firstly, we need to think about the query or API url. Here is the simple example, just put this link in your url and see the result</p>
  <p>The result will be:</p><pre>https://en.wikipedia.org/w/api.php?action=query&list=allcategories&rawcontinue=&acprefix=bread&format=json</pre>
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
    <pre>format=json</pre>  
  </p><br />
  <p>You can play wil different variations of query in wikiAPI <a href="https://en.wikipedia.org/wiki/Special:ApiSandbox">Sandbox</a></p>
  <p>Next, for this example I used CURL request to get data from Wikipedia</p>
  <pre>function callWiki($url)
    {
    //initialize
    $ch = curl_init();
    //Set the opions
    curl_setopt_array($ch, array(
    //specify the url
    CURLOPT_URL => $url,
    //Return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
    CURLOPT_RETURNTRANSFER => true,
    //Stop cURL from verifying the peer's certificate
    CURLOPT_SSL_VERIFYPEER => false,
    //Check the existence of a common name and also verify that it matches the hostname provided. 
    CURLOPT_SSL_VERIFYHOST => 2
    ));
    //execute and fetch the result
    $result = curl_exec($ch);
    //free up the curl handle
    curl_close($ch);
    //return fetched information
    return $result;
    }</pre>
  <p>So we call the function, $api is our query</p>
  <pre>
    //call function
    $api_response = callWiki($api);
    //Next we transfer result into php array with json_decode function
    $results = json_decode($api_response, true);</pre>
  <p>Finally we just loop through array to get all articalls that starts with bread</p>
  <pre><code>foreach ($results['query']['allcategories'] as $k => $v)
        {
        foreach($v as $key => $val)
            {
            //Replace all white spaces with underscore
            $string = str_replace(' ', '_', $val);
    echo "&lthref='http://www.wikipedia.org/wiki/$string'&gt".$val."&lt/a&gt"; 
 . "&ltbr /&gt";
            }
}</code></pre> 
  <div class="text-center">
      <h4>The result:</h4>
      <pre>
<?php 
include 'get.php';
?>
</pre>
      <h3><a href="get.php" download>Download Code</a></h3>
  </div>
  <div>
  </div>
</body>
</html>       