<?php

switch (strtolower($_SERVER["REQUEST_METHOD"])) {
    case "post":
        $command = $_POST['command'];
        $data = $_POST['data'];

        //error_log("command:" . $command);
        error_log("POST:" . $command . $data);
        
        $options = array (
          CURLOPT_HEADER         => false
        , CURLOPT_RETURNTRANSFER => true
        , CURLOPT_FOLLOWLOCATION => true
        , CURLOPT_TIMEOUT        => 60
        , CURLOPT_CONNECTTIMEOUT => 0
        , CURLOPT_HTTPGET        => 1
        , CURLOPT_URL            => $command
        , CURLOPT_POST           => true
        , CURLOPT_POSTFIELDS     => $data
        );
        break;
    case "get":
        $options = array (
          CURLOPT_HEADER         => false
        , CURLOPT_RETURNTRANSFER => true
        , CURLOPT_FOLLOWLOCATION => true
        , CURLOPT_TIMEOUT        => 60
        , CURLOPT_CONNECTTIMEOUT => 0
        , CURLOPT_HTTPGET        => 1
        , CURLOPT_URL            => "http://" . $_GET['tstataddress'] . "/" . $_GET["service"]
        );
        break;
    default:
        throw new Exception("Unsupported request method.");
        break;
}

$curl_handle = curl_init();
curl_setopt_array($curl_handle, $options);
$server_output = curl_exec($curl_handle);
curl_close($curl_handle);

if (isset($options[CURLOPT_POST]))
  error_log($server_output);

echo $server_output;
?>
