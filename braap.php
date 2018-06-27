<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://f0670c220b9153e860662ff8937d4376:947f14fea2a2ef6537cc5648676b2c56@genexa-llc.myshopify.com/admin/products.json",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
curl_close($curl);
echo $response;

 ?>
