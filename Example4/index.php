
<!DOCTYPE html>
<html>
<head>
    <title>Famous London Train Stations</title>
        <script type="text/javascript" src="js/libs/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="js/libs/bootstrap.min.js"></script>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <script>
    $(document).ready(function(){
 
    $.ajax({
        type: "GET",
        url: "http://en.wikipedia.org/w/api.php?action=parse&format=json&prop=text&section=0&page=List_of_London_railway_stations&callback=?",
        contentType: "application/json; charset=utf-8",
        async: false,
        dataType: "json",
        success: function (data, textStatus, jqXHR) {
 
            var markup = data.parse.text["*"];
            var blurb = $('<div></div>').html(markup);
 
            // remove links as they will not work
            blurb.find('a').each(function() { $(this).replaceWith($(this).html()); });
 
            // remove any references
            blurb.find('sup').remove();
 
            // remove cite error
            blurb.find('.mw-ext-cite-error').remove();
            $('#article').html($(blurb).find('p'));
 
        },
        error: function (errorMessage) {
        }
    });
});
    </script>
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
                    <li>
                        <a href="../Example2/index.php"  target="_top" >Example 2</a>
                    </li>
                     <li>
                        <a href="../Example3/wiki.php"  target="_top" >Exampl 3</a>
                    </li>
                    <li class="active" >
                        <a href="../Example4/index.php"  target="_top" >Example 4</a>
                    </li>
                </ul>
           
        </div>
    </div>
    <!-- End navigation bar.-->
    <!-- Start Google Maps & Scripts. -->
    <div id="container">
    <div class="row">
     <div class="col-lg-8 col-lg-offset-2" >
     <h1>London Rails</h1>
     <br/>
    <div id="article"></div>
    </div>
    </div>
   
    </div>

    
    
   
</body>
</html>
