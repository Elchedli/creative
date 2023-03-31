
<?php
    header('Content-Type: application/json');
    $url = "https://www.google.com/";
    /*function get_contents($url, $ua = 'Mozilla/5.0 (Windows NT 5.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', $referer = 'http://www.google.com/') {
        if (function_exists('curl_exec')) {
          $header[0] = "Accept-Language: en-us,en;q=0.5";
          $curl = curl_init();
          curl_setopt($curl, CURLOPT_URL, $url);
          curl_setopt($curl, CURLOPT_USERAGENT, $ua);
          curl_setopt($curl, CURLOPT_REFERER, $referer);
          curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($curl, CURLOPT_TIMEOUT, 10);
          $content = curl_exec($curl);
          curl_close($curl);
        }
        else { 
          $content = file_get_contents($url);
        }
        return $content;
      }*/
     /* function get_contents($url) {
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
    $page = get_contents($url);*/
    //curl 'https://ilikeurls.net/ourpage.php?do=command' \
    //-H 'Host: ilikeurls.net' \
    
    //-H 'User-Agent: Mozilla/5.0 (X11; Linux x86_64; rv:33.0) Gecko/20100101 Firefox/33.0' \
    //-H 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8' \
    
    //-H 'Accept-Language: en-US,en;q=0.5' \
    //-H 'Referer: https://ilikeurls.net/outpage.php' \                                                    
    //-H 'Cookie: all required cookies will appear here' \
    //-H 'Connection: keep-alive'
    $ch = curl_init('https://www1.animeultima.to/');
    curl_setopt($ch, CURLOPT_URL, $url);   
    curl_setopt($ch, CURLOPT_REFERER, 'https://www1.animeultima.to/');
    curl_setopt($ch, CURLOPT_HTTPHEADER, 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8');
    curl_setopt($ch, CURLOPT_FORBID_REUSE, TRUE);
    curl_setopt(curl, CURLOPT_COOKIE, "all required cookies will appear here");
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Linux x86_64; rv:33.0) Gecko/20100101 Firefox/33.0");
    $html = curl_exec($ch);
    echo $html;
    /*$url = "";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_REFERER, 'http://www.example.com/1');
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");
    curl_setopt($ch, CURLOPT_URL, urlencode($url));
    $response = curl_exec($ch);
    curl_close($ch);*/
    //echo $page;
    
?>