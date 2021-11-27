<?php

namespace Controller;

// use View\RenderView;
require_once "app/view/renderview.php";

class  IndexController
{
    private static $selfInstance;

    public function __construct()
    {}

    public static function instance()
    {
        if (\Controller\IndexController::$selfInstance === NULL) {
            \Controller\IndexController::$selfInstance = new \Controller\IndexController();
        }

        return \Controller\IndexController::$selfInstance;
    }

    public function serve()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            \Controller\IndexController::instance()->get();
        } else if ($_SERVER['REQUEST_METHOD'] == "POST") {
            \Controller\IndexController::instance()->post();
        }
    }
    public function get()
    {
        #bagian processing untuk yang parameternya cuma 1

        echo \View\RenderView::render("pages\\indexview.php", ["sentiment"=>"-1"]);
    }

    public function post()
    {
        #bagian processing untuk yang parameternya lebih dari satu / pake file csv
        
        echo  \View\RenderView::render("pages\\indexview.php", ["sentiment"=>"1"]);
    }
}
