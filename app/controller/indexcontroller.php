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

        if (isset($_GET["singleReview"]) && strlen($_GET["singleReview"]) > 0) {
            $review = $_GET["singleReview"];

            $sentiment = \Model\Sentiment::handleSentiment($review, false);

            echo \View\RenderView::render("pages\\indexview.php", ["singleReview" => "$review", "sentiment" => "$sentiment[0]"]);
        } else {
            echo \View\RenderView::render("pages\\indexview.php", ["sentiment" => "0"]);
        }
    }

    public function post()
    {

        if (isset($_POST["submit"]) && isset($_FILES["fileReview"])) {

            $filePath = \Controller\IndexController::instance()->handleUpload();
            $sentiment = \Model\Sentiment::handleSentiment($filePath, true);
            // print_r($sentiment);
            echo  \View\RenderView::render("pages\\indexview.php", ["fileReview" => str_replace("app/uploads/", "", $filePath), "sentiments" => $sentiment]);
        } else {
            echo \View\RenderView::render("pages\\indexview.php", ["sentiments" => "0"]);
        }
    }

    public function handleUpload()
    {
        //Ref: https://www.w3schools.com/php/php_file_upload.asp
        $target_dir = "app/uploads/";

        $whitelistType = [".csv", "application/vnd.ms-excel"];

        // print_r($_FILES);

        // echo $target_file;
        if (isset($_POST["submit"]) && isset($_FILES["fileReview"])) {
            $name = $_FILES["fileReview"]["name"];
            $explodedName = explode('.', $name);
            $ext = strtolower(end($explodedName));
            $type = $_FILES['fileReview']['type'];
            $tmpName = $_FILES['fileReview']['tmp_name'];
            $target_file = $target_dir . basename($_FILES["fileReview"]["name"]);

            if ($_FILES['fileReview']["size"] > 4000000) {
                echo "ukuran file terlalu besar";
            } else if ($_FILES['fileReview']["error"] == 0 && $_FILES['fileReview']["size"] > 0) {
                if (in_array($type, $whitelistType)) {
                    $didUpload = move_uploaded_file($tmpName, $target_file);
                    if ($didUpload) {
                        // echo "The file " . basename($name) . " has been uploaded";
                        return $target_file;
                    }
                }
            }
        }
    }
}
