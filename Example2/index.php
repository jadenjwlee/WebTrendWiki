<?php

session_start();

function search_wiki($query) {
    // Set up the URL for the query
    $query = urlencode($query);
    $base_url = 'https://en.wikipedia.org/w/api.php';
    $params = 'action=query&prop=revisions&rvprop=content&format=xml&titles=' . $query;
    $url = $base_url . '?' . $params;
    
    // Use cURL to get data in JSON format
    $api = simplexml_load_file($url);

    return $api;
}

if (isset($_POST['action'])) {
    $action =  $_POST['action'];
} else {
    $action =  'search';
}

if (isset($_POST['query'])) {
    $query = $_POST['query'];
    $_SESSION['query'] = $query;
} else if (isset($_SESSION['query'])) {
    $query = $_SESSION['query'];
} else {
    $query = '';
}

switch ($action) {
    case 'search':
        if (!empty($query)) {
            $api = search_wiki($query);
        }
        include 'search_view.php';
        break;
    default:
        include 'search_view.php';
        break;
}



?>