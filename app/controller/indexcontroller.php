<?php

namespace Controller;

// use View\RenderView;
require_once "app/view/renderview.php";
require_once "app/model/sentiment.php";

class  IndexController
{
    private static $selfInstance;

    public function __construct()
    {
    }

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

        //Ambil parameter di url 
        //Contoh request url :http://localhost:8080/?review="Agak kurang enak" , ambil parameternya pake $_GET['review]
        
        //$review = $_GET['review];
        //$sentiment = \Model\Sentiment::handleSentiment($review, false);
        // echo  \View\RenderView::render("pages\\indexview.php", ["sentiment"=>"$sentiment"]);
        
        echo \View\RenderView::render("pages\\indexview.php", ["sentiment" => "-1"]);
    }

    public function post()
    {
        #bagian processing untuk yang parameternya lebih dari satu / pake file csv

        //$review = <Ambil file yang di upload>
        //$sentiment = \Model\Sentiment::handleSentiment($review, true);
        // echo  \View\RenderView::render("pages\\indexview.php", ["sentiment"=>"$sentiment"]);

        echo  \View\RenderView::render("pages\\indexview.php", ["sentiment" => "1"]);
    }
}
