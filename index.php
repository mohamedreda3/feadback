<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');



require './controller/controller.php';
require './config/connecttodb.php';
require './models/signup.php';
require './models/login.php';
require './models/logout.php';
require './config/response.php';
require './models/sendfeadback.php';
require './models/getusers.php';
require './models/getsessions.php';
require './models/getfeadbacks.php';
require './models/sendfeadbacks.php';
require './models/addsession.php';
require './models/updatesession.php';
require './models/deletesession.php';


$requestUri = explode('/', $_SERVER['REQUEST_URI']);
$request = $requestUri[1];

$connectToDatabase = new ConnectToDb;
$controller = new Controller($connectToDatabase);


$data = file_get_contents('php://input');
$data = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', stripslashes($data)), true);

$res = new Response;

if ($request == 'signup') {
    $controller->processRequest($request, $data);
} elseif ($request == 'logout') {
    $controller->processRequest($request);
} elseif ($request == 'login') {
    $controller->processRequest($request, $data);
} elseif ($request == 'sendfeadback') {
    $controller->processRequest($request, $data);
} elseif ($request == 'getusers') {
    $controller->processRequest($request);
} elseif ($request == 'getsessions') {
    $controller->processRequest($request);
} elseif ($request == 'getfeadbacks') {
    $controller->processRequest($request);
} elseif ($request == 'sendfeadbacks') {
    $controller->processRequest($request, $data);
}  elseif ($request == 'addsession') {
    $controller->processRequest($request, $data);
}  elseif ($request == 'updatesession') {
    $controller->processRequest($request, $data);
}    elseif ($request == 'deletesession') {
    $controller->processRequest($request, $data);
}  else {
    $res->getResponse(0, 'Invalid Request');
}

