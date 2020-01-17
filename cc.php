<?php
    // function curl($url) {
    //     $ch = curl_init();  // Initialising cURL
    //     curl_setopt($ch, CURLOPT_URL, $url);    // Setting cURL's URL option with the $url variable passed into the function
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); // Setting cURL's option to return the webpage data
    //     $data = curl_exec($ch); // Executing the cURL request and assigning the returned data to the $data variable
    //     curl_close($ch);    // Closing cURL
    //     return $data;   // Returning the data from the function
    // }

    // $scraped_website = curl("https://www.x-rates.com/calculator/?from=USD&to=INR&amount=1");  // Executing our curl function to scrape the webpage http://www.example.com and return the results into the $scraped_website variable
   
    // $start_point = strpos($scraped_website, '<span class="ccOutputRslt">');
    // $end_point = strpos($scraped_website, '</span>', $start_point);
    // $length = $end_point-$start_point;
    // $html = substr($scraped_website, $start_point, $length);
    // echo $html;

    // $a = 0.7458933;
    // echo $x = number_format(round($a, 2), 2); // --> 0.00
    // $x = number_format(round($a, 0), 0); // --> 0

        echo exchangerate('USD','INR',90);
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
         
            $amt = explode('.',$html,2);
            $dec = substr($amt[1],0,2);
            return $rate = $amt[0].".".$dec;
        }
?>