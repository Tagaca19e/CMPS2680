<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>
<?php

$url = "https://serpapi.com/search.json?engine=google_jobs&q=webdeveloper&google_domain=google.com&api_key=dde068a2fdf01689775d465a9389b58745dcf023d2fa39acb223c7bee31e00cd";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$resp_decoded = json_decode($resp);
var_dump($resp_decoded->jobs_result);



?>
  </body>
</html>
