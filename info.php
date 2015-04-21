<?php

// show campaign info, for instance to put est. waiting time on website

require_once('AlohaAPIClient.php');

$cl = new AlohaAPIClient();
$cl->baseURL = 'http://api.vanadcimplicity.com';

$apikey = 'API_KEY_HERE';

$json = $cl->doGet("/v2/realtimeinfo/inbound/campaigns.json?apikey={$apikey}");
print_r($json);
