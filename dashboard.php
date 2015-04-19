<!DOCTYPE html>
<?php

require_once('AlohaAPIClient.php');
$cl = new AlohaAPIClient();
$cl->baseURL = 'http://api.eu1.vanadaloha.net';

$apikey = 'API_KEY_HERE';
$campaignId = CAMPAIGN_ID_HERE;

$json = $cl->doGet("/v2/realtimeinfo/inbound/campaigns/{$campaignId}.json?apikey={$apikey}");
$obj = json_decode($json);
$obj = $obj->$campaignId;

?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Aloha Dashboard</title>
    <style type="text/css">
        table {
            text-align: center;
            margin: 20px auto;
        }
        td {
            padding: 5px;
        }
        tr.big td { 
            font-size: 100pt;
            font-weight: bold;
            padding: 10px 50px 0px 50px;
        }
        
    </style>
  </head>
  <body>
    <table>
        <tr class="big">
            <td><?php echo $obj->num_total_calls; ?></td>
            <td><?php echo $obj->num_call; ?></td>
            <td><?php echo $obj->time_avg_talk; ?></td>
            <td><?php echo $obj->perc_sl; ?></td>
        </tr>
        <tr>
            <td># Calls</td>
            <td># On Call</td>
            <td>Avg Talk Time</td>
            <td>Service Level</td>
        </tr>
        <tr class="big">
            <td><?php echo $obj->num_wait; ?></td>
            <td><?php echo $obj->time_long_wait; ?></td>
            <td><?php echo $obj->time_avg_wait; ?></td>
            <td><?php echo 100 - $obj->perc_abandon; ?></td>
        </tr>
        <tr>
            <td># Waiting</td>
            <td>Longest Waiting</td>
            <td>Avg Wait Time</td>
            <td>Reachability</td>
        </tr>
    </table>
    <script type="text/javascript">
        setTimeout(function() {
            window.location.reload();
        }, 5000);
    </script>
  </body>
</html>
