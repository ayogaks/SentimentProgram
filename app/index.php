<?php

require_once 'app/controller/IndexController.php';
require_once 'view/renderview.php';
require_once 'view/renderfile.php';

// Grabs the URI and breaks it apart in case we have querystring stuff
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
$re = '/\/public_html\/(.+)$/m';
// print_r($request_uri);

// Route it up!
switch ($request_uri[0]) {
        // Home page
    case '/':
        \Controller\IndexController::instance()->serve();
        break;
    case preg_match($re, $request_uri[0]) ? true : false:
        // echo "here we are";
        $file = explode("/public_html/", $request_uri[0]);
        // echo $file[1];
        echo \View\RenderFile::render("public_html/".$file[1] , []);
        break;

        // Everything else
    default:
        header('HTTP/1.0 404 Not Found');

        echo \View\RenderView::render("404.php", []);
        break;
}
