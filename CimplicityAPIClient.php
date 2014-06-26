<?php

class CimplicityAPIClient
{
    
    var $baseURL;

    function doGet($url)
    {
        $start = microtime(true);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->baseURL.$url);
        // curl_setopt($ch, CURLOPT_HEADER, true);
        // curl_setopt($ch, CURLINFO_HEADER_OUT, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_COOKIEJAR, '/tmp/cookiejar.txt'.getmypid());
        curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/cookiejar.txt'.getmypid());
        $result = curl_exec($ch);

        curl_close($ch);
        $runTime = microtime(true) - $start;

        return $result;
    }

    function doPost($url, $postFields = null)
    {
        $start = microtime(true);
        if ($postFields == null) $postFields = array();
        $fstr = '';
        foreach($postFields as $key=>$value) { $fstr .= $key.'='.$value.'&'; }
        rtrim($fstr, '&');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->baseURL.$url);

        // curl_setopt($ch, CURLOPT_HEADER, true);
        // curl_setopt($ch, CURLINFO_HEADER_OUT, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_POST, count($postFields));
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fstr);
        curl_setopt($ch, CURLOPT_COOKIEJAR, '/tmp/cookiejar.txt'.getmypid());
        curl_setopt($ch, CURLOPT_COOKIEFILE, '/tmp/cookiejar.txt'.getmypid());
        $result = curl_exec($ch);
        
        curl_close($ch);
        $runTime = microtime(true) - $start;

        return $result;
    }
}
