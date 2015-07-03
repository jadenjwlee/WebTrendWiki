<?php
function callWiki($url)
    {
    $ch = curl_init();
    curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => 2
    ));

    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
    }
    
    $api = 'https://en.wikipedia.org/w/api.php?action=query&list=allcategories&rawcontinue=&acprefix=bread&format=json';
//get query result
    $api_response = callWiki($api);
    $results = json_decode($api_response, true);
    foreach ($results['query']['allcategories'] as $k => $v)
        {
        foreach($v as $key => $val)
            {
            $string = str_replace(' ', '_', $val);
            echo "<a href='http://www.wikipedia.org/wiki/$string'>".$val."</a>"
                    . "<br />";
            
            }
        }
?>