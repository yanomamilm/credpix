<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: x-api-key, User-Agent, Content-Type, Accept');
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(204); exit; }

$path = isset($_GET['path']) ? ltrim($_GET['path'], '/') : '';
$url = 'https://api-gateway.techbynet.com/' . $path;

$method = $_SERVER['REQUEST_METHOD'];
$body = file_get_contents('php://input');

$forwardHeaders = ['Content-Type: application/json'];
foreach (getallheaders() as $key => $val) {
    $k = strtolower($key);
    if (in_array($k, ['x-api-key', 'user-agent', 'accept'])) {
        $forwardHeaders[] = "$key: $val";
    }
}

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
curl_setopt($ch, CURLOPT_HTTPHEADER, $forwardHeaders);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
if ($body) curl_setopt($ch, CURLOPT_POSTFIELDS, $body);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

header('Content-Type: application/json');
http_response_code($httpCode);
echo $response;
