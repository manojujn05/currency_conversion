<?php
error_reporting(0);

function exchangerate($fromcurr , $tocurr, $amt) {
    $url = "https://www.x-rates.com/calculator/?from=".$fromcurr."&to=".$tocurr."&amount=".$amt;
    $ch = curl_init();  // Initialising cURL
    curl_setopt($ch, CURLOPT_URL, $url);    // Setting cURL's URL option with the $url variable passed into the function
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); // Setting cURL's option to return the webpage data
    $scraped_website = curl_exec($ch); // Executing the cURL request and assigning the returned data to the $data variable
    curl_close($ch);    // Closing cURL
    $start_point = strpos($scraped_website, '<span class="ccOutputRslt">');
    $end_point = strpos($scraped_website, '</span>', $start_point);
    $length = $end_point-$start_point;
    $html = substr($scraped_website, $start_point, $length);
    // math round function was not working
    $amt = explode('.',$html,2);
    
    $dec = substr($amt[1],0,2);
    $rate = $amt[0].".".$dec;
    return $rate;
}


?>