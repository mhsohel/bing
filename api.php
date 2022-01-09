<?php
$rest_api_url = "https://bing.com/webmaster/api.svc/json/SubmitUrlbatch?apikey=<API_KEY>";

$data_string = json_encode([
     'siteUrl'    => 'https://utpland.com',
     'urlList'  => [
          'https://utpland.com/best-dress-shoes-for-toddlers/',
          'https://utpland.com/best-water-bottle-filtration-system/'
     ]
]);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $rest_api_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

curl_setopt($ch, CURLOPT_HTTPHEADER, [
     'Content-Type: application/json',
     'Content-Length: ' . strlen($data_string)
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
echo print_r($result);
